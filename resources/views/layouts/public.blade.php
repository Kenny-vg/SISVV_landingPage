<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'VistaVerde | Golf & Country Club')</title>
    <meta name="description" content="@yield('meta_description', 'Vista Verde Country Club: golf, canchas deportivas, clases y membresías en un entorno único.')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:title" content="@yield('title', 'VistaVerde | Golf & Country Club')">
    <meta property="og:description" content="@yield('meta_description', 'Vista Verde Country Club: golf, canchas deportivas, clases y membresías en un entorno único.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/hero.jpg'))">
    <meta property="og:locale" content="es_MX">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" integrity="sha512-UoT/Ca6+2kRekuB1IDZgwtDt0ZUfsweWmyNhMqhG4hpnf7sFnhrLrO0zHJr2vFp7eZEvJ3FN58dhVx+YMJMt2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', savedTheme);
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />

    <x-accessibility-panel />
    <x-theme-floating-toggle />
    <x-admin-widget />

    @stack('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js" integrity="sha512-EmZuy6vd0ns9wP+3l1hETKq/vNGELFRuLfazPnKKBbDpgZL0sZ7qyao5KgVbGJKOWlAFPNn6G9naB/8WnKN43Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>