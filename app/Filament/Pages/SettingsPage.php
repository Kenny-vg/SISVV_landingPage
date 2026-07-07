<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SettingsPage extends Page
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Configuración';
    protected static ?string $navigationGroup = 'Configuración';
    protected static ?int $navigationSort = 1;
    protected static ?string $title = 'Configuración del sitio';
    protected static ?string $slug = 'configuracion';

    protected static string $view = 'filament.pages.settings-page';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(
            Setting::pluck('value', 'key')->toArray()
        );
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Configuración')
                    ->tabs([
                        Tab::make('Portada')
                            ->icon('heroicon-o-home')
                            ->schema([
                                TextInput::make('site_name')
                                    ->label('Nombre del club')
                                    ->helperText('Se usa en títulos y etiquetas de la página'),
                                Textarea::make('site_description')
                                    ->label('Descripción del club')
                                    ->helperText('Breve descripción que aparece en el sitio'),
                                RichEditor::make('hero_title')
                                    ->label('Título del hero')
                                    ->toolbarButtons(['italic', 'bold'])
                                    ->helperText('Texto principal del hero en la portada'),
                                RichEditor::make('hero_subtitle')
                                    ->label('Subtítulo del hero')
                                    ->toolbarButtons(['italic', 'bold'])
                                    ->helperText('Texto secundario del hero en la portada'),
                                TextInput::make('hero_default_button')
                                    ->label('Botón del hero principal')
                                    ->helperText('Texto del botón en la portada principal'),
                                Toggle::make('hero_show_golfista')
                                    ->label('Mostrar ilustraciones del héroe')
                                    ->helperText('Desactivar para ocultar el golfista y la pelota de golf')
                                    ->default(true),
                            ]),

                        Tab::make('Nosotros')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                RichEditor::make('about_heading')
                                    ->label('Encabezado de la sección')
                                    ->toolbarButtons(['italic', 'bold'])
                                    ->helperText('Aparece en la sección "Nosotros" del home.'),
                            ]),

                        Tab::make('Instalaciones')
                            ->icon('heroicon-o-building-library')
                            ->schema([
                                TextInput::make('instalaciones_heading')
                                    ->label('Encabezado')
                                    ->helperText('Título de la sección de instalaciones en el home'),
                                Textarea::make('instalaciones_subtext')
                                    ->label('Subtítulo')
                                    ->helperText('Texto descriptivo debajo del título'),
                                TextInput::make('instalaciones_btn_text')
                                    ->label('Botón "Ver todas"')
                                    ->helperText('Botón que lleva a la página de instalaciones'),
                                TextInput::make('instalaciones_link_text')
                                    ->label('Texto enlace en tarjetas')
                                    ->helperText('Ej: "Conocer más"'),
                            ]),

                        Tab::make('Clases')
                            ->icon('heroicon-o-academic-cap')
                            ->schema([
                                TextInput::make('facilities_heading')
                                    ->label('Encabezado')
                                    ->helperText('Título de la sección de clases en el home'),
                                Textarea::make('facilities_subtext')
                                    ->label('Subtítulo')
                                    ->helperText('Texto descriptivo debajo del título'),
                                TextInput::make('facilities_link_text')
                                    ->label('Texto enlace en tarjetas')
                                    ->helperText('Ej: "Ver clase"'),
                                TextInput::make('facilities_all_link_text')
                                    ->label('Botón "Ver todas"')
                                    ->helperText('Botón que lleva a la página de clases'),
                            ]),

                        Tab::make('Eventos')
                            ->icon('heroicon-o-calendar-days')
                            ->schema([
                                TextInput::make('events_label')
                                    ->label('Etiqueta superior')
                                    ->helperText('Texto pequeño sobre el encabezado'),
                                TextInput::make('events_heading')
                                    ->label('Encabezado')
                                    ->helperText('Título de la sección de eventos'),
                                Textarea::make('events_subtext')
                                    ->label('Subtítulo')
                                    ->helperText('Texto descriptivo'),
                                TextInput::make('events_link_text')
                                    ->label('Texto enlace en tarjetas')
                                    ->helperText('Ej: "Ver evento"'),
                                TextInput::make('events_all_link_text')
                                    ->label('Botón "Ver todos"')
                                    ->helperText('Botón que lleva a la página de eventos'),
                            ]),

                        Tab::make('Gastronomía')
                            ->icon('heroicon-o-cake')
                            ->schema([
                                TextInput::make('menu_btn_text')
                                    ->label('Botón de la sección')
                                    ->helperText('Texto del botón "Ver Carta Interactiva"'),
                            ]),

                        Tab::make('Contacto')
                            ->icon('heroicon-o-phone')
                            ->schema([
                                TextInput::make('contact_label')
                                    ->label('Etiqueta superior')
                                    ->helperText('Texto pequeño sobre la sección'),
                                TextInput::make('contact_heading')
                                    ->label('Encabezado')
                                    ->helperText('Título de la sección de contacto'),
                                Textarea::make('contact_subtext')
                                    ->label('Subtítulo')
                                    ->helperText('Texto descriptivo'),

                                TextInput::make('contact_phone')
                                    ->label('Teléfono')
                                    ->helperText('Teléfono principal del club'),
                                TextInput::make('contact_cell')
                                    ->label('Celular')
                                    ->helperText('Número de celular de contacto'),
                                TextInput::make('contact_email')
                                    ->label('Correo electrónico')
                                    ->helperText('Correo de contacto'),
                                RichEditor::make('contact_schedule')
                                    ->label('Horario')
                                    ->toolbarButtons(['bold'])
                                    ->helperText('Horarios de atención.'),

                                TextInput::make('contact_address_label')
                                    ->label('Etiqueta "Dirección"')
                                    ->helperText('Texto que dice "Dirección Principal"'),
                                TextInput::make('contact_address_name')
                                    ->label('Nombre de la dirección')
                                    ->helperText('Ej: Casa Club Vista Verde'),
                                TextInput::make('contact_address_line1')
                                    ->label('Dirección línea 1'),
                                TextInput::make('contact_address_line2')
                                    ->label('Dirección línea 2'),

                                TextInput::make('contact_maps_btn_text')
                                    ->label('Botón "Cómo llegar"')
                                    ->helperText('Texto del botón de Google Maps'),
                                TextInput::make('contact_maps_url')
                                    ->label('URL de Google Maps')
                                    ->helperText('Enlace para "Cómo llegar"'),
                                Textarea::make('contact_maps_embed')
                                    ->label('Embed de Google Maps')
                                    ->helperText('Código iframe embed para mostrar el mapa'),

                                TextInput::make('contact_social_heading')
                                    ->label('Encabezado de redes sociales')
                                    ->helperText('Texto "Síguenos en redes"'),
                            ]),

                        Tab::make('Redes Sociales')
                            ->icon('heroicon-o-share')
                            ->schema([
                                TextInput::make('social_facebook')
                                    ->label('Facebook')
                                    ->url()
                                    ->helperText('URL completa de la página de Facebook'),
                                TextInput::make('social_instagram')
                                    ->label('Instagram')
                                    ->url()
                                    ->helperText('URL completa del perfil de Instagram'),
                                TextInput::make('social_whatsapp')
                                    ->label('WhatsApp (enlace)')
                                    ->url()
                                    ->helperText('URL completa de WhatsApp: https://wa.me/...'),
                                TextInput::make('social_whatsapp_number')
                                    ->label('WhatsApp (número)')
                                    ->helperText('Solo el número, sin espacios ni signos'),
                            ]),

                        Tab::make('Footer')
                            ->icon('heroicon-o-chevron-down')
                            ->schema([
                                TextInput::make('footer_memberships_title')
                                    ->label('Título "Membresías"')
                                    ->helperText('Encabezado de la columna en el footer'),
                                TextInput::make('footer_location_title')
                                    ->label('Título "Ubicación"')
                                    ->helperText('Encabezado de la columna en el footer'),
                                TextInput::make('footer_maps_link_text')
                                    ->label('Enlace "Ver en Google Maps"')
                                    ->helperText('Texto del enlace en el footer'),
                                TextInput::make('footer_privacy_text')
                                    ->label('Aviso de Privacidad')
                                    ->helperText('Texto del enlace legal'),
                                TextInput::make('footer_terms_text')
                                    ->label('Términos y Condiciones')
                                    ->helperText('Texto del enlace legal'),
                                TextInput::make('footer_rights_text')
                                    ->label('Derechos reservados')
                                    ->helperText('Texto de copyright en el footer'),
                            ]),
                    ])
                    ->activeTab(0)
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        foreach ($this->data as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }

        Notification::make()
            ->title('Configuración guardada correctamente')
            ->success()
            ->send();
    }
}
