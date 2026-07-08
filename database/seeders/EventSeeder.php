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
                'description' => '<p>Celebra tu amor en un entorno natural incomparable. Nuestro equipo de coordinación se encargará de cada detalle para que tu día especial sea perfecto.</p>',
                'image' => null,
                'pdf_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Baby Shower',
                'slug' => 'baby-shower',
                'category' => 'Baby Shower',
                'description' => '<p>Recibe a tu bebé con una celebración íntima y elegante. Espacios versátiles y menús personalizados para compartir con familiares y amigos.</p>',
                'image' => null,
                'pdf_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Fiestas y celebraciones',
                'slug' => 'fiestas',
                'category' => 'Fiesta',
                'description' => '<p>Cumpleaños, aniversarios y cualquier motivo especial merece un lugar excepcional. Vive momentos inolvidables en nuestras instalaciones.</p>',
                'image' => null,
                'pdf_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Graduaciones',
                'slug' => 'graduaciones',
                'category' => 'Graduación',
                'description' => '<p>Reconoce el esfuerzo y dedicación de tus seres queridos con una celebración a la altura. Espacios para grupos grandes y menús ejecutivos.</p>',
                'image' => null,
                'pdf_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Eventos corporativos',
                'slug' => 'corporativos',
                'category' => 'Corporativo',
                'description' => '<p>Conferencias, convenciones y reuniones de negocio en un entorno que inspira productividad y confort. Equipo audiovisual y servicio de primer nivel.</p>',
                'image' => null,
                'pdf_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Torneo de Golf Anual',
                'slug' => 'torneo-de-golf-anual',
                'category' => 'Torneo',
                'description' => '<p>Únete a nuestro torneo de golf más esperado del año. Disfruta de una jornada deportiva en nuestro campo de 9 hoyos.</p>',
                'image' => null,
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
