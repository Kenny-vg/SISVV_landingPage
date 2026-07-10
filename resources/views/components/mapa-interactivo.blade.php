<section class="premium-section bg-obsidian fade-in-section" id="mapa-club">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div class="section-header-editorial" style="margin-bottom: 2.5rem; text-align: center;">
            <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 0.8rem;">Explora el Club</span>
            <h2>Mapa<br><span>Interactivo.</span></h2>
        </div>

        <div class="mapa-wrapper" id="mapaWrapper">
            <div class="mapa-viewport" id="mapaViewport">
                <div class="mapa-zoom-container" id="mapaZoomContainer">
                    <img src="{{ asset('images/mapa-completo.jpg') }}" alt="Vista general del club" class="mapa-img" id="mapaCompletoImg">
                </div>

                <div class="mapa-detalle-overlay" id="mapaDetalleOverlay">
                    <img src="{{ asset('images/mapa-club.jpg') }}" alt="Detalle del club" class="mapa-img-detalle" id="mapaDetalleImg">
                </div>

                <button class="mapa-pin" id="mapaPin" aria-label="Ver detalle del club" title="Ver detalle del club">
                    <svg viewBox="0 0 24 36" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 28px; height: 42px;">
                        <path d="M12 0C5.373 0 0 5.373 0 12c0 9 12 24 12 24s12-15 12-24c0-6.627-5.373-12-12-12z" fill="var(--color-accent-gold)" stroke="#fff" stroke-width="1.5"/>
                        <circle cx="12" cy="12" r="5" fill="#fff"/>
                    </svg>
                </button>

                <button class="mapa-pin-ring" id="mapaPinRing" aria-hidden="true"></button>
            </div>

            <button class="mapa-back-btn" id="mapaBackBtn">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 16px; height: 16px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Vista general
            </button>
        </div>
    </div>
</section>

<style>
.mapa-wrapper {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
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
    max-width: 100%;
    max-height: 90vh;
    width: auto;
    height: auto;
    object-fit: contain;
    display: block;
}

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
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.6rem 1.4rem;
    background: var(--color-surface);
    border: 1px solid var(--color-border-subtle);
    color: var(--color-text-primary);
    font-family: var(--font-alt);
    font-size: 0.75rem;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    font-weight: 600;
    border-radius: 50px;
    cursor: pointer;
    opacity: 0;
    pointer-events: none;
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.mapa-back-btn.is-visible {
    opacity: 1;
    pointer-events: auto;
}

.mapa-back-btn:hover {
    border-color: var(--color-accent-gold);
    color: var(--color-accent-gold);
    transform: translateX(-3px);
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
});
</script>
