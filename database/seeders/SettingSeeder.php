<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'Vista Verde Country Club', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Un refugio privado de golf y bienestar termal en sintonía con la naturaleza.', 'group' => 'general'],

            // Hero
            ['key' => 'hero_show_golfista', 'value' => '1', 'group' => 'general'],

            // Secciones - Encabezados y textos
            ['key' => 'instalaciones_heading', 'value' => 'Espacios del', 'group' => 'general'],
            ['key' => 'instalaciones_heading_accent', 'value' => 'Club.', 'group' => 'general'],
            ['key' => 'instalaciones_subtext', 'value' => 'Cada rincón de Vista Verde ha sido diseñado para ofrecerte una experiencia de exclusividad y confort sin igual, desde la Casa Club hasta nuestro Spa de bienestar.', 'group' => 'general'],
            ['key' => 'instalaciones_btn_text', 'value' => 'Ver Todas', 'group' => 'general'],
            ['key' => 'instalaciones_link_text', 'value' => 'Conocer más →', 'group' => 'general'],
            ['key' => 'instalaciones_page_tag', 'value' => 'Vista Verde Country Club', 'group' => 'general'],
            ['key' => 'instalaciones_page_heading', 'value' => 'Nuestras', 'group' => 'general'],
            ['key' => 'instalaciones_page_heading_accent', 'value' => 'Instalaciones.', 'group' => 'general'],
            ['key' => 'instalaciones_page_description', 'value' => 'Espacios concebidos para la excelencia y el esparcimiento social, donde el diseño de vanguardia se funde con el entorno natural del club.', 'group' => 'general'],
            ['key' => 'facilities_heading', 'value' => 'Clases &', 'group' => 'general'],
            ['key' => 'facilities_heading_accent', 'value' => 'Disciplinas.', 'group' => 'general'],
            ['key' => 'facilities_subtext', 'value' => 'Instructores certificados, metodología de élite y espacios de primer nivel para elevar tu rendimiento y bienestar en cada sesión.', 'group' => 'general'],
            ['key' => 'facilities_link_text', 'value' => 'Ver Clase →', 'group' => 'general'],
            ['key' => 'events_label', 'value' => 'Vista Verde Country Club', 'group' => 'general'],
            ['key' => 'events_heading', 'value' => 'Eventos &', 'group' => 'general'],
            ['key' => 'events_heading_accent', 'value' => 'Próximas fechas.', 'group' => 'general'],
            ['key' => 'events_subtext', 'value' => 'Actividades exclusivas, torneos y celebraciones diseñadas para la comunidad del club. Vive experiencias únicas junto a los tuyos.', 'group' => 'general'],
            ['key' => 'events_link_text', 'value' => 'Ver evento →', 'group' => 'general'],
            ['key' => 'events_all_link_text', 'value' => 'Ver todos los eventos', 'group' => 'general'],
            ['key' => 'facilities_all_link_text', 'value' => 'Ver todas las clases', 'group' => 'general'],
            ['key' => 'menu_btn_text', 'value' => 'Ver Carta Interactiva', 'group' => 'general'],

            // Membresías - Reglamento
            ['key' => 'show_membership_prices', 'value' => '1', 'group' => 'general'],
            ['key' => 'show_membresias_reglamento', 'value' => '1', 'group' => 'general'],
            ['key' => 'membresias_reglamento_heading', 'value' => 'Reglamento del socio', 'group' => 'general'],
            ['key' => 'membresias_titulo_actualizacion', 'value' => 'Actualización del costo de la membresía', 'group' => 'general'],
            ['key' => 'membresias_titulo_consumos', 'value' => 'Consumos mínimos mensuales', 'group' => 'general'],
            ['key' => 'membresias_titulo_pagos', 'value' => 'Pagos mensuales y recargos', 'group' => 'general'],
            ['key' => 'membresias_titulo_cortesia', 'value' => 'Pases de cortesía', 'group' => 'general'],
            ['key' => 'membresias_titulo_baja', 'value' => 'Solicitud de baja de membresía', 'group' => 'general'],
            ['key' => 'membresias_titulo_visitas', 'value' => 'Registro de visitas', 'group' => 'general'],
            ['key' => 'membresias_titulo_fotografia', 'value' => 'Fotografía obligatoria', 'group' => 'general'],
            ['key' => 'membresias_actualizacion', 'value' => 'El costo de la membresía será actualizado al inicio de cada año, de acuerdo con las políticas y ajustes establecidos por el club.', 'group' => 'general'],
            ['key' => 'membresias_consumos', 'value' => '<p><strong>Casa Club:</strong></p><p>Membresía individual: $300 mensuales.<br>Membresía familiar: $500 mensuales.</p><p><strong>Campo de Golf:</strong></p><p>Membresía individual y familiar: $500 mensuales.</p><p><em>El consumo mínimo debe realizarse durante el mes correspondiente. Para registrar sus consumos, es obligatorio proporcionar su número de membresía en cada punto de venta.</em></p>', 'group' => 'general'],
            ['key' => 'membresias_pagos', 'value' => 'Para evitar recargos, los pagos mensuales deben realizarse durante los primeros 10 días de cada mes.', 'group' => 'general'],
            ['key' => 'membresias_cortesia', 'value' => 'Los pases de cortesía estarán disponibles únicamente durante los primeros 5 días de cada mes, siempre y cuando la membresía se encuentre pagada en su totalidad.', 'group' => 'general'],
            ['key' => 'membresias_baja', 'value' => '<p>Para tramitar su baja, debe realizarse dentro de los primeros 10 días de cada mes, cumpliendo con los siguientes requisitos:</p><p>Completar el formato de baja correspondiente.<br>Asegurar que el estado de cuenta esté en $0.</p><p>La baja no podrá exceder los tres meses. En caso de superar este periodo, se requerirá el pago de una cuota de incorporación para reactivar la membresía.</p>', 'group' => 'general'],
            ['key' => 'membresias_visitas', 'value' => 'Todas las visitas deben ser informadas previamente en la recepción para que el personal del pórtico pueda autorizar el acceso. Los visitantes deberán registrarse en recepción antes de ingresar a las instalaciones.', 'group' => 'general'],
            ['key' => 'membresias_fotografia', 'value' => 'Todos los miembros de la membresía deben tomarse una fotografía en nuestras instalaciones para completar su registro.', 'group' => 'general'],
            ['key' => 'membresias_contacto', 'value' => 'Cualquier duda, aclaración o pago debe comunicarse al correo <a href="mailto:caja@vistaverde.com.mx">caja@vistaverde.com.mx</a>, al teléfono 238 374 5011 ext. 101 o por WhatsApp al 238 204 1659.', 'group' => 'general'],

            // Textos de página - Botones y enlaces
            ['key' => 'about_btn_text', 'value' => 'Conócenos más →', 'group' => 'general'],
            ['key' => 'nosotros_hero_tag', 'value' => 'Vista Verde Club', 'group' => 'general'],
            ['key' => 'nosotros_hero_title', 'value' => 'Sobre Nosotros.', 'group' => 'general'],
            ['key' => 'nosotros_hero_subtitle', 'value' => 'Conoce nuestra historia, nuestra filosofía y el compromiso que nos define como el club campestre más exclusivo de la región.', 'group' => 'general'],
            ['key' => 'lector_btn_text', 'value' => 'Ver Menú →', 'group' => 'general'],
            ['key' => 'volver_eventos_text', 'value' => 'Volver a Eventos', 'group' => 'general'],
            ['key' => 'volver_instalaciones_text', 'value' => 'Volver a Instalaciones', 'group' => 'general'],
            ['key' => 'volver_clases_text', 'value' => 'Volver a Clases', 'group' => 'general'],
            ['key' => 'volver_carta_text', 'value' => 'Volver a la Carta', 'group' => 'general'],
            ['key' => 'download_pdf_text', 'value' => 'Descargar PDF', 'group' => 'general'],
            ['key' => 'download_menu_text', 'value' => 'Descargar Menú', 'group' => 'general'],

            // Textos de página - Estados vacíos
            ['key' => 'empty_events_title', 'value' => 'No hay eventos publicados actualmente.', 'group' => 'general'],
            ['key' => 'empty_events_subtitle', 'value' => 'Vuelve pronto para ver las próximas actividades del club.', 'group' => 'general'],
            ['key' => 'empty_clases_text', 'value' => 'No hay clases disponibles actualmente.', 'group' => 'general'],
            ['key' => 'empty_instalaciones_text', 'value' => 'No hay espacios disponibles actualmente.', 'group' => 'general'],
            ['key' => 'empty_membresias_title', 'value' => 'No hay membresías disponibles actualmente.', 'group' => 'general'],
            ['key' => 'empty_membresias_subtitle', 'value' => 'Pronto publicaremos nuestros planes.', 'group' => 'general'],
            ['key' => 'empty_lector_text', 'value' => 'No hay categorías disponibles en este momento.', 'group' => 'general'],
            ['key' => 'empty_pdf_text', 'value' => 'No hay PDF disponible para este evento.', 'group' => 'general'],

            // Contacto
            ['key' => 'contact_phone', 'value' => '238 37 4 50 11 ext. 101 o 108', 'group' => 'contact'],
            ['key' => 'contact_cell', 'value' => '238 204 1659', 'group' => 'contact'],
            ['key' => 'contact_email', 'value' => 'sistemas@vistaverde.com.mx', 'group' => 'contact'],
            ['key' => 'contact_schedule', 'value' => 'Mar - Sáb: 8:00 am - 8:00 pm<br>Dom: 8:00 am - 6:00 pm', 'group' => 'contact'],
            ['key' => 'contact_address_name', 'value' => 'Casa Club Vista Verde', 'group' => 'contact'],
            ['key' => 'contact_address_line1', 'value' => 'Carretera Federal México-Tehuacán Km. 252', 'group' => 'contact'],
            ['key' => 'contact_address_line2', 'value' => 'San Nicolás Tetitzintla, 75710 Tehuacán, Pue.', 'group' => 'contact'],
            ['key' => 'contact_maps_url', 'value' => 'https://www.google.com/maps/place/Casa+Club+Vista+Verde+Country+Club/@18.4835419,-97.4133092,17z', 'group' => 'contact'],
            ['key' => 'contact_maps_embed', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3784.002589867335!2d-97.41330921649934!3d18.483541887826103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c5a2cf77bbf7f9%3A0x992163d342c0d985!2sCasa%20Club%20Vista%20Verde%20Country%20Club!5e0!3m2!1ses-419!2smx!4v1783023157035!5m2!1ses-419!2smx', 'group' => 'contact'],
            ['key' => 'contact_label', 'value' => 'Visítenos', 'group' => 'contact'],
            ['key' => 'contact_heading', 'value' => 'Ubicación', 'group' => 'contact'],
            ['key' => 'contact_heading_accent', 'value' => 'y acceso.', 'group' => 'contact'],
            ['key' => 'contact_subtext', 'value' => 'Vista Verde Country Club se encuentra ubicado en una zona privilegiada y de fácil acceso en Tehuacán, ofreciendo un entorno natural exclusivo de total privacidad para sus socios.', 'group' => 'contact'],
            ['key' => 'contact_address_label', 'value' => 'Dirección Principal', 'group' => 'contact'],
            ['key' => 'contact_maps_btn_text', 'value' => 'Cómo Llegar en Google Maps →', 'group' => 'contact'],
            ['key' => 'contact_social_heading', 'value' => 'Síguenos en redes', 'group' => 'contact'],

            // Navbar
            ['key' => 'nav_link_inicio', 'value' => 'Inicio', 'group' => 'general'],
            ['key' => 'nav_link_instalaciones', 'value' => 'Instalaciones', 'group' => 'general'],
            ['key' => 'nav_link_clases', 'value' => 'Clases', 'group' => 'general'],
            ['key' => 'nav_link_eventos', 'value' => 'Eventos', 'group' => 'general'],
            ['key' => 'nav_link_carta', 'value' => 'Carta', 'group' => 'general'],
            ['key' => 'nav_link_membresias', 'value' => 'Membresías', 'group' => 'general'],
            ['key' => 'nav_link_contacto', 'value' => 'Contacto', 'group' => 'general'],

            // Footer
            ['key' => 'footer_memberships_title', 'value' => 'Membresías e Informes', 'group' => 'general'],
            ['key' => 'footer_location_title', 'value' => 'Ubicación', 'group' => 'general'],
            ['key' => 'footer_maps_link_text', 'value' => 'Ver en Google Maps →', 'group' => 'general'],
            ['key' => 'footer_privacy_text', 'value' => 'Aviso de Privacidad', 'group' => 'general'],
            ['key' => 'footer_terms_text', 'value' => 'Términos y Condiciones', 'group' => 'general'],
            ['key' => 'footer_rights_text', 'value' => 'Todos los derechos reservados.', 'group' => 'general'],

            // Legal PDFs
            ['key' => 'privacy_pdf', 'value' => '', 'group' => 'general'],
            ['key' => 'terms_pdf', 'value' => '', 'group' => 'general'],

            // Redes sociales
            ['key' => 'social_facebook', 'value' => 'https://www.facebook.com/p/Vista-Verde-Country-Club-AC-100063650045982/', 'group' => 'social'],
            ['key' => 'social_instagram', 'value' => 'https://www.instagram.com/clubvistaverdecountry/', 'group' => 'social'],
            ['key' => 'social_whatsapp', 'value' => 'https://wa.me/5212382041659', 'group' => 'social'],
            ['key' => 'social_whatsapp_number', 'value' => '5212382041659', 'group' => 'social'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
