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

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Secciones de página';
    protected static ?string $navigationGroup = 'Portada';
    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'Sección de página';
    protected static ?string $pluralModelLabel = 'Secciones de página';
    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('key')
                    ->label('Sección')
                    ->required()
                    ->options([
                        'about_intro' => 'Nosotros - Introducción',
                        'about_mission' => 'Nosotros - Misión',
                        'about_vision' => 'Nosotros - Visión',
                        'about_values' => 'Nosotros - Valores',
                        'about_philosophy' => 'Nosotros - Filosofía',
                        'menu_intro' => 'Gastronomía',
                    ])
                    ->helperText('Selecciona la sección de la página que este contenido representa.'),
                Forms\Components\TextInput::make('title')
                    ->label('Título')
                    ->maxLength(255),
                Forms\Components\RichEditor::make('content')
                    ->label('Contenido')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->label('Imagen principal')
                    ->image()
                    ->maxSize(2048)
                    ->directory('sections')
                    ->disk('public'),
                Forms\Components\FileUpload::make('image_float')
                    ->label('Imagen secundaria (circular)')
                    ->image()
                    ->maxSize(2048)
                    ->directory('sections')
                    ->disk('public'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePageSections::route('/'),
        ];
    }
}
