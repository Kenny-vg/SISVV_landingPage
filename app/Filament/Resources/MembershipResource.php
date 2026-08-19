<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MembershipResource\Pages;
use App\Models\Membership;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MembershipResource extends Resource
{
    protected static ?string $model = Membership::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationLabel = 'Membresías';
    protected static ?string $navigationGroup = 'Nuestro Club';
    protected static ?int $navigationSort = 5;

    protected static ?string $modelLabel = 'Membresía';
    protected static ?string $pluralModelLabel = 'Membresías';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Título / Descripción')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tipo')
                    ->label('Tipo')
                    ->maxLength(20)
                    ->helperText('Ej: MEN (mensualidad)'),
                Forms\Components\TextInput::make('area')
                    ->label('Área Principal')
                    ->maxLength(50)
                    ->helperText('Ej: Casa Club o Campo de Golf'),
                Forms\Components\TextInput::make('members_text')
                    ->label('Número de Integrantes')
                    ->maxLength(100)
                    ->helperText('Ej: 1 Persona (Individual) o Núcleo Familiar'),
                Forms\Components\Toggle::make('has_golf_access')
                    ->label('Acceso a Campo de Golf')
                    ->helperText('Marca si esta membresía incluye acceso al campo de golf')
                    ->default(false),
                Forms\Components\TextInput::make('price')
                    ->label('Monto mensual')
                    ->required()
                    ->maxLength(255)
                    ->helperText('Texto libre. Ej: "$3,900.00"'),
                Forms\Components\Toggle::make('show_price')
                    ->label('Mostrar precio en el sitio')
                    ->default(true),
                Forms\Components\Toggle::make('is_featured')
                    ->label('Destacada (Recomendado)')
                    ->helperText('Muestra la etiqueta "Recomendado" en la tarjeta'),
                Forms\Components\Toggle::make('is_published')
                    ->label('Publicado')
                    ->default(true),
                Forms\Components\Section::make('Beneficios')
                    ->schema([
                        Forms\Components\Repeater::make('benefits')
                            ->relationship('benefits')
                            ->schema([
                                Forms\Components\Textarea::make('benefit')
                                    ->label('Beneficio')
                                    ->required()
                                    ->rows(2),
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
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo')
                    ->label('Tipo')
                    ->sortable(),
                Tables\Columns\TextColumn::make('area')
                    ->label('Área')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('members_text')
                    ->label('Integrantes')
                    ->sortable(),
                Tables\Columns\IconColumn::make('has_golf_access')
                    ->label('Golf')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Precio')
                    ->searchable(),
                Tables\Columns\IconColumn::make('show_price')
                    ->label('Muestra precio')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Destacada')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Publicado')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('benefits_count')
                    ->label('Beneficios')
                    ->counts('benefits'),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Publicado'),
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
            'index' => Pages\ManageMemberships::route('/'),
        ];
    }
}
