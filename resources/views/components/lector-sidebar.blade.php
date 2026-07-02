@props([
    'categories' => []
])

<aside class="lector-sidebar">
    <h1 class="lector-title">La Carta</h1>
    <p class="lector-subtitle">VistaVerde Club</p>

    <!-- Buscador Minimalista -->
    <div class="lector-search-wrapper">
        <svg class="lector-search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
        <input type="text" id="lector-search" class="lector-search-input" placeholder="Buscar plato o ingrediente...">
    </div>

    <!-- Filtros de Dieta / Alérgenos -->
    <div class="lector-filters-section">
        <h4 class="lector-filter-title">Preferencias</h4>
        <div class="lector-filters-list">
            <button class="lector-filter-btn" data-filter="all">Todos</button>
            <button class="lector-filter-btn" data-filter="vegan">Vegano</button>
            <button class="lector-filter-btn" data-filter="gf">Sin Gluten</button>
            <button class="lector-filter-btn" data-filter="special">Especiales</button>
        </div>
    </div>

    <!-- Índice de Navegación -->
    <div class="lector-filters-section">
        <h4 class="lector-filter-title">Categorías</h4>
        <ul class="lector-menu-list">
            @foreach($categories as $id => $name)
                <li class="lector-menu-item">
                    <a href="#{{ $id }}" class="lector-menu-link" data-target="{{ $id }}">
                        <span>{{ $name }}</span>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Controles de Legibilidad -->
    <div class="lector-filters-section" style="margin-top: 3rem;">
        <h4 class="lector-filter-title">Tamaño de Texto</h4>
        <div class="lector-filters-list" style="gap: 0.25rem;">
            <button class="lector-filter-btn btn-text-size" data-size="sm" style="padding: 0.4rem 0.8rem; font-size: 0.75rem;">A-</button>
            <button class="lector-filter-btn btn-text-size active" data-size="md" style="padding: 0.4rem 0.8rem; font-size: 0.85rem;">Normal</button>
            <button class="lector-filter-btn btn-text-size" data-size="lg" style="padding: 0.4rem 0.8rem; font-size: 0.95rem;">A+</button>
        </div>
    </div>
</aside>
