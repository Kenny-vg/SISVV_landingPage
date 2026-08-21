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
    protected static ?string $navigationGroup = 'Instalaciones';
    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Instalación';
    protected static ?string $pluralModelLabel = 'Instalaciones';
    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\View::make('filament.components.section-guide')
                    ->viewData([
                        'title' => 'Esto edita la página INSTALACIONES',
                        'description' => 'Los espacios del club que aparecen en el carrusel de la portada y en la página "Instalaciones": fotos, descripción, horario y tour 360°. En el campo Horario puedes separar diferentes horarios con comas: cada uno se mostrará en un renglón distinto.',
                    ])
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('title')
                    ->label('Título')
                    ->helperText('Nombre del espacio tal como lo verá el visitante')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', \Str::slug($state))),
                Forms\Components\Hidden::make('slug'),
                Forms\Components\Select::make('category')
                    ->label('Categoría')
                    ->helperText('Usada para agrupar las instalaciones')
                    ->options([
                        'Social' => 'Social',
                        'Deportivo' => 'Deportivo',
                        'Bienestar' => 'Bienestar',
                        'Fitness' => 'Fitness',
                    ]),
                Forms\Components\Textarea::make('description')
                    ->label('Descripción')
                    ->helperText('Texto que aparece en la página de la instalación')
                    ->rows(4)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('schedule')
                    ->label('Horario')
                    ->helperText('Separa diferentes horarios con comas y cada uno se mostrará en un renglón. Ej: Lun - Vie: 6:00 am, Sáb - Dom: 7:00 am')
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
                                    ->helperText('Fotos que se muestran en la galería de la instalación')
                                    ->image()
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                                    ->maxSize(10240)
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
                            ->maxSize(10240)
                            ->hint('Proporción 2:1 equirectangular, mínimo 4000×2000px, máximo 10MB'),
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
