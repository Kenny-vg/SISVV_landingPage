@php
    if (!isset($disciplines)) {
        $disciplines = \App\Models\Discipline::where('is_published', true)->orderBy('sort_order')->get();
    }
@endphp
<!-- resources/views/components/facilities-section.blade.php -->
<section class="premium-section bg-obsidian fade-in-section" id="clases">

    <!-- Encabezado con botones de navegación del carrusel -->
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem; flex-wrap: wrap; gap: 2rem;">
        <div class="section-header-editorial" style="margin-bottom: 0; max-width: 700px;">
            <h2>Clases &<br><span>Disciplinas.</span></h2>
            <p>
                Instructores certificados, metodología de élite y espacios de primer nivel para elevar tu rendimiento y bienestar en cada sesión.
            </p>
        </div>

        <!-- Flechas de navegación para desktop -->
        <div style="display: flex; gap: 1rem; margin-bottom: 1.5rem;">
            <button class="facilities-carousel-btn" id="fac-prev-btn" onclick="scrollCarousel(-1)" aria-label="Anterior" title="Anterior">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button class="facilities-carousel-btn" id="fac-next-btn" onclick="scrollCarousel(1)" aria-label="Siguiente" title="Siguiente">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Carousel -->
    <div class="facilities-carousel-wrapper" id="wrapper-deportivo" style="display: block;">
        <div class="facilities-carousel-track" id="track-deportivo">

            @forelse($disciplines as $discipline)
            <a href="{{ url('/clases/'.$discipline->slug) }}" class="bento-fullbleed">
                <img src="{{ asset($discipline->images->first()?->image_path ?? 'images/hero.jpg') }}" alt="{{ $discipline->title }}" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">{{ $discipline->title }}</h3>
                        <p class="bento-fullbleed-desc">{{ $discipline->description }}</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>
            @empty
            <p style="color: var(--color-text-secondary); padding: 2rem;">No hay disciplinas disponibles actualmente.</p>
            @endforelse

        </div>
    </div>

</section>

<!-- ==========================================
   LÓGICA DEL CARRUSEL E INTERACCIÓN
   ========================================== -->
<script>
    let activeCategory = 'deportivo';

    function scrollCarousel(direction) {
        const track = document.getElementById(`track-${activeCategory}`);
        if (!track) return;

        const scrollAmount = 375 * direction;
        track.scrollBy({ left: scrollAmount, behavior: 'smooth' });

        setTimeout(updateButtonStates, 400);
    }

    function updateButtonStates() {
        const track = document.getElementById(`track-${activeCategory}`);
        if (!track) return;

        const prevBtn = document.getElementById('fac-prev-btn');
        const nextBtn = document.getElementById('fac-next-btn');

        prevBtn.disabled = track.scrollLeft <= 10;
        nextBtn.disabled = (track.scrollLeft + track.clientWidth) >= (track.scrollWidth - 10);
    }

    document.addEventListener('DOMContentLoaded', () => {
        const el = document.getElementById('track-deportivo');
        if (el) {
            el.addEventListener('scroll', () => {
                clearTimeout(el.scrollTimeout);
                el.scrollTimeout = setTimeout(updateButtonStates, 100);
            });
        }

        setTimeout(updateButtonStates, 200);
        window.addEventListener('resize', updateButtonStates);
    });
</script>
