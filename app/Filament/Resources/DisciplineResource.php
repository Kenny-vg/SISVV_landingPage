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
    protected static ?string $navigationGroup = 'Contenido';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', \Str::slug($state)) : null),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Forms\Components\Select::make('category')
                    ->options([
                        'Social' => 'Social',
                        'Deportivo' => 'Deportivo',
                        'Bienestar' => 'Bienestar',
                        'Fitness' => 'Fitness',
                    ]),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('schedule')
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_published')
                    ->label('Publicado'),
                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
                Forms\Components\Section::make('Galería de imágenes')
                    ->schema([
                        Forms\Components\Repeater::make('images')
                            ->relationship('images')
                            ->schema([
                                Forms\Components\FileUpload::make('image_path')
                                    ->label('Imagen')
                                    ->image()
                                    ->directory('disciplines')
                                    ->required(),
                                Forms\Components\TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0),
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
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published'),
                Tables\Filters\SelectFilter::make('category')
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
