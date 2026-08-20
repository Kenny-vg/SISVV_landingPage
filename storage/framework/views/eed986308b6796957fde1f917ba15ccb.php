<nav class="premium-navbar" id="main-navbar">
    <div class="navbar-container">
        <div class="navbar-left">
            <button id="hamburger-btn" class="hamburger-btn" aria-label="Menú" title="Menú">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="navbar-links">
                <li><a href="<?php echo e(url('/nosotros')); ?>"><?php echo e(setting('nav_link_nosotros', 'Nosotros')); ?></a></li>
                <li><a href="<?php echo e(url('/instalaciones')); ?>"><?php echo e(setting('nav_link_instalaciones', 'Instalaciones')); ?></a></li>
                <li><a href="<?php echo e(url('/clases')); ?>"><?php echo e(setting('nav_link_clases', 'Clases')); ?></a></li>
                <li><a href="<?php echo e(url('/eventos')); ?>"><?php echo e(setting('nav_link_eventos', 'Eventos')); ?></a></li>
            </ul>
        </div>

        <div class="navbar-brand">
            <a href="<?php echo e(url('/')); ?>">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Vista Verde" class="logo-light" style="height: 50px; width: auto;">
                <img src="<?php echo e(asset('images/logo-dark.png')); ?>" alt="Vista Verde" class="logo-dark" style="height: 50px; width: auto; display: none;">
            </a>
        </div>

        <div class="navbar-right">
            <ul class="navbar-links">
                <li><a href="<?php echo e(url('/membresias')); ?>"><?php echo e(setting('nav_link_membresias', 'Membresías')); ?></a></li>
                <li><a href="<?php echo e(url('/lector')); ?>"><?php echo e(setting('nav_link_carta', 'Carta')); ?></a></li>
                <li><a href="<?php echo e(url('/#contacto')); ?>"><?php echo e(setting('nav_link_contacto', 'Contacto')); ?></a></li>
            </ul>
        </div>
    </div>

    <div class="mobile-overlay" id="mobileOverlay"></div>
    <div class="mobile-drawer" id="mobileDrawer">
        <ul class="mobile-drawer-links">
            <li><a href="<?php echo e(url('/nosotros')); ?>"><?php echo e(setting('nav_link_nosotros', 'Nosotros')); ?></a></li>
            <li><a href="<?php echo e(url('/instalaciones')); ?>"><?php echo e(setting('nav_link_instalaciones', 'Instalaciones')); ?></a></li>
            <li><a href="<?php echo e(url('/clases')); ?>"><?php echo e(setting('nav_link_clases', 'Clases')); ?></a></li>
            <li><a href="<?php echo e(url('/eventos')); ?>"><?php echo e(setting('nav_link_eventos', 'Eventos')); ?></a></li>
            <li><a href="<?php echo e(url('/membresias')); ?>"><?php echo e(setting('nav_link_membresias', 'Membresías')); ?></a></li>
            <li><a href="<?php echo e(url('/lector')); ?>"><?php echo e(setting('nav_link_carta', 'Carta')); ?></a></li>
            <li><a href="<?php echo e(url('/#contacto')); ?>"><?php echo e(setting('nav_link_contacto', 'Contacto')); ?></a></li>
        </ul>
    </div>
</nav>
<?php /**PATH C:\Users\mezaX\OneDrive\Desktop\Landing page VV\resources\views/components/navbar.blade.php ENDPATH**/ ?>