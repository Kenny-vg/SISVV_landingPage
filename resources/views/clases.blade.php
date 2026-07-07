@extends('layouts.public')

@section('content')
<div class="clases-page" style="padding-top: 120px; min-height: 100vh; background-color: var(--color-bg); color: var(--color-text-primary); transition: background-color 0.3s ease;">

    <!-- Banner de Encabezado Asimétrico -->
    <header class="section-header-editorial" style="max-width: 1200px; margin: 0 auto 5rem auto; padding: 0 1.5rem;">
        <span style="font-family: var(--font-alt); font-size: 0.8rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Vista Verde Club</span>
        <h1 style="font-size: clamp(2.8rem, 6vw, 4.5rem); line-height: 1.1; margin-bottom: 1.5rem;">Nuestras<br><span>Clases.</span></h1>
        <p style="color: var(--color-text-secondary); max-width: 650px;">
            Disciplinas de élite impartidas por instructores certificados, diseñadas para elevar tu rendimiento y bienestar en cada sesión.
        </p>
    </header>

    <!-- Grid de Clases -->
    <section class="premium-section" style="padding: 0 1.5rem 6rem 1.5rem; max-width: 1200px; margin: 0 auto;" id="clases-grid">

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">

            @forelse($disciplines as $discipline)
            <a href="{{ url('/clases/'.$discipline->slug) }}" class="bento-fullbleed">
                <img src="{{ ($img = $discipline->images->first()) ? asset('storage/' . $img->image_path) : asset('images/hero.jpg') }}" alt="{{ $discipline->title }}" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">{{ $discipline->title }}</h3>
                        <p class="bento-fullbleed-desc">{{ Str::limit(strip_tags($discipline->description), 120) }}</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>
            @empty
            <p style="color: var(--color-text-secondary); text-align: center; padding: 2rem; grid-column: 1 / -1;">No hay clases disponibles actualmente.</p>
            @endforelse

        </div>
    </section>

</div>
@endsection
