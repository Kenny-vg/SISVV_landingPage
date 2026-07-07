@extends('layouts.public')

@section('content')
<div class="pdf-viewer-page">
    
    <!-- Botón elegante de Volver -->
    <a href="{{ url('/lector') }}" class="pdf-back-btn" id="pdf-back-btn">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        <span>Volver a la Carta</span>
    </a>

    <!-- Cabecera Editorial Elegante -->
    <header class="pdf-header-editorial">
        <span class="pdf-category-tag">{{ $category->name }}</span>
        <h1>Menú de {{ $category->name }}</h1>
        <p>{{ strip_tags($category->description) }}</p>
        <div class="pdf-header-divider"></div>
    </header>

    <!-- Área principal de renderizado -->
    <div class="pdf-canvas-container" id="pdf-canvas-container">
        <div class="pdf-canvas-wrapper" id="pdf-canvas-wrapper">
            <canvas id="pdf-canvas"></canvas>
        </div>
    </div>

    <!-- Deslizador de páginas móvil (Emerge arriba de la barra inferior) -->
    <div class="pdf-mobile-slider-container" id="pdf-mobile-slider-container">
        <div class="pdf-mobile-slider-wrapper">
            <span style="font-size: 0.75rem; font-weight:600; color:var(--color-lector-text-primary);" id="slider-page-min">1</span>
            <input type="range" min="1" max="1" value="1" class="pdf-slider" id="pdf-page-slider">
            <span style="font-size: 0.75rem; font-weight:600; color:var(--color-lector-text-primary);" id="slider-page-max">1</span>
        </div>
    </div>

    <!-- Dock flotante de controles (Glassmorphism Píldora) -->
    <div class="pdf-dock" id="pdf-dock">
        <!-- Navegación de Páginas -->
        <div class="pdf-page-nav">
            <button class="pdf-btn" id="prev-page" title="Página Anterior">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            
            <div class="pdf-page-indicator" id="pdf-page-indicator-btn" style="cursor: pointer;" title="Cambiar página">
                <span id="page-num">0</span> / <span id="page-count">0</span>
            </div>

            <button class="pdf-btn" id="next-page" title="Página Siguiente">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>

        <div class="pdf-divider"></div>

        <!-- Controles de Zoom -->
        <button class="pdf-btn" id="zoom-out" title="Alejar">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
            </svg>
        </button>

        <span class="pdf-zoom-indicator" id="zoom-percent">100%</span>

        <button class="pdf-btn" id="zoom-in" title="Acercar">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
        </button>

        <div class="pdf-divider"></div>

        <!-- Botón de Descarga -->
        <a href="{{ $category->pdf ? asset('storage/'.$category->pdf) : '#' }}" download class="pdf-btn" id="download-pdf" title="Descargar Menú">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
            </svg>
        </a>
    </div>

</div>

<!-- Carga de la librería oficial PDF.js de Mozilla -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>
<script>
    // Configuración del worker de PDF.js
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.worker.min.js';

    document.addEventListener('DOMContentLoaded', () => {
        // Estado del documento
        let pdfDoc = null;
        let pageNum = 1;
        let pageRendering = false;
        let pageNumPending = null;
        let scale = 1.0; // Zoom base del renderizado
        let currentZoomPercent = 100;
        
        // Estado de Panning (Arrastrar con el ratón/dedo)
        let isDragging = false;
        let startX, startY;
        let scrollLeft, scrollTop;

        // Datos de la categoría desde el backend
        const categorySlug = '{{ $category->slug }}';
        const categoryName = '{{ $category->name }}';
        const categoryTitle = 'Menú de {{ $category->name }}';
        const categoryDesc = `{{ strip_tags($category->description) }}`;

        // Actualizar textos e interfaz dinámicamente
        document.querySelector('.pdf-category-tag').textContent = categoryName;
        document.querySelector('.pdf-header-editorial h1').textContent = categoryTitle;
        document.querySelector('.pdf-header-editorial p').textContent = categoryDesc;

        // URL dinámica del PDF correspondiente
        const hasPdf = {{ $category->pdf ? 'true' : 'false' }};
        const pdfUrl = hasPdf ? '{{ $category->pdf ? asset("storage/".$category->pdf) : '' }}' : null;

        // Actualizar botón de descarga flotante
        const downloadBtn = document.getElementById('download-pdf');
        if (downloadBtn) {
            downloadBtn.href = pdfUrl || '#';
            downloadBtn.setAttribute('download', `menu_${categorySlug}.pdf`);
            downloadBtn.title = `Descargar ${categoryTitle}`;
        }

        // Elementos DOM
        const canvas = document.getElementById('pdf-canvas');
        const ctx = canvas.getContext('2d');
        const canvasWrapper = document.getElementById('pdf-canvas-wrapper');
        const canvasContainer = document.getElementById('pdf-canvas-container');
        
        // Elementos de UI
        const btnPrev = document.getElementById('prev-page');
        const btnNext = document.getElementById('next-page');
        const txtPageNum = document.getElementById('page-num');
        const txtPageCount = document.getElementById('page-count');
        const btnZoomIn = document.getElementById('zoom-in');
        const btnZoomOut = document.getElementById('zoom-out');
        const txtZoomPercent = document.getElementById('zoom-percent');
        const dock = document.getElementById('pdf-dock');
        const backBtn = document.getElementById('pdf-back-btn');
        
        // Elementos Móviles
        const btnPageIndicator = document.getElementById('pdf-page-indicator-btn');
        const mobileSliderContainer = document.getElementById('pdf-mobile-slider-container');
        const pageSlider = document.getElementById('pdf-page-slider');
        const sliderPageMin = document.getElementById('slider-page-min');
        const sliderPageMax = document.getElementById('slider-page-max');

        // -------------------------------------------------------------
        // RENDERIZADO DEL PDF
        // -------------------------------------------------------------
        function renderPage(num) {
            pageRendering = true;
            
            // Obtener la página solicitada
            pdfDoc.getPage(num).then((page) => {
                // Cálculo de la escala adaptativa para Mobile-First (ajustar al ancho de pantalla)
                const containerWidth = canvasContainer.clientWidth - 32; // padding
                const viewportOriginal = page.getViewport({ scale: 1.0 });
                
                // Si estamos en móvil o el ancho del PDF excede la pantalla, ajustamos escala
                if (viewportOriginal.width > containerWidth) {
                    scale = containerWidth / viewportOriginal.width;
                } else {
                    scale = 1.2; // Escala por defecto en pantallas grandes
                }

                // Ajustamos por el zoom interactivo seleccionado
                const finalScale = scale * (currentZoomPercent / 100);
                const viewport = page.getViewport({ scale: finalScale });

                // Configuración del canvas con High DPI (Retina displays) para nitidez óptima
                const pixelRatio = window.devicePixelRatio || 1;
                canvas.width = viewport.width * pixelRatio;
                canvas.height = viewport.height * pixelRatio;
                canvas.style.width = viewport.width + 'px';
                canvas.style.height = viewport.height + 'px';

                // Configurar el wrapper del canvas para que coincida con el tamaño exacto
                canvasWrapper.style.width = viewport.width + 'px';
                canvasWrapper.style.height = viewport.height + 'px';

                // Escalar el contexto para dibujar en alta definición
                ctx.restore();
                ctx.save();
                ctx.scale(pixelRatio, pixelRatio);

                // Dibujar el PDF en el canvas
                const renderContext = {
                    canvasContext: ctx,
                    viewport: viewport
                };
                
                const renderTask = page.render(renderContext);

                // Esperar a que finalice el renderizado
                renderTask.promise.then(() => {
                    pageRendering = false;
                    if (pageNumPending !== null) {
                        renderPage(pageNumPending);
                        pageNumPending = null;
                    }
                });
            });

            // Actualizar numeración
            txtPageNum.textContent = num;
            if (pageSlider) pageSlider.value = num;
            
            // Habilitar/Deshabilitar botones
            btnPrev.disabled = (num <= 1);
            btnNext.disabled = (num >= pdfDoc.numPages);
        }

        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPage(num);
            }
        }

        // Navegación de páginas
        function onPrevPage() {
            if (pageNum <= 1) return;
            pageNum--;
            queueRenderPage(pageNum);
        }

        function onNextPage() {
            if (pageNum >= pdfDoc.numPages) return;
            pageNum++;
            queueRenderPage(pageNum);
        }

        btnPrev.addEventListener('click', onPrevPage);
        btnNext.addEventListener('click', onNextPage);

        // -------------------------------------------------------------
        // CARGA ASÍNCRONA DEL DOCUMENTO PDF
        // -------------------------------------------------------------
        if (!pdfUrl) {
            ctx.font = "16px sans-serif";
            ctx.fillStyle = "#14241D";
            ctx.textAlign = "center";
            ctx.fillText("No hay menú disponible para esta categoría", canvas.width / 2, 100);
            return;
        }

        pdfjsLib.getDocument(pdfUrl).promise.then((pdfDoc_) => {
            pdfDoc = pdfDoc_;
            txtPageCount.textContent = pdfDoc.numPages;
            
            // Inicializar slider móvil si aplica
            if (pageSlider) {
                pageSlider.max = pdfDoc.numPages;
                sliderPageMax.textContent = pdfDoc.numPages;
            }

            renderPage(pageNum);
        }).catch(err => {
            console.error("Error cargando el PDF:", err);
            // Mensaje elegante en canvas en caso de error
            ctx.font = "16px sans-serif";
            ctx.fillStyle = "#14241D";
            ctx.textAlign = "center";
            ctx.fillText("No se pudo cargar el menú interactivo", canvas.width / 2, 100);
        });

        // -------------------------------------------------------------
        // CONTROLES DE ZOOM
        // -------------------------------------------------------------
        function adjustZoom(amount) {
            let targetZoom = currentZoomPercent + amount;
            // Límites de zoom
            if (targetZoom < 50) targetZoom = 50;
            if (targetZoom > 250) targetZoom = 250;

            currentZoomPercent = targetZoom;
            txtZoomPercent.textContent = currentZoomPercent + '%';
            
            // Animación y recálculo de escala en el canvas
            queueRenderPage(pageNum);

            // Si el zoom es de 100% (fit) eliminamos cursor grab
            if (currentZoomPercent === 100) {
                canvasContainer.style.cursor = 'default';
            } else {
                canvasContainer.style.cursor = 'grab';
            }
        }

        btnZoomIn.addEventListener('click', () => adjustZoom(25));
        btnZoomOut.addEventListener('click', () => adjustZoom(-25));

        // -------------------------------------------------------------
        // INTERACTIVIDAD Y PANNING (ARRASTRAR CON EL RATÓN / DEDO)
        // -------------------------------------------------------------
        function startDrag(e) {
            // Solo arrastramos si hay un zoom activo superior al 100%
            if (currentZoomPercent <= 100) return;
            
            isDragging = true;
            canvasContainer.style.cursor = 'grabbing';
            
            const pageX = e.pageX || e.touches[0].pageX;
            const pageY = e.pageY || e.touches[0].pageY;
            
            startX = pageX - canvasContainer.offsetLeft;
            startY = pageY - canvasContainer.offsetTop;
            
            scrollLeft = canvasContainer.scrollLeft;
            scrollTop = canvasContainer.scrollTop;
        }

        function doDrag(e) {
            if (!isDragging) return;
            e.preventDefault();
            
            const pageX = e.pageX || e.touches[0].pageX;
            const pageY = e.pageY || e.touches[0].pageY;
            
            const x = pageX - canvasContainer.offsetLeft;
            const y = pageY - canvasContainer.offsetTop;
            
            const walkX = (x - startX) * 1.5; // Velocidad del panning
            const walkY = (y - startY) * 1.5;
            
            canvasContainer.scrollLeft = scrollLeft - walkX;
            canvasContainer.scrollTop = scrollTop - walkY;
        }

        function stopDrag() {
            isDragging = false;
            if (currentZoomPercent > 100) {
                canvasContainer.style.cursor = 'grab';
            } else {
                canvasContainer.style.cursor = 'default';
            }
        }

        // Eventos ratón
        canvasContainer.addEventListener('mousedown', startDrag);
        canvasContainer.addEventListener('mousemove', doDrag);
        window.addEventListener('mouseup', stopDrag);

        // Eventos táctiles (Móvil)
        canvasContainer.addEventListener('touchstart', startDrag, { passive: true });
        canvasContainer.addEventListener('touchmove', doDrag, { passive: false });
        canvasContainer.addEventListener('touchend', stopDrag);

        // -------------------------------------------------------------
        // ZOOM POR DOBLE TOQUE (DOUBLE TAP MÓVIL)
        // -------------------------------------------------------------
        let lastTap = 0;
        canvasContainer.addEventListener('click', (e) => {
            const now = new Date().getTime();
            const timesince = now - lastTap;
            
            if ((timesince < 300) && (timesince > 0)) {
                // Doble toque detectado
                if (currentZoomPercent === 100) {
                    currentZoomPercent = 160;
                    adjustZoom(0); // Aplica zoom
                } else {
                    currentZoomPercent = 100;
                    adjustZoom(0); // Restablece zoom
                }
                e.preventDefault();
            }
            lastTap = now;
        });

        // -------------------------------------------------------------
        // SLIDER DE PÁGINAS INTERACTIVO MÓVIL
        // -------------------------------------------------------------
        if (btnPageIndicator && mobileSliderContainer) {
            btnPageIndicator.addEventListener('click', (e) => {
                e.stopPropagation();
                // Solo activamos en móvil
                if (window.innerWidth < 768) {
                    mobileSliderContainer.classList.toggle('open');
                }
            });
        }

        if (pageSlider) {
            pageSlider.addEventListener('input', (e) => {
                const targetPage = parseInt(e.target.value);
                if (targetPage !== pageNum) {
                    pageNum = targetPage;
                    queueRenderPage(pageNum);
                }
            });
        }

        // Cerrar slider móvil al tocar fuera
        document.addEventListener('click', (e) => {
            if (mobileSliderContainer && !mobileSliderContainer.contains(e.target) && e.target !== btnPageIndicator) {
                mobileSliderContainer.classList.remove('open');
            }
        });

        // -------------------------------------------------------------
        // GESTOS DE SWIPE HORIZONTAL PARA PÁGINAS EN MÓVIL
        // -------------------------------------------------------------
        let touchstartX = 0;
        let touchendX = 0;

        canvasContainer.addEventListener('touchstart', e => {
            // Solo registramos swipe si no hay zoom activo para evitar conflictos
            if (currentZoomPercent <= 100 && e.touches.length === 1) {
                touchstartX = e.changedTouches[0].screenX;
            }
        }, { passive: true });

        canvasContainer.addEventListener('touchend', e => {
            if (currentZoomPercent <= 100 && e.changedTouches.length === 1) {
                touchendX = e.changedTouches[0].screenX;
                handleSwipe();
            }
        });

        function handleSwipe() {
            const threshold = 80;
            const diff = touchstartX - touchendX;
            
            if (Math.abs(diff) < threshold) return;

            if (diff > 0) {
                // Swipe izquierda -> página siguiente
                onNextPage();
            } else {
                // Swipe derecha -> página anterior
                onPrevPage();
            }
        }

        // -------------------------------------------------------------
        // DESVANECIMIENTO AUTOMÁTICO DE CONTROLES (AUTO-HIDE)
        // -------------------------------------------------------------
        let controlsTimeout;

        function showControls() {
            dock.classList.remove('hide-controls');
            backBtn.classList.remove('hide-controls');
            
            clearTimeout(controlsTimeout);
            
            // Ocultar controles tras 3 segundos de inactividad
            controlsTimeout = setTimeout(() => {
                // Solo ocultamos si no hay un menú/slider abierto ni estamos arrastrando
                if (!isDragging && (!mobileSliderContainer || !mobileSliderContainer.classList.contains('open'))) {
                    dock.classList.add('hide-controls');
                    backBtn.classList.add('hide-controls');
                }
            }, 3000);
        }

        // Detectar movimiento del cursor o toques para mostrar controles
        window.addEventListener('mousemove', showControls);
        window.addEventListener('scroll', showControls);
        canvasContainer.addEventListener('touchstart', showControls, { passive: true });
        
        // Inicializar controles visibles
        showControls();

        // Recalcular renderizado al redimensionar la ventana (adaptabilidad responsiva)
        window.addEventListener('resize', () => {
            // Espera corta para evitar recalcular continuamente (debounce)
            clearTimeout(window.resizeFinished);
            window.resizeFinished = setTimeout(() => {
                renderPage(pageNum);
            }, 250);
        });
    });
</script>
@endsection
