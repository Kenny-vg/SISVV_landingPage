@extends('layouts.public')

@section('content')
@php
    $categories = [
        'entradas' => 'Entradas',
        'fuertes' => 'Platos Fuertes',
        'postres' => 'Postres & Dulces',
        'vinos' => 'Cava & Coctelería'
    ];

    $items = [
        'entradas' => [
            [
                'title' => 'Carpaccio de Alcachofa & Trufa',
                'price' => '18',
                'desc' => 'Láminas finas de alcachofa local, trufa negra fresca, piñones tostados y emulsión de limón meyer.',
                'tags' => ['vegan', 'gf']
            ],
            [
                'title' => 'Flores de Calabacín Tempura',
                'price' => '16',
                'desc' => 'Rellenas de queso ricotta de oveja y miel de bosque local con un toque de lavanda silvestre.',
                'tags' => ['special']
            ],
            [
                'title' => 'Tiradito de Lubina Salvaje',
                'price' => '22',
                'desc' => 'Cortado fino con leche de tigre de maracuyá, aguacate braseado al soplete y cilantro silvestre.',
                'tags' => ['gf']
            ]
        ],
        'fuertes' => [
            [
                'title' => 'Filete de Res al Carbón de Encina',
                'price' => '36',
                'desc' => 'Corte de res premium nacional con puré de chirivía ahumado, espárragos de mar y reducción de vino Oporto.',
                'tags' => ['gf', 'special']
            ],
            [
                'title' => 'Salmón Glaseado con Miso & Eucalipto',
                'price' => '29',
                'desc' => 'Acompañado de quinoa orgánica con hierbas de nuestro huerto y vegetales baby glaseados.',
                'tags' => ['gf']
            ],
            [
                'title' => 'Gnocchi de Ricotta & Salvia del Huerto',
                'price' => '24',
                'desc' => 'Salteados con mantequilla avellanada, piñones tostados y lascas de queso parmesano reggiano de 24 meses.',
                'tags' => ['special']
            ]
        ],
        'postres' => [
            [
                'title' => 'Cremoso de Chocolate y Sal de Colima',
                'price' => '12',
                'desc' => 'Chocolate artesanal al 70%, aceite de oliva virgen extra orgánico de la casa y escamas de sal marina.',
                'tags' => ['gf', 'vegan']
            ],
            [
                'title' => 'Milhojas de Vainilla de Papantla',
                'price' => '14',
                'desc' => 'Hojaldre crujiente invertido con crema diplomática de vainilla natural y compota de frutos rojos del bosque.',
                'tags' => ['special']
            ]
        ],
        'vinos' => [
            [
                'title' => 'Verde Enebro (Cocktail de Autor)',
                'price' => '15',
                'desc' => 'Gin artesanal infusionado con eucalipto, pepino macerado, tónica premium y gotas de limón verde fresco.',
                'tags' => ['vegan', 'gf']
            ],
            [
                'title' => 'Chardonnay Reserva del Club',
                'price' => '18',
                'desc' => 'Copa de vino chardonnay de la cava del club con notas de pera madura, mantequilla y un final mineral elegante.',
                'tags' => ['vegan', 'gf']
            ]
        ]
    ];
@endphp

<div class="lector-page text-size-md">
    <div class="lector-container">
        
        <!-- Cabecera Móvil (Solo visible en pantallas pequeñas) -->
        <div class="lector-mobile-header" style="display: none;">
            <h1 class="lector-title" style="text-align: center; font-size: 1.8rem; margin-top: 1rem;">La Carta</h1>
            <p class="lector-subtitle" style="text-align: center; margin-bottom: 1rem; font-size: 0.8rem;">VistaVerde Club</p>
        </div>

        <div class="lector-layout">
            
            <!-- Columna Izquierda (Sidebar - Desktop) -->
            <x-lector-sidebar :categories="$categories" />

            <!-- Columna Derecha (Contenido Principal) -->
            <main class="lector-content">
                @foreach($categories as $id => $name)
                    <section class="lector-section" id="{{ $id }}" data-section="{{ $id }}">
                        <header class="lector-section-header">
                            <h2 class="lector-section-title">{{ $name }}</h2>
                            <p class="lector-section-desc">Selección exclusiva para disfrutar en la casa club o terraza</p>
                        </header>
                        
                        <div class="lector-grid">
                            @foreach($items[$id] as $item)
                                <x-lector-item 
                                    :title="$item['title']" 
                                    :price="$item['price']" 
                                    :desc="$item['desc']" 
                                    :tags="$item['tags']"
                                    :category="$id"
                                />
                            @endforeach
                        </div>
                    </section>
                @endforeach
            </main>

        </div>
    </div>
</div>

<!-- Barra Inferior y Drawers (Móvil) -->
<x-lector-bottom-bar :categories="$categories" />

<!-- Estilo inline para cabecera móvil responsiva rápida en Blade -->
<style>
    @media (max-width: 991px) {
        .lector-mobile-header {
            display: block !important;
        }
        .premium-navbar {
            box-shadow: none !important;
            border-bottom: 1px solid var(--color-lector-border) !important;
            background-color: var(--color-lector-bg) !important;
        }
    }
</style>

<!-- Lógica Interactiva (Vanilla JS) -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Variables de estado
        let activeFilter = 'all';
        let searchQuery = '';
        let currentTextSize = 'md'; // sm, md, lg

        // Selectores DOM
        const pageElement = document.querySelector('.lector-page');
        const items = document.querySelectorAll('.lector-item');
        const sections = document.querySelectorAll('.lector-section');
        
        // Elementos de búsqueda y filtrado (Desktop)
        const searchInput = document.getElementById('lector-search');
        const filterButtons = document.querySelectorAll('.lector-sidebar .lector-filter-btn');
        const sidebarLinks = document.querySelectorAll('.lector-sidebar .lector-menu-link');
        const textSizeButtons = document.querySelectorAll('.btn-text-size');

        // Elementos Móviles
        const btnMobileMenu = document.getElementById('btn-mobile-menu');
        const btnMobileFilters = document.getElementById('btn-mobile-filters');
        const btnMobileTextSize = document.getElementById('btn-mobile-text-size');
        const backdrop = document.getElementById('lector-backdrop');
        const drawerMenu = document.getElementById('lector-drawer-menu');
        const drawerFilters = document.getElementById('lector-drawer-filters');
        const searchInputMobile = document.getElementById('lector-search-mobile');
        const filterButtonsMobile = document.querySelectorAll('.lector-drawer .lector-filter-btn-mobile');
        const drawerLinks = document.querySelectorAll('.mobile-drawer-link');

        // -------------------------------------------------------------
        // FUNCIONES DE BÚSQUEDA Y FILTRADO COMBINADO
        // -------------------------------------------------------------
        function applyFiltersAndSearch() {
            items.forEach(item => {
                const titleAndDesc = item.getAttribute('data-search') || '';
                const tags = JSON.parse(item.getAttribute('data-tags') || '[]');
                
                const matchesSearch = titleAndDesc.includes(searchQuery.toLowerCase());
                const matchesFilter = activeFilter === 'all' || tags.includes(activeFilter);

                if (matchesSearch && matchesFilter) {
                    item.classList.remove('filtered-out');
                } else {
                    item.classList.add('filtered-out');
                }
            });

            // Ocultar secciones vacías tras el filtrado
            sections.forEach(section => {
                const gridItems = section.querySelectorAll('.lector-item');
                const visibleItems = Array.from(gridItems).filter(item => !item.classList.contains('filtered-out'));
                
                if (visibleItems.length === 0) {
                    section.style.display = 'none';
                    // Desactivar el link del índice correspondiente si no hay items
                    updateIndexLinkState(section.getAttribute('id'), false);
                } else {
                    section.style.display = 'block';
                    updateIndexLinkState(section.getAttribute('id'), true);
                }
            });
        }

        function updateIndexLinkState(id, isVisible) {
            const links = document.querySelectorAll(`[data-target="${id}"]`);
            links.forEach(link => {
                if (!isVisible) {
                    link.style.opacity = '0.3';
                    link.style.pointerEvents = 'none';
                } else {
                    link.style.opacity = '1';
                    link.style.pointerEvents = 'auto';
                }
            });
        }

        // -------------------------------------------------------------
        // GESTIÓN DE EVENTOS: BÚSQUEDA
        // -------------------------------------------------------------
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                searchQuery = e.target.value;
                applyFiltersAndSearch();
            });
        }

        if (searchInputMobile) {
            searchInputMobile.addEventListener('input', (e) => {
                searchQuery = e.target.value;
                // Sincronizar el input de desktop si existiera
                if (searchInput) searchInput.value = searchQuery;
                applyFiltersAndSearch();
            });
        }

        // -------------------------------------------------------------
        // GESTIÓN DE EVENTOS: FILTROS (Desktop y Móvil)
        // -------------------------------------------------------------
        function handleFilterClick(btn, list) {
            list.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            activeFilter = btn.getAttribute('data-filter');
            applyFiltersAndSearch();
        }

        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                handleFilterClick(btn, filterButtons);
                // Sincronizar filtros de móvil
                const matchingMobileBtn = document.querySelector(`.lector-filter-btn-mobile[data-filter="${activeFilter}"]`);
                if (matchingMobileBtn) {
                    filterButtonsMobile.forEach(b => b.classList.remove('active'));
                    matchingMobileBtn.classList.add('active');
                }
            });
        });

        filterButtonsMobile.forEach(btn => {
            btn.addEventListener('click', () => {
                handleFilterClick(btn, filterButtonsMobile);
                // Sincronizar filtros de desktop
                const matchingDesktopBtn = document.querySelector(`.lector-sidebar .lector-filter-btn[data-filter="${activeFilter}"]`);
                if (matchingDesktopBtn) {
                    filterButtons.forEach(b => b.classList.remove('active'));
                    matchingDesktopBtn.classList.add('active');
                }
            });
        });

        // Inicializar botón "Todos" activo
        if (filterButtons.length > 0) filterButtons[0].classList.add('active');
        if (filterButtonsMobile.length > 0) filterButtonsMobile[0].classList.add('active');

        // -------------------------------------------------------------
        // GESTIÓN DE EVENTOS: TAMAÑO DE TEXTO (LEGIBILIDAD)
        // -------------------------------------------------------------
        function updateTextSize(size) {
            pageElement.classList.remove('text-size-sm', 'text-size-md', 'text-size-lg');
            pageElement.classList.add(`text-size-${size}`);
            currentTextSize = size;
            
            // Sincronizar botones de escritorio
            textSizeButtons.forEach(b => {
                if (b.getAttribute('data-size') === size) {
                    b.classList.add('active');
                } else {
                    b.classList.remove('active');
                }
            });
        }

        textSizeButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const size = btn.getAttribute('data-size');
                updateTextSize(size);
            });
        });

        // Botón móvil cicla text size
        if (btnMobileTextSize) {
            btnMobileTextSize.addEventListener('click', () => {
                let nextSize = 'md';
                if (currentTextSize === 'md') nextSize = 'lg';
                else if (currentTextSize === 'lg') nextSize = 'sm';
                else nextSize = 'md';
                
                updateTextSize(nextSize);
                
                // Micro-animación visual en el botón
                btnMobileTextSize.classList.add('active');
                setTimeout(() => btnMobileTextSize.classList.remove('active'), 300);
            });
        }

        // -------------------------------------------------------------
        // SCROLLSPY (DETECCIÓN DE SECCIÓN LEÍDA)
        // -------------------------------------------------------------
        const observerOptions = {
            root: null,
            rootMargin: '-20% 0px -60% 0px', // Enfocado en la porción de lectura central
            threshold: 0
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.getAttribute('id');
                    
                    // Activar link en Desktop
                    sidebarLinks.forEach(link => {
                        if (link.getAttribute('data-target') === id) {
                            link.classList.add('active');
                        } else {
                            link.classList.remove('active');
                        }
                    });

                    // Activar link en Móvil Drawer
                    drawerLinks.forEach(link => {
                        if (link.getAttribute('data-target') === id) {
                            link.classList.add('active');
                        } else {
                            link.classList.remove('active');
                        }
                    });
                }
            });
        }, observerOptions);

        sections.forEach(section => observer.observe(section));

        // -------------------------------------------------------------
        // BOTTOM DRAWER (MÓVIL)
        // -------------------------------------------------------------
        function closeAllDrawers() {
            drawerMenu.classList.remove('open');
            drawerFilters.classList.remove('open');
            backdrop.classList.remove('open');
            btnMobileMenu.classList.remove('active');
            btnMobileFilters.classList.remove('active');
        }

        function openDrawer(drawer, button) {
            closeAllDrawers();
            drawer.classList.add('open');
            backdrop.classList.add('open');
            button.classList.add('active');
        }

        if (btnMobileMenu && drawerMenu) {
            btnMobileMenu.addEventListener('click', () => {
                if (drawerMenu.classList.contains('open')) {
                    closeAllDrawers();
                } else {
                    openDrawer(drawerMenu, btnMobileMenu);
                }
            });
        }

        if (btnMobileFilters && drawerFilters) {
            btnMobileFilters.addEventListener('click', () => {
                if (drawerFilters.classList.contains('open')) {
                    closeAllDrawers();
                } else {
                    openDrawer(drawerFilters, btnMobileFilters);
                }
            });
        }

        if (backdrop) {
            backdrop.addEventListener('click', closeAllDrawers);
        }

        // Cerrar drawers cuando se hace clic en un link de categoría en el Drawer móvil
        drawerLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = link.getAttribute('data-target');
                const targetSection = document.getElementById(targetId);
                
                closeAllDrawers();
                
                if (targetSection) {
                    // Espera corta para que se complete la animación del drawer antes de hacer scroll
                    setTimeout(() => {
                        window.scrollTo({
                            top: targetSection.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }, 200);
                }
            });
        });

        // -------------------------------------------------------------
        // SOPORTE DE GESTOS (SWIPES EN MÓVIL)
        // -------------------------------------------------------------
        let touchstartX = 0;
        let touchendX = 0;
        const pageContainer = document.querySelector('.lector-container');

        pageContainer.addEventListener('touchstart', e => {
            touchstartX = e.changedTouches[0].screenX;
        });

        pageContainer.addEventListener('touchend', e => {
            touchendX = e.changedTouches[0].screenX;
            handleGesture();
        });

        function handleGesture() {
            // Umbral de deslizamiento (mínimo 70px)
            const threshold = 70;
            const diff = touchstartX - touchendX;

            if (Math.abs(diff) < threshold) return;

            // Obtener categorías visibles en el DOM
            const visibleSections = Array.from(sections).filter(s => s.style.display !== 'none');
            if (visibleSections.length <= 1) return;

            // Encontrar qué sección está más centrada en pantalla
            let closestSectionIndex = 0;
            let minDistance = Infinity;

            visibleSections.forEach((section, index) => {
                const rect = section.getBoundingClientRect();
                const distance = Math.abs(rect.top - 120);
                if (distance < minDistance) {
                    minDistance = distance;
                    closestSectionIndex = index;
                }
            });

            let targetIndex = closestSectionIndex;

            if (diff > 0) {
                // Swipe Izquierda -> Siguiente Sección
                if (closestSectionIndex < visibleSections.length - 1) {
                    targetIndex = closestSectionIndex + 1;
                }
            } else {
                // Swipe Derecha -> Sección Anterior
                if (closestSectionIndex > 0) {
                    targetIndex = closestSectionIndex - 1;
                }
            }

            if (targetIndex !== closestSectionIndex) {
                const targetSection = visibleSections[targetIndex];
                window.scrollTo({
                    top: targetSection.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        }
    });
</script>
@endsection
