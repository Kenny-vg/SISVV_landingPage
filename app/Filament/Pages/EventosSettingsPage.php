<?php

namespace App\Filament\Pages;

use App\Filament\Pages\Concerns\InteractsWithSettings;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Pages\Page;

class EventosSettingsPage extends Page
{
    use InteractsWithSettings;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationLabel = 'Textos de la página';

    protected static ?string $navigationGroup = 'Eventos';

    protected static ?int $navigationSort = 2;

    protected static ?string $title = 'Eventos - Textos de la página';

    protected static ?string $slug = 'eventos';

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
                        'title' => 'Textos de la sección "Eventos"',
                        'description' => 'Las tarjetas de cada evento se administran en "Eventos → Eventos".',
                    ])
                    ->columnSpanFull(),
                TextInput::make('events_label')
                    ->label('Etiqueta superior')
                    ->helperText('Texto pequeño sobre el encabezado'),
                RichEditor::make('events_heading')
                    ->label('Encabezado')
                    ->toolbarButtons(['bold', 'italic']),
                Textarea::make('events_subtext')
                    ->label('Subtítulo')
                    ->helperText('Texto descriptivo'),
                TextInput::make('events_link_text')
                    ->label('Texto enlace en tarjetas')
                    ->helperText('Ej: "Ver evento"'),
                TextInput::make('events_all_link_text')
                    ->label('Botón "Ver todos"')
                    ->helperText('Botón que lleva a la página de eventos'),
            ])
            ->statePath('data');
    }

    protected function getRichTextKeys(): array
    {
        return ['events_heading'];
    }
}