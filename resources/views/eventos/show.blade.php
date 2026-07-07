@extends('layouts.public')

@section('title', $event->title . ' — Vista Verde Country Club')
@section('meta_description', Str::limit(strip_tags($event->description ?? ''), 160))

@section('content')
<div class="evento-detalle-page" style="padding-top: 120px; min-height: 100vh; background-color: var(--color-bg); color: var(--color-text-primary); transition: background-color 0.3s ease;">

    <style>
        @media (max-width: 991px) {
            .evento-detalle-grid {
                grid-template-columns: 1fr !important;
                gap: 3rem !important;
            }
            .evento-sticky-col {
                position: relative !important;
                top: 0 !important;
            }
            .evento-hero-img-wrap {
                height: 300px !important;
            }
        }
    </style>

    <div style="max-width: 1200px; margin: 0 auto; padding: 2rem 1.5rem 8rem 1.5rem;">

        <!-- Botón Volver -->
        <a href="{{ route('eventos.index') }}" style="text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; color: var(--color-accent-gold); font-family: var(--font-alt); font-size: 0.85rem; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 3rem; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateX(-5px)'" onmouseout="this.style.transform='translateX(0)'">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 18px; height: 18px;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Volver a Eventos
        </a>

        <!-- Grid asimétrico -->
        <div class="evento-detalle-grid" style="display: grid; grid-template-columns: 1fr 1.6fr; gap: 4.5rem; align-items: start;">

            <!-- ===== Columna Izquierda: info editorial ===== -->
            <div class="evento-sticky-col" style="position: sticky; top: 100px;">

                <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 0.8rem;">Evento</span>

                <h1 style="font-family: var(--font-editorial); font-size: clamp(2rem, 4vw, 3.2rem); line-height: 1.1; color: var(--color-text-primary); margin-bottom: 2.5rem;">
                    {{ $event->title }}
                </h1>

                <!-- Ficha de detalles -->
                <div style="display: flex; flex-direction: column; gap: 1.2rem; margin-bottom: 3rem;">

                    <!-- Fecha -->
                    <div style="display: flex; align-items: flex-start; gap: 1.2rem; background-color: var(--color-surface); padding: 1.4rem 1.8rem; border-radius: 12px;">
                        <div style="color: var(--color-accent-gold); margin-top: 0.15rem; flex-shrink: 0;">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 22px; height: 22px;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 style="font-family: var(--font-alt); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1.5px; margin: 0 0 0.35rem 0; color: var(--color-text-primary);">Fecha y hora</h4>
                            <p style="margin: 0; color: var(--color-text-secondary); font-size: 1rem; line-height: 1.4;">
                                {{ $event->event_date->translatedFormat('l, d \d\e F \d\e Y') }}<br>
                                <span style="font-size: 0.9rem; opacity: 0.8;">{{ $event->event_date->format('H:i') }} hrs</span>
                            </p>
                        </div>
                    </div>

                    <!-- Ubicación -->
                    @if($event->location)
                    <div style="display: flex; align-items: flex-start; gap: 1.2rem; background-color: var(--color-surface); padding: 1.4rem 1.8rem; border-radius: 12px;">
                        <div style="color: var(--color-accent-gold); margin-top: 0.15rem; flex-shrink: 0;">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 22px; height: 22px;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 style="font-family: var(--font-alt); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1.5px; margin: 0 0 0.35rem 0; color: var(--color-text-primary);">Lugar</h4>
                            <p style="margin: 0; color: var(--color-text-secondary); font-size: 1rem; line-height: 1.4;">{{ $event->location }}</p>
                        </div>
                    </div>
                    @endif

                </div>

                <!-- Botón de regresar a eventos -->
                <a href="{{ route('eventos.index') }}" class="btn-gold" style="text-decoration: none; display: inline-block; font-size: 0.82rem;">
                    Ver todos los eventos
                </a>

            </div>

            <!-- ===== Columna Derecha: imagen + descripción ===== -->
            <div>

                <!-- Imagen del evento -->
                <div class="evento-hero-img-wrap" style="width: 100%; height: 480px; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 25px rgba(0,0,0,0.08); margin-bottom: 3rem; position: relative; background-color: var(--color-surface);">
                    <img
                        src="{{ $event->image ? asset('storage/' . $event->image) : asset('images/hero.jpg') }}"
                        alt="{{ $event->title }}"
                        style="width: 100%; height: 100%; object-fit: cover;"
                    >
                </div>

                <!-- Descripción completa (rich text) -->
                @if($event->description)
                <div class="evento-rich-content">
                    {!! $event->description !!}
                </div>
                @endif

            </div>

        </div>
    </div>
</div>
@endsection
