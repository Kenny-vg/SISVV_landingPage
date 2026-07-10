<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroResource\Pages;
use App\Models\Hero;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Collection;

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
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                    ->maxSize(10240)
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
                Tables\Actions\DeleteAction::make()
                    ->before(function (Tables\Actions\DeleteAction $action, Hero $record) {
                        if ($record->id === 1) {
                            Notification::make()
                                ->danger()
                                ->title('No se puede eliminar')
                                ->body('El primer slide del hero no puede eliminarse.')
                                ->send();
                            $action->cancel();
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function (Tables\Actions\DeleteBulkAction $action, Collection $records) {
                            if ($records->contains('id', 1)) {
                                Notification::make()
                                    ->danger()
                                    ->title('No se puede eliminar')
                                    ->body('El primer slide del hero no puede eliminarse.')
                                    ->send();
                                $action->cancel();
                            }
                        }),
                ]),
            ]);
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['title'] = sanitize_html($data['title'] ?? null);
        $data['subtitle'] = sanitize_html($data['subtitle'] ?? null);

        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        $data['title'] = sanitize_html($data['title'] ?? null);
        $data['subtitle'] = sanitize_html($data['subtitle'] ?? null);

        return $data;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageHeroes::route('/'),
        ];
    }
}
