@extends('layouts.public')

@section('content')
<div class="instalaciones-page" style="padding-top: 120px; min-height: 100vh; background-color: var(--color-bg); color: var(--color-text-primary); transition: background-color 0.3s ease;">

    <!-- Banner de Encabezado Asimétrico -->
    <header class="section-header-editorial" style="max-width: 1200px; margin: 0 auto 5rem auto; padding: 0 1.5rem;">
        <span style="font-family: var(--font-alt); font-size: 0.8rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Vista Verde Club</span>
        <h1 style="font-size: clamp(2.8rem, 6vw, 4.5rem); line-height: 1.1; margin-bottom: 1.5rem;">Nuestras<br><span>Instalaciones.</span></h1>
        <p style="color: var(--color-text-secondary); max-width: 650px;">
            Espacios concebidos para la excelencia y el esparcimiento social, donde el diseño de vanguardia se funde con el entorno natural del club.
        </p>
    </header>

    <!-- Grid de Instalaciones (Lugares del Club) -->
    <section class="premium-section" style="padding: 0 1.5rem 6rem 1.5rem; max-width: 1200px; margin: 0 auto;" id="instalaciones-grid">

        <div class="instalaciones-grid">

            <!-- 01. Casa Club -->
            <a href="{{ url('/instalaciones/casa-club') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=1200&q=80" alt="Casa Club Vista Verde" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">01</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Casa Club</h3>
                        <p class="bento-fullbleed-desc">Vestíbulos con acabados de lujo, salones con chimenea, biblioteca y acceso directo a zonas gastronómicas.</p>
                        <span class="bento-fullbleed-link">Conocer más &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- 02. Spa & Bienestar -->
            <a href="{{ url('/instalaciones/spa-bienestar') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1519699047748-de8e457a634e?auto=format&fit=crop&w=1200&q=80" alt="Spa Vista Verde" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">02</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Spa & Bienestar</h3>
                        <p class="bento-fullbleed-desc">Masajes, faciales, envolturas de barro y cabina zen en un santuario de relajación absoluta.</p>
                        <span class="bento-fullbleed-link">Conocer más &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- 03. Salón de Eventos -->
            <a href="{{ url('/instalaciones/salon-eventos') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=1200&q=80" alt="Salón de Eventos Vista Verde" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">03</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Salón de Eventos</h3>
                        <p class="bento-fullbleed-desc">Bodas, banquetes y eventos corporativos con sonido Bose, iluminación adaptable y cocina de apoyo.</p>
                        <span class="bento-fullbleed-link">Conocer más &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- 04. Gimnasio -->
            <a href="{{ url('/instalaciones/gimnasio') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=1200&q=80" alt="Gimnasio Vista Verde" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">04</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Gimnasio</h3>
                        <p class="bento-fullbleed-desc">Equipamiento premium Life Fitness, peso libre y máquinas cardiovasculares de última generación.</p>
                        <span class="bento-fullbleed-link">Conocer más &rarr;</span>
                    </div>
                </div>
            </a>

        </div>
    </section>

</div>
@endsection
