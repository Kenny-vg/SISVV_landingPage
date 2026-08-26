@php
    if (!isset($disciplines)) {
        $disciplines = \App\Models\Discipline::where('is_published', true)->orderBy('prioridad')->orderBy('created_at', 'desc')->get();
    }
@endphp
<!-- resources/views/components/facilities-section.blade.php -->
<section class="premium-section bg-obsidian fade-in-section" id="clases">

    <!-- Encabezado con botones de navegación del carrusel -->
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem; flex-wrap: wrap; gap: 2rem;">
        <div class="section-header-editorial" style="margin-bottom: 0; max-width: 700px;">
            <x-section-heading :text="setting('facilities_heading', 'Clases &')" :accent="setting('facilities_heading_accent', 'Disciplinas.')" />
            <p>
                {{ setting('facilities_subtext', 'Instructores certificados, metodología de élite y espacios de primer nivel para elevar tu rendimiento y bienestar en cada sesión.') }}
            </p>
        </div>

        <!-- Flechas de navegación para desktop -->
        <div style="display: flex; gap: 1rem; margin-bottom: 1.5rem;">
            <button class="facilities-carousel-btn" id="fac-prev-btn" aria-label="Anterior" title="Anterior">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button class="facilities-carousel-btn" id="fac-next-btn" aria-label="Siguiente" title="Siguiente">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Carousel -->
    <div class="facilities-carousel-wrapper" id="wrapper-deportivo" style="display: block;" data-section-carousel data-track="track-deportivo" data-prev="fac-prev-btn" data-next="fac-next-btn" data-auto="4000">
        <div class="facilities-carousel-track" id="track-deportivo">

            @forelse($disciplines as $discipline)
            <a href="{{ url('/clases/'.$discipline->slug) }}" class="bento-fullbleed">
                <x-responsive-image :path="$discipline->images->first()?->image_path" :alt="$discipline->title" fallback="{{ asset('images/fallback-clases.svg') }}" class="bento-fullbleed-img"/>
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">{{ $discipline->title }}</h3>
                        <p class="bento-fullbleed-desc">{{ Str::limit(strip_tags($discipline->description), 120) }}</p>
                        <span class="bento-fullbleed-link">{{ setting('facilities_link_text', 'Ver Clase →') }}</span>
                    </div>
                </div>
            </a>
            @empty
            <p style="color: var(--color-text-secondary); padding: 2rem;">No hay disciplinas disponibles actualmente.</p>
            @endforelse

        </div>
    </div>

    <!-- Botón Ver todas -->
    <div style="text-align: center; margin-top: 2.5rem;">
        <a href="{{ url('/clases') }}" class="btn-gold" style="text-decoration: none; display: inline-block;">
            {{ setting('facilities_all_link_text', 'Ver todas las clases') }}
        </a>
    </div>

</section>
