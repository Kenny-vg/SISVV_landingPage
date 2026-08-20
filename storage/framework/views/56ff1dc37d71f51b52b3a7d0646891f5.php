<?php
    if (!isset($pageSections)) {
        $pageSections = \App\Models\PageSection::where('is_active', true)->get()->keyBy('key');
    }
    $menuSection = $pageSections['menu_intro'] ?? null;
?>
<section class="premium-section bg-obsidian fade-in-section" id="gastronomia">
    <div class="gastronomy-asymmetric">
        <div class="gastronomy-media-wrapper">
            <img src="<?php echo e($menuSection?->image ? asset('storage/' . $menuSection->image) : asset('images/hero.jpg')); ?>" alt="Plato gourmet VistaVerde" class="gastronomy-main-img">
            <img src="<?php echo e($menuSection?->image_float ? asset('storage/' . $menuSection->image_float) : asset('images/hero.jpg')); ?>" alt="Ingredientes gastronómicos frescos" class="gastronomy-float-img">
        </div>

        <div class="gastronomy-content-wrapper">
            <div class="section-header-editorial" style="margin-bottom: 0;">
                <h2><br><span><?php echo e($menuSection?->title ?? 'Alta cocina en cada detalle.'); ?></span></h2>
                <p style="margin-bottom: 2rem;">
                    <?php echo $menuSection?->content; ?>

                </p>
                <a href="<?php echo e(url('/lector')); ?>" class="btn-gold" style="text-decoration: none; display: inline-block;">
                    <?php echo e(setting('menu_btn_text', 'Ver Carta Interactiva')); ?>

                </a>
            </div>
        </div>
    </div>
</section><?php /**PATH C:\Users\mezaX\OneDrive\Desktop\Landing page VV\resources\views/components/menu-section.blade.php ENDPATH**/ ?>