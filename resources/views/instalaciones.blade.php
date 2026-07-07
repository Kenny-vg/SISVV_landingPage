@extends('layouts.public')

@section('content')
<div class="instalaciones-page" style="padding-top: 120px; min-height: 100vh; background-color: var(--color-bg); color: var(--color-text-primary); transition: background-color 0.3s ease;">

    <!-- Banner de Encabezado Asimétrico -->
    <header class="section-header-editorial" style="max-width: 1200px; margin: 0 auto 5rem auto; padding: 0 1.5rem;">
        <span style="font-family: var(--font-alt); font-size: 0.8rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Vista Verde Club</span>
        <h1 style="font-size: clamp(2.8rem, 6vw, 4.5rem); line-height: 1.1; margin-bottom: 1.5rem;">Nuestras<br><span>Instalaciones.</span></h1>
        <p style="max-width: 650px;">
            Espacios concebidos para la excelencia y el esparcimiento social, donde el diseño de vanguardia se funde con el entorno natural del club.
        </p>
    </header>

    <!-- Grid de Instalaciones (bento-fullbleed como Clases) -->
    <section style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem 6rem 1.5rem;">

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">

            @forelse($facilities as $facility)
            <a href="{{ url('/instalaciones/'.$facility->slug) }}" class="bento-fullbleed">
                @if($facility->panorama_path)
                <span style="position:absolute;top:1rem;right:1rem;z-index:3;background:rgba(0,0,0,0.7);color:var(--color-accent-gold);padding:0.25rem 0.6rem;border-radius:6px;font-size:0.7rem;font-weight:700;font-family:var(--font-alt);letter-spacing:1px;backdrop-filter:blur(4px);">360°</span>
                @endif
                <img src="{{ ($img = $facility->images->first()) ? asset('storage/' . $img->image_path) : asset('images/hero.jpg') }}" alt="{{ $facility->title }}" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">{{ $facility->title }}</h3>
                        <p class="bento-fullbleed-desc">{{ Str::limit(strip_tags($facility->description), 120) }}</p>
                        <span class="bento-fullbleed-link">Conocer más &rarr;</span>
                    </div>
                </div>
            </a>
            @empty
            <p style="color: var(--color-text-secondary); text-align: center; padding: 2rem; grid-column: 1 / -1;">No hay espacios disponibles actualmente.</p>
            @endforelse

        </div>
    </section>

</div>
@endsection
