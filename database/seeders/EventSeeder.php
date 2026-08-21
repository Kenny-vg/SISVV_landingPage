<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title' => 'Bodas de ensueño',
                'slug' => 'bodas',
                'category' => 'Boda',
                'date' => '2026-06-20',
                'prioridad' => 1,
                'description' => '<p>Celebra tu amor en un entorno natural incomparable. Nuestro equipo de coordinación se encargará de cada detalle para que tu día especial sea perfecto.</p>',
                'image' => 'events/01KX6ZHH7HTT7Z6P2MG42WASF3.jpeg',
                'pdf_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Baby Shower',
                'slug' => 'baby-shower',
                'category' => 'Baby Shower',
                'date' => '2026-08-08',
                'prioridad' => 2,
                'description' => '<p>Recibe a tu bebé con una celebración íntima y elegante. Espacios versátiles y menús personalizados para compartir con familiares y amigos.</p>',
                'image' => 'events/01KX6ZHXM5XT5BQ559W50F47X5.jpg',
                'pdf_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Fiestas y celebraciones',
                'slug' => 'fiestas',
                'category' => 'Fiesta',
                'date' => '2026-09-12',
                'prioridad' => 3,
                'description' => '<p>Cumpleaños, aniversarios y cualquier motivo especial merece un lugar excepcional. Vive momentos inolvidables en nuestras instalaciones.</p>',
                'image' => 'events/01KX6ZK0AAN3DEJFKTKY4GBCAV.jpg',
                'pdf_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Graduaciones',
                'slug' => 'graduaciones',
                'category' => 'Graduación',
                'date' => '2026-07-04',
                'prioridad' => 4,
                'description' => '<p>Reconoce el esfuerzo y dedicación de tus seres queridos con una celebración a la altura. Espacios para grupos grandes y menús ejecutivos.</p>',
                'image' => 'events/01KX6ZKJ5EX9JX25T1H7F3HMKF.jpg',
                'pdf_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Eventos corporativos',
                'slug' => 'corporativos',
                'category' => 'Corporativo',
                'date' => '2026-10-16',
                'prioridad' => 5,
                'description' => '<p>Conferencias, convenciones y reuniones de negocio en un entorno que inspira productividad y confort. Equipo audiovisual y servicio de primer nivel.</p>',
                'image' => 'events/01KX6ZMT8T8ND4XMTVBG2153JC.JPG',
                'pdf_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Torneo de Golf Anual',
                'slug' => 'torneo-de-golf-anual',
                'category' => 'Torneo',
                'date' => '2026-11-14',
                'prioridad' => 6,
                'description' => '<p>Únete a nuestro torneo de golf más esperado del año. Disfruta de una jornada deportiva en nuestro campo de 9 hoyos.</p>',
                'image' => 'events/01KX6ZM05V2HWZPR7C0PDFFT36.jpg',
                'pdf_path' => null,
                'is_published' => true,
            ],
        ];

        foreach ($events as $data) {
            Event::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
