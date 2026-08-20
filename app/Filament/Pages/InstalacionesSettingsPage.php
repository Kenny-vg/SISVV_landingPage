<?php

namespace App\Filament\Pages;

use App\Filament\Pages\Concerns\InteractsWithSettings;
use Filament\Forms\Components\RichEditor;
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
                        'description' => 'Las tarjetas de cada espacio (fotos, horarios y tour 360°) se administran en "Instalaciones → Instalaciones".',
                    ])
                    ->columnSpanFull(),
                RichEditor::make('instalaciones_heading')
                    ->label('Encabezado')
                    ->toolbarButtons(['bold', 'italic']),
                Textarea::make('instalaciones_subtext')
                    ->label('Subtítulo')
                    ->helperText('Texto descriptivo debajo del título'),
                TextInput::make('instalaciones_btn_text')
                    ->label('Botón "Ver todas"')
                    ->helperText('Botón que lleva a la página de instalaciones'),
                TextInput::make('instalaciones_link_text')
                    ->label('Texto enlace en tarjetas')
                    ->helperText('Ej: "Conocer más"'),
            ])
            ->statePath('data');
    }

    protected function getRichTextKeys(): array
    {
        return ['instalaciones_heading'];
    }
}