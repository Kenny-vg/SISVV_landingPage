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

    protected static ?string $navigationLabel = 'Mapa Interactivo';

    protected static ?string $navigationGroup = 'Portada';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\View::make('filament.components.section-guide')
                    ->viewData([
                        'title' => 'Esto edita el MAPA INTERACTIVO de la portada',
                        'description' => 'Solo puedes cambiar la imagen de cada punto del mapa. La posición y la etiqueta están fijas para que los puntos no se muevan. Cada punto admite una foto normal O una imagen 360°: si subes una, reemplaza a la otra automáticamente.',
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
                    ->live()
                    ->afterStateUpdated(function (Forms\Set $set, $state) {
                        if (filled($state)) {
                            $set('panorama_path', null);
                        }
                    })
                    ->helperText('Si subes una imagen 360° en el campo de abajo, esta foto se reemplaza.')
                    ->imagePreviewHeight('150')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('panorama_path')
                    ->label('Imagen 360° (panorámica)')
                    ->image()
                    ->directory('hotspots/panoramas')
                    ->maxSize(20480)
                    ->nullable()
                    ->live()
                    ->afterStateUpdated(function (Forms\Set $set, $state) {
                        if (filled($state)) {
                            $set('image_path', null);
                        }
                    })
                    ->helperText('Debe ser una panorámica equirectangular (proporción 2:1, ej. 6000×3000). Al subirla reemplaza la foto normal y el punto abrirá con visor 360°.')
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

                Tables\Columns\TextColumn::make('panorama_path')
                    ->label('Tipo')
                    ->badge()
                    ->state(fn ($record) => match (true) {
                        filled($record->panorama_path) => '360°',
                        filled($record->image_path) => 'Foto',
                        default => '—',
                    })
                    ->color(fn ($state) => match ($state) {
                        '360°' => 'success',
                        'Foto' => 'info',
                        default => 'gray',
                    }),

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