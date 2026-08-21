@php
    if (!isset($pageSections)) {
        $pageSections = \App\Models\PageSection::where('is_active', true)->get()->keyBy('key');
    }
    $menuSection = $pageSections['menu_intro'] ?? null;
@endphp
<section class="premium-section bg-obsidian fade-in-section" id="gastronomia">
    <div class="gastronomy-asymmetric">
        <div class="gastronomy-media-wrapper">
            <x-responsive-image :path="$menuSection?->image" alt="Plato gourmet VistaVerde" fallback="{{ asset('images/fallback-gastronomia.svg') }}" class="gastronomy-main-img"/>
            <x-responsive-image :path="$menuSection?->image_float" alt="Ingredientes gastronómicos frescos" fallback="{{ asset('images/fallback-gastronomia.svg') }}" class="gastronomy-float-img"/>
        </div>

        <div class="gastronomy-content-wrapper">
            <div class="section-header-editorial" style="margin-bottom: 0;">
                <h2><br><span>{{ $menuSection?->title ?? 'Alta cocina en cada detalle.' }}</span></h2>
                <p style="margin-bottom: 2rem;">
                    {!! $menuSection?->content !!}
                </p>
                <a href="{{ url('/lector') }}" class="btn-gold" style="text-decoration: none; display: inline-block;">
                    {{ setting('menu_btn_text', 'Ver Carta Interactiva') }}
                </a>
            </div>
        </div>
    </div>
</section>