<?php echo "\xEF\xBB\xBF"; ?>
<?php
    $hotspotImages = \App\Models\HotspotImage::where('is_published', true)->orderBy('key')->get();
?>
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
                        <img src="<?php echo e(asset('images/mapa-completo.jpg')); ?>" alt="Vista general del club" class="mapa-img" id="mapaCompletoImg">
                    </div>

                    <div class="mapa-detalle-overlay" id="mapaDetalleOverlay">
                        <div class="mapa-detalle-wrapper">
                            <img src="<?php echo e(asset('images/mapa-club.jpg')); ?>" alt="Detalle del club" class="mapa-img-detalle" id="mapaDetalleImg">

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $hotspotImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotspot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="hotspot" style="left: <?php echo e($hotspot->left_percent); ?>%; top: <?php echo e($hotspot->top_percent); ?>%;">
                                <button type="button" class="hotspot-dot"
                                    data-label="<?php echo e($hotspot->label); ?>"
                                    <?php if($hotspot->image_path): ?> data-img="<?php echo e(asset('storage/' . $hotspot->image_path)); ?>" <?php endif; ?>
                                    aria-label="Ver <?php echo e($hotspot->label); ?>"></button>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
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
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 14px; height: 14px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Vista general
                </button>
            </div>
        </div>
    </div>

    <div class="hotspot-modal" id="hotspotModal" role="dialog" aria-modal="true" aria-labelledby="hotspotModalLabel">
        <div class="hotspot-modal-backdrop" id="hotspotModalBackdrop"></div>
        <div class="hotspot-modal-content">
            <button class="hotspot-modal-close" id="hotspotModalClose" aria-label="Cerrar">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 20px; height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <img src="" alt="" class="hotspot-modal-img" id="hotspotModalImg" style="display: none;">
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
    container-type: inline-size;
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
    opacity: 0;
}

.mapa-img.is-visible {
    animation: mapa-fade-in 1.2s cubic-bezier(0.16, 1, 0.3, 1) both;
}

@keyframes mapa-fade-in {
    from { opacity: 0; transform: translateY(24px); }
    to { opacity: 1; transform: translateY(0); }
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
    width: clamp(14px, 1.85cqw, 22px);
    height: clamp(14px, 1.85cqw, 22px);
    border-radius: 50%;
    background: var(--color-accent-gold);
    border-width: clamp(2px, 0.3cqw, 3px);
    border-style: solid;
    border-color: #fff;
    padding: 0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.3);
    transition: transform 0.2s ease;
    animation: hotspot-pulse 2s ease-in-out infinite;
    cursor: pointer;
}

.hotspot:hover .hotspot-dot {
    transform: scale(1.25);
    animation: none;
}

@keyframes hotspot-pulse {
    0%, 100% { box-shadow: 0 2px 8px rgba(0,0,0,0.3), 0 0 0 0 rgba(212,175,55,0.4); }
    50% { box-shadow: 0 2px 8px rgba(0,0,0,0.3), 0 0 0 clamp(7px, 0.85cqw, 10px) rgba(212,175,55,0); }
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
    margin: 0 auto 0.5rem;
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
    .mapa-detalle-overlay {
        padding-bottom: 0;
    }
    .mapa-back-btn {
        position: static;
        display: none;
        transform: none;
        margin: 1.5rem auto 0;
        padding: 0.5rem 1.4rem;
        font-size: 0.68rem;
    }
    .mapa-back-btn.is-visible {
        display: flex;
    }
    .mapa-back-btn:hover {
        transform: scale(1.05);
    }
    #mapa-club .section-header-editorial {
        margin-bottom: 2.5rem !important;
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

    if (hotspotDots.length && hotspotModal && hotspotBackdrop && hotspotClose && modalLabel && modalImg) {
        hotspotDots.forEach(function (dot) {
            dot.addEventListener('click', function (e) {
                e.stopPropagation();
                modalLabel.textContent = dot.getAttribute('data-label');

                const imgSrc = dot.getAttribute('data-img');
                if (imgSrc) {
                    modalImg.src = imgSrc;
                    modalImg.style.display = 'block';
                } else {
                    modalImg.style.display = 'none';
                }

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

    /* ─── Animación al hacer scroll ─────────────── */
    const fullMapImg = document.querySelector('.mapa-img');
    if (fullMapImg) {
        if ('IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        fullMapImg.classList.remove('is-visible');
                        void fullMapImg.offsetWidth;
                        fullMapImg.classList.add('is-visible');
                    } else {
                        fullMapImg.classList.remove('is-visible');
                    }
                });
            }, { rootMargin: '0px 0px -80px 0px', threshold: 0 });
            observer.observe(fullMapImg);
        } else {
            fullMapImg.classList.add('is-visible');
        }
    }
});
</script><?php /**PATH C:\Users\mezaX\OneDrive\Desktop\Landing page VV\resources\views\components\mapa-interactivo.blade.php ENDPATH**/ ?>