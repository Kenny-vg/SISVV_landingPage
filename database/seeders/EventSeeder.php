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
                'title' => 'Torneo de Golf Anual',
                'slug' => 'torneo-de-golf-anual',
                'event_date' => now()->addDays(30),
                'location' => 'Campo de Golf SISVV',
                'description' => '<p>Únete a nuestro torneo de golf más esperado del año. Disfruta de una jornada deportiva en nuestro campo de 18 hoyos, seguida de una cena de gala en la Casa Club. Categorías: individual y por equipos. Premios para los tres primeros lugares.</p>',
                'image' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Noche de Catas y Vinos',
                'slug' => 'noche-de-catas-y-vinos',
                'event_date' => now()->addDays(15),
                'location' => 'Restaurante SISVV',
                'description' => '<p>Una velada exclusiva para los amantes del buen vino. Degustación guiada de 6 etiquetas premium maridadas con tapas gourmet preparadas por nuestro chef ejecutivo. Cupo limitado a 30 personas.</p>',
                'image' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Clase Magistral de Tenis',
                'slug' => 'clase-magistral-de-tenis',
                'event_date' => now()->addDays(45),
                'location' => 'Canchas de Tenis SISVV',
                'description' => '<p>Clínica intensiva dirigida por nuestro entrenador certificado. Ideal para niveles intermedios y avanzados. Se cubrirán técnicas de saque, volea y estrategia de juego. Incluye práctica en cancha y análisis de video.</p>',
                'image' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Retiro de Bienestar y Spa',
                'slug' => 'retiro-de-bienestar-y-spa',
                'event_date' => now()->addDays(60),
                'location' => 'Spa de Bienestar SISVV',
                'description' => '<p>Día completo de relajación y renovación. Incluye: sesión de yoga al amanecer, masaje terapéutico de 60 minutos, temazcal tradicional, acceso a sauna y vapor, y almuerzo saludable preparado por nuestro chef.</p>',
                'image' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Fiesta de Fin de Año',
                'slug' => 'fiesta-de-fin-de-ano',
                'event_date' => now()->addMonths(6),
                'location' => 'Casa Club SISVV',
                'description' => '<p>Despide el año con estilo en nuestra espectacular fiesta de gala. Cena de 5 tiempos, barra libre, música en vivo con banda y DJ, y un espectacular show de fuegos artificiales a la medianoche. Código de vestimenta: etiqueta formal.</p>',
                'image' => null,
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
