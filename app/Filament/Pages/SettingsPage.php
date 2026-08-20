<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
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
                        'title' => 'Configuración general del sitio',
                        'description' => 'Aquí se editan los textos y datos de varias partes de la web: portada, nosotros, instalaciones, clases, eventos, membresías, gastronomía, contacto, redes sociales y footer. Usa las pestañas para navegar.',
                    ])
                    ->columnSpanFull(),
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
                                    ->toolbarButtons(['italic', 'bold']),

                            ]),

                        Tab::make('Instalaciones')
                            ->icon('heroicon-o-building-library')
                            ->schema([
                                RichEditor::make('instalaciones_heading')
                                    ->label('Encabezado')
                                    ->toolbarButtons(['bold', 'italic']),
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
                                RichEditor::make('facilities_heading')
                                    ->label('Encabezado')
                                    ->toolbarButtons(['bold', 'italic']),
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
                                RichEditor::make('events_heading')
                                    ->label('Encabezado')
                                    ->toolbarButtons(['bold', 'italic']),
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

                        Tab::make('Membresías')
                            ->icon('heroicon-o-credit-card')
                            ->schema([
                                Toggle::make('show_membership_prices')
                                    ->label('Mostrar precios de membresías')
                                    ->helperText('Permite mostrar u ocultar los precios de todas las membresías en el sitio web')
                                    ->default(true),
                                Toggle::make('show_membresias_reglamento')
                                    ->label('Mostrar sección de reglamento')
                                    ->helperText('Permite mostrar u ocultar toda la sección de reglamento del socio en la página de membresías')
                                    ->default(true),
                                TextInput::make('membresias_reglamento_heading')
                                    ->label('Título de la sección "Reglamento del socio"')
                                    ->helperText('Encabezado mostrado debajo de las tarjetas de membresías'),
                                TextInput::make('membresias_titulo_actualizacion')
                                    ->label('Título: Actualización del costo')
                                    ->helperText('Título mostrado junto a su contenido'),
                                TextInput::make('membresias_titulo_consumos')
                                    ->label('Título: Consumos mínimos mensuales')
                                    ->helperText('Título mostrado junto a su contenido'),
                                TextInput::make('membresias_titulo_pagos')
                                    ->label('Título: Pagos mensuales y recargos')
                                    ->helperText('Título mostrado junto a su contenido'),
                                TextInput::make('membresias_titulo_cortesia')
                                    ->label('Título: Pases de cortesía')
                                    ->helperText('Título mostrado junto a su contenido'),
                                TextInput::make('membresias_titulo_baja')
                                    ->label('Título: Solicitud de baja de membresía')
                                    ->helperText('Título mostrado junto a su contenido'),
                                TextInput::make('membresias_titulo_visitas')
                                    ->label('Título: Registro de visitas')
                                    ->helperText('Título mostrado junto a su contenido'),
                                TextInput::make('membresias_titulo_fotografia')
                                    ->label('Título: Fotografía obligatoria')
                                    ->helperText('Título mostrado junto a su contenido'),
                                RichEditor::make('membresias_actualizacion')
                                    ->label('Actualización del costo de la membresía')
                                    ->toolbarButtons(['bold', 'italic'])
                                    ->helperText('Nota sobre la actualización anual del costo'),
                                RichEditor::make('membresias_consumos')
                                    ->label('Consumos mínimos mensuales')
                                    ->toolbarButtons(['bold', 'italic'])
                                    ->helperText('Consumos de Casa Club y Campo de Golf'),
                                RichEditor::make('membresias_pagos')
                                    ->label('Pagos mensuales y recargos')
                                    ->toolbarButtons(['bold', 'italic'])
                                    ->helperText('Primeros 10 días de cada mes'),
                                RichEditor::make('membresias_cortesia')
                                    ->label('Pases de cortesía')
                                    ->toolbarButtons(['bold', 'italic'])
                                    ->helperText('Disponibles los primeros 5 días del mes'),
                                RichEditor::make('membresias_baja')
                                    ->label('Solicitud de baja de membresía')
                                    ->toolbarButtons(['bold', 'italic'])
                                    ->helperText('Requisitos y condiciones de la baja'),
                                RichEditor::make('membresias_visitas')
                                    ->label('Registro de visitas')
                                    ->toolbarButtons(['bold', 'italic'])
                                    ->helperText('Cómo registrar visitas'),
                                RichEditor::make('membresias_fotografia')
                                    ->label('Fotografía obligatoria')
                                    ->toolbarButtons(['bold', 'italic'])
                                    ->helperText('Registro fotográfico de los miembros'),
RichEditor::make('membresias_contacto')
                                    ->label('Contacto de membresías')
                                    ->toolbarButtons(['italic', 'bold'])
                                    ->helperText('Correo, teléfono y WhatsApp para dudas o pagos'),
                            ]),

                        Tab::make('Textos de página')
                            ->icon('heroicon-o-pencil-square')
                            ->schema([
                                TextInput::make('about_btn_text')
                                    ->label('Botón "Conócenos más"')
                                    ->helperText('Enlace de la sección Nosotros en la portada'),
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
            'hero_title', 'hero_subtitle', 'about_heading',
            'instalaciones_heading', 'facilities_heading',
            'events_heading', 'contact_heading', 'contact_schedule',
            'membresias_actualizacion', 'membresias_consumos',
            'membresias_pagos', 'membresias_cortesia',
            'membresias_baja', 'membresias_visitas',
            'membresias_fotografia', 'membresias_contacto',
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
