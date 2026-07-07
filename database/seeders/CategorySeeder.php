<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Desayunos & Brunch',
                'slug' => 'desayunos',
                'description' => 'Comience el día con una selección de repostería artesanal, platillos tradicionales, frutas de temporada y jugos naturales prensados.',
                'schedule' => '08:00 AM - 12:30 PM',
                'is_visible' => true,
            ],
            [
                'name' => 'Comidas',
                'slug' => 'comida',
                'description' => 'Una propuesta de cortes premium, ensaladas frescas y platillos de mar ideales para disfrutar en nuestra terraza frente al lago.',
                'schedule' => '01:00 PM - 06:00 PM',
                'is_visible' => true,
            ],
            [
                'name' => 'Cenas',
                'slug' => 'cena',
                'description' => 'Una experiencia de alta cocina y gastronomía de autor maridada con una selecta colección de vinos nacionales e internacionales.',
                'schedule' => '07:00 PM - 11:00 PM',
                'is_visible' => true,
            ],
            [
                'name' => 'Café & Coctelería',
                'slug' => 'cafe',
                'description' => 'Disfrute de nuestra barra de cafés de especialidad, mixología de autor y repostería gourmet en un ambiente de total privacidad.',
                'schedule' => 'Todo el día',
                'is_visible' => true,
            ],
        ];

        foreach ($categories as $data) {
            Category::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
