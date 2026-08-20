<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'title',
    'price',
    'desc',
    'tags' => [],
    'category' => ''
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'title',
    'price',
    'desc',
    'tags' => [],
    'category' => ''
]); ?>
<?php foreach (array_filter(([
    'title',
    'price',
    'desc',
    'tags' => [],
    'category' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    // Convertimos las etiquetas a formato JSON para usarlas en JS
    $tagsJson = json_encode($tags);
    // Generamos un string de búsqueda para buscar por título y descripción
    $searchString = strtolower($title . ' ' . $desc);
?>

<article class="lector-item" 
         data-tags="<?php echo e($tagsJson); ?>" 
         data-search="<?php echo e($searchString); ?>" 
         data-category="<?php echo e($category); ?>">
    <div class="lector-item-header">
        <h3 class="lector-item-title"><?php echo e($title); ?></h3>
        <span class="lector-item-price">$<?php echo e($price); ?></span>
    </div>
    <p class="lector-item-desc"><?php echo e($desc); ?></p>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($tags)): ?>
        <div class="lector-item-tags">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $tagClass = '';
                    $tagLabel = '';
                    switch (strtolower($tag)) {
                        case 'vegan':
                            $tagClass = 'tag-vegan';
                            $tagLabel = 'Vegano';
                            break;
                        case 'gf':
                        case 'gluten-free':
                            $tagClass = 'tag-gf';
                            $tagLabel = 'Sin Gluten';
                            break;
                        case 'special':
                        case 'especial':
                            $tagClass = 'tag-special';
                            $tagLabel = 'Especialidad';
                            break;
                        default:
                            $tagClass = '';
                            $tagLabel = ucwords($tag);
                    }
                ?>
                <span class="lector-tag <?php echo e($tagClass); ?>"><?php echo e($tagLabel); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</article>
<?php /**PATH C:\Users\mezaX\OneDrive\Desktop\Landing page VV\resources\views\components\lector-item.blade.php ENDPATH**/ ?>