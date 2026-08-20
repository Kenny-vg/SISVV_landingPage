<?php

namespace App\Filament\Pages;

use App\Filament\Pages\Concerns\InteractsWithSettings;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Pages\Page;

class ClasesSettingsPage extends Page
{
    use InteractsWithSettings;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Textos de la página';

    protected static ?string $navigationGroup = 'Clases';

    protected static ?int $navigationSort = 2;

    protected static ?string $title = 'Clases - Textos de la página';

    protected static ?string $slug = 'clases';

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
                        'title' => 'Textos de la sección "Clases"',
                        'description' => 'Las tarjetas de cada clase se administran en "Clases → Clases / Disciplinas".',
                    ])
                    ->columnSpanFull(),
                RichEditor::make('facilities_heading')
                    ->label('Encabezado')
                    ->toolbarButtons(['bold', 'italic']),
                Textarea::make('facilities_subtext')
                    ->label('Subtítulo')
                    ->helperText('Texto descriptivo debajo del título'),
                TextInput::make('facilities_link_text')
                    ->label('Texto enlace en tarjetas')
                    ->helperText('Ej: "Ver clase"'),
                TextInput::make('facilities_all_link_text')
                    ->label('Botón "Ver todas"')
                    ->helperText('Botón que lleva a la página de clases'),
            ])
            ->statePath('data');
    }

    protected function getRichTextKeys(): array
    {
        return ['facilities_heading'];
    }
}