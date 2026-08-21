@php
    if (!isset($events)) {
        $events = \App\Models\Event::where('is_published', true)->orderBy('prioridad')->orderBy('created_at', 'desc')->take(6)->get();
    }
@endphp

{{-- resources/views/components/events-section.blade.php --}}
<section class="premium-section events-home-section fade-in-section" id="eventos">

    <!-- Encabezado con botones de navegación -->
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem; flex-wrap: wrap; gap: 2rem;">
        <div class="section-header-editorial" style="margin-bottom: 0; max-width: 700px;">
            <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 0.8rem;">{{ setting('events_label', 'Club Vista Verde') }}</span>
            <h2>{!! setting('events_heading', 'Eventos &<br><span>Tipos de evento.</span>') !!}</h2>
            <p>
                {{ setting('events_subtext', 'Actividades exclusivas, torneos y celebraciones diseñadas para la comunidad del club. Vive experiencias únicas junto a los tuyos.') }}
            </p>
        </div>

        <!-- Flechas de navegación (IDs únicos para no colisionar con el carrusel de clases) -->
        <div style="display: flex; gap: 1rem; margin-bottom: 1.5rem;">
            <button class="facilities-carousel-btn" id="evt-prev-btn" aria-label="Evento anterior" title="Anterior">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button class="facilities-carousel-btn" id="evt-next-btn" aria-label="Evento siguiente" title="Siguiente">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Carrusel de eventos -->
    <div class="facilities-carousel-wrapper" id="events-carousel-wrapper" data-section-carousel data-track="events-carousel-track" data-prev="evt-prev-btn" data-next="evt-next-btn" data-auto="4500">
        <div class="facilities-carousel-track" id="events-carousel-track">

            @forelse($events as $event)
            <a href="{{ route('eventos.show', $event->slug) }}" class="bento-fullbleed event-card-item">
                <x-responsive-image
                    :path="$event->image"
                    :alt="$event->title"
                    fallback="{{ asset('images/fallback-eventos.svg') }}"
                    class="bento-fullbleed-img"
                />
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <!-- Badge de fecha o categoría -->
                    @if($event->date || $event->category)
                    <span class="event-date-badge" style="background:rgba(193,201,77,0.25);border-color:var(--color-accent-gold);">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 12px; height: 12px; flex-shrink: 0;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        {{ $event->date ? \Carbon\Carbon::parse($event->date)->locale('es')->isoFormat('D MMM YYYY') : $event->category }}
                    </span>
                    @endif

                    <div class="bento-fullbleed-bottom">
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
            @empty
            <p style="color: var(--color-text-secondary); padding: 2rem;">No hay eventos publicados actualmente.</p>
            @endforelse

        </div>
    </div>

    <!-- Botón Ver todos -->
    <div style="text-align: center; margin-top: 2.5rem;">
        <a href="{{ route('eventos.index') }}" class="btn-gold" style="text-decoration: none; display: inline-block;">
            {{ setting('events_all_link_text', 'Ver todos los eventos') }}
        </a>
    </div>

</section>
