<nav class="premium-navbar" id="main-navbar">
    <div class="navbar-brand">
        <a href="{{ url('/') }}" style="text-decoration: none;">
            <h2>Vista<span>Verde</span></h2>
        </a>
    </div>

    <ul class="navbar-links">
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li><a href="{{ url('/#instalaciones') }}">Instalaciones</a></li>
        <li><a href="{{ url('/lector-pdf') }}">Gastronomía</a></li>
    </ul>

    <div class="navbar-actions" style="display: flex; align-items: center; gap: 1rem;">
        <button id="theme-toggle" class="btn-theme-toggle" aria-label="Alternar tema" title="Alternar tema">
            <!-- Luna (Modo Claro) -->
            <svg class="theme-icon-moon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
            </svg>
            <!-- Sol (Modo Oscuro) -->
            <svg class="theme-icon-sun" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"></path>
            </svg>
        </button>

        @auth
            <a href="{{ url('/admin') }}" class="btn-portal">Portal de Socios</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline; margin-left: 1rem;">
                @csrf
                <button type="submit" class="btn-link" style="font-size: 0.7rem; text-decoration: none; border: none; background: none; color: var(--color-text-secondary); cursor: pointer; letter-spacing: 1px;">Salir</button>
            </form>
        @else
            <a href="{{ url('/admin') }}" class="btn-portal">Portal de Socios</a>
        @endauth
    </div>
</nav>