<?php $__env->startSection('title', 'Clases — Vista Verde Country Club'); ?>
<?php $__env->startSection('meta_description', 'Clases y disciplinas deportivas en Vista Verde Country Club: golf, tenis, natación, padel y más.'); ?>

<?php $__env->startSection('content'); ?>
<div class="clases-page" style="padding-top: 120px; min-height: 100vh; background-color: var(--color-bg); color: var(--color-text-primary); transition: background-color 0.3s ease;">

    <!-- Banner de Encabezado Asimétrico -->
    <header class="section-header-editorial" style="max-width: 1200px; margin: 0 auto 5rem auto; padding: 0 1.5rem;">
        <span style="font-family: var(--font-alt); font-size: 0.8rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Vista Verde Club</span>
        <h1 style="font-size: clamp(2.8rem, 6vw, 4.5rem); line-height: 1.1; margin-bottom: 1.5rem;">Nuestras<br><span>Clases.</span></h1>
        <p style="color: var(--color-text-secondary); max-width: 650px;">
            Disciplinas de élite impartidas por instructores certificados, diseñadas para elevar tu rendimiento y bienestar en cada sesión.
        </p>
    </header>

    <!-- Grid de Clases -->
    <section class="premium-section" style="padding: 0 1.5rem 6rem 1.5rem; max-width: 1200px; margin: 0 auto;" id="clases-grid">

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $disciplines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discipline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="<?php echo e(url('/clases/'.$discipline->slug)); ?>" class="bento-fullbleed">
                <img src="<?php echo e(($img = $discipline->images->first()) ? asset('storage/' . $img->image_path) : asset('images/hero.jpg')); ?>" alt="<?php echo e($discipline->title); ?>" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number"><?php echo e(str_pad($loop->iteration, 2, '0', STR_PAD_LEFT)); ?></span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title"><?php echo e($discipline->title); ?></h3>
                        <p class="bento-fullbleed-desc"><?php echo e(Str::limit(strip_tags($discipline->description), 120)); ?></p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p style="color: var(--color-text-secondary); text-align: center; padding: 2rem; grid-column: 1 / -1;">No hay clases disponibles actualmente.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>
    </section>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mezaX\OneDrive\Desktop\Landing page VV\resources\views\clases.blade.php ENDPATH**/ ?>