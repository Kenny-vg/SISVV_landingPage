<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageSectionResource\Pages;
use App\Models\PageSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageSectionResource extends Resource
{
    protected static ?string $model = PageSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'Contenido de Nosotros';
    protected static ?string $navigationGroup = 'Nosotros';
    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Sección de página';
    protected static ?string $pluralModelLabel = 'Secciones de página';
    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\View::make('filament.components.section-guide')
                    ->viewData([
                        'title' => 'Esto edita la sección NOSOTROS',
                        'description' => 'Introducción, misión, visión, valores y filosofía de la página "Nosotros". La introducción también se muestra en la portada.',
                    ])
                    ->columnSpanFull(),
                Forms\Components\Select::make('key')
                    ->label('Sección')
                    ->required()
                    ->options([
                        'about_intro' => 'Nosotros - Introducción',
                        'about_mission' => 'Nosotros - Misión',
                        'about_vision' => 'Nosotros - Visión',
                        'about_values' => 'Nosotros - Valores',
                        'about_philosophy' => 'Nosotros - Filosofía',
                    ])
                    ->helperText('Selecciona la sección de la página que este contenido representa.'),
                Forms\Components\TextInput::make('heading')
                    ->label('Encabezado de la portada')
                    ->helperText('Primera línea del título grande que se muestra en la portada.')
                    ->visible(fn (Forms\Get $get): bool => $get('key') === 'about_intro')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('heading_accent')
                    ->label('Texto destacado del encabezado (opcional)')
                    ->helperText('Se muestra en cursiva dorada debajo del encabezado. Déjalo vacío para un título simple.')
                    ->visible(fn (Forms\Get $get): bool => $get('key') === 'about_intro')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('title')
                    ->label('Título')
                    ->maxLength(255),
                Forms\Components\RichEditor::make('content')
                    ->label('Contenido')
                    ->visible(fn (Forms\Get $get): bool => $get('key') !== 'about_values')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('content')
                    ->label('Valores')
                    ->helperText('Escribe un valor por línea. Cada línea se muestra como una etiqueta independiente en la página "Nosotros".')
                    ->rows(6)
                    ->visible(fn (Forms\Get $get): bool => $get('key') === 'about_values')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->label('Imagen principal')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                    ->maxSize(10240)
                    ->directory('sections')
                    ->disk('public')
                    ->visible(fn (Forms\Get $get): bool => $get('key') !== 'about_values'),
                Forms\Components\Toggle::make('is_active')
                    ->label('Activo'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->label('Identificador')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Activo'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['content'] = sanitize_html($data['content'] ?? null);
        $data['heading'] = isset($data['heading']) ? trim(strip_tags((string) $data['heading'])) : null;
        $data['heading_accent'] = isset($data['heading_accent']) ? trim(strip_tags((string) $data['heading_accent'])) : null;

        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        $data['content'] = sanitize_html($data['content'] ?? null);
        $data['heading'] = isset($data['heading']) ? trim(strip_tags((string) $data['heading'])) : null;
        $data['heading_accent'] = isset($data['heading_accent']) ? trim(strip_tags((string) $data['heading_accent'])) : null;

        return $data;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePageSections::route('/'),
        ];
    }
}
