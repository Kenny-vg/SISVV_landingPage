<?php $__env->startSection('title', 'Carta y Menú — Vista Verde Country Club'); ?>
<?php $__env->startSection('meta_description', 'Explora la carta y menú de los restaurantes de Vista Verde Country Club.'); ?>

<?php $__env->startSection('content'); ?>
<div class="lector-page" style="min-height: 100vh; background-color: var(--color-bg); transition: background-color 0.3s ease;">
    <div class="lector-container" style="max-width: 1200px; margin: 0 auto; padding: 2rem 1.5rem 8rem 1.5rem;">
        
        <!-- Cabecera Editorial Elegante -->
        <header class="section-header-editorial" style="margin-bottom: 4rem; text-align: center; max-width: 800px; margin-left: auto; margin-right: auto;">
            <span style="font-family: var(--font-alt); font-size: 0.8rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Experiencia Gastronómica</span>
            <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); color: var(--color-text-primary); margin-bottom: 1.5rem; line-height: 1.1;">Nuestra Carta</h1>
            <p style="color: var(--color-text-secondary); max-width: 600px; margin: 0 auto;">
                Seleccione una de nuestras categorías para descubrir una propuesta culinaria de temporada diseñada para deleitar sus sentidos.
            </p>
        </header>

        <!-- Bento Grid para las Categorías del Menú -->
        <div class="bento-grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bento-item bento-col-6" style="cursor: pointer;" role="link" tabindex="0" aria-label="Ver menú de <?php echo e($cat->name); ?>" onclick="window.location.href='<?php echo e(url('/lector-pdf?category='.$cat->slug)); ?>'" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();window.location.href='<?php echo e(url('/lector-pdf?category='.$cat->slug)); ?>'}">
                <div class="bento-img-container" style="overflow: hidden; position: relative;">
                    <img src="<?php echo e($cat->image ? asset('storage/'.$cat->image) : asset('images/hero.jpg')); ?>" alt="<?php echo e($cat->name); ?>" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="display: flex; flex-direction: column; flex-grow: 1;">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cat->schedule): ?>
                    <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); margin-bottom: 0.5rem; display: block;"><?php echo e($cat->schedule); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <h3 style="font-family: var(--font-editorial); font-size: 1.8rem; margin-bottom: 0.75rem; color: var(--color-text-primary);"><?php echo e($cat->name); ?></h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;"><?php echo e(strip_tags($cat->description)); ?></p>
                    <a href="<?php echo e(url('/lector-pdf?category='.$cat->slug)); ?>" class="btn-link" style="margin-top: auto; align-self: flex-start; text-decoration: none; color: var(--color-text-primary); font-weight: 600;">Ver Menú &rarr;</a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="bento-item bento-col-12" style="text-align: center; padding: 4rem;">
                <p style="color: var(--color-text-secondary);">No hay categorías disponibles en este momento.</p>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mezaX\OneDrive\Desktop\Landing page VV\resources\views/lector/index.blade.php ENDPATH**/ ?>