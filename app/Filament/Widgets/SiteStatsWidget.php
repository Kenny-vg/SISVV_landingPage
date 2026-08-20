<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Discipline;
use App\Models\Event;
use App\Models\Facility;
use App\Models\Hero;
use App\Models\HotspotImage;
use App\Models\Membership;
use App\Models\PageSection;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SiteStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $heroesTotal = Hero::count();
        $heroesActive = Hero::where('is_active', true)->count();

        $aboutTotal = PageSection::where('key', 'like', 'about_%')->count();
        $aboutActive = PageSection::where('key', 'like', 'about_%')->where('is_active', true)->count();

        $facilitiesTotal = Facility::count();
        $facilitiesPublished = Facility::where('is_published', true)->count();

        $disciplinesTotal = Discipline::count();
        $disciplinesPublished = Discipline::where('is_published', true)->count();

        $eventsTotal = Event::count();
        $eventsPublished = Event::where('is_published', true)->count();

        $membershipsTotal = Membership::count();
        $membershipsPublished = Membership::where('is_published', true)->count();

        $categoriesTotal = Category::count();
        $categoriesVisible = Category::where('is_visible', true)->count();

        $hotspotsPublished = HotspotImage::where('is_published', true)->count();
        $hotspotsWithImage = HotspotImage::where('is_published', true)->whereNotNull('image_path')->count();

        return [
            Stat::make('Slides del Hero', $heroesActive)
                ->description("de {$heroesTotal} slides · visibles en la web")
                ->descriptionIcon('heroicon-o-photo'),
            Stat::make('Secciones de Nosotros', $aboutActive)
                ->description("de {$aboutTotal} secciones · visibles")
                ->descriptionIcon('heroicon-o-information-circle'),
            Stat::make('Instalaciones', $facilitiesPublished)
                ->description("de {$facilitiesTotal} · visibles en la web")
                ->descriptionIcon('heroicon-o-building-office-2'),
            Stat::make('Clases / Disciplinas', $disciplinesPublished)
                ->description("de {$disciplinesTotal} · visibles en la web")
                ->descriptionIcon('heroicon-o-fire'),
            Stat::make('Eventos', $eventsPublished)
                ->description("de {$eventsTotal} · visibles en la web")
                ->descriptionIcon('heroicon-o-calendar-days'),
            Stat::make('Membresías', $membershipsPublished)
                ->description("de {$membershipsTotal} planes · visibles")
                ->descriptionIcon('heroicon-o-credit-card'),
            Stat::make('Categorías de la Carta', $categoriesVisible)
                ->description("de {$categoriesTotal} · visibles")
                ->descriptionIcon('heroicon-o-cake'),
            Stat::make('Puntos del Mapa con imagen', $hotspotsWithImage)
                ->description("de {$hotspotsPublished} publicados")
                ->descriptionIcon('heroicon-o-map-pin'),
        ];
    }
}