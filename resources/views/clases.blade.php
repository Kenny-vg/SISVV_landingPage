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

            <!-- 01. Tenis -->
            <a href="{{ url('/clases/tenis') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?auto=format&fit=crop&w=800&q=80" alt="Tenis Vista Verde" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">01</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Tenis</h3>
                        <p class="bento-fullbleed-desc">Canchas profesionales de arcilla y superficie dura con iluminación LED de alta definición.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- 02. Pádel -->
            <a href="{{ url('/clases/padel') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?auto=format&fit=crop&w=800&q=80" alt="Pádel Vista Verde" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">02</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Pádel</h3>
                        <p class="bento-fullbleed-desc">Canchas panorámicas techadas de última generación con superficie de césped texturizado.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- 03. Natación -->
            <a href="{{ url('/clases/natacion') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1519315901367-f34ff9154487?auto=format&fit=crop&w=800&q=80" alt="Natación Vista Verde" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">03</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Natación</h3>
                        <p class="bento-fullbleed-desc">Alberca semiolímpica templada con programas de entrenamiento y recreación para todas las edades.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- 04. Box -->
            <a href="{{ url('/clases/box') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1549719386-74dfcbf7dbed?auto=format&fit=crop&w=800&q=80" alt="Box Vista Verde" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">04</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Box</h3>
                        <p class="bento-fullbleed-desc">Estudio completo de boxeo con ring reglamentario profesional y equipamiento Everlast.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- 05. Taekwondo -->
            <a href="{{ url('/clases/taekwondo') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1555597673-b21d5c935865?auto=format&fit=crop&w=800&q=80" alt="Taekwondo Vista Verde" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">05</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Taekwondo</h3>
                        <p class="bento-fullbleed-desc">Área acondicionada con tatami profesional para defensa personal y disciplina física.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- 06. Zumba -->
            <a href="{{ url('/clases/zumba') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=800&q=80" alt="Zumba Vista Verde" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">06</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Zumba</h3>
                        <p class="bento-fullbleed-desc">Salón climatizado con audio premium para rutinas dinámicas grupales aptas para todas las edades.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- 07. Jumping -->
            <a href="{{ url('/clases/jumping') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1526506118085-60ce8714f8c5?auto=format&fit=crop&w=800&q=80" alt="Jumping Vista Verde" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">07</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Jumping</h3>
                        <p class="bento-fullbleed-desc">Entrenamiento aeróbico en trampolines individuales para quemar calorías y fortalecer piernas.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- 08. Spinning -->
            <a href="{{ url('/clases/spinning') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=800&q=80" alt="Spinning Vista Verde" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">08</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Spinning</h3>
                        <p class="bento-fullbleed-desc">Estudio inmersivo de ciclismo indoor con iluminación ambiental y audio digital envolvente.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- 09. Pilates -->
            <a href="{{ url('/clases/pilates') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1599447421416-3414500d18a5?auto=format&fit=crop&w=800&q=80" alt="Pilates Vista Verde" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">09</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Pilates</h3>
                        <p class="bento-fullbleed-desc">Camas reformadoras y aditamentos de alineación postural en un ambiente de total quietud.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- 10. Sauna y Vapor -->
            <a href="{{ url('/clases/sauna-vapor') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1596178065887-1198b6148b2b?auto=format&fit=crop&w=800&q=80" alt="Sauna y Vapor Vista Verde" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">10</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Sauna y Vapor</h3>
                        <p class="bento-fullbleed-desc">Cabinas de calor seco y húmedo con esencias naturales para recuperación y desintoxicación muscular.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

        </div>
    </section>

</div>
@endsection
