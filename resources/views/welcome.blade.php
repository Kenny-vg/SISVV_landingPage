@extends('layouts.public')

@section('content')

    <section class="hero-asymmetric" style="background-image: url('{{ asset('images/hero.jpg') }}');">
        <div class="hero-overlay"></div>
        <img src="{{ asset('images/golfista.png') }}" alt="" class="hero-golfista">
        <img src="{{ asset('images/pelota-golf.png') }}" alt="" class="hero-golf-ball">
        <div class="hero-content">
            <h1>Donde cada día se <span>disfruta diferente</span></h1>
            <p>
                Naturaleza, bienestar y experiencias que elevan tu estilo de vida.
            </p>
            <button class="btn-gold" onclick="document.getElementById('instalaciones').scrollIntoView({behavior: 'smooth'})">
                Explorar el Club
            </button>
        </div>
    </section>

    <x-about-section />

    <x-facilities-section />

    <x-menu-section />



    <!-- ==========================================
       SECCIÓN DE CONTACTO & UBICACIÓN (REFACTORIZACIÓN)
       ========================================== -->
    <section class="premium-section bg-obsidian fade-in-section" style="background-color: var(--color-bg); padding: 5rem 8%;" id="contacto">
        <style>
            @media (max-width: 991px) {
                .contacto-grid-wrapper {
                    grid-template-columns: 1fr !important;
                    gap: 3.5rem !important;
                }
                .map-iframe-container {
                    height: 350px !important;
                }
            }
        </style>

        <div style="max-width: 1200px; margin: 0 auto;">
            <div class="contacto-grid-wrapper" style="display: grid; grid-template-columns: 1fr 1.1fr; gap: 3.5rem; align-items: center;">
                
                <!-- Columna Izquierda: Información de Ubicación Minimalista -->
                <div>
                    <div class="section-header-editorial" style="margin-bottom: 3rem;">
                        <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 0.8rem;">Visítenos</span>
                        <h2 style="color: var(--color-text-primary);">Ubicación<br><span>y acceso.</span></h2>
                        <p style="color: var(--color-text-secondary); margin-top: 1.5rem; line-height: 1.7; font-size: 0.95rem;">
                            Vista Verde Country Club se encuentra ubicado en una zona privilegiada y de fácil acceso en Tehuacán, ofreciendo un entorno natural exclusivo de total privacidad para sus socios.
                        </p>
                    </div>

                    <!-- Dirección Física con Línea Dorada de Acento -->
                    <div style="margin-bottom: 2.5rem; border-left: 2px solid var(--color-accent-gold); padding-left: 1.5rem; display: flex; flex-direction: column; gap: 0.5rem;">
                        <span style="font-family: var(--font-alt); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: var(--color-text-secondary); opacity: 0.7;">Dirección Principal</span>
                        <p style="margin: 0; font-family: var(--font-base); font-size: 1.05rem; color: var(--color-text-primary); font-weight: 600;">Casa Club Vista Verde</p>
                        <p style="margin: 0; color: var(--color-text-secondary); font-size: 0.95rem; line-height: 1.5;">
                            Carretera Federal México-Tehuacán Km. 252,<br>
                            San Nicolás Tetitzintla, 75710 Tehuacán, Pue.
                        </p>
                    </div>

                    <a href="https://www.google.com/maps/place/Casa+Club+Vista+Verde+Country+Club/@18.4835419,-97.4133092,17z" target="_blank" rel="noopener" class="btn-link" style="text-decoration: none; color: var(--color-accent-gold); font-family: var(--font-alt); font-size: 0.8rem; letter-spacing: 1.5px; text-transform: uppercase; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateX(5px)'" onmouseout="this.style.transform='translateX(0)'">
                        Cómo Llegar en Google Maps &rarr;
                    </a>
                </div>

                <!-- Columna Derecha: Mapa de Google Maps Interactivo Completo -->
                <div>
                    <div class="map-iframe-container" style="width: 100%; height: 450px; border-radius: 24px; overflow: hidden; border: 1px solid var(--color-border-subtle); box-shadow: 0 15px 35px rgba(0,0,0,0.05);">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3784.002589867335!2d-97.41330921649934!3d18.483541887826103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c5a2cf77bbf7f9%3A0x992163d342c0d985!2sCasa%20Club%20Vista%20Verde%20Country%20Club!5e0!3m2!1ses-419!2smx!4v1783023157035!5m2!1ses-419!2smx" width="100%" height="100%" style="border:0; display: block;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection