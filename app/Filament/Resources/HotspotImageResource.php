<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HotspotImageResource\Pages;
use App\Models\HotspotImage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HotspotImageResource extends Resource
{
    protected static ?string $model = HotspotImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static ?string $navigationGroup = 'Mapa Interactivo';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\View::make('filament.components.section-guide')
                    ->viewData([
                        'title' => 'Esto edita el MAPA INTERACTIVO de la portada',
                        'description' => 'Solo puedes cambiar la imagen de cada punto del mapa. La posición y la etiqueta están fijas para que los puntos no se muevan.',
                    ])
                    ->columnSpanFull(),
                Forms\Components\Select::make('key')
                    ->label('Punto (clave)')
                    ->options([
                        'AREA DE JUEGOS' => 'ÁREA DE JUEGOS',
                        'CANCHA DE FUTBOL' => 'CANCHA DE FÚTBOL',
                        'CADDIE HOUSE' => 'CADDIE HOUSE',
                        'CANCHAS DE TENIS' => 'CANCHAS DE TENIS',
                        'CANCHA DE PADEL 1' => 'CANCHA DE PADEL (1)',
                        'CANCHA DE PADEL 2' => 'CANCHAS DE PADEL (2)',
                        'RESTAURANTE' => 'RESTAURANTE',
                        'GIMNASIO' => 'GIMNASIO',
                        'PISCINA' => 'PISCINA',
                        'SALÓN' => 'SALÓN',
                        'CAFETERÍA' => 'CAFETERÍA',
                        'BUGA BAR' => 'BUGA BAR',
                        'LOCKERS CABALLEROS' => 'LOCKERS CABALLEROS',
                        'LOCKERS DAMAS' => 'LOCKERS DAMAS',
                    ])
                    ->required()
                    ->disabled(fn ($operation) => $operation === 'edit')
                    ->unique(ignoreRecord: true)
                    ->native(false),

                Forms\Components\TextInput::make('label')
                    ->label('Etiqueta visible')
                    ->maxLength(100)
                    ->required()
                    ->disabled(),

                Forms\Components\TextInput::make('left_percent')
                    ->label('Posición X (%)')
                    ->numeric()
                    ->step(0.01)
                    ->minValue(0)
                    ->maxValue(100)
                    ->disabled()
                    ->required(),

                Forms\Components\TextInput::make('top_percent')
                    ->label('Posición Y (%)')
                    ->numeric()
                    ->step(0.01)
                    ->minValue(0)
                    ->maxValue(100)
                    ->disabled()
                    ->required(),

                Forms\Components\FileUpload::make('image_path')
                    ->label('Imagen del hotspot')
                    ->image()
                    ->directory('hotspots')
                    ->maxSize(10240)
                    ->nullable()
                    ->imagePreviewHeight('150')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_published')
                    ->label('Publicado')
                    ->helperText('Desactiva para ocultar este punto del mapa interactivo')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->label('Clave')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('label')
                    ->label('Etiqueta')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Imagen')
                    ->disk('public')
                    ->circular()
                    ->size(50),

                Tables\Columns\TextColumn::make('left_percent')
                    ->label('X %')
                    ->sortable(),

                Tables\Columns\TextColumn::make('top_percent')
                    ->label('Y %')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Publicado')
                    ->boolean()
                    ->sortable(),
            ])
            ->defaultSort('key')
            ->reorderable(false);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHotspotImages::route('/'),
            'edit' => Pages\EditHotspotImage::route('/{record}/edit'),
        ];
    }
}