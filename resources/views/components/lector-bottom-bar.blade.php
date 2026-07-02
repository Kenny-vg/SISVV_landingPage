@props([
    'categories' => []
])

<!-- Bottom Bar Fija (Sólo móvil mediante CSS) -->
<div class="lector-bottom-bar">
    <!-- Botón Menú / Categorías -->
    <button class="lector-bar-btn" id="btn-mobile-menu">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <span>Carta</span>
    </button>

    <!-- Botón Buscar/Filtros -->
    <button class="lector-bar-btn" id="btn-mobile-filters">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
        </svg>
        <span>Filtros</span>
    </button>

    <!-- Botón Tamaño Texto (Ciclo directo: Normal -> Grande -> Pequeño) -->
    <button class="lector-bar-btn" id="btn-mobile-text-size">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
        <span>Texto</span>
    </button>
</div>

<!-- Backdrop del Drawer -->
<div class="lector-drawer-backdrop" id="lector-backdrop"></div>

<!-- Bottom Drawer (Cajón inferior) para el Índice -->
<div class="lector-drawer" id="lector-drawer-menu">
    <div class="lector-drawer-handle"></div>
    <div class="lector-drawer-content">
        <h3 class="lector-drawer-title">Categorías</h3>
        <ul class="lector-menu-list">
            @foreach($categories as $id => $name)
                <li class="lector-menu-item">
                    <a href="#{{ $id }}" class="lector-menu-link mobile-drawer-link" data-target="{{ $id }}">
                        <span>{{ $name }}</span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<!-- Bottom Drawer para Filtros y Búsqueda -->
<div class="lector-drawer" id="lector-drawer-filters">
    <div class="lector-drawer-handle"></div>
    <div class="lector-drawer-content">
        <h3 class="lector-drawer-title">Filtros y Búsqueda</h3>
        
        <!-- Buscador móvil -->
        <div class="lector-search-wrapper">
            <svg class="lector-search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input type="text" id="lector-search-mobile" class="lector-search-input" placeholder="Buscar plato o ingrediente...">
        </div>

        <div class="lector-filters-section">
            <h4 class="lector-filter-title">Dietas y Preferencias</h4>
            <div class="lector-filters-list">
                <button class="lector-filter-btn lector-filter-btn-mobile" data-filter="all">Todos</button>
                <button class="lector-filter-btn lector-filter-btn-mobile" data-filter="vegan">Vegano</button>
                <button class="lector-filter-btn lector-filter-btn-mobile" data-filter="gf">Sin Gluten</button>
                <button class="lector-filter-btn lector-filter-btn-mobile" data-filter="special">Especiales</button>
            </div>
        </div>
    </div>
</div>
