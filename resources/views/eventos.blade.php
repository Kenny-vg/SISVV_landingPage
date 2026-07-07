@extends('layouts.public')

@section('title', 'Eventos — Vista Verde Country Club')
@section('meta_description', 'Descubre todos los eventos, torneos y celebraciones del Club Vista Verde. Vive experiencias únicas.')

@section('content')
<div class="eventos-page" style="padding-top: 120px; min-height: 100vh; background-color: var(--color-bg); color: var(--color-text-primary); transition: background-color 0.3s ease;">

    <!-- Encabezado de página -->
    <header style="max-width: 1200px; margin: 0 auto 5rem auto; padding: 0 1.5rem;">
        <span style="font-family: var(--font-alt); font-size: 0.8rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Club Vista Verde</span>
        <h1 class="section-header-editorial" style="font-size: clamp(2.8rem, 6vw, 4.5rem); line-height: 1.1; margin-bottom: 1.5rem; max-width: none;">
            Todos los<br><span>Eventos.</span>
        </h1>
        <p style="color: var(--color-text-secondary); max-width: 650px; font-size: 1.05rem; line-height: 1.7;">
            Actividades exclusivas, torneos y celebraciones diseñadas para enriquecer tu experiencia como socio del club.
        </p>
    </header>

    <!-- Grid de eventos (bento-fullbleed como Clases) -->
    <section style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem 7rem 1.5rem;">

        @if($events->isEmpty())
            <div style="text-align: center; padding: 5rem 2rem; color: var(--color-text-secondary);">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 64px; height: 64px; margin: 0 auto 1.5rem; opacity: 0.3; display: block;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p style="font-size: 1.1rem;">No hay eventos publicados actualmente.</p>
                <p style="font-size: 0.9rem; margin-top: 0.5rem; opacity: 0.7;">Vuelve pronto para ver las próximas actividades del club.</p>
            </div>
        @else
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">
                @foreach($events as $event)
                <a href="{{ route('eventos.show', $event->slug) }}" class="bento-fullbleed">

                    <img src="{{ $event->image ? asset('storage/' . $event->image) : asset('images/hero.jpg') }}" alt="{{ $event->title }}" class="bento-fullbleed-img">
                    <div class="bento-fullbleed-overlay"></div>
                    <div class="bento-fullbleed-content">
                        @if($event->category)
                        <span class="event-date-badge" style="background:rgba(193,201,77,0.25);border-color:var(--color-accent-gold);">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 12px; height: 12px; flex-shrink: 0;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            {{ $event->category }}
                        </span>
                        @endif
                        <div class="bento-fullbleed-bottom">
                            @if($event->location)
                            <span style="font-family: var(--font-alt); font-size: 0.65rem; letter-spacing: 1.5px; color: rgba(255,255,255,0.55); text-transform: uppercase; margin-bottom: 0.3rem; display: flex; align-items: center; gap: 0.35rem;">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 11px; height: 11px; flex-shrink: 0;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                {{ $event->location }}
                            </span>
                            @endif
                            <h3 class="bento-fullbleed-title">{{ $event->title }}</h3>
                            @if($event->description)
                            <p class="bento-fullbleed-desc">{{ Str::limit(strip_tags($event->description), 90) }}</p>
                            @endif
                            <span class="bento-fullbleed-link">
                                @if($event->pdf_path)
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 12px; height: 12px; margin-right: 0.3rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                @endif
                                Ver información &rarr;
                            </span>
                        </div>
                    </div>

                </a>
                @endforeach
            </div>
        @endif

    </section>
</div>
@endsection
