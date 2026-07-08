@php
    if (!isset($events)) {
        $events = \App\Models\Event::where('is_published', true)->orderBy('created_at', 'desc')->take(6)->get();
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
                    <!-- Badge de categoría -->
                    @if($event->category)
                    <span class="event-date-badge" style="background:rgba(193,201,77,0.25);border-color:var(--color-accent-gold);">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 12px; height: 12px; flex-shrink: 0;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        {{ $event->category }}
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
