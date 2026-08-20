<?php

use App\Models\PageSection;
use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('page_sections', function (Blueprint $table) {
            $table->text('heading')->nullable()->after('title');
        });

        $aboutHeading = Setting::where('key', 'about_heading')->value('value');
        if ($aboutHeading) {
            PageSection::where('key', 'about_intro')->update(['heading' => $aboutHeading]);
        }

        Setting::whereIn('key', [
            'hero_title',
            'hero_subtitle',
            'hero_default_button',
            'about_heading',
        ])->delete();
    }

    public function down(): void
    {
        $heading = PageSection::where('key', 'about_intro')->value('heading');
        if ($heading) {
            Setting::updateOrCreate(['key' => 'about_heading'], ['value' => $heading]);
        }

        Schema::table('page_sections', function (Blueprint $table) {
            $table->dropColumn('heading');
        });
    }
};