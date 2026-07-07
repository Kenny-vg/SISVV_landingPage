<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroResource\Pages;
use App\Models\Hero;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HeroResource extends Resource
{
    protected static ?string $model = Hero::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Slides del Hero';
    protected static ?string $navigationGroup = 'Portada';
    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Slide del Hero';
    protected static ?string $pluralModelLabel = 'Slides del Hero';
    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('title')
                    ->label('Título')
                    ->required()
                    ->toolbarButtons(['italic', 'bold'])
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('subtitle')
                    ->label('Subtítulo')
                    ->toolbarButtons(['italic', 'bold'])
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('button_text')
                    ->label('Texto del botón')
                    ->maxLength(255),
                Forms\Components\TextInput::make('button_link')
                    ->label('Enlace del botón')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('background_image')
                    ->label('Imagen de fondo')
                    ->image()
                    ->directory('heroes')
                    ->disk('public')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Activo'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->html()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('background_image')
                    ->label('Imagen de fondo')
                    ->square(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean()
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
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
            'index' => Pages\ManageHeroes::route('/'),
        ];
    }
}
