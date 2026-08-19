<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Configuración general';

    protected static ?string $navigationGroup = 'Configuración';

    protected static ?int $navigationSort = 1;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $modelLabel = 'Configuración';

    protected static ?string $pluralModelLabel = 'Configuraciones';

    protected static ?string $recordTitleAttribute = 'key';

    private const ALLOWED_KEYS = [
        'site_name', 'site_description', 'hero_title', 'hero_subtitle',
        'hero_default_button', 'hero_show_golfista',
        'about_heading', 'about_image', 'about_image_float',
        'instalaciones_heading', 'instalaciones_subtext', 'instalaciones_btn_text', 'instalaciones_link_text',
        'facilities_heading', 'facilities_subtext', 'facilities_link_text', 'facilities_all_link_text',
        'events_label', 'events_heading', 'events_subtext', 'events_link_text', 'events_all_link_text',
        'menu_btn_text',
        'contact_label', 'contact_heading', 'contact_subtext', 'contact_phone', 'contact_cell',
        'contact_email', 'contact_schedule', 'contact_address_label', 'contact_address_name',
        'contact_address_line1', 'contact_address_line2', 'contact_maps_btn_text', 'contact_maps_url',
        'contact_maps_embed', 'contact_social_heading',
        'social_facebook', 'social_instagram', 'social_whatsapp', 'social_whatsapp_number',
        'footer_memberships_title', 'footer_location_title', 'footer_maps_link_text',
        'footer_privacy_text', 'footer_terms_text', 'footer_rights_text',
        'privacy_pdf', 'terms_pdf',
    ];

    private const RICH_TEXT_KEYS = [
        'hero_title', 'hero_subtitle', 'about_heading',
        'instalaciones_heading', 'facilities_heading',
        'events_heading', 'contact_heading', 'contact_schedule',
    ];

    private const URL_KEYS = [
        'social_facebook', 'social_instagram', 'social_whatsapp',
        'contact_maps_url',
    ];

    private const IFRAME_KEYS = [
        'contact_maps_embed',
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('key')
                    ->label('Clave')
                    ->required()
                    ->options(array_combine(self::ALLOWED_KEYS, self::ALLOWED_KEYS))
                    ->searchable()
                    ->unique(ignoreRecord: true)
                    ->readOnly(),
                Forms\Components\Textarea::make('value')
                    ->label('Valor')
                    ->columnSpanFull(),
                Forms\Components\Select::make('group')
                    ->label('Grupo')
                    ->options([
                        'general' => 'General',
                        'social' => 'Redes sociales',
                        'contact' => 'Contacto',
                        'seo' => 'SEO',
                    ])
                    ->default('general'),
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
                Tables\Columns\TextColumn::make('value')
                    ->label('Valor')
                    ->limit(40),
                Tables\Columns\TextColumn::make('group')
                    ->label('Grupo')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de creación')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('group')
                    ->label('Grupo')
                    ->options([
                        'general' => 'General',
                        'social' => 'Redes sociales',
                        'contact' => 'Contacto',
                        'seo' => 'SEO',
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
            'index' => Pages\ManageSettings::route('/'),
        ];
    }

    private static function sanitizeValue(string $key, mixed $value): mixed
    {
        if ($value === null) {
            return $value;
        }

        if (in_array($key, self::RICH_TEXT_KEYS, true)) {
            return sanitize_html((string) $value);
        }

        if (in_array($key, self::URL_KEYS, true)) {
            return safe_url((string) $value);
        }

        if (in_array($key, self::IFRAME_KEYS, true)) {
            return safe_iframe_src((string) $value);
        }

        return strip_tags((string) $value);
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['value'] = self::sanitizeValue($data['key'] ?? '', $data['value'] ?? null);

        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        $data['value'] = self::sanitizeValue($data['key'] ?? '', $data['value'] ?? null);

        return $data;
    }
}
