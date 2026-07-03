@php
    if (!isset($pageSections)) {
        $pageSections = \App\Models\PageSection::where('is_active', true)->get()->keyBy('key');
    }
    $menuSection = $pageSections['menu_intro'] ?? null;
@endphp
<section class="premium-section bg-obsidian fade-in-section" id="gastronomia">
    <div class="gastronomy-asymmetric">
        <div class="gastronomy-media-wrapper">
            <img src="{{ $menuSection?->image ? asset($menuSection->image) : 'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=800&q=80' }}" alt="Plato gourmet VistaVerde" class="gastronomy-main-img">
            <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=500&q=80" alt="Ingredientes gastronómicos frescos" class="gastronomy-float-img">
        </div>

        <div class="gastronomy-content-wrapper">
            <div class="section-header-editorial" style="margin-bottom: 0;">
                <h2><br><span>{{ $menuSection?->title ?? 'Alta cocina en cada detalle.' }}</span></h2>
                <p style="margin-bottom: 2rem;">
                    {{ $menuSection?->content ?? 'Descubre nuestra propuesta gastronómica de temporada, curada por chefs de renombre y diseñada para acompañar tus tardes en el club. Disfruta de un maridaje exclusivo en la terraza frente al lago o en la comodidad del salón privado.' }}
                </p>
                <a href="{{ url('/lector') }}" class="btn-gold" style="text-decoration: none; display: inline-block;">
                    Ver Carta Interactiva
                </a>
            </div>
        </div>
    </div>
</section>