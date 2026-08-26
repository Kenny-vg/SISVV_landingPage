@php
    if (!isset($facilities)) {
        $facilities = \App\Models\Facility::where('is_published', true)->orderBy('sort_order')->get();
    }
@endphp
<!-- resources/views/components/instalaciones-section.blade.php -->
<section class="premium-section bg-obsidian fade-in-section" id="instalaciones">

    <!-- Encabezado -->
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2.5rem; flex-wrap: wrap; gap: 2rem;">
        <div class="section-header-editorial" style="margin-bottom: 0; max-width: 700px;">
            <x-section-heading :text="setting('instalaciones_heading', 'Espacios del')" :accent="setting('instalaciones_heading_accent', 'Club.')" />
            <p>
                {{ setting('instalaciones_subtext', 'Cada rincón de Vista Verde ha sido diseñado para ofrecerte una experiencia de exclusividad y confort sin igual, desde la Casa Club hasta nuestro Spa de bienestar.') }}
            </p>
        </div>
        <div style="display: flex; align-items: center; gap: 1rem;">
            <button class="facilities-carousel-btn" id="inst-prev-btn" aria-label="Anterior">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 20px; height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button class="facilities-carousel-btn" id="inst-next-btn" aria-label="Siguiente">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 20px; height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
            <a href="{{ url('/instalaciones') }}" class="btn-gold" style="text-decoration: none; display: inline-block; white-space: nowrap;">
                {{ setting('instalaciones_btn_text', 'Ver Todas') }}
            </a>
        </div>
    </div>

    <!-- Carrusel de espacios -->
    <div class="facilities-carousel-wrapper" id="inst-carousel-wrapper" data-section-carousel data-track="inst-carousel-track" data-prev="inst-prev-btn" data-next="inst-next-btn" data-auto="5000">
        <div class="facilities-carousel-track" id="inst-carousel-track">

            @forelse($facilities as $facility)
            <a href="{{ url('/instalaciones/'.$facility->slug) }}" class="bento-fullbleed">
                @if($facility->panorama_path)
                <span style="position:absolute;top:1rem;right:1rem;z-index:3;background:rgba(0,0,0,0.7);color:var(--color-accent-gold);padding:0.25rem 0.6rem;border-radius:6px;font-size:0.7rem;font-weight:700;font-family:var(--font-alt);letter-spacing:1px;backdrop-filter:blur(4px);">360°</span>
                @endif
                <x-responsive-image :path="$facility->images->first()?->image_path" :alt="$facility->title" fallback="{{ asset('images/fallback-instalaciones.svg') }}" class="bento-fullbleed-img"/>
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">{{ $facility->title }}</h3>
                        <p class="bento-fullbleed-desc">{{ Str::limit(strip_tags($facility->description), 120) }}</p>
                        <span class="bento-fullbleed-link">{{ setting('instalaciones_link_text', 'Conocer más →') }}</span>
                    </div>
                </div>
            </a>
            @empty
            <p style="color: var(--color-text-secondary); text-align: center; padding: 2rem 0; width: 100%;">No hay espacios disponibles actualmente.</p>
            @endforelse

        </div>
    </div>

</section>
