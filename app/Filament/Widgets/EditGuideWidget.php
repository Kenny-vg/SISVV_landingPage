<?php

namespace App\Filament\Widgets;

use App\Filament\Pages\ClasesSettingsPage;
use App\Filament\Pages\EventosSettingsPage;
use App\Filament\Pages\GastronomiaSettingsPage;
use App\Filament\Pages\InstalacionesSettingsPage;
use App\Filament\Pages\MembresiasSettingsPage;
use App\Filament\Pages\NosotrosSettingsPage;
use App\Filament\Pages\PortadaSettingsPage;
use App\Filament\Pages\SettingsPage;
use App\Filament\Resources\CategoryResource;
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
                'title' => 'Portada (Slides del Hero)',
                'description' => 'Título, subtítulo, botón e imagen de la portada.',
                'url' => HeroResource::getUrl('index'),
                'icon' => 'heroicon-o-photo',
            ],
            [
                'title' => 'Ajustes de la Portada',
                'description' => 'Mostrar u ocultar las ilustraciones de la portada.',
                'url' => PortadaSettingsPage::getUrl(),
                'icon' => 'heroicon-o-swatch',
            ],
            [
                'title' => 'Nosotros',
                'description' => 'Introducción, misión, visión, valores y filosofía.',
                'url' => PageSectionResource::getUrl('index'),
                'icon' => 'heroicon-o-information-circle',
            ],
            [
                'title' => 'Nosotros - Textos',
                'description' => 'Botón de la portada e imagen de fondo de la página.',
                'url' => NosotrosSettingsPage::getUrl(),
                'icon' => 'heroicon-o-pencil-square',
            ],
            [
                'title' => 'Instalaciones',
                'description' => 'Espacios del club y textos de la sección (página "Instalaciones").',
                'url' => FacilityResource::getUrl('index'),
                'icon' => 'heroicon-o-building-office-2',
            ],
            [
                'title' => 'Clases',
                'description' => 'Disciplinas y textos de la sección (página "Clases").',
                'url' => DisciplineResource::getUrl('index'),
                'icon' => 'heroicon-o-fire',
            ],
            [
                'title' => 'Membresías',
                'description' => 'Planes, precios y reglamento (página "Membresías").',
                'url' => MembershipResource::getUrl('index'),
                'icon' => 'heroicon-o-credit-card',
            ],
            [
                'title' => 'Eventos',
                'description' => 'Eventos con imagen y PDF (portada y página "Eventos").',
                'url' => EventResource::getUrl('index'),
                'icon' => 'heroicon-o-calendar-days',
            ],
            [
                'title' => 'Gastronomía',
                'description' => 'Carta (menú PDF) y texto de la sección de gastronomía.',
                'url' => CategoryResource::getUrl('index'),
                'icon' => 'heroicon-o-cake',
            ],
            [
                'title' => 'Mapa Interactivo',
                'description' => 'Imágenes de cada punto del mapa de la portada.',
                'url' => HotspotImageResource::getUrl('index'),
                'icon' => 'heroicon-o-map-pin',
            ],
            [
                'title' => 'Configuración del sitio',
                'description' => 'Contacto, redes sociales, footer, navegación y mensajes.',
                'url' => SettingsPage::getUrl(),
                'icon' => 'heroicon-o-cog-6-tooth',
            ],
        ];
    }
}