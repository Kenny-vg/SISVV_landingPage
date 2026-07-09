@extends('layouts.public')

@section('title', 'Términos y Condiciones — Vista Verde Country Club')
@section('meta_description', 'Términos y Condiciones de Vista Verde Country Club. Conoce las reglas y políticas de uso del club.')

@section('content')
<div class="pdf-viewer-page">

    <a href="{{ url('/nosotros') }}" class="pdf-back-btn" id="pdf-back-btn">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        <span>Volver a Nosotros</span>
    </a>

    <header class="pdf-header-editorial">
        <span class="pdf-category-tag">Vista Verde Club</span>
        <h1>Términos y<br><span style="font-style: italic; font-weight: 300; color: var(--color-accent-gold);">Condiciones.</span></h1>
        <p>Lee los términos y condiciones que rigen la membresía y el uso de las instalaciones del club.</p>
        <div class="pdf-header-divider"></div>
    </header>

    <div class="pdf-canvas-container" id="pdf-canvas-container">
        <div class="pdf-canvas-wrapper" id="pdf-canvas-wrapper">
            <canvas id="pdf-canvas"></canvas>
        </div>
    </div>

    <div class="pdf-mobile-slider-container" id="pdf-mobile-slider-container">
        <div class="pdf-mobile-slider-wrapper">
            <span style="font-size: 0.75rem; font-weight:600; color:var(--color-lector-text-primary);" id="slider-page-min">1</span>
            <input type="range" min="1" max="1" value="1" class="pdf-slider" id="pdf-page-slider">
            <span style="font-size: 0.75rem; font-weight:600; color:var(--color-lector-text-primary);" id="slider-page-max">1</span>
        </div>
    </div>

    <div class="pdf-dock" id="pdf-dock">
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

        <a href="{{ setting('terms_pdf') ? asset('storage/' . setting('terms_pdf')) : '#' }}" download class="pdf-btn" id="download-pdf" title="Descargar Términos y Condiciones">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
            </svg>
        </a>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>
<script>
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.worker.min.js';

    document.addEventListener('DOMContentLoaded', () => {
        let pdfDoc = null;
        let pageNum = 1;
        let pageRendering = false;
        let pageNumPending = null;
        let scale = 1.0;
        let currentZoomPercent = 100;
        let isDragging = false;
        let startX, startY;
        let scrollLeft, scrollTop;

        const canvas = document.getElementById('pdf-canvas');
        const ctx = canvas.getContext('2d');
        const canvasWrapper = document.getElementById('pdf-canvas-wrapper');
        const canvasContainer = document.getElementById('pdf-canvas-container');

        const btnPrev = document.getElementById('prev-page');
        const btnNext = document.getElementById('next-page');
        const txtPageNum = document.getElementById('page-num');
        const txtPageCount = document.getElementById('page-count');
        const btnZoomIn = document.getElementById('zoom-in');
        const btnZoomOut = document.getElementById('zoom-out');
        const txtZoomPercent = document.getElementById('zoom-percent');
        const dock = document.getElementById('pdf-dock');
        const backBtn = document.getElementById('pdf-back-btn');

        const btnPageIndicator = document.getElementById('pdf-page-indicator-btn');
        const mobileSliderContainer = document.getElementById('pdf-mobile-slider-container');
        const pageSlider = document.getElementById('pdf-page-slider');
        const sliderPageMin = document.getElementById('slider-page-min');
        const sliderPageMax = document.getElementById('slider-page-max');

        const hasPdf = {{ setting('terms_pdf') ? 'true' : 'false' }};
        const pdfUrl = hasPdf ? '{{ setting("terms_pdf") ? asset("storage/" . setting("terms_pdf")) : '' }}' : null;

        const downloadBtn = document.getElementById('download-pdf');
        if (downloadBtn) {
            downloadBtn.href = pdfUrl || '#';
            downloadBtn.setAttribute('download', 'terminos-y-condiciones.pdf');
            downloadBtn.title = 'Descargar Términos y Condiciones';
        }

        function renderPage(num) {
            pageRendering = true;
            pdfDoc.getPage(num).then((page) => {
                const containerWidth = canvasContainer.clientWidth - 32;
                const viewportOriginal = page.getViewport({ scale: 1.0 });
                if (viewportOriginal.width > containerWidth) {
                    scale = containerWidth / viewportOriginal.width;
                } else {
                    scale = 1.2;
                }
                const finalScale = scale * (currentZoomPercent / 100);
                const viewport = page.getViewport({ scale: finalScale });
                const pixelRatio = window.devicePixelRatio || 1;
                canvas.width = viewport.width * pixelRatio;
                canvas.height = viewport.height * pixelRatio;
                canvas.style.width = viewport.width + 'px';
                canvas.style.height = viewport.height + 'px';
                canvasWrapper.style.width = viewport.width + 'px';
                canvasWrapper.style.height = viewport.height + 'px';
                ctx.restore();
                ctx.save();
                ctx.scale(pixelRatio, pixelRatio);
                const renderContext = { canvasContext: ctx, viewport: viewport };
                const renderTask = page.render(renderContext);
                renderTask.promise.then(() => {
                    pageRendering = false;
                    if (pageNumPending !== null) {
                        renderPage(pageNumPending);
                        pageNumPending = null;
                    }
                });
            });
            txtPageNum.textContent = num;
            if (pageSlider) pageSlider.value = num;
            btnPrev.disabled = (num <= 1);
            btnNext.disabled = (num >= pdfDoc.numPages);
        }

        function queueRenderPage(num) {
            if (pageRendering) { pageNumPending = num; }
            else { renderPage(num); }
        }

        function onPrevPage() { if (pageNum <= 1) return; pageNum--; queueRenderPage(pageNum); }
        function onNextPage() { if (pageNum >= pdfDoc.numPages) return; pageNum++; queueRenderPage(pageNum); }

        btnPrev.addEventListener('click', onPrevPage);
        btnNext.addEventListener('click', onNextPage);

        if (!pdfUrl) {
            ctx.font = '16px sans-serif';
            ctx.fillStyle = '#14241D';
            ctx.textAlign = 'center';
            ctx.fillText('No hay términos y condiciones disponibles', canvas.width / 2, 100);
            return;
        }

        pdfjsLib.getDocument(pdfUrl).promise.then((pdfDoc_) => {
            pdfDoc = pdfDoc_;
            txtPageCount.textContent = pdfDoc.numPages;
            if (pageSlider) {
                pageSlider.max = pdfDoc.numPages;
                sliderPageMax.textContent = pdfDoc.numPages;
            }
            renderPage(pageNum);
        }).catch(err => {
            console.error('Error cargando el PDF:', err);
            ctx.font = '16px sans-serif';
            ctx.fillStyle = '#14241D';
            ctx.textAlign = 'center';
            ctx.fillText('No se pudo cargar el documento', canvas.width / 2, 100);
        });

        function adjustZoom(amount) {
            let targetZoom = currentZoomPercent + amount;
            if (targetZoom < 50) targetZoom = 50;
            if (targetZoom > 250) targetZoom = 250;
            currentZoomPercent = targetZoom;
            txtZoomPercent.textContent = currentZoomPercent + '%';
            queueRenderPage(pageNum);
            canvasContainer.style.cursor = currentZoomPercent > 100 ? 'grab' : 'default';
        }

        btnZoomIn.addEventListener('click', () => adjustZoom(25));
        btnZoomOut.addEventListener('click', () => adjustZoom(-25));

        function startDrag(e) {
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
            canvasContainer.scrollLeft = scrollLeft - (x - startX) * 1.5;
            canvasContainer.scrollTop = scrollTop - (y - startY) * 1.5;
        }

        function stopDrag() {
            isDragging = false;
            canvasContainer.style.cursor = currentZoomPercent > 100 ? 'grab' : 'default';
        }

        canvasContainer.addEventListener('mousedown', startDrag);
        canvasContainer.addEventListener('mousemove', doDrag);
        window.addEventListener('mouseup', stopDrag);
        canvasContainer.addEventListener('touchstart', startDrag, { passive: true });
        canvasContainer.addEventListener('touchmove', doDrag, { passive: false });
        canvasContainer.addEventListener('touchend', stopDrag);

        let lastTap = 0;
        canvasContainer.addEventListener('click', (e) => {
            const now = new Date().getTime();
            const timesince = now - lastTap;
            if ((timesince < 300) && (timesince > 0)) {
                currentZoomPercent = currentZoomPercent === 100 ? 160 : 100;
                adjustZoom(0);
                e.preventDefault();
            }
            lastTap = now;
        });

        if (btnPageIndicator && mobileSliderContainer) {
            btnPageIndicator.addEventListener('click', (e) => {
                e.stopPropagation();
                if (window.innerWidth < 768) { mobileSliderContainer.classList.toggle('open'); }
            });
        }

        if (pageSlider) {
            pageSlider.addEventListener('input', (e) => {
                const targetPage = parseInt(e.target.value);
                if (targetPage !== pageNum) { pageNum = targetPage; queueRenderPage(pageNum); }
            });
        }

        document.addEventListener('click', (e) => {
            if (mobileSliderContainer && !mobileSliderContainer.contains(e.target) && e.target !== btnPageIndicator) {
                mobileSliderContainer.classList.remove('open');
            }
        });

        let touchstartX = 0;
        let touchendX = 0;

        canvasContainer.addEventListener('touchstart', e => {
            if (currentZoomPercent <= 100 && e.touches.length === 1) { touchstartX = e.changedTouches[0].screenX; }
        }, { passive: true });

        canvasContainer.addEventListener('touchend', e => {
            if (currentZoomPercent <= 100 && e.changedTouches.length === 1) {
                touchendX = e.changedTouches[0].screenX;
                const threshold = 80;
                const diff = touchstartX - touchendX;
                if (Math.abs(diff) < threshold) return;
                if (diff > 0) { onNextPage(); } else { onPrevPage(); }
            }
        });

        let controlsTimeout;
        function showControls() {
            dock.classList.remove('hide-controls');
            backBtn.classList.remove('hide-controls');
            clearTimeout(controlsTimeout);
            controlsTimeout = setTimeout(() => {
                if (!isDragging && (!mobileSliderContainer || !mobileSliderContainer.classList.contains('open'))) {
                    dock.classList.add('hide-controls');
                    backBtn.classList.add('hide-controls');
                }
            }, 3000);
        }

        window.addEventListener('mousemove', showControls);
        window.addEventListener('scroll', showControls);
        canvasContainer.addEventListener('touchstart', showControls, { passive: true });
        showControls();

        window.addEventListener('resize', () => {
            clearTimeout(window.resizeFinished);
            window.resizeFinished = setTimeout(() => { renderPage(pageNum); }, 250);
        });
    });
</script>
@stop