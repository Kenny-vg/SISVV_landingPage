<?php

namespace App\Filament\Pages;

use App\Filament\Pages\Concerns\InteractsWithSettings;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Pages\Page;

class InstalacionesSettingsPage extends Page
{
    use InteractsWithSettings;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationLabel = 'Textos de la página';

    protected static ?string $navigationGroup = 'Instalaciones';

    protected static ?int $navigationSort = 2;

    protected static ?string $title = 'Instalaciones - Textos de la página';

    protected static ?string $slug = 'instalaciones';

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
                        'title' => 'Textos de la sección "Instalaciones"',
                        'description' => 'Configura los textos que aparecen tanto en el carrusel de la portada como en la página principal del apartado de Instalaciones. Las tarjetas de cada espacio se administran en "Instalaciones → Instalaciones".',
                    ])
                    ->columnSpanFull(),

                Section::make('Página de Instalaciones (/instalaciones)')
                    ->description('Textos que aparecen en la cabecera antes de las tarjetas de instalaciones')
                    ->schema([
                        TextInput::make('instalaciones_page_tag')
                            ->label('Etiqueta superior')
                            ->helperText('Texto pequeño dorado sobre el título (Ej: Vista Verde Country Club)')
                            ->default('Vista Verde Country Club'),
                        TextInput::make('instalaciones_page_heading')
                            ->label('Encabezado principal')
                            ->helperText('Primera línea del título (Ej: Nuestras)')
                            ->default('Nuestras'),
                        TextInput::make('instalaciones_page_heading_accent')
                            ->label('Texto destacado del encabezado')
                            ->helperText('Segunda línea destacada (Ej: Instalaciones.)')
                            ->default('Instalaciones.'),
                        Textarea::make('instalaciones_page_description')
                            ->label('Texto descriptivo (Párrafo)')
                            ->helperText('Texto que aparece antes de las tarjetas de instalaciones')
                            ->rows(3)
                            ->columnSpanFull()
                            ->default('Espacios concebidos para la excelencia y el esparcimiento social, donde el diseño de vanguardia se funde con el entorno natural del club.'),
                    ])
                    ->columns(3),

                Section::make('Sección en la Portada (Inicio)')
                    ->description('Textos que aparecen en el carrusel de instalaciones en la página principal')
                    ->schema([
                        TextInput::make('instalaciones_heading')
                            ->label('Encabezado')
                            ->helperText('Primera línea del título grande. Si dejas vacío el campo siguiente, se muestra en una sola línea.'),
                        TextInput::make('instalaciones_heading_accent')
                            ->label('Texto destacado del encabezado (opcional)')
                            ->helperText('Se muestra en cursiva dorada debajo del encabezado.'),
                        Textarea::make('instalaciones_subtext')
                            ->label('Subtítulo')
                            ->helperText('Texto descriptivo debajo del título')
                            ->columnSpanFull(),
                        TextInput::make('instalaciones_btn_text')
                            ->label('Botón "Ver todas"')
                            ->helperText('Botón que lleva a la página de instalaciones'),
                        TextInput::make('instalaciones_link_text')
                            ->label('Texto enlace en tarjetas')
                            ->helperText('Ej: "Conocer más →"'),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }
}