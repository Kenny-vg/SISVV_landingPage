<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/lector', function () {
    return view('lector.index');
});

Route::get('/lector-pdf', function () {
    return view('lector.pdf_viewer');
});

Route::view('/instalaciones', 'instalaciones');

Route::get('/instalaciones/{slug}', function ($slug) {
    $areas = [
        'tenis' => [
            'title' => 'Tenis',
            'category' => 'Deportivo',
            'description' => 'Canchas profesionales de arcilla y superficie dura. Clases individuales y grupales para todos los niveles con entrenadores certificados de la federación.',
            'schedule' => 'Lunes a Domingo: 07:00 AM - 10:00 PM',
            'images' => [
                'https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1622279457486-62dcc4a431d6?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1530541930197-ff16ac917b0e?auto=format&fit=crop&w=1200&q=80'
            ]
        ],
        'padel' => [
            'title' => 'Pádel',
            'category' => 'Deportivo',
            'description' => 'Canchas techadas de cristal templado de última generación con iluminación LED profesional y superficie texturizada antideslizante.',
            'schedule' => 'Lunes a Domingo: 07:00 AM - 10:00 PM',
            'images' => [
                'https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1554068865-24cecd4e34b8?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1592919505780-303950717480?auto=format&fit=crop&w=1200&q=80'
            ]
        ],
        'natacion' => [
            'title' => 'Natación',
            'category' => 'Deportivo',
            'description' => 'Alberca semiolímpica templada a temperatura óptima constante de 28°C. Programas de entrenamiento de alto rendimiento, natación recreativa y aquaerobics.',
            'schedule' => 'Lunes a Sábado: 06:00 AM - 09:00 PM | Domingo: 07:00 AM - 04:00 PM',
            'images' => [
                'https://images.unsplash.com/photo-1519315901367-f34ff9154487?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1600965962102-9d260a71890d?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?auto=format&fit=crop&w=1200&q=80'
            ]
        ],
        'box' => [
            'title' => 'Box',
            'category' => 'Deportivo',
            'description' => 'Ring olímpico profesional, costales de golpeo de cuero, peras de velocidad y todo el equipamiento de protección necesario para entrenamientos de boxeo recreativo y competitivo.',
            'schedule' => 'Lunes a Viernes: 07:00 AM - 09:00 PM | Sábado: 08:00 AM - 02:00 PM',
            'images' => [
                'https://images.unsplash.com/photo-1549719386-74dfcbf7dbed?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1509563268479-0f004cf3f58b?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=1200&q=80'
            ]
        ],
        'taekwondo' => [
            'title' => 'Taekwondo',
            'category' => 'Deportivo',
            'description' => 'Área especialmente acondicionada con tatami de alta absorción de impacto. Clases formativas infantiles y juveniles enfocadas en la disciplina, el respeto y la técnica.',
            'schedule' => 'Martes y Jueves: 04:00 PM - 08:00 PM | Sábado: 09:00 AM - 12:00 PM',
            'images' => [
                'https://images.unsplash.com/photo-1555597673-b21d5c935865?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1509563268479-0f004cf3f58b?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1517649763962-0c623066013b?auto=format&fit=crop&w=1200&q=80'
            ]
        ],
        'zumba' => [
            'title' => 'Zumba',
            'category' => 'Deportivo',
            'description' => 'Sesiones cardiovasculares dinámicas que combinan ritmos latinos e internacionales con coreografías divertidas y enérgicas aptas para todas las edades.',
            'schedule' => 'Lunes a Viernes: 08:00 AM - 10:00 AM y 06:00 PM - 08:00 PM',
            'images' => [
                'https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1524594152303-9fd13543dd6e?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1548690312-e3b507d8c110?auto=format&fit=crop&w=1200&q=80'
            ]
        ],
        'jumping' => [
            'title' => 'Jumping',
            'category' => 'Deportivo',
            'description' => 'Entrenamiento de alta intensidad y bajo impacto articular sobre mini-trampolines individuales, ideal para fortalecer el core y mejorar la resistencia cardiovascular.',
            'schedule' => 'Lunes, Miércoles y Viernes: 08:00 AM - 11:00 AM',
            'images' => [
                'https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1526506118085-60ce8714f8c5?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5?auto=format&fit=crop&w=1200&q=80'
            ]
        ],
        'spinning' => [
            'title' => 'Spinning',
            'category' => 'Deportivo',
            'description' => 'Estudio cerrado con aire acondicionado, bicicletas estáticas de última generación ajustable, audio de alta fidelidad e iluminación ambiental de contraste.',
            'schedule' => 'Lunes a Viernes: 06:30 AM - 10:00 AM y 06:00 PM - 09:00 PM',
            'images' => [
                'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5?auto=format&fit=crop&w=1200&q=80'
            ]
        ],
        'pilates' => [
            'title' => 'Pilates',
            'category' => 'Deportivo',
            'description' => 'Estudio zen equipado con camas de Pilates Reformer profesionales, pelotas, bandas y aros. Sesiones enfocadas en postura, flexibilidad, control mental y respiración.',
            'schedule' => 'Lunes a Sábado: 07:00 AM - 12:00 PM | Lunes a Jueves: 05:00 PM - 08:00 PM',
            'images' => [
                'https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1599447421416-3414500d18a5?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&w=1200&q=80'
            ]
        ],
        'sauna-vapor' => [
            'title' => 'Sauna y vapor',
            'category' => 'Deportivo',
            'description' => 'Área de relajación y bienestar para después del entrenamiento. Cuenta con cabinas de sauna de madera de cedro y cuartos de vapor con esencias de eucalipto.',
            'schedule' => 'Lunes a Domingo: 06:00 AM - 10:00 PM',
            'images' => [
                'https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1596178065887-1198b6148b2b?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1515377905703-c4788e51af15?auto=format&fit=crop&w=1200&q=80'
            ]
        ],
        'gimnasio' => [
            'title' => 'Gimnasio',
            'category' => 'Deportivo',
            'description' => 'Equipamiento premium Life Fitness para rutinas de fuerza, zona de peso libre y máquinas cardiovasculares conectadas a internet (caminadoras, elípticas, escaladoras).',
            'schedule' => 'Lunes a Domingo: 06:00 AM - 10:00 PM',
            'images' => [
                'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5?auto=format&fit=crop&w=1200&q=80'
            ]
        ],
        'casa-club' => [
            'title' => 'Casa Club',
            'category' => 'Social',
            'description' => 'El corazón del club social. Cuenta con vestíbulos con acabados de lujo, salones de descanso acogedores con chimenea, biblioteca y acceso directo a zonas gastronómicas.',
            'schedule' => 'Lunes a Domingo: 08:00 AM - 11:00 PM',
            'images' => [
                'https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1587174486073-ae5e5cff23aa?auto=format&fit=crop&w=1200&q=80'
            ]
        ],
        'spa-bienestar' => [
            'title' => 'Spa & Bienestar',
            'category' => 'Social',
            'description' => 'Santuario de relajación absoluta con terapeutas expertas. Ofrece masajes relajantes, descontracturantes, faciales hidratantes, envolturas de barro y cabina zen de relajación.',
            'schedule' => 'Lunes a Sábado: 09:00 AM - 08:00 PM | Domingo: 09:00 AM - 04:00 PM',
            'images' => [
                'https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1519699047748-de8e457a634e?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1515377905703-c4788e51af15?auto=format&fit=crop&w=1200&q=80'
            ]
        ],
        'terraza-lago' => [
            'title' => 'Terraza del Lago',
            'category' => 'Social',
            'description' => 'Un espacio exterior inigualable con espectaculares atardeceres frente a nuestro lago artificial. Mixología clásica e innovadora, acompañados de aperitivos premium.',
            'schedule' => 'Miércoles a Sábado: 01:00 PM - 12:00 AM | Domingo: 12:00 PM - 07:00 PM',
            'images' => [
                'https://images.unsplash.com/photo-1587174486073-ae5e5cff23aa?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=1200&q=80'
            ]
        ],
        'salon-eventos' => [
            'title' => 'Salón de Eventos',
            'category' => 'Social',
            'description' => 'Magnífico salón con capacidad para eventos corporativos, banquetes y bodas exclusivas. Equipado con sistemas de sonido envolvente Bose, iluminación adaptable y cocina de apoyo.',
            'schedule' => 'Disponible bajo reserva previa en administración.',
            'images' => [
                'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1478812954026-9c750f0e89fc?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1469371670807-013ccf25f16a?auto=format&fit=crop&w=1200&q=80'
            ]
        ]
    ];

    if (!array_key_exists($slug, $areas)) {
        abort(404);
    }

    return view('instalaciones.show', ['area' => $areas[$slug], 'slug' => $slug]);
});

require __DIR__.'/auth.php';
