<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?> | VistaVerde Golf & Country Club</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/favicon.png')); ?>">
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', savedTheme);
        })();
    </script>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/error.css']); ?>
</head>

<body>

    <div class="error-page">
        <div class="error-overlay"></div>

        <header class="error-header">
            <a href="<?php echo e(url('/')); ?>" class="error-brand" aria-label="Vista Verde - Inicio">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Vista Verde">
            </a>
        </header>

        <main class="error-body">
            <span class="error-label"><?php echo e(setting('site_name', 'VistaVerde Country Club')); ?></span>
            <div class="error-number"><?php echo $__env->yieldContent('number'); ?></div>
            <h1 class="error-title"><?php echo $__env->yieldContent('title'); ?></h1>
            <p class="error-message"><?php echo $__env->yieldContent('message'); ?></p>
            <div class="error-actions">
                <a href="<?php echo e(url('/')); ?>" class="error-btn error-btn-primary">Volver al inicio</a>
                <a href="<?php echo e(url('/#contacto')); ?>" class="error-btn-link">Contactar soporte</a>
            </div>
        </main>

        <img src="<?php echo e(asset('images/pelota-golf.png')); ?>" alt="" class="error-ball">
    </div>

</body>

</html>
<?php /**PATH C:\Users\mezaX\OneDrive\Desktop\Landing page VV\resources\views/errors/layout.blade.php ENDPATH**/ ?>