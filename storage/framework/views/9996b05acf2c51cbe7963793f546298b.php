<?php
    if (!isset($facilities)) {
        $facilities = \App\Models\Facility::where('is_published', true)->orderBy('sort_order')->get();
    }
?>
<!-- resources/views/components/instalaciones-section.blade.php -->
<section class="premium-section bg-obsidian fade-in-section" id="instalaciones">

    <!-- Encabezado -->
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2.5rem; flex-wrap: wrap; gap: 2rem;">
        <div class="section-header-editorial" style="margin-bottom: 0; max-width: 700px;">
            <h2><?php echo setting('instalaciones_heading', 'Espacios del<br><span>Club.</span>'); ?></h2>
            <p>
                <?php echo e(setting('instalaciones_subtext', 'Cada rincón de Vista Verde ha sido diseñado para ofrecerte una experiencia de exclusividad y confort sin igual, desde la Casa Club hasta nuestro Spa de bienestar.')); ?>

            </p>
        </div>
        <div style="display: flex; align-items: center; gap: 1rem;">
            <button class="facilities-carousel-btn" id="inst-prev-btn" aria-label="Anterior">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 20px; height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button class="facilities-carousel-btn" id="inst-next-btn" aria-label="Siguiente">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 20px; height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
            <a href="<?php echo e(url('/instalaciones')); ?>" class="btn-gold" style="text-decoration: none; display: inline-block; white-space: nowrap;">
                <?php echo e(setting('instalaciones_btn_text', 'Ver Todas')); ?>

            </a>
        </div>
    </div>

    <!-- Carrusel de espacios -->
    <div class="facilities-carousel-wrapper" id="inst-carousel-wrapper">
        <div class="facilities-carousel-track" id="inst-carousel-track">

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="<?php echo e(url('/instalaciones/'.$facility->slug)); ?>" class="bento-fullbleed">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($facility->panorama_path): ?>
                <span style="position:absolute;top:1rem;right:1rem;z-index:3;background:rgba(0,0,0,0.7);color:var(--color-accent-gold);padding:0.25rem 0.6rem;border-radius:6px;font-size:0.7rem;font-weight:700;font-family:var(--font-alt);letter-spacing:1px;backdrop-filter:blur(4px);">360°</span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <img src="<?php echo e(($img = $facility->images->first()) ? asset('storage/' . $img->image_path) : asset('images/hero.jpg')); ?>" alt="<?php echo e($facility->title); ?>" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number"><?php echo e(str_pad($loop->iteration, 2, '0', STR_PAD_LEFT)); ?></span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title"><?php echo e($facility->title); ?></h3>
                        <p class="bento-fullbleed-desc"><?php echo e(Str::limit(strip_tags($facility->description), 120)); ?></p>
                        <span class="bento-fullbleed-link"><?php echo e(setting('instalaciones_link_text', 'Conocer más →')); ?></span>
                    </div>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p style="color: var(--color-text-secondary); text-align: center; padding: 2rem 0; width: 100%;">No hay espacios disponibles actualmente.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>
    </div>

</section>

<?php $__env->startPush('scripts'); ?>
<script>
(function () {
    const TRACK_ID      = 'inst-carousel-track';
    const WRAPPER_ID    = 'inst-carousel-wrapper';
    const PREV_BTN_ID   = 'inst-prev-btn';
    const NEXT_BTN_ID   = 'inst-next-btn';
    const AUTO_INTERVAL = 5000;
    const SCROLL_AMOUNT = 360;

    let autoTimer = null;
    let isPaused = false;

    function scrollCarousel(direction) {
        const track = document.getElementById(TRACK_ID);
        if (!track) return;
        const maxScroll = track.scrollWidth - track.clientWidth;
        if (direction > 0 && track.scrollLeft >= maxScroll - 10) {
            track.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            track.scrollBy({ left: SCROLL_AMOUNT * direction, behavior: 'smooth' });
        }
    }
    window.scrollInstCarousel = scrollCarousel;

    function startAutoScroll() {
        if (autoTimer) clearInterval(autoTimer);
        autoTimer = setInterval(function () {
            if (!isPaused) scrollCarousel(1);
        }, AUTO_INTERVAL);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const prevBtn = document.getElementById(PREV_BTN_ID);
        const nextBtn = document.getElementById(NEXT_BTN_ID);
        if (prevBtn) prevBtn.addEventListener('click', function () { scrollCarousel(-1); });
        if (nextBtn) nextBtn.addEventListener('click', function () { scrollCarousel(1); });

        const wrapper = document.getElementById(WRAPPER_ID);
        if (!wrapper) return;

        wrapper.addEventListener('mouseenter', function () { isPaused = true; });
        wrapper.addEventListener('mouseleave', function () { isPaused = false; });
        wrapper.addEventListener('touchstart', function () { isPaused = true; }, { passive: true });
        wrapper.addEventListener('touchend', function () { isPaused = false; }, { passive: true });

        startAutoScroll();
    });
})();
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\mezaX\OneDrive\Desktop\Landing page VV\resources\views\components\instalaciones-section.blade.php ENDPATH**/ ?>