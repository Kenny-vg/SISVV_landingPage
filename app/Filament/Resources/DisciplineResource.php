<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DisciplineResource\Pages;
use App\Models\Discipline;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DisciplineResource extends Resource
{
    protected static ?string $model = Discipline::class;

    protected static ?string $navigationIcon = 'heroicon-o-fire';
    protected static ?string $navigationLabel = 'Clases / Disciplinas';
    protected static ?string $navigationGroup = 'Clases';
    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Clase / Disciplina';
    protected static ?string $pluralModelLabel = 'Clases / Disciplinas';
    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\View::make('filament.components.section-guide')
                    ->viewData([
                        'title' => 'Esto edita la página CLASES',
                        'description' => 'Las clases / disciplinas que aparecen en el carrusel de la portada y en la página "Clases": fotos, descripción y horario. En el campo Horario puedes separar diferentes horarios con comas: cada uno se mostrará en un renglón distinto.',
                    ])
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('title')
                    ->label('Título')
                    ->helperText('Nombre de la clase tal como lo verá el visitante')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', \Str::slug($state))),
                Forms\Components\Hidden::make('slug'),
                Forms\Components\Select::make('category')
                    ->label('Categoría')
                    ->helperText('Usada para agrupar las clases')
                    ->options([
                        'Social' => 'Social',
                        'Deportivo' => 'Deportivo',
                        'Bienestar' => 'Bienestar',
                        'Fitness' => 'Fitness',
                    ]),
                Forms\Components\Textarea::make('description')
                    ->label('Descripción')
                    ->helperText('Texto que aparece en la página de la clase')
                    ->rows(4)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('schedule')
                    ->label('Horario')
                    ->helperText('Separa diferentes horarios con comas y cada uno se mostrará en un renglón. Ej: Mar - Vie: 7:00 am, Sáb: 9:00 am')
                    ->maxLength(255),
                Forms\Components\TextInput::make('prioridad')
                    ->label('Prioridad')
                    ->numeric()
                    ->step(0.01)
                    ->minValue(0)
                    ->default(0)
                    ->helperText('Orden en el sitio: menor número aparece primero. Ej: prioridad 1 sale antes que 5.'),
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
                                    ->helperText('Fotos que se muestran en la galería de la clase')
                                    ->image()
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                                    ->maxSize(10240)
                                    ->directory('disciplines')
                                    ->disk('public')
                                    ->required(),
                            ])
                            ->orderable('sort_order')
                            ->defaultItems(0)
                            ->collapsible(),
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
                Tables\Columns\TextColumn::make('prioridad')
                    ->label('Prioridad')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Publicado')
                    ->boolean()
                    ->sortable(),
            ])
            ->defaultSort('prioridad')
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
            'index' => Pages\ManageDisciplines::route('/'),
        ];
    }
}
