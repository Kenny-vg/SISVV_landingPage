<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | VistaVerde Golf & Country Club</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', savedTheme);
        })();
    </script>
    @vite(['resources/css/error.css'])
</head>

<body>

    <div class="error-page">
        <div class="error-overlay"></div>

        <header class="error-header">
            <a href="{{ url('/') }}" class="error-brand" aria-label="Vista Verde - Inicio">
                <img src="{{ asset('images/logo.png') }}" alt="Vista Verde">
            </a>
        </header>

        <main class="error-body">
            <span class="error-label">{{ setting('site_name', 'VistaVerde Country Club') }}</span>
            <div class="error-number">@yield('number')</div>
            <h1 class="error-title">@yield('title')</h1>
            <p class="error-message">@yield('message')</p>
            <div class="error-actions">
                <a href="{{ url('/') }}" class="error-btn error-btn-primary">Volver al inicio</a>
                <a href="{{ url('/#contacto') }}" class="error-btn-link">Contactar soporte</a>
            </div>
        </main>

        <img src="{{ asset('images/pelota-golf.png') }}" alt="" class="error-ball">
    </div>

</body>

</html>
