<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FacilityResource\Pages;
use App\Models\Facility;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FacilityResource extends Resource
{
    protected static ?string $model = Facility::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'Instalaciones';
    protected static ?string $navigationGroup = 'Nuestro Club';
    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Instalación';
    protected static ?string $pluralModelLabel = 'Instalaciones';
    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Título')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', \Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->hidden(),
                Forms\Components\Select::make('category')
                    ->label('Categoría')
                    ->options([
                        'Social' => 'Social',
                        'Deportivo' => 'Deportivo',
                        'Bienestar' => 'Bienestar',
                        'Fitness' => 'Fitness',
                    ]),
                Forms\Components\Textarea::make('description')
                    ->label('Descripción')
                    ->rows(4)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('schedule')
                    ->label('Horario')
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_published')
                    ->label('Publicado')
                    ->default(true),
                Forms\Components\Section::make('Galería de imágenes')
                    ->schema([
                        Forms\Components\Repeater::make('images')
                            ->relationship('images')
                            ->schema([
                                Forms\Components\FileUpload::make('image_path')
                                    ->label('Imagen')
                                    ->image()
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                                    ->maxSize(5120)
                                    ->directory('facilities')
                                    ->disk('public')
                                    ->required(),
                            ])
                            ->orderable('sort_order')
                            ->defaultItems(0)
                            ->collapsible(),
                    ]),
                Forms\Components\Section::make('Tour 360°')
                    ->schema([
                        Forms\Components\FileUpload::make('panorama_path')
                            ->label('Imagen panorámica')
                            ->image()
                            ->acceptedFileTypes(['image/jpeg', 'image/png'])
                            ->directory('facilities/panoramas')
                            ->disk('public')
                            ->maxSize(20480)
                            ->hint('Proporción 2:1 equirectangular, mínimo 4000×2000px, máximo 20MB'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Categoría')
                    ->badge()
                    ->sortable(),
                Tables\Columns\IconColumn::make('panorama_path')
                    ->label('360°')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Publicado')
                    ->boolean()
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Publicado'),
                Tables\Filters\SelectFilter::make('category')
                    ->label('Categoría')
                    ->options([
                        'Social' => 'Social',
                        'Deportivo' => 'Deportivo',
                        'Bienestar' => 'Bienestar',
                        'Fitness' => 'Fitness',
                    ]),
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
            'index' => Pages\ManageFacilities::route('/'),
        ];
    }
}
