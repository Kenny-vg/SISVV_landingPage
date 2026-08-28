<?php

namespace App\Filament\Pages;

use App\Filament\Pages\Concerns\InteractsWithSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
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
                View::make('filament.components.section-guide')
                    ->viewData([
                        'title' => 'Hero de la página /nosotros',
                        'description' => 'Edita el encabezado principal que se muestra al entrar a la página. La imagen de fondo se edita aquí abajo.',
                    ])
                    ->columnSpanFull(),
                TextInput::make('nosotros_hero_tag')
                    ->label('Etiqueta superior')
                    ->default('Vista Verde Club')
                    ->helperText('Texto pequeño dorado sobre el título (ej: "Vista Verde Club")')
                    ->columnSpanFull(),
                TextInput::make('nosotros_hero_title')
                    ->label('Título principal')
                    ->default('Sobre Nosotros.')
                    ->helperText('Título grande. Para línea en cursiva, separa con punto y coma: Sobre; Nosotros.')
                    ->columnSpanFull(),
                Textarea::make('nosotros_hero_subtitle')
                    ->label('Subtítulo')
                    ->default('Conoce nuestra historia, nuestra filosofía y el compromiso que nos define como el club campestre más exclusivo de la región.')
                    ->rows(2)
                    ->columnSpanFull(),
                FileUpload::make('about_image')
                    ->label('Imagen de fondo del hero')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                    ->maxSize(10240)
                    ->directory('about')
                    ->disk('public')
                    ->helperText('Imagen de fondo del encabezado de la página /nosotros'),
                View::make('filament.components.section-guide')
                    ->viewData([
                        'title' => 'Otros textos',
                        'description' => 'Botón de la portada y otros ajustes.',
                    ])
                    ->columnSpanFull(),
                TextInput::make('about_btn_text')
                    ->label('Botón "Conócenos más"')
                    ->helperText('Enlace de la sección Nosotros en la portada'),
            ])
            ->statePath('data');
    }
}