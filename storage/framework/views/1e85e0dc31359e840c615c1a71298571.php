<?php $__env->startSection('title', 'Error en el servidor'); ?>
<?php $__env->startSection('number'); ?>
    500
<?php $__env->stopSection(); ?>
<?php $__env->startSection('message', 'Algo salió mal en nuestro lado. Inténtalo de nuevo más tarde.'); ?>

<?php echo $__env->make('errors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mezaX\OneDrive\Desktop\Landing page VV\resources\views\errors\500.blade.php ENDPATH**/ ?>