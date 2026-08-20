<?php

namespace App\Filament\Widgets;

use App\Models\Discipline;
use App\Models\Event;
use App\Models\Facility;
use App\Models\HotspotImage;
use App\Models\Membership;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SiteStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $hotspotsPublished = HotspotImage::where('is_published', true)->count();

        return [
            Stat::make('Eventos publicados', Event::where('is_published', true)->count())
                ->description('Visibles en la web')
                ->descriptionIcon('heroicon-o-calendar-days'),
            Stat::make('Instalaciones', Facility::where('is_published', true)->count())
                ->description('Visibles en la web')
                ->descriptionIcon('heroicon-o-building-office-2'),
            Stat::make('Clases / Disciplinas', Discipline::where('is_published', true)->count())
                ->description('Visibles en la web')
                ->descriptionIcon('heroicon-o-fire'),
            Stat::make('Membresías', Membership::where('is_published', true)->count())
                ->description('Planes visibles en la web')
                ->descriptionIcon('heroicon-o-credit-card'),
            Stat::make('Hotspots con imagen', HotspotImage::where('is_published', true)->whereNotNull('image_path')->count())
                ->description("de $hotspotsPublished publicados en el mapa")
                ->descriptionIcon('heroicon-o-map-pin'),
        ];
    }
}