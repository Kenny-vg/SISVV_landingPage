@php
    if (!isset($events)) {
        $events = \App\Models\Event::where('is_published', true)->orderBy('event_date', 'desc')->take(6)->get();
    }
@endphp

{{-- resources/views/components/events-section.blade.php --}}
<section class="premium-section events-home-section fade-in-section" id="eventos">

    <!-- Encabezado con botones de navegación -->
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem; flex-wrap: wrap; gap: 2rem;">
        <div class="section-header-editorial" style="margin-bottom: 0; max-width: 700px;">
            <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 0.8rem;">{{ setting('events_label', 'Club Vista Verde') }}</span>
            <h2>{!! setting('events_heading', 'Eventos &<br><span>Próximas fechas.</span>') !!}</h2>
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
    <div class="facilities-carousel-wrapper" id="events-carousel-wrapper">
        <div class="facilities-carousel-track" id="events-carousel-track">

            @forelse($events as $event)
            <a href="{{ route('eventos.show', $event->slug) }}" class="bento-fullbleed event-card-item">
                <img
                    src="{{ $event->image ? asset('storage/' . $event->image) : asset('images/hero.jpg') }}"
                    alt="{{ $event->title }}"
                    class="bento-fullbleed-img"
                >
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <!-- Badge de fecha -->
                    <span class="event-date-badge">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 12px; height: 12px; flex-shrink: 0;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ $event->event_date->translatedFormat('d M Y') }}
                    </span>

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
                        <span class="bento-fullbleed-link">{!! setting('events_link_text', 'Ver evento →') !!}</span>
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

<script>
(function () {
    const TRACK_ID      = 'events-carousel-track';
    const WRAPPER_ID    = 'events-carousel-wrapper';
    const PREV_BTN_ID   = 'evt-prev-btn';
    const NEXT_BTN_ID   = 'evt-next-btn';
    const AUTO_INTERVAL = 4500;
    const SCROLL_AMOUNT = 360;

    let evtAutoTimer = null;
    let isPaused = false;

    function scrollEventsCarousel(direction) {
        const track = document.getElementById(TRACK_ID);
        if (!track) return;

        const maxScroll = track.scrollWidth - track.clientWidth;

        if (direction > 0 && track.scrollLeft >= maxScroll - 10) {
            track.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            track.scrollBy({ left: SCROLL_AMOUNT * direction, behavior: 'smooth' });
        }

        setTimeout(updateEvtBtns, 400);
    }

    window.scrollEventsCarousel = scrollEventsCarousel;

    function updateEvtBtns() {
        const track   = document.getElementById(TRACK_ID);
        const prevBtn = document.getElementById(PREV_BTN_ID);
        const nextBtn = document.getElementById(NEXT_BTN_ID);
        if (!track || !prevBtn || !nextBtn) return;

        prevBtn.disabled = track.scrollLeft <= 10;
        nextBtn.disabled = track.scrollLeft >= track.scrollWidth - track.clientWidth - 10;
    }

    function startEventsAutoScroll() {
        if (evtAutoTimer) clearInterval(evtAutoTimer);
        evtAutoTimer = setInterval(function () {
            if (!isPaused) scrollEventsCarousel(1);
        }, AUTO_INTERVAL);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const prevBtn = document.getElementById(PREV_BTN_ID);
        const nextBtn = document.getElementById(NEXT_BTN_ID);
        if (prevBtn) prevBtn.addEventListener('click', function () { scrollEventsCarousel(-1); });
        if (nextBtn) nextBtn.addEventListener('click', function () { scrollEventsCarousel(1); });

        const track   = document.getElementById(TRACK_ID);
        const wrapper = document.getElementById(WRAPPER_ID);
        if (!track) return;

        track.addEventListener('scroll', function () {
            clearTimeout(track._scrollTimeout);
            track._scrollTimeout = setTimeout(updateEvtBtns, 100);
        });

        wrapper.addEventListener('mouseenter',  function () { isPaused = true;  });
        wrapper.addEventListener('mouseleave',  function () { isPaused = false; });
        wrapper.addEventListener('touchstart',  function () { isPaused = true;  }, { passive: true });
        wrapper.addEventListener('touchend',    function () { isPaused = false; }, { passive: true });

        updateEvtBtns();
        startEventsAutoScroll();
        window.addEventListener('resize', updateEvtBtns);
    });
})();
</script>
