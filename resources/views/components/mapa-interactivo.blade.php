<section class="premium-section bg-obsidian" id="mapa-club">
    <div class="fade-in-section">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div class="section-header-editorial" style="margin-bottom: 0; text-align: center;">
                <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 0.8rem;">Explora el Club</span>
                <h2 style="margin-bottom: 0;">Mapa<br><span>Interactivo.</span></h2>
            </div>

            <div class="mapa-wrapper" id="mapaWrapper">
                <div class="mapa-viewport" id="mapaViewport">
                    <div class="mapa-zoom-container" id="mapaZoomContainer">
                        <img src="{{ asset('images/mapa-completo.jpg') }}" alt="Vista general del club" class="mapa-img" id="mapaCompletoImg">
                    </div>

                    <div class="mapa-detalle-overlay" id="mapaDetalleOverlay">
                        <div class="mapa-detalle-wrapper">
                            <img src="{{ asset('images/mapa-club.jpg') }}" alt="Detalle del club" class="mapa-img-detalle" id="mapaDetalleImg">

                            <div class="hotspot" style="left: 64.5%; top: 30.97%;">
                                <div class="hotspot-dot" data-img="{{ asset('images/hotspot-canchas.jpg') }}" data-label="AREA DE JUEGOS"></div>
                            </div>
                            <div class="hotspot" style="left: 59%; top: 24.2%;">
                                <div class="hotspot-dot" data-img="{{ asset('images/hotspot-piscina.jpg') }}" data-label="CANCHA DE FUTBOL"></div>
                            </div>
                            <div class="hotspot" style="left: 18.47%; top: 41.58%;">
                                <div class="hotspot-dot" data-img="{{ asset('images/hotspot-clubhouse.jpg') }}" data-label="CADDIE HOUSE"></div>
                            </div>
                            <div class="hotspot" style="left: 31.73%; top: 22.68%;">
                                <div class="hotspot-dot" data-img="{{ asset('images/hotspot-canchas2.jpg') }}" data-label="CANCHAS DE TENIS"></div>
                            </div>
                            <div class="hotspot" style="left: 48.72%; top: 36.85%;">
                                <div class="hotspot-dot" data-img="{{ asset('images/hotspot-padel.jpg') }}" data-label="CANCHA DE PADEL"></div>
                            </div>
                            <div class="hotspot" style="left: 14.41%; top: 59.83%;">
                                <div class="hotspot-dot" data-img="{{ asset('images/hotspot-padel2.jpg') }}" data-label="CANCHAS DE PADEL"></div>
                            </div>
                            <div class="hotspot" style="left: 55.48%; top: 79.27%;">
                                <div class="hotspot-dot" data-img="{{ asset('images/hotspot-restaurante.jpg') }}" data-label="RESTAURANTE"></div>
                            </div>
                            <div class="hotspot" style="left: 68.95%; top: 76.33%;">
                                <div class="hotspot-dot" data-img="{{ asset('images/hotspot-gimnasio.jpg') }}" data-label="GIMNASIO"></div>
                            </div>
                        </div>
                    </div>

                    <button class="mapa-pin" id="mapaPin" aria-label="Ver detalle del club" title="Ver detalle del club">
                        <svg viewBox="0 0 24 36" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 28px; height: 42px;">
                            <path d="M12 0C5.373 0 0 5.373 0 12c0 9 12 24 12 24s12-15 12-24c0-6.627-5.373-12-12-12z" fill="var(--color-accent-gold)" stroke="#fff" stroke-width="1.5"/>
                            <circle cx="12" cy="12" r="5" fill="#fff"/>
                        </svg>
                    </button>

                    <button class="mapa-pin-ring" id="mapaPinRing" aria-hidden="true"></button>

                    <button class="mapa-back-btn" id="mapaBackBtn">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 14px; height: 14px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Vista general
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="hotspot-modal" id="hotspotModal">
        <div class="hotspot-modal-backdrop" id="hotspotModalBackdrop"></div>
        <div class="hotspot-modal-content">
            <button class="hotspot-modal-close" id="hotspotModalClose" aria-label="Cerrar">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 20px; height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <img src="" alt="" class="hotspot-modal-img" id="hotspotModalImg">
            <span class="hotspot-modal-label" id="hotspotModalLabel"></span>
        </div>
    </div>
</section>

<style>
[data-theme="dark"] #mapa-club {
    --color-bg: #FDFCF9;
    --color-surface: #FFFFFF;
    --color-text-primary: #075B2A;
    --color-text-secondary: #07361B;
    --color-border-subtle: rgba(7, 91, 42, 0.08);
}

.mapa-wrapper {
    position: relative;
}

.mapa-viewport {
    position: relative;
    width: 100%;
    border-radius: 16px;
    overflow: hidden;
    background: var(--color-bg);
    cursor: default;
}

.mapa-zoom-container {
    width: 100%;
    position: relative;
    transform-origin: 40% 46.53%;
    transition: transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
    will-change: transform;
}

.mapa-zoom-container.is-zoomed {
    transform: scale(3.5);
}

.mapa-img {
    width: 100%;
    height: auto;
    display: block;
}

.mapa-detalle-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 0.6s ease;
    will-change: opacity;
    pointer-events: none;
    z-index: 5;
    background: var(--color-bg);
    display: flex;
    align-items: center;
    justify-content: center;
}

.mapa-detalle-overlay.is-visible {
    opacity: 1;
    pointer-events: auto;
}

.mapa-img-detalle {
    display: block;
    max-width: 100%;
    max-height: 90vh;
    width: auto;
    height: auto;
}

.mapa-detalle-wrapper {
    position: relative;
    display: inline-block;
    max-width: 100%;
    max-height: 90vh;
}

.hotspot {
    position: absolute;
    transform: translate(-50%, -50%);
    z-index: 20;
    cursor: pointer;
}

.hotspot-dot {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: var(--color-accent-gold);
    border: 3px solid #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.3);
    transition: transform 0.2s ease;
    animation: hotspot-pulse 2s ease-in-out infinite;
}

.hotspot:hover .hotspot-dot {
    transform: scale(1.25);
    animation: none;
}

@keyframes hotspot-pulse {
    0%, 100% { box-shadow: 0 2px 8px rgba(0,0,0,0.3), 0 0 0 0 rgba(212,175,55,0.4); }
    50% { box-shadow: 0 2px 8px rgba(0,0,0,0.3), 0 0 0 10px rgba(212,175,55,0); }
}

.hotspot-modal {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
}

.hotspot-modal.is-open {
    opacity: 1;
    pointer-events: auto;
}

.hotspot-modal-backdrop {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.7);
    backdrop-filter: blur(4px);
}

.hotspot-modal-content {
    position: relative;
    max-width: 90vw;
    max-height: 90vh;
    background: var(--color-surface);
    border-radius: 16px;
    padding: 1rem;
    box-shadow: 0 24px 64px rgba(0,0,0,0.3);
    transform: scale(0.92);
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.hotspot-modal.is-open .hotspot-modal-content {
    transform: scale(1);
}

.hotspot-modal-close {
    position: absolute;
    top: 0.75rem;
    right: 0.75rem;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--color-bg);
    border: 1px solid var(--color-border-subtle);
    color: var(--color-text-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    transition: background 0.2s ease;
}

.hotspot-modal-close:hover {
    background: var(--color-surface-hover);
}

.hotspot-modal-img {
    display: block;
    max-width: 100%;
    max-height: 80vh;
    width: auto;
    height: auto;
    border-radius: 12px;
}

.hotspot-modal-label {
    display: block;
    text-align: center;
    padding: 0.75rem 0 0.25rem;
    font-family: var(--font-alt);
    font-size: 0.75rem;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: var(--color-text-secondary);
}

/* ─── Zoom container idle ───────────────────────── */
.mapa-zoom-container.is-idle {
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
}

/* ─── Pin de mapa ──────────────────────────────────── */
.mapa-pin {
    position: absolute;
    left: 38%;
    top: 46.53%;
    transform: translate(-50%, -100%);
    background: none;
    border: none;
    padding: 0;
    cursor: pointer;
    z-index: 10;
    animation: mapa-pin-bounce 2s ease-in-out infinite;
    filter: drop-shadow(0 2px 6px rgba(0,0,0,0.3));
    transition: transform 0.3s ease;
}

.mapa-pin:hover {
    transform: translate(-50%, -100%) scale(1.15);
}

.mapa-pin.is-hidden {
    opacity: 0;
    pointer-events: none;
    animation: none;
}

@keyframes mapa-pin-bounce {
    0%, 100% { transform: translate(-50%, -100%) translateY(0); }
    50% { transform: translate(-50%, -100%) translateY(-6px); }
}

/* ─── Anillo pulsante del pin ─────────────────────── */
.mapa-pin-ring {
    position: absolute;
    left: 38%;
    top: 46.53%;
    transform: translate(-50%, -50%);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: transparent;
    border: 3px solid var(--color-accent-gold);
    pointer-events: none;
    z-index: 9;
    animation: mapa-ring-pulse 2s ease-out infinite;
}

@keyframes mapa-ring-pulse {
    0% { transform: translate(-50%, -50%) scale(0.5); opacity: 0.8; }
    100% { transform: translate(-50%, -50%) scale(2); opacity: 0; }
}

/* ─── Botón de regreso ────────────────────────────── */
.mapa-back-btn {
    position: absolute;
    bottom: 1rem;
    left: 50%;
    transform: translateX(-50%);
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.5rem 1.2rem;
    background: var(--color-surface);
    border: 1px solid var(--color-border-subtle);
    color: var(--color-text-primary);
    font-family: var(--font-alt);
    font-size: 0.7rem;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    font-weight: 600;
    border-radius: 50px;
    cursor: pointer;
    opacity: 0;
    pointer-events: none;
    z-index: 15;
    transition: opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.mapa-back-btn.is-visible {
    opacity: 1;
    pointer-events: auto;
}

.mapa-back-btn:hover {
    border-color: var(--color-accent-gold);
    color: var(--color-accent-gold);
    transform: translateX(-50%) scale(1.05);
}

/* ─── Responsive ───────────────────────────────────── */
@media (max-width: 991px) {
    .mapa-viewport {
        border-radius: 12px;
    }
    .mapa-pin svg {
        width: 22px;
        height: 33px;
    }
    .mapa-pin-ring {
        width: 30px;
        height: 30px;
    }
}

@media (max-width: 767px) {
    .mapa-pin svg {
        width: 18px;
        height: 27px;
    }
    .mapa-pin-ring {
        width: 24px;
        height: 24px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const pin = document.getElementById('mapaPin');
    const pinRing = document.getElementById('mapaPinRing');
    const container = document.getElementById('mapaZoomContainer');
    const detailOverlay = document.getElementById('mapaDetalleOverlay');
    const backBtn = document.getElementById('mapaBackBtn');

    if (!pin || !container || !detailOverlay || !backBtn) return;

    let isZoomed = false;

    pin.addEventListener('click', function () {
        if (isZoomed) return;
        isZoomed = true;

        document.getElementById('mapa-club').scrollIntoView({ behavior: 'smooth', block: 'center' });

        pin.classList.add('is-hidden');
        pinRing.style.display = 'none';

        container.classList.add('is-zoomed');

        setTimeout(function () {
            detailOverlay.classList.add('is-visible');
        }, 350);

        setTimeout(function () {
            container.classList.add('is-idle');
        }, 700);

        setTimeout(function () {
            backBtn.classList.add('is-visible');
        }, 1100);
    });

    backBtn.addEventListener('click', function () {
        if (!isZoomed) return;
        isZoomed = false;

        backBtn.classList.remove('is-visible');
        detailOverlay.classList.remove('is-visible');
        container.classList.remove('is-idle');

        setTimeout(function () {
            container.classList.remove('is-zoomed');
        }, 700);

        setTimeout(function () {
            pin.classList.remove('is-hidden');
            pinRing.style.display = '';
        }, 1200);
    });

    /* ─── Hotspot modal ─────────────────────────── */
    const hotspotDots = document.querySelectorAll('.hotspot-dot');
    const hotspotModal = document.getElementById('hotspotModal');
    const hotspotBackdrop = document.getElementById('hotspotModalBackdrop');
    const hotspotClose = document.getElementById('hotspotModalClose');
    const modalImg = document.getElementById('hotspotModalImg');
    const modalLabel = document.getElementById('hotspotModalLabel');

    if (hotspotDots.length && hotspotModal && hotspotBackdrop && hotspotClose && modalImg && modalLabel) {
        hotspotDots.forEach(function (dot) {
            dot.addEventListener('click', function (e) {
                e.stopPropagation();
                modalImg.src = dot.getAttribute('data-img');
                modalImg.alt = dot.getAttribute('data-label');
                modalLabel.textContent = dot.getAttribute('data-label');
                hotspotModal.classList.add('is-open');
            });
        });

        function closeModal() {
            hotspotModal.classList.remove('is-open');
        }

        hotspotClose.addEventListener('click', closeModal);
        hotspotBackdrop.addEventListener('click', closeModal);
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeModal();
        });
    }
});
</script>
