@extends('layouts.public')

@section('content')
<div class="clase-detalle-page" style="padding-top: 120px; min-height: 100vh; background-color: var(--color-bg); color: var(--color-text-primary); transition: background-color 0.3s ease;">

    <style>
        @media (max-width: 991px) {
            .detalle-grid-container {
                grid-template-columns: 1fr !important;
                gap: 3rem !important;
            }
            .main-img-wrapper {
                height: 320px !important;
            }
            .editorial-col {
                position: relative !important;
                top: 0 !important;
            }
        }
    </style>

    <div style="max-width: 1200px; margin: 0 auto; padding: 2rem 1.5rem 8rem 1.5rem;">

        <!-- Botón Volver -->
        <a href="{{ url('/clases') }}" style="text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; color: var(--color-accent-gold); font-family: var(--font-alt); font-size: 0.85rem; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 3rem; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateX(-5px)'" onmouseout="this.style.transform='translateX(0)'">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 18px; height: 18px;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Volver a Clases
        </a>

        <!-- Contenedor Asimétrico de 2 Columnas -->
        <div class="detalle-grid-container" style="display: grid; grid-template-columns: 1.2fr 1.8fr; gap: 4rem; align-items: start;">

            <!-- Columna Izquierda: Información Editorial -->
            <div class="editorial-col" style="position: sticky; top: 100px;">
                <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 0.8rem;">
                    Club {{ $area->category ?? 'General' }}
                </span>

                <h1 style="font-family: var(--font-editorial); font-size: clamp(2.5rem, 4vw, 3.5rem); line-height: 1.1; color: var(--color-text-primary); margin-bottom: 2rem;">
                    {{ $area->title }}
                </h1>
                
                <p style="color: var(--color-text-secondary); font-size: 1.05rem; line-height: 1.8; margin-bottom: 3rem;">
                    {{ nl2br(e($area->description)) }}
                </p>

                <!-- Caja de Horario Estilo Premium -->
                <div style="background-color: var(--color-surface); padding: 2rem; border-radius: 12px; display: flex; align-items: flex-start; gap: 1.5rem;">
                    <div style="color: var(--color-accent-gold); margin-top: 0.2rem;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 style="font-family: var(--font-alt); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1.5px; margin: 0 0 0.5rem 0; color: var(--color-text-primary);">
                            Horarios de Clases
                        </h4>
                        <p style="margin: 0; color: var(--color-text-secondary); font-size: 0.95rem; line-height: 1.5;">
                            {{ $area->schedule }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha: Carrusel de imágenes -->
            <div>
                <div class="carousel-container" data-carousel>
                    <div class="carousel-track" data-track>
                        @forelse($area->images as $img)
                            <div class="carousel-slide">
                                <img src="{{ asset('storage/' . $img->image_path) }}" alt="{{ $area->title }}">
                            </div>
                        @empty
                            <div class="carousel-slide">
                                <img src="{{ asset('images/hero.jpg') }}" alt="{{ $area->title }}">
                            </div>
                        @endforelse
                    </div>

                    @if($area->images->count() > 1)
                        <button class="carousel-btn carousel-prev" data-prev>&lsaquo;</button>
                        <button class="carousel-btn carousel-next" data-next>&rsaquo;</button>

                        <div class="carousel-dots" data-dots>
                            @foreach($area->images as $index => $img)
                                <span class="carousel-dot {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}"></span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
