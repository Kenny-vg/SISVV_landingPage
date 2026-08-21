<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BenefitResource\Pages;
use App\Models\Benefit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BenefitResource extends Resource
{
    protected static ?string $model = Benefit::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    protected static ?string $navigationLabel = 'Beneficios';

    protected static ?string $navigationGroup = 'Membresías';

    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'Beneficio';

    protected static ?string $pluralModelLabel = 'Beneficios';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\View::make('filament.components.section-guide')
                    ->viewData([
                        'title' => 'Catálogo de BENEFICIOS de las membresías',
                        'description' => 'Estos beneficios aparecen como casillas para marcar en cada membresía y como filas de la tabla comparativa. Para asignarlos, edita cada membresía y márcalos.',
                    ])
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('name')
                    ->label('Nombre del beneficio')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('sort_order')
                    ->label('Orden')
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->helperText('Menor número aparece primero en la página de membresías.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Beneficio')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Orden')
                    ->sortable(),

                Tables\Columns\TextColumn::make('memberships_count')
                    ->label('En cuántas membresías')
                    ->counts('memberships'),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->filters([
                //
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
            'index' => Pages\ManageBenefits::route('/'),
        ];
    }
}
