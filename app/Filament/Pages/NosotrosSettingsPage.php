<?php

namespace App\Filament\Pages;

use App\Filament\Pages\Concerns\InteractsWithSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Pages\Page;

class NosotrosSettingsPage extends Page
{
    use InteractsWithSettings;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationLabel = 'Textos de la página';

    protected static ?string $navigationGroup = 'Nosotros';

    protected static ?int $navigationSort = 2;

    protected static ?string $title = 'Nosotros - Textos de la página';

    protected static ?string $slug = 'nosotros';

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
                        'title' => 'Textos de la página "Nosotros"',
                        'description' => 'La introducción, misión, visión, valores y filosofía se editan en "Nosotros → Contenido de Nosotros".',
                    ])
                    ->columnSpanFull(),
                TextInput::make('about_btn_text')
                    ->label('Botón "Conócenos más"')
                    ->helperText('Enlace de la sección Nosotros en la portada'),
                FileUpload::make('about_image')
                    ->label('Imagen de fondo de la página')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                    ->maxSize(10240)
                    ->directory('about')
                    ->disk('public')
                    ->helperText('Imagen de fondo del encabezado de la página /nosotros'),
            ])
            ->statePath('data');
    }
}