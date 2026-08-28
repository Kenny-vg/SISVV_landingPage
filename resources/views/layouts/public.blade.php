<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'VistaVerde | Golf & Country Club')</title>
    <meta name="description" content="@yield('meta_description', 'Vista Verde Country Club: golf, canchas deportivas, clases y membresías en un entorno único.')">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="author" content="Vista Verde Country Club">
    <meta name="keywords" content="Vista Verde Country Club, club campestre Tehuacán, campo de golf Tehuacán, club deportivo Puebla, membresías club, clases golf, pádel, tenis, natación">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vista Verde Country Club">
    <meta property="og:title" content="@yield('title', 'Vista Verde Country Club | Golf & Country Club en Tehuacán')">
    <meta property="og:description" content="@yield('meta_description', 'Vista Verde Country Club: campo de golf, canchas deportivas, clases, eventos y membresías en Tehuacán, Puebla. Un refugio privado en sintonía con la naturaleza.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/hero.jpg'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="es_MX">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Vista Verde Country Club | Golf & Country Club en Tehuacán')">
    <meta name="twitter:description" content="@yield('meta_description', 'Vista Verde Country Club: golf, canchas deportivas, clases y membresías en un entorno único.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/hero.jpg'))">
    <meta name="theme-color" content="#14241D">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" integrity="sha512-UoT/Ca6+2kRekuB1IDZgwtDt0ZUfsweWmyNhMqhG4hpnf7sFnhrLrO0zHJr2vFp7eZEvJ3FN58dhVx+YMJMt2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script nonce="{{ csp_nonce() }}">
        (function() {
            const savedTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', savedTheme);
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script type="application/ld+json" nonce="{{ csp_nonce() }}">
    {
        "@context": "https://schema.org",
        "@type": "SportsActivityLocation",
        "name": "Vista Verde Country Club",
        "url": "https://vistaverde.com.mx",
        "image": "{{ asset('images/hero.jpg') }}",
        "description": "Vista Verde Country Club: campo de golf, canchas deportivas, clases, eventos y membresías en Tehuacán, Puebla.",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Tehuacán",
            "addressRegion": "Puebla",
            "addressCountry": "MX"
        },
        "telephone": "{{ setting('contact_phone', '') }}",
        "sameAs": [
            "{{ setting('social_facebook', '') }}",
            "{{ setting('social_instagram', '') }}"
        ]
    }
    </script>
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