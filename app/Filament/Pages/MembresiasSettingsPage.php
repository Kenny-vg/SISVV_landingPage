<?php

namespace App\Filament\Pages;

use App\Filament\Pages\Concerns\InteractsWithSettings;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Pages\Page;

class MembresiasSettingsPage extends Page
{
    use InteractsWithSettings;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationLabel = 'Reglamento y precios';

    protected static ?string $navigationGroup = 'Membresías';

    protected static ?int $navigationSort = 2;

    protected static ?string $title = 'Membresías - Reglamento y precios';

    protected static ?string $slug = 'membresias';

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
                        'title' => 'Precios y reglamento de membresías',
                        'description' => 'Los planes, precios y beneficios se administran en "Membresías → Membresías".',
                    ])
                    ->columnSpanFull(),
                Toggle::make('show_membership_prices')
                    ->label('Mostrar precios de membresías')
                    ->helperText('Permite mostrar u ocultar los precios de todas las membresías en el sitio web')
                    ->default(true),
                Toggle::make('show_membresias_reglamento')
                    ->label('Mostrar sección de reglamento')
                    ->helperText('Permite mostrar u ocultar toda la sección de reglamento del socio en la página de membresías')
                    ->default(true),
                TextInput::make('membresias_reglamento_heading')
                    ->label('Título de la sección "Reglamento del socio"')
                    ->helperText('Encabezado mostrado debajo de las tarjetas de membresías'),
                TextInput::make('membresias_titulo_actualizacion')
                    ->label('Título: Actualización del costo')
                    ->helperText('Título mostrado junto a su contenido'),
                TextInput::make('membresias_titulo_consumos')
                    ->label('Título: Consumos mínimos mensuales')
                    ->helperText('Título mostrado junto a su contenido'),
                TextInput::make('membresias_titulo_pagos')
                    ->label('Título: Pagos mensuales y recargos')
                    ->helperText('Título mostrado junto a su contenido'),
                TextInput::make('membresias_titulo_cortesia')
                    ->label('Título: Pases de cortesía')
                    ->helperText('Título mostrado junto a su contenido'),
                TextInput::make('membresias_titulo_baja')
                    ->label('Título: Solicitud de baja de membresía')
                    ->helperText('Título mostrado junto a su contenido'),
                TextInput::make('membresias_titulo_visitas')
                    ->label('Título: Registro de visitas')
                    ->helperText('Título mostrado junto a su contenido'),
                TextInput::make('membresias_titulo_fotografia')
                    ->label('Título: Fotografía obligatoria')
                    ->helperText('Título mostrado junto a su contenido'),
                RichEditor::make('membresias_actualizacion')
                    ->label('Actualización del costo de la membresía')
                    ->toolbarButtons(['bold', 'italic'])
                    ->helperText('Nota sobre la actualización anual del costo'),
                RichEditor::make('membresias_consumos')
                    ->label('Consumos mínimos mensuales')
                    ->toolbarButtons(['bold', 'italic'])
                    ->helperText('Consumos de Casa Club y Campo de Golf'),
                RichEditor::make('membresias_pagos')
                    ->label('Pagos mensuales y recargos')
                    ->toolbarButtons(['bold', 'italic'])
                    ->helperText('Primeros 10 días de cada mes'),
                RichEditor::make('membresias_cortesia')
                    ->label('Pases de cortesía')
                    ->toolbarButtons(['bold', 'italic'])
                    ->helperText('Disponibles los primeros 5 días del mes'),
                RichEditor::make('membresias_baja')
                    ->label('Solicitud de baja de membresía')
                    ->toolbarButtons(['bold', 'italic'])
                    ->helperText('Requisitos y condiciones de la baja'),
                RichEditor::make('membresias_visitas')
                    ->label('Registro de visitas')
                    ->toolbarButtons(['bold', 'italic'])
                    ->helperText('Cómo registrar visitas'),
                RichEditor::make('membresias_fotografia')
                    ->label('Fotografía obligatoria')
                    ->toolbarButtons(['bold', 'italic'])
                    ->helperText('Registro fotográfico de los miembros'),
                RichEditor::make('membresias_contacto')
                    ->label('Contacto de membresías')
                    ->toolbarButtons(['italic', 'bold'])
                    ->helperText('Correo, teléfono y WhatsApp para dudas o pagos'),
            ])
            ->statePath('data');
    }

    protected function getRichTextKeys(): array
    {
        return [
            'membresias_actualizacion',
            'membresias_consumos',
            'membresias_pagos',
            'membresias_cortesia',
            'membresias_baja',
            'membresias_visitas',
            'membresias_fotografia',
            'membresias_contacto',
        ];
    }
}