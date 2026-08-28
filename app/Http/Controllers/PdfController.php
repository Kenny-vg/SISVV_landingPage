<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class PdfController extends Controller
{
    public function __invoke(Request $request, string $path): Response
    {
        $path = $this->sanitizePath($path);

        if ($path === null || ! str_ends_with(strtolower($path), '.pdf')) {
            abort(404);
        }

        $disk = Storage::disk('public');

        if (! $disk->exists($path)) {
            abort(404);
        }

        $absolutePath = $disk->path($path);

        return response()->file($absolutePath, [
            'Content-Type' => 'application/pdf',
            'Cache-Control' => 'public, max-age=31536000',
        ]);
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
}
