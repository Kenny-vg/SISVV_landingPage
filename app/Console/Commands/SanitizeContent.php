<?php

namespace App\Console\Commands;

use App\Models\Discipline;
use App\Models\Event;
use App\Models\Facility;
use App\Models\Hero;
use App\Models\PageSection;
use App\Models\Setting;
use Illuminate\Console\Command;

class SanitizeContent extends Command
{
    protected $signature = 'sanitize:content {--dry-run : Solo mostrar qué se modificará sin guardar}';
    protected $description = 'Sanitiza el contenido HTML existente en la base de datos';

    private array $richtextKeys = [
        'hero_title', 'hero_subtitle', 'about_heading',
        'instalaciones_heading', 'facilities_heading',
        'events_heading', 'contact_heading', 'contact_schedule',
    ];

    private int $totalChanges = 0;

    public function handle(): int
    {
        $this->info('=== Sanitización de contenido existente ===');
        $this->line('');

        $this->sanitizeHeroes();
        $this->sanitizePageSections();
        $this->sanitizeSettings();
        $this->sanitizeEvents();
        $this->sanitizeFacilities();
        $this->sanitizeDisciplines();

        $this->line('');
        $this->info("Proceso completado. Total de campos sanitizados: {$this->totalChanges}");

        return Command::SUCCESS;
    }

    private function sanitizeHeroes(): void
    {
        $this->line('--- Heroes ---');

        foreach (Hero::all() as $hero) {
            $dirty = false;

            $originalTitle = $hero->title;
            $hero->title = sanitize_html($hero->title);
            if ($hero->title !== $originalTitle) {
                $dirty = true;
            }

            $originalSubtitle = $hero->subtitle;
            $hero->subtitle = sanitize_html($hero->subtitle);
            if ($hero->subtitle !== $originalSubtitle) {
                $dirty = true;
            }

            if ($dirty) {
                $this->totalChanges++;
                $this->warn("  Hero #{$hero->id}: title/subtitle modificados");

                if (!$this->option('dry-run')) {
                    $hero->save();
                }
            }
        }
    }

    private function sanitizePageSections(): void
    {
        $this->line('--- Page Sections ---');

        foreach (PageSection::all() as $section) {
            $original = $section->content;
            $section->content = sanitize_html($section->content);

            if ($section->content !== $original) {
                $this->totalChanges++;
                $this->warn("  PageSection '{$section->key}': content modificado");

                if (!$this->option('dry-run')) {
                    $section->save();
                }
            }
        }
    }

    private function sanitizeSettings(): void
    {
        $this->line('--- Settings ---');

        $settings = Setting::whereIn('key', $this->richtextKeys)->get();

        foreach ($settings as $setting) {
            $original = $setting->value;
            $setting->value = sanitize_html($setting->value);

            if ($setting->value !== $original) {
                $this->totalChanges++;
                $this->warn("  Setting '{$setting->key}': valor modificado");

                if (!$this->option('dry-run')) {
                    $setting->save();
                }
            }
        }
    }

    private function sanitizeEvents(): void
    {
        $this->line('--- Eventos ---');

        foreach (Event::all() as $event) {
            $original = $event->description;
            $event->description = strip_tags($event->description ?? '');

            if ($event->description !== $original) {
                $this->totalChanges++;
                $this->warn("  Event #{$event->id}: description modificado");

                if (!$this->option('dry-run')) {
                    $event->save();
                }
            }
        }
    }

    private function sanitizeFacilities(): void
    {
        $this->line('--- Instalaciones ---');

        foreach (Facility::all() as $facility) {
            $original = $facility->description;
            $facility->description = strip_tags($facility->description ?? '');

            if ($facility->description !== $original) {
                $this->totalChanges++;
                $this->warn("  Facility #{$facility->id}: description modificado");

                if (!$this->option('dry-run')) {
                    $facility->save();
                }
            }
        }
    }

    private function sanitizeDisciplines(): void
    {
        $this->line('--- Clases / Disciplinas ---');

        foreach (Discipline::all() as $discipline) {
            $original = $discipline->description;
            $discipline->description = strip_tags($discipline->description ?? '');

            if ($discipline->description !== $original) {
                $this->totalChanges++;
                $this->warn("  Discipline #{$discipline->id}: description modificado");

                if (!$this->option('dry-run')) {
                    $discipline->save();
                }
            }
        }
    }
}
