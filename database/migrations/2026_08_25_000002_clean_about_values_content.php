<?php

use App\Models\PageSection;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        PageSection::where('key', 'about_values')->each(function (PageSection $section) {
            $content = (string) $section->content;

            if (trim($content) === '') {
                return;
            }

            $withBreaks = preg_replace(['/<br\s*\/?>/i', '/<\/(p|div|li|h[1-6])>/i'], "\n", $content);
            $plain = trim(strip_tags($withBreaks));

            if ($plain === '') {
                return;
            }

            $items = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $plain)), fn ($line) => $line !== ''));

            if (count($items) === 1 && str_contains($items[0], ',')) {
                $items = array_values(array_filter(array_map('trim', explode(',', $items[0])), fn ($part) => $part !== ''));
            }

            $section->content = implode("\n", $items);
            $section->save();
        });
    }

    public function down(): void
    {
        PageSection::where('key', 'about_values')->each(function (PageSection $section) {
            $items = array_filter(array_map('trim', explode("\n", (string) $section->content)), fn ($line) => $line !== '');

            if (count($items) > 1) {
                $section->content = implode(', ', $items);
                $section->save();
            }
        });
    }
};
