<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VistaVerde | Golf & Country Club</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
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

    <x-admin-widget />

    @stack('scripts')
</body>

</html>