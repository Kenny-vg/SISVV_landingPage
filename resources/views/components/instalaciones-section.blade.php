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
            <h2>Espacios del<br><span>Club.</span></h2>
            <p>
                Cada rincón de Vista Verde ha sido diseñado para ofrecerte una experiencia de exclusividad y confort sin igual, desde la Casa Club hasta nuestro Spa de bienestar.
            </p>
        </div>
        <a href="{{ url('/instalaciones') }}" class="btn-gold" style="text-decoration: none; display: inline-block; white-space: nowrap;">
            Ver Todas
        </a>
    </div>

    <!-- Grid 2×2 de Lugares -->
    <div class="instalaciones-grid">

        @forelse($facilities as $facility)
        <a href="{{ url('/instalaciones/'.$facility->slug) }}" class="bento-fullbleed">
            <img src="{{ asset($facility->images->first()?->image_path ?? 'images/hero.jpg') }}" alt="{{ $facility->title }}" class="bento-fullbleed-img">
            <div class="bento-fullbleed-overlay"></div>
            <div class="bento-fullbleed-content">
                <span class="bento-fullbleed-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                <div class="bento-fullbleed-bottom">
                    <h3 class="bento-fullbleed-title">{{ $facility->title }}</h3>
                    <p class="bento-fullbleed-desc">{{ $facility->description }}</p>
                    <span class="bento-fullbleed-link">Conocer más &rarr;</span>
                </div>
            </div>
        </a>
        @empty
        <p style="color: var(--color-text-secondary); grid-column: 1 / -1; text-align: center; padding: 2rem;">No hay espacios disponibles actualmente.</p>
        @endforelse

    </div>

</section>
