<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\View;
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

    public static function canAccess(): bool
    {
        return auth()->user()?->is_admin ?? false;
    }

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
                View::make('filament.components.section-guide')
                    ->viewData([
                        'title' => 'Configuración del sitio',
                        'description' => 'Aquí se editan los datos globales del sitio: contacto, redes sociales, footer, navegación y mensajes. Los textos de cada sección de la web se editan en su propio menú (Portada, Nosotros, Instalaciones, etc.).',
                    ])
                    ->columnSpanFull(),
                Tabs::make('Configuración')
                    ->tabs([
                        Tab::make('Contacto')
                            ->icon('heroicon-o-phone')
                            ->schema([
                                TextInput::make('contact_label')
                                    ->label('Etiqueta superior')
                                    ->helperText('Texto pequeño sobre la sección'),
                                RichEditor::make('contact_heading')
                                    ->label('Encabezado')
                                    ->toolbarButtons(['bold', 'italic']),
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

                        Tab::make('Footer y legal')
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

                                FileUpload::make('privacy_pdf')
                                    ->label('PDF — Aviso de Privacidad')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->maxSize(10240)
                                    ->directory('legal')
                                    ->disk('public')
                                    ->helperText('Sube el PDF del Aviso de Privacidad'),
                                FileUpload::make('terms_pdf')
                                    ->label('PDF — Términos y Condiciones')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->maxSize(10240)
                                    ->directory('legal')
                                    ->disk('public')
                                    ->helperText('Sube el PDF de Términos y Condiciones'),
                            ]),

                        Tab::make('Navegación')
                            ->icon('heroicon-o-bars-3')
                            ->schema([
                                TextInput::make('nav_link_inicio')
                                    ->label('Inicio'),
                                TextInput::make('nav_link_nosotros')
                                    ->label('Nosotros'),
                                TextInput::make('nav_link_instalaciones')
                                    ->label('Instalaciones'),
                                TextInput::make('nav_link_clases')
                                    ->label('Clases'),
                                TextInput::make('nav_link_eventos')
                                    ->label('Eventos'),
                                TextInput::make('nav_link_carta')
                                    ->label('Carta'),
                                TextInput::make('nav_link_membresias')
                                    ->label('Membresías'),
                                TextInput::make('nav_link_contacto')
                                    ->label('Contacto'),
                            ]),

                        Tab::make('Botones y mensajes')
                            ->icon('heroicon-o-pencil-square')
                            ->schema([
                                TextInput::make('lector_btn_text')
                                    ->label('Enlace "Ver Menú" de la carta')
                                    ->helperText('Texto del enlace en las tarjetas de categorías'),
                                TextInput::make('volver_eventos_text')
                                    ->label('Botón "Volver a Eventos"')
                                    ->helperText('Enlace en la página de detalle de un evento'),
                                TextInput::make('volver_instalaciones_text')
                                    ->label('Botón "Volver a Instalaciones"')
                                    ->helperText('Enlace en la página de detalle de una instalación'),
                                TextInput::make('volver_clases_text')
                                    ->label('Botón "Volver a Clases"')
                                    ->helperText('Enlace en la página de detalle de una clase'),
                                TextInput::make('volver_carta_text')
                                    ->label('Botón "Volver a la Carta"')
                                    ->helperText('Enlace en el visor PDF de una categoría'),
                                TextInput::make('download_pdf_text')
                                    ->label('Botón "Descargar PDF" (eventos)')
                                    ->helperText('Descarga del PDF de un evento'),
                                TextInput::make('download_menu_text')
                                    ->label('Título "Descargar Menú" (carta)')
                                    ->helperText('Texto del tooltip de descarga en el visor PDF'),

                                View::make('filament.components.section-guide')
                                    ->viewData([
                                        'title' => 'Estados vacíos',
                                        'description' => 'Textos que se muestran cuando una sección o página no tiene contenido publicado.',
                                    ])
                                    ->columnSpanFull(),
                                TextInput::make('empty_events_title')
                                    ->label('Vacío — Eventos (título)'),
                                TextInput::make('empty_events_subtitle')
                                    ->label('Vacío — Eventos (subtítulo)'),
                                TextInput::make('empty_clases_text')
                                    ->label('Vacío — Clases'),
                                TextInput::make('empty_instalaciones_text')
                                    ->label('Vacío — Instalaciones'),
                                TextInput::make('empty_membresias_title')
                                    ->label('Vacío — Membresías (título)'),
                                TextInput::make('empty_membresias_subtitle')
                                    ->label('Vacío — Membresías (subtítulo)'),
                                TextInput::make('empty_lector_text')
                                    ->label('Vacío — Carta'),
                                TextInput::make('empty_pdf_text')
                                    ->label('Vacío — PDF del evento'),
                            ]),
                    ])
                    ->activeTab(0)
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $richtextKeys = [
            'contact_heading', 'contact_schedule',
        ];

        $urlKeys = [
            'social_facebook', 'social_instagram', 'social_whatsapp',
            'contact_maps_url',
        ];

        $iframeKeys = [
            'contact_maps_embed',
        ];

        foreach ($data as $key => $value) {
            if (in_array($key, $richtextKeys)) {
                $value = sanitize_html($value);
            } elseif (in_array($key, $urlKeys)) {
                $value = safe_url((string) $value);
            } elseif (in_array($key, $iframeKeys)) {
                $value = safe_iframe_src((string) $value);
            }

            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        Notification::make()
            ->title('Configuración guardada correctamente')
            ->success()
            ->send();
    }
}