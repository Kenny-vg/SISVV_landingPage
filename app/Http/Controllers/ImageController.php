<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Symfony\Component\HttpFoundation\Response;

class ImageController extends Controller
{
    private const ALLOWED_SOURCE_EXT = ['jpg', 'jpeg', 'png', 'webp'];

    private const OUTPUT_MIMES = [
        'webp' => 'image/webp',
        'jpg' => 'image/jpeg',
        'png' => 'image/png',
    ];

    public function __invoke(Request $request, string $path): Response
    {
        $path = $this->sanitizePath($path);

        if ($path === null || ! preg_match('/\.[a-z0-9]+$/i', $path)) {
            abort(404);
        }

        $sourceExt = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        if (! in_array($sourceExt, self::ALLOWED_SOURCE_EXT, true)) {
            abort(404);
        }

        $width = max(100, min(2400, $request->integer('w', 1200)));
        $quality = max(55, min(92, $request->integer('q', 80)));
        $format = $this->resolveFormat($request->get('f', 'auto'), $request);

        [$sourcePath, $relativePath] = $this->locateSource($path);

        if ($sourcePath === null) {
            abort(404);
        }

        // El original ya es más chico que lo pedido y el formato coincide:
        // servirlo directo evita re-encode sin beneficio.
        if ($format === $sourceExt && getimagesize($sourcePath)[0] <= $width) {
            return $this->fileResponse($sourcePath, self::OUTPUT_MIMES[$format] ?? 'application/octet-stream');
        }

        $cacheRelative = sprintf(
            'resized/%s-w%d-q%d.%s',
            preg_replace('/\.[a-z0-9]+$/i', '', $relativePath),
            $width,
            $quality,
            $format
        );

        $disk = Storage::disk('public');

        if (! $disk->exists($cacheRelative)) {
            $this->ensureMemoryFor($sourcePath);
            $this->generateVariant($sourcePath, $width, $quality, $format, $cacheRelative);
        }

        return $this->fileResponse($disk->path($cacheRelative), self::OUTPUT_MIMES[$format]);
    }

    private function sanitizePath(string $path): ?string
    {
        $path = str_replace('\\', '/', $path);
        $path = preg_replace('#/+#', '/', $path);
        $path = ltrim($path, '/');

        if (str_contains($path, '..')) {
            return null;
        }

        return $path;
    }

    /**
     * Localiza el original: primero en el disco público (contenido de usuarios),
     * luego en public/images (assets estáticos). Devuelve [ruta absoluta, ruta relativa al disco].
     *
     * @return array{0: ?string, 1: string}
     */
    private function locateSource(string $path): array
    {
        $disk = Storage::disk('public');

        if ($disk->exists($path)) {
            return [$disk->path($path), $path];
        }

        if (str_starts_with($path, 'images/') && is_file(public_path($path))) {
            return [public_path($path), $path];
        }

        return [null, $path];
    }

    private function resolveFormat(mixed $requested, Request $request): string
    {
        $requested = is_string($requested) ? strtolower($requested) : 'auto';

        if (in_array($requested, ['webp', 'jpg'], true)) {
            return $requested;
        }

        // auto: WebP si el navegador lo acepta
        return str_contains((string) $request->header('Accept', ''), 'image/webp') ? 'webp' : 'jpg';
    }

    /**
     * GD necesita ~4-5 bytes por píxel para decodificar. Para originales
     * gigantes se eleva memory_limit dinámicamente (con tope) antes de leer.
     */
    private function ensureMemoryFor(string $sourcePath): void
    {
        $info = getimagesize($sourcePath);

        if ($info === false) {
            abort(404);
        }

        [$w, $h] = $info;
        $estimated = $w * $h * 5;
        $current = self::parseBytes(ini_get('memory_limit') ?: '128M');

        if ($estimated * 1.7 > $current) {
            ini_set('memory_limit', (string) min((int) ($estimated * 1.7), 2048 * 1024 * 1024));
        }
    }

    private static function parseBytes(string $value): int
    {
        $value = trim($value);

        if (preg_match('/^(\d+)\s*([kmg])?i?b?$/i', $value, $m)) {
            $n = (int) $m[1];
            return match (strtolower($m[2] ?? '')) {
                'g' => $n * 1024 ** 3,
                'm' => $n * 1024 ** 2,
                'k' => $n * 1024,
                default => $n,
            };
        }

        return 128 * 1024 * 1024;
    }

    private function generateVariant(
        string $sourcePath,
        int $width,
        int $quality,
        string $format,
        string $cacheRelative
    ): void {
        $manager = new ImageManager(new Driver());

        $image = $manager->read($sourcePath);
        $image->orient();

        if ($image->width() > $width) {
            $image->scaleDown(width: $width);
        }

        $encoded = match ($format) {
            'webp' => $image->toWebp($quality),
            'png' => $image->toPng(),
            default => $image->toJpeg($quality),
        };

        $disk = Storage::disk('public');
        $tmp = $cacheRelative . '.' . uniqid('', true) . '.tmp';

        $disk->put($tmp, (string) $encoded);
        $disk->move($tmp, $cacheRelative);
    }

    private function fileResponse(string $absolutePath, string $mime): Response
    {
        return response()
            ->file($absolutePath, [
                'Content-Type' => $mime,
                'Cache-Control' => 'public, max-age=31536000, immutable',
            ]);
    }
}
