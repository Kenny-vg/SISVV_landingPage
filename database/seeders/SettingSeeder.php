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
            ['key' => 'hero_title', 'value' => 'Donde cada día se disfruta diferente', 'group' => 'general'],
            ['key' => 'hero_subtitle', 'value' => 'Naturaleza, bienestar y experiencias que elevan tu estilo de vida.', 'group' => 'general'],
            ['key' => 'hero_default_button', 'value' => 'Explorar el Club', 'group' => 'general'],
            ['key' => 'hero_show_golfista', 'value' => '1', 'group' => 'general'],

            // Secciones - Encabezados y textos
            ['key' => 'about_heading', 'value' => 'Un refugio privado<br><span style="font-style: italic; font-weight: 300; color: var(--color-accent-gold);">donde el deporte y la naturaleza convergen.</span>', 'group' => 'general'],
            ['key' => 'instalaciones_heading', 'value' => 'Espacios del<br><span>Club.</span>', 'group' => 'general'],
            ['key' => 'instalaciones_subtext', 'value' => 'Cada rincón de Vista Verde ha sido diseñado para ofrecerte una experiencia de exclusividad y confort sin igual, desde la Casa Club hasta nuestro Spa de bienestar.', 'group' => 'general'],
            ['key' => 'instalaciones_btn_text', 'value' => 'Ver Todas', 'group' => 'general'],
            ['key' => 'instalaciones_link_text', 'value' => 'Conocer más →', 'group' => 'general'],
            ['key' => 'facilities_heading', 'value' => 'Clases &<br><span>Disciplinas.</span>', 'group' => 'general'],
            ['key' => 'facilities_subtext', 'value' => 'Instructores certificados, metodología de élite y espacios de primer nivel para elevar tu rendimiento y bienestar en cada sesión.', 'group' => 'general'],
            ['key' => 'facilities_link_text', 'value' => 'Ver Clase →', 'group' => 'general'],
            ['key' => 'events_label', 'value' => 'Club Vista Verde', 'group' => 'general'],
            ['key' => 'events_heading', 'value' => 'Eventos &<br><span>Próximas fechas.</span>', 'group' => 'general'],
            ['key' => 'events_subtext', 'value' => 'Actividades exclusivas, torneos y celebraciones diseñadas para la comunidad del club. Vive experiencias únicas junto a los tuyos.', 'group' => 'general'],
            ['key' => 'events_link_text', 'value' => 'Ver evento →', 'group' => 'general'],
            ['key' => 'events_all_link_text', 'value' => 'Ver todos los eventos', 'group' => 'general'],
            ['key' => 'facilities_all_link_text', 'value' => 'Ver todas las clases', 'group' => 'general'],
            ['key' => 'menu_btn_text', 'value' => 'Ver Carta Interactiva', 'group' => 'general'],

            // Contacto
            ['key' => 'contact_phone', 'value' => '238 37 4 50 11 ext. 101 o 108', 'group' => 'contact'],
            ['key' => 'contact_cell', 'value' => '238 129 0316', 'group' => 'contact'],
            ['key' => 'contact_email', 'value' => 'sistemas@vistaverde.com.mx', 'group' => 'contact'],
            ['key' => 'contact_schedule', 'value' => 'Mar - Sáb: 8:00 am - 8:00 pm<br>Dom: 8:00 am - 6:00 pm', 'group' => 'contact'],
            ['key' => 'contact_address_name', 'value' => 'Casa Club Vista Verde', 'group' => 'contact'],
            ['key' => 'contact_address_line1', 'value' => 'Carretera Federal México-Tehuacán Km. 252', 'group' => 'contact'],
            ['key' => 'contact_address_line2', 'value' => 'San Nicolás Tetitzintla, 75710 Tehuacán, Pue.', 'group' => 'contact'],
            ['key' => 'contact_maps_url', 'value' => 'https://www.google.com/maps/place/Casa+Club+Vista+Verde+Country+Club/@18.4835419,-97.4133092,17z', 'group' => 'contact'],
            ['key' => 'contact_maps_embed', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3784.002589867335!2d-97.41330921649934!3d18.483541887826103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c5a2cf77bbf7f9%3A0x992163d342c0d985!2sCasa%20Club%20Vista%20Verde%20Country%20Club!5e0!3m2!1ses-419!2smx!4v1783023157035!5m2!1ses-419!2smx', 'group' => 'contact'],
            ['key' => 'contact_label', 'value' => 'Visítenos', 'group' => 'contact'],
            ['key' => 'contact_heading', 'value' => 'Ubicación<br><span>y acceso.</span>', 'group' => 'contact'],
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
            ['key' => 'social_whatsapp', 'value' => 'https://wa.me/522381290316', 'group' => 'social'],
            ['key' => 'social_whatsapp_number', 'value' => '522381290316', 'group' => 'social'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
