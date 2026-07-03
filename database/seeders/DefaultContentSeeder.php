<?php

namespace Database\Seeders;

use App\Models\Discipline;
use App\Models\DisciplineImage;
use App\Models\Facility;
use App\Models\FacilityImage;
use App\Models\Hero;
use App\Models\PageSection;
use Illuminate\Database\Seeder;

class DefaultContentSeeder extends Seeder
{
    public function run(): void
    {
        Hero::create([
            'title' => 'Donde cada día se <span>disfruta diferente</span>',
            'subtitle' => 'Naturaleza, bienestar y experiencias que elevan tu estilo de vida.',
            'button_text' => 'Explorar el Club',
            'button_link' => '#instalaciones',
            'background_image' => 'images/hero.jpg',
            'is_active' => true,
            'sort_order' => 0,
        ]);

        foreach ([
            'about_intro' => [
                'title' => 'Quiénes somos',
                'content' => 'Vista Verde Country Club nació como un sueño: crear un espacio donde la excelencia deportiva, el bienestar y la naturaleza se fundieran en perfecta armonía. Hoy somos un destino exclusivo para quienes buscan más que un club, un estilo de vida.',
            ],
            'menu_intro' => [
                'title' => 'Alta cocina en cada detalle.',
                'content' => 'Descubre nuestra propuesta gastronómica de temporada, curada por chefs de renombre y diseñada para acompañar tus tardes en el club. Disfruta de un maridaje exclusivo en la terraza frente al lago o en la comodidad del salón privado.',
            ],
        ] as $key => $data) {
            PageSection::create([
                'key' => $key,
                'title' => $data['title'],
                'content' => $data['content'],
                'is_active' => true,
            ]);
        }

        $facilitiesData = [
            ['title' => 'Casa Club', 'slug' => 'casa-club', 'category' => 'Social', 'description' => 'El corazón social del club. Vestíbulos de lujo, salones con chimenea y biblioteca privada.', 'schedule' => 'Lunes a Domingo: 08:00 AM - 11:00 PM'],
            ['title' => 'Spa & Bienestar', 'slug' => 'spa-bienestar', 'category' => 'Bienestar', 'description' => 'Santuario de relajación con masajes, faciales y cabina zen para recuperación total.', 'schedule' => 'Lunes a Sábado: 09:00 AM - 08:00 PM | Domingo: 09:00 AM - 04:00 PM'],
            ['title' => 'Salón de Eventos', 'slug' => 'salon-eventos', 'category' => 'Social', 'description' => 'Bodas, banquetes y eventos corporativos con sonido Bose e iluminación adaptable.', 'schedule' => 'Disponible bajo reserva previa en administración.'],
            ['title' => 'Gimnasio', 'slug' => 'gimnasio', 'category' => 'Fitness', 'description' => 'Equipamiento premium Life Fitness con zona de peso libre y cardio de última generación.', 'schedule' => 'Lunes a Domingo: 06:00 AM - 10:00 PM'],
        ];

        foreach ($facilitiesData as $i => $data) {
            Facility::create(array_merge($data, ['is_published' => true, 'sort_order' => $i]));
        }

        $disciplinesData = [
            ['title' => 'Tenis', 'slug' => 'tenis', 'category' => 'Deportivo', 'description' => 'Canchas profesionales de arcilla y superficie dura con iluminación LED de alta definición.', 'schedule' => 'Lunes a Domingo: 07:00 AM - 10:00 PM'],
            ['title' => 'Pádel', 'slug' => 'padel', 'category' => 'Deportivo', 'description' => 'Canchas panorámicas techadas de última generación con superficie de césped texturizado.', 'schedule' => 'Lunes a Domingo: 07:00 AM - 10:00 PM'],
            ['title' => 'Natación', 'slug' => 'natacion', 'category' => 'Deportivo', 'description' => 'Alberca semiolímpica templada con programas de entrenamiento y recreación para todas las edades.', 'schedule' => 'Lunes a Sábado: 06:00 AM - 09:00 PM | Domingo: 07:00 AM - 04:00 PM'],
            ['title' => 'Box', 'slug' => 'box', 'category' => 'Deportivo', 'description' => 'Estudio completo de boxeo con ring reglamentario profesional y equipamiento Everlast.', 'schedule' => 'Lunes a Viernes: 07:00 AM - 09:00 PM | Sábado: 08:00 AM - 02:00 PM'],
            ['title' => 'Taekwondo', 'slug' => 'taekwondo', 'category' => 'Deportivo', 'description' => 'Área acondicionada con tatami profesional para defensa personal y disciplina física.', 'schedule' => 'Martes y Jueves: 04:00 PM - 08:00 PM | Sábado: 09:00 AM - 12:00 PM'],
            ['title' => 'Zumba', 'slug' => 'zumba', 'category' => 'Deportivo', 'description' => 'Salón climatizado con audio premium para rutinas dinámicas grupales aptas para todas las edades.', 'schedule' => 'Lunes a Viernes: 08:00 AM - 10:00 AM y 06:00 PM - 08:00 PM'],
            ['title' => 'Jumping', 'slug' => 'jumping', 'category' => 'Deportivo', 'description' => 'Entrenamiento aeróbico en trampolines individuales para quemar calorías y fortalecer piernas.', 'schedule' => 'Lunes, Miércoles y Viernes: 08:00 AM - 11:00 AM'],
            ['title' => 'Spinning', 'slug' => 'spinning', 'category' => 'Deportivo', 'description' => 'Estudio inmersivo de ciclismo indoor con iluminación ambiental y audio digital envolvente.', 'schedule' => 'Lunes a Viernes: 06:30 AM - 10:00 AM y 06:00 PM - 09:00 PM'],
            ['title' => 'Pilates', 'slug' => 'pilates', 'category' => 'Deportivo', 'description' => 'Camas reformadoras y aditamentos de alineación postural en un ambiente de total quietud.', 'schedule' => 'Lunes a Sábado: 07:00 AM - 12:00 PM | Lunes a Jueves: 05:00 PM - 08:00 PM'],
            ['title' => 'Sauna y Vapor', 'slug' => 'sauna-vapor', 'category' => 'Bienestar', 'description' => 'Cabinas de calor seco y húmedo con esencias naturales para recuperación y desintoxicación muscular.', 'schedule' => 'Lunes a Domingo: 06:00 AM - 10:00 PM'],
        ];

        foreach ($disciplinesData as $i => $data) {
            Discipline::create(array_merge($data, ['is_published' => true, 'sort_order' => $i]));
        }
    }
}
