<?php

namespace App\Filament\Pages;

use App\Models\PageSection;
use App\Models\Setting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class GastronomiaSettingsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cake';

    protected static ?string $navigationLabel = 'Texto de la sección';

    protected static ?string $navigationGroup = 'Gastronomía';

    protected static ?int $navigationSort = 2;

    protected static ?string $title = 'Gastronomía - Texto de la sección';

    protected static ?string $slug = 'gastronomia';

    protected static string $view = 'filament.pages.settings-page';

    public ?array $data = [];

    public static function canAccess(): bool
    {
        return auth()->user()?->is_admin ?? false;
    }

    public function mount(): void
    {
        $section = PageSection::where('key', 'menu_intro')->first();

        $this->form->fill([
            ...Setting::pluck('value', 'key')->toArray(),
            'menu_section_title' => $section?->title,
            'menu_section_content' => $section?->content,
            'menu_section_image' => $section?->image,
            'menu_section_image_float' => $section?->image_float,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                View::make('filament.components.section-guide')
                    ->viewData([
                        'title' => 'Texto de la sección de gastronomía',
                        'description' => 'Las categorías y el menú (PDF) se administran en "Gastronomía → Carta".',
                    ])
                    ->columnSpanFull(),
                TextInput::make('menu_section_title')
                    ->label('Título de la sección')
                    ->maxLength(255),
                RichEditor::make('menu_section_content')
                    ->label('Descripción')
                    ->toolbarButtons(['bold', 'italic'])
                    ->helperText('Texto que acompaña a la imagen de gastronomía'),
                FileUpload::make('menu_section_image')
                    ->label('Imagen principal')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                    ->maxSize(10240)
                    ->directory('sections')
                    ->disk('public'),
                FileUpload::make('menu_section_image_float')
                    ->label('Imagen secundaria (circular)')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                    ->maxSize(10240)
                    ->directory('sections')
                    ->disk('public'),
                TextInput::make('menu_btn_text')
                    ->label('Botón de la sección')
                    ->helperText('Texto del botón "Ver Carta Interactiva"'),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $section = PageSection::firstOrCreate(['key' => 'menu_intro'], ['is_active' => true]);
        $section->update([
            'title' => $data['menu_section_title'] ?? null,
            'content' => sanitize_html($data['menu_section_content'] ?? null),
            'image' => $data['menu_section_image'] ?? null,
            'image_float' => $data['menu_section_image_float'] ?? null,
            'is_active' => true,
        ]);

        Setting::updateOrCreate(
            ['key' => 'menu_btn_text'],
            ['value' => $data['menu_btn_text'] ?? null]
        );

        Notification::make()
            ->title('Guardado correctamente')
            ->success()
            ->send();
    }
}