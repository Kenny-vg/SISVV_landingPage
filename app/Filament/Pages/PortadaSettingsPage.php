<?php

namespace App\Filament\Pages;

use App\Filament\Pages\Concerns\InteractsWithSettings;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Pages\Page;

class PortadaSettingsPage extends Page
{
    use InteractsWithSettings;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Ajustes de la Portada';

    protected static ?string $navigationGroup = 'Portada';

    protected static ?int $navigationSort = 2;

    protected static ?string $title = 'Ajustes de la Portada';

    protected static ?string $slug = 'portada';

    protected static string $view = 'filament.pages.settings-page';

    public static function canAccess(): bool
    {
        return auth()->user()?->is_admin ?? false;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                View::make('filament.components.section-guide')
                    ->viewData([
                        'title' => 'Ajustes de la portada',
                        'description' => 'El título, subtítulo, botón e imagen de la portada se editan en "Portada → Slides del Hero".',
                    ])
                    ->columnSpanFull(),
                Toggle::make('hero_show_golfista')
                    ->label('Mostrar ilustraciones del héroe')
                    ->helperText('Desactivar para ocultar el golfista y la pelota de golf de la portada')
                    ->default(true),
            ])
            ->statePath('data');
    }
}