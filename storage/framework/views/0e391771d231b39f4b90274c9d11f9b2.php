<?php
    if (!isset($pageSections)) {
        $pageSections = \App\Models\PageSection::where('is_active', true)->get()->keyBy('key');
    }

    $mission = $pageSections['about_mission'] ?? null;
    $vision = $pageSections['about_vision'] ?? null;
    $values = $pageSections['about_values'] ?? null;
    $philosophy = $pageSections['about_philosophy'] ?? null;

    $valoresItems = [];
    if ($values && $values->content) {
        $parts = explode(',', $values->content);
        if (count($parts) >= 2) {
            foreach ($parts as $part) {
                $trimmed = trim($part);
                if ($trimmed) {
                    $valoresItems[] = ucfirst($trimmed);
                }
            }
        }
    }

    $aboutImage = setting('about_image') ? asset('storage/' . setting('about_image')) : asset('images/about.jpg');
?>



<?php $__env->startSection('title', 'Nosotros — Vista Verde Country Club'); ?>
<?php $__env->startSection('meta_description', 'Conoce la historia, misión, visión y valores de Vista Verde Country Club.'); ?>

<?php $__env->startSection('content'); ?>
<div style="padding-top: 120px; min-height: 100vh; background-color: var(--color-bg); color: var(--color-text-primary); transition: background-color 0.3s ease;">

    <!-- Hero con imagen de fondo (como membresías) -->
    <div class="about-hero" style="background-image: url('<?php echo e($aboutImage); ?>');">
        <div class="about-hero-overlay"></div>
        <div class="about-hero-content">
            <span class="about-hero-tag">Vista Verde Club</span>
            <h1>Sobre<br><span>Nosotros.</span></h1>
            <p>Conoce nuestra historia, nuestra filosofía y el compromiso que nos define como el club campestre más exclusivo de la región.</p>
        </div>
    </div>

    <!-- Misión (como about-home-grid del homepage) -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($mission): ?>
    <section class="premium-section bg-obsidian fade-in-section">
        <div class="about-home-grid">
            <div>
                <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Vista Verde Club</span>
                <?php
                    $mW = explode(' ', $mission->title, 2);
                ?>
                <h2 style="font-family: var(--font-editorial); font-size: clamp(2.5rem, 5vw, 4rem); color: var(--color-text-primary); line-height: 1.1; margin: 0 0 1.5rem 0;">
                    <?php echo e($mW[0]); ?><br><span style="font-style: italic; font-weight: 300; color: var(--color-accent-gold);"><?php echo e($mW[1] ?? $mission->title); ?>.</span>
                </h2>
                <p style="color: var(--color-about-text); font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                    <?php echo $mission->content; ?>

                </p>
            </div>
            <div style="border-radius: 24px; overflow: hidden; height: 500px; background-color: var(--color-surface);">
                <img src="<?php echo e($mission->image ? asset('storage/'.$mission->image) : $aboutImage); ?>" alt="<?php echo e($mission->title); ?>" style="width: 100%; height: 100%; max-width: 100%; object-fit: cover; display: block;">
            </div>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Visión (invertido: imagen izq, texto der) -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($vision): ?>
    <section class="premium-section bg-obsidian fade-in-section" style="padding-top: 0;">
        <div class="about-home-grid" style="direction: rtl;">
            <div style="direction: ltr;">
                <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Vista Verde Club</span>
                <?php
                    $vW = explode(' ', $vision->title, 2);
                ?>
                <h2 style="font-family: var(--font-editorial); font-size: clamp(2.5rem, 5vw, 4rem); color: var(--color-text-primary); line-height: 1.1; margin: 0 0 1.5rem 0;">
                    <?php echo e($vW[0]); ?><br><span style="font-style: italic; font-weight: 300; color: var(--color-accent-gold);"><?php echo e($vW[1] ?? $vision->title); ?>.</span>
                </h2>
                <p style="color: var(--color-about-text); font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                    <?php echo $vision->content; ?>

                </p>
            </div>
            <div style="direction: ltr; border-radius: 24px; overflow: hidden; height: 500px; background-color: var(--color-surface);">
                <img src="<?php echo e($vision->image ? asset('storage/'.$vision->image) : $aboutImage); ?>" alt="<?php echo e($vision->title); ?>" style="width: 100%; height: 100%; max-width: 100%; object-fit: cover; display: block;">
            </div>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Valores -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($values): ?>
    <section class="premium-section bg-obsidian fade-in-section" style="padding-top: 0;">
        <div class="about-home-grid" style="display: block; text-align: center;">
            <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Vista Verde Club</span>
            <?php
                $valsT = explode(' ', $values->title, 2);
            ?>
            <h2 style="font-family: var(--font-editorial); font-size: clamp(2.5rem, 5vw, 4rem); color: var(--color-text-primary); line-height: 1.1; margin: 0 0 1.5rem 0;">
                <?php echo e($valsT[0]); ?><br><span style="font-style: italic; font-weight: 300; color: var(--color-accent-gold);"><?php echo e($valsT[1] ?? $values->title); ?>.</span>
            </h2>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($valoresItems) >= 2): ?>
            <div class="about-values-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $valoresItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="about-values-tag"><?php echo e($valor); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php else: ?>
            <p style="color: var(--color-about-text); font-size: 1rem; line-height: 1.8; max-width: 700px; margin: 0 auto;">
                <?php echo $values->content; ?>

            </p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Filosofía como banner full-width -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($philosophy): ?>
    <section class="about-banner fade-in-section" style="background-image: url('<?php echo e($philosophy->image ? asset('storage/'.$philosophy->image) : $aboutImage); ?>');">
        <div class="about-banner-overlay"></div>
        <div class="about-banner-content">
            <span class="about-hero-tag">Vista Verde Club</span>
            <?php
                $pT = explode(' ', $philosophy->title, 2);
            ?>
            <h2 class="about-banner-title"><?php echo e($pT[0]); ?><br><span><?php echo e($pT[1] ?? $philosophy->title); ?>.</span></h2>
            <p class="about-banner-desc"><?php echo $philosophy->content; ?></p>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mezaX\OneDrive\Desktop\Landing page VV\resources\views\nosotros.blade.php ENDPATH**/ ?>