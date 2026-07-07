<nav class="premium-navbar" id="main-navbar">
    <div class="navbar-left">
        <ul class="navbar-links">
            <li><a href="{{ url('/nosotros') }}">{{ setting('nav_link_nosotros', 'Sobre Nosotros') }}</a></li>
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

    <div class="navbar-actions">
        <button id="theme-toggle" class="btn-theme-toggle" aria-label="Alternar tema" title="Alternar tema">
            <svg class="theme-icon-moon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
            </svg>
            <svg class="theme-icon-sun" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"></path>
            </svg>
        </button>
    </div>
</nav>
