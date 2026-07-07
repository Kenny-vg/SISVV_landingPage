<?php

namespace Database\Seeders;

use App\Models\Discipline;
use App\Models\Facility;
use App\Models\Hero;
use App\Models\Membership;
use App\Models\PageSection;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // ─── Hero ──────────────────────────────────────────────────────────
        Hero::updateOrCreate(['id' => 1], [
            'title' => 'Donde cada día se disfruta diferente',
            'subtitle' => 'Naturaleza, bienestar y experiencias que elevan tu estilo de vida.',
            'button_text' => 'Explorar el Club',
            'button_link' => '#instalaciones',
            'background_image' => null,
            'is_active' => true,
            'sort_order' => 0,
        ]);

        // ─── Secciones de página ──────────────────────────────────────────
        foreach ([
            'about_intro' => [
                'title' => 'Quiénes somos',
                'content' => 'Vista Verde Country Club nació como un sueño: crear un espacio donde la excelencia deportiva, el bienestar y la naturaleza se fundieran en perfecta armonía. Hoy somos un destino exclusivo para quienes buscan más que un club, un estilo de vida.',
            ],
            'about_mission' => [
                'title' => 'Nuestra Misión',
                'content' => 'Ofrecer a nuestros socios un refugio privado donde la excelencia deportiva, el bienestar integral y la conexión con la naturaleza se combinen para crear experiencias únicas que eleven su calidad de vida.',
            ],
            'about_vision' => [
                'title' => 'Nuestra Visión',
                'content' => 'Ser el club campestre más distinguido de la región, reconocido por nuestro compromiso con la calidad, la innovación en servicios y la creación de una comunidad exclusiva que trascienda generaciones.',
            ],
            'about_values' => [
                'title' => 'Nuestros Valores',
                'content' => 'Compromiso con la excelencia en cada servicio, respeto por la naturaleza y el entorno, integridad en cada acción, calidez en el trato humano y pasión por crear momentos inolvidables para nuestros socios y sus familias.',
            ],
            'about_philosophy' => [
                'title' => 'Nuestra Filosofía',
                'content' => 'Creemos que el verdadero lujo no está en lo material, sino en la libertad de disfrutar momentos auténticos. Cada rincón de Vista Verde está diseñado para inspirar, renovar y conectar a las personas con lo esencial.',
            ],
            'menu_intro' => [
                'title' => 'Alta cocina en cada detalle.',
                'content' => 'Descubre nuestra propuesta gastronómica de temporada, curada por chefs de renombre y diseñada para acompañar tus tardes en el club. Disfruta de un maridaje exclusivo en la terraza frente al lago o en la comodidad del salón privado.',
            ],
        ] as $key => $data) {
            PageSection::updateOrCreate(['key' => $key], [
                'title' => $data['title'],
                'content' => $data['content'],
                'is_active' => true,
            ]);
        }

        // ─── Instalaciones ───────────────────────────────────────────────
        $facilities = [
            [
                'title' => 'Casa Club',
                'slug' => 'casa-club',
                'category' => 'Social',
                'description' => 'Salones privados para eventos, restaurante gourmet con cocina de autor y una terraza panorámica con vistas espectaculares al campo de golf. El corazón social del club.',
                'schedule' => 'Mar - Sáb: 8:00 am - 10:00 pm | Dom: 8:00 am - 6:00 pm',
                'sort_order' => 1,
                'is_published' => true,
            ],
            [
                'title' => 'Spa de Bienestar',
                'slug' => 'spa-de-bienestar',
                'category' => 'Bienestar',
                'description' => 'Santuario de relajación con masajes terapéuticos, temazcal tradicional, baños de vapor, sauna seca y tratamientos holísticos diseñados para renovar cuerpo y mente.',
                'schedule' => 'Mar - Sáb: 9:00 am - 8:00 pm',
                'sort_order' => 2,
                'is_published' => true,
            ],
            [
                'title' => 'Campo de Golf',
                'slug' => 'campo-de-golf',
                'category' => 'Deportivo',
                'description' => 'Campo de 18 hoyos par 72, diseñado por arquitectos de renombre, rodeado de vegetación nativa. Ideal para torneos y juego recreativo en un entorno natural inigualable.',
                'schedule' => 'Todos los días: 6:00 am - 7:00 pm',
                'sort_order' => 3,
                'is_published' => true,
            ],
            [
                'title' => 'Alberca Semiolímpica',
                'slug' => 'alberca-semiolimpica',
                'category' => 'Fitness',
                'description' => 'Alberca semiolímpica climatizada con área de loungers, sombrillas y servicio de snacks. Perfecta para entrenamiento, clases de natación o días de relax familiar.',
                'schedule' => 'Mar - Dom: 7:00 am - 8:00 pm',
                'sort_order' => 4,
                'is_published' => true,
            ],
            [
                'title' => 'Gimnasio',
                'slug' => 'gimnasio',
                'category' => 'Fitness',
                'description' => 'Equipamiento Technogym de última generación, zona de entrenamiento funcional, área de cardio con vista al jardín y entrenadores certificados disponibles.',
                'schedule' => 'Lun - Sáb: 6:00 am - 10:00 pm | Dom: 8:00 am - 6:00 pm',
                'sort_order' => 5,
                'is_published' => true,
            ],
        ];

        foreach ($facilities as $data) {
            Facility::updateOrCreate(['slug' => $data['slug']], $data);
        }

        // ─── Clases / Disciplinas ─────────────────────────────────────────
        $disciplines = [
            [
                'title' => 'Golf',
                'slug' => 'golf',
                'category' => 'Deportivo',
                'description' => 'Clases grupales e individuales con instructores certificados. Técnica de swing, juego corto y estrategia de campo para todos los niveles, desde principiantes hasta avanzados.',
                'schedule' => 'Mar - Dom: 7:00 am - 6:00 pm',
                'sort_order' => 1,
                'is_published' => true,
            ],
            [
                'title' => 'Yoga & Pilates',
                'slug' => 'yoga-pilates',
                'category' => 'Bienestar',
                'description' => 'Sesiones al aire libre al amanecer y atardecer en la pradera del club. Yoga vinyasa, pilates mat y meditación guiada para conectar cuerpo, mente y naturaleza.',
                'schedule' => 'Mar - Sáb: 7:00 am y 5:00 pm',
                'sort_order' => 2,
                'is_published' => true,
            ],
            [
                'title' => 'Natación',
                'slug' => 'natacion',
                'category' => 'Fitness',
                'description' => 'Clases para todas las edades y niveles, desde iniciación hasta entrenamiento avanzado. Técnica de estilos, resistencia acuática y aquafitness.',
                'schedule' => 'Mar - Sáb: 8:00 am - 7:00 pm',
                'sort_order' => 3,
                'is_published' => true,
            ],
            [
                'title' => 'Tenis',
                'slug' => 'tenis',
                'category' => 'Deportivo',
                'description' => 'Canchas de arcilla profesional con iluminación nocturna. Clases particulares y en grupo, clinics de fin de semana y torneos internos para socios.',
                'schedule' => 'Lun - Dom: 7:00 am - 9:00 pm',
                'sort_order' => 4,
                'is_published' => true,
            ],
            [
                'title' => 'Entrenamiento Funcional',
                'slug' => 'entrenamiento-funcional',
                'category' => 'Fitness',
                'description' => 'Circuitos de alta intensidad al aire libre en la pradera del club. Entrenamiento en grupo con peso corporal, kettlebells, TRX y cardio dinámico.',
                'schedule' => 'Lun - Sáb: 6:30 am, 8:00 am y 6:00 pm',
                'sort_order' => 5,
                'is_published' => true,
            ],
        ];

        foreach ($disciplines as $data) {
            Discipline::updateOrCreate(['slug' => $data['slug']], $data);
        }

        // ─── Membresías ───────────────────────────────────────────────────
        $memberships = [
            [
                'name' => 'Membresía Individual',
                'price' => '$1,500/mes',
                'sort_order' => 1,
                'is_published' => true,
                'benefits' => [
                    'Acceso ilimitado a todas las instalaciones del club',
                    'Clases grupales incluidas (Yoga, Natación, Funcional)',
                    '2 pases de invitado al mes',
                    '10% de descuento en restaurante y spa',
                    'Acceso a eventos sociales del club',
                ],
            ],
            [
                'name' => 'Membresía Familiar',
                'price' => '$2,800/mes',
                'sort_order' => 2,
                'is_published' => true,
                'benefits' => [
                    'Todos los beneficios de Individual para titular + cónyuge',
                    'Acceso para hijos menores de 18 años',
                    '4 pases de invitado al mes',
                    '15% de descuento en restaurante y spa',
                    'Eventos familiares exclusivos cada mes',
                    'Clases infantiles de natación y tenis incluidas',
                ],
            ],
            [
                'name' => 'Membresía Ejecutiva',
                'price' => '$4,500/mes',
                'sort_order' => 3,
                'is_published' => true,
                'benefits' => [
                    'Acceso prioritario a reservaciones en todas las áreas',
                    'Spa de bienestar con 2 sesiones al mes incluidas',
                    '6 pases de invitado al mes',
                    '20% de descuento en restaurante, spa y tienda',
                    'Acceso a torneos y clinics exclusivos',
                    'Estacionamiento preferente',
                ],
            ],
            [
                'name' => 'Membresía Premium',
                'price' => '$7,500/mes',
                'sort_order' => 4,
                'is_published' => true,
                'benefits' => [
                    'Acceso ilimitado 24/7 a todas las instalaciones',
                    'Servicio de valet parking incluido',
                    'Invitados ilimitados (sujeto a capacidad)',
                    'Spa ilimitado y prioritario',
                    '25% de descuento en restaurante, spa y tienda',
                    'Categoría de juego prioritario en Golf y Tenis',
                    'Eventos VIP y catas de vino exclusivas',
                ],
            ],
        ];

        foreach ($memberships as $data) {
            $benefits = $data['benefits'];
            unset($data['benefits']);

            $membership = Membership::updateOrCreate(
                ['name' => $data['name']],
                $data
            );

            $membership->benefits()->delete();

            foreach ($benefits as $i => $benefit) {
                $membership->benefits()->create([
                    'benefit' => $benefit,
                    'sort_order' => $i + 1,
                ]);
            }
        }
    }
}
