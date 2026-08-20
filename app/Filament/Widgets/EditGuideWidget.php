<?php

namespace App\Filament\Widgets;

use App\Filament\Pages\SettingsPage;
use App\Filament\Resources\DisciplineResource;
use App\Filament\Resources\EventResource;
use App\Filament\Resources\FacilityResource;
use App\Filament\Resources\HeroResource;
use App\Filament\Resources\HotspotImageResource;
use App\Filament\Resources\MembershipResource;
use App\Filament\Resources\PageSectionResource;
use Filament\Widgets\Widget;

class EditGuideWidget extends Widget
{
    protected static ?int $sort = -2;

    protected int | string | array $columnSpan = 'full';

    protected static string $view = 'filament.widgets.edit-guide-widget';

    public function getSections(): array
    {
        return [
            [
                'title' => 'Portada (Hero)',
                'description' => 'Slides principales de la portada: título, subtítulo, botón e imagen de fondo.',
                'url' => HeroResource::getUrl('index'),
                'icon' => 'heroicon-o-photo',
            ],
            [
                'title' => 'Nosotros y Gastronomía',
                'description' => 'Textos de la sección "Nosotros" (misión, visión, valores) y de la sección de gastronomía.',
                'url' => PageSectionResource::getUrl('index'),
                'icon' => 'heroicon-o-document-text',
            ],
            [
                'title' => 'Instalaciones',
                'description' => 'Espacios del club con fotos, horarios y tour 360° (página "Instalaciones").',
                'url' => FacilityResource::getUrl('index'),
                'icon' => 'heroicon-o-building-office-2',
            ],
            [
                'title' => 'Clases / Disciplinas',
                'description' => 'Clases deportivas y de bienestar con fotos y horarios (página "Clases").',
                'url' => DisciplineResource::getUrl('index'),
                'icon' => 'heroicon-o-fire',
            ],
            [
                'title' => 'Membresías',
                'description' => 'Planes, precios y beneficios de las membresías (página "Membresías").',
                'url' => MembershipResource::getUrl('index'),
                'icon' => 'heroicon-o-credit-card',
            ],
            [
                'title' => 'Eventos',
                'description' => 'Tipos de eventos con imagen y PDF informativo (portada y página "Eventos").',
                'url' => EventResource::getUrl('index'),
                'icon' => 'heroicon-o-calendar-days',
            ],
            [
                'title' => 'Mapa Interactivo',
                'description' => 'Imágenes de cada punto del mapa del club (sección "Mapa Interactivo" de la portada).',
                'url' => HotspotImageResource::getUrl('index'),
                'icon' => 'heroicon-o-map-pin',
            ],
            [
                'title' => 'Configuración del sitio',
                'description' => 'Textos de portada, contacto, redes sociales, footer y reglamento de membresías.',
                'url' => SettingsPage::getUrl(),
                'icon' => 'heroicon-o-cog-6-tooth',
            ],
        ];
    }
}