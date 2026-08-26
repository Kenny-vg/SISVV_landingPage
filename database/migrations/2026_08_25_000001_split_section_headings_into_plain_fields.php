<?php

use App\Models\PageSection;
use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const HEADING_KEYS = [
        'instalaciones_heading',
        'facilities_heading',
        'events_heading',
        'contact_heading',
    ];

    public function up(): void
    {
        Schema::table('page_sections', function (Blueprint $table) {
            $table->text('heading_accent')->nullable()->after('heading');
        });

        foreach (self::HEADING_KEYS as $key) {
            $setting = Setting::where('key', $key)->first();

            if (! $setting) {
                continue;
            }

            [$main, $accent] = self::splitHeading((string) $setting->value);

            Setting::updateOrCreate(
                ['key' => $key.'_accent'],
                ['value' => $accent, 'group' => $setting->group]
            );

            $setting->value = $main;
            $setting->save();
        }

        PageSection::whereNotNull('heading')->each(function (PageSection $section) {
            [$main, $accent] = self::splitHeading((string) $section->heading);

            $section->heading = $main;
            $section->heading_accent = $accent;
            $section->save();
        });
    }

    public function down(): void
    {
        foreach (self::HEADING_KEYS as $key) {
            $setting = Setting::where('key', $key)->first();
            $accentKey = $key.'_accent';
            $accent = Setting::where('key', $accentKey)->value('value');

            if ($setting && $accent) {
                $setting->value = $setting->value.'<br><span>'.htmlspecialchars($accent, ENT_QUOTES, 'UTF-8', false).'</span>';
                $setting->save();
            }

            Setting::where('key', $accentKey)->delete();
        }

        PageSection::whereNotNull('heading')->each(function (PageSection $section) {
            if ($section->heading_accent) {
                $section->heading = $section->heading.'<br><span>'.htmlspecialchars($section->heading_accent, ENT_QUOTES, 'UTF-8', false).'</span>';
                $section->save();
            }
        });

        Schema::table('page_sections', function (Blueprint $table) {
            $table->dropColumn('heading_accent');
        });
    }

    private static function splitHeading(string $raw): array
    {
        $value = trim(html_entity_decode($raw));

        if (preg_match('/<br\s*\/?>/i', $value, $matches, PREG_OFFSET_CAPTURE)) {
            $main = substr($value, 0, $matches[0][1]);
            $rest = substr($value, $matches[0][1] + strlen($matches[0][0]));

            if (preg_match('/<span[^>]*>(.*?)<\/span>/is', $rest, $span)) {
                $rest = $span[1];
            }

            return [trim(strip_tags($main)), trim(strip_tags($rest))];
        }

        return [trim(strip_tags($value)), ''];
    }
};
