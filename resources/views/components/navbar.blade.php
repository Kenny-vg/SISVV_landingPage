<nav class="premium-navbar" id="main-navbar">
    <div class="navbar-container">
        <div class="navbar-left">
            <button id="hamburger-btn" class="hamburger-btn" aria-label="Menú" title="Menú">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="navbar-links">
                <li><a href="{{ url('/nosotros') }}">{{ setting('nav_link_nosotros', 'Nosotros') }}</a></li>
                <li><a href="{{ url('/instalaciones') }}">{{ setting('nav_link_instalaciones', 'Instalaciones') }}</a></li>
                <li><a href="{{ url('/clases') }}">{{ setting('nav_link_clases', 'Clases') }}</a></li>
                <li><a href="{{ url('/eventos') }}">{{ setting('nav_link_eventos', 'Eventos') }}</a></li>
            </ul>
        </div>

        <div class="navbar-brand">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Vista Verde" class="logo-light" style="height: 50px; width: auto;">
                <img src="{{ asset('images/logo-dark.png') }}" alt="Vista Verde" class="logo-dark" style="height: 50px; width: auto; display: none;">
            </a>
        </div>

        <div class="navbar-right">
            <ul class="navbar-links">
                <li><a href="{{ url('/membresias') }}">{{ setting('nav_link_membresias', 'Membresías') }}</a></li>
                <li><a href="{{ url('/lector') }}">{{ setting('nav_link_carta', 'Carta') }}</a></li>
                <li><a href="{{ url('/#contacto') }}">{{ setting('nav_link_contacto', 'Contacto') }}</a></li>
            </ul>
        </div>
    </div>

    <div class="mobile-overlay" id="mobileOverlay"></div>
    <div class="mobile-drawer" id="mobileDrawer">
        <ul class="mobile-drawer-links">
            <li><a href="{{ url('/nosotros') }}">{{ setting('nav_link_nosotros', 'Nosotros') }}</a></li>
            <li><a href="{{ url('/instalaciones') }}">{{ setting('nav_link_instalaciones', 'Instalaciones') }}</a></li>
            <li><a href="{{ url('/clases') }}">{{ setting('nav_link_clases', 'Clases') }}</a></li>
            <li><a href="{{ url('/eventos') }}">{{ setting('nav_link_eventos', 'Eventos') }}</a></li>
            <li><a href="{{ url('/membresias') }}">{{ setting('nav_link_membresias', 'Membresías') }}</a></li>
            <li><a href="{{ url('/lector') }}">{{ setting('nav_link_carta', 'Carta') }}</a></li>
            <li><a href="{{ url('/#contacto') }}">{{ setting('nav_link_contacto', 'Contacto') }}</a></li>
        </ul>
    </div>
</nav>
