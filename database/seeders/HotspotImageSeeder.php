<?php

namespace Database\Seeders;

use App\Models\HotspotImage;
use Illuminate\Database\Seeder;

class HotspotImageSeeder extends Seeder
{
    public function run(): void
    {
        $hotspots = [
            [
                'key' => 'AREA DE JUEGOS',
                'label' => 'ÁREA DE JUEGOS',
                'image_path' => 'hotspots/hotspot-canchas.jpg',
                'left_percent' => 64.50,
                'top_percent' => 30.97,
            ],
            [
                'key' => 'CANCHA DE FUTBOL',
                'label' => 'CANCHA DE FÚTBOL',
                'image_path' => 'hotspots/hotspot-piscina.jpg',
                'left_percent' => 59.00,
                'top_percent' => 24.20,
            ],
            [
                'key' => 'CADDIE HOUSE',
                'label' => 'CADDIE HOUSE',
                'image_path' => 'hotspots/hotspot-clubhouse.jpg',
                'left_percent' => 18.47,
                'top_percent' => 41.58,
            ],
            [
                'key' => 'CANCHAS DE TENIS',
                'label' => 'CANCHAS DE TENIS',
                'image_path' => 'hotspots/hotspot-canchas2.jpg',
                'left_percent' => 31.73,
                'top_percent' => 22.68,
            ],
            [
                'key' => 'CANCHA DE PADEL 1',
                'label' => 'CANCHA DE PADEL',
                'image_path' => 'hotspots/hotspot-padel.jpg',
                'left_percent' => 48.72,
                'top_percent' => 36.85,
            ],
            [
                'key' => 'CANCHA DE PADEL 2',
                'label' => 'CANCHAS DE PADEL',
                'image_path' => 'hotspots/hotspot-padel2.jpg',
                'left_percent' => 14.41,
                'top_percent' => 59.83,
            ],
            [
                'key' => 'RESTAURANTE',
                'label' => 'RESTAURANTE',
                'image_path' => 'hotspots/hotspot-restaurante.jpg',
                'left_percent' => 55.48,
                'top_percent' => 79.27,
            ],
            [
                'key' => 'GIMNASIO',
                'label' => 'GIMNASIO',
                'image_path' => 'hotspots/hotspot-gimnasio.jpg',
                'left_percent' => 68.95,
                'top_percent' => 76.33,
            ],
            [
                'key' => 'PISCINA',
                'label' => 'PISCINA',
                'image_path' => null,
                'left_percent' => 73.09,
                'top_percent' => 45.99,
            ],
            [
                'key' => 'SALÓN',
                'label' => 'SALÓN',
                'image_path' => null,
                'left_percent' => 60.84,
                'top_percent' => 83.85,
            ],
            [
                'key' => 'CAFETERÍA',
                'label' => 'CAFETERÍA',
                'image_path' => null,
                'left_percent' => 54.83,
                'top_percent' => 45.49,
            ],
            [
                'key' => 'BUGA BAR',
                'label' => 'BUGA BAR',
                'image_path' => null,
                'left_percent' => 13.39,
                'top_percent' => 77.18,
            ],
            [
                'key' => 'LOCKERS CABALLEROS',
                'label' => 'LOCKERS CABALLEROS',
                'image_path' => null,
                'left_percent' => 82.41,
                'top_percent' => 78.55,
            ],
            [
                'key' => 'LOCKERS DAMAS',
                'label' => 'LOCKERS DAMAS',
                'image_path' => null,
                'left_percent' => 81.58,
                'top_percent' => 93.06,
            ],
        ];

        foreach ($hotspots as $data) {
            HotspotImage::updateOrCreate(
                ['key' => $data['key']],
                $data
            );
        }
    }
}