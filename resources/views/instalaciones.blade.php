@extends('layouts.public')

@section('content')
<div class="instalaciones-page" style="padding-top: 120px; min-height: 100vh; background-color: var(--color-bg); color: var(--color-text-primary); transition: background-color 0.3s ease;">
    
    <!-- Banner de Encabezado Asimétrico -->
    <header class="section-header-editorial" style="max-width: 1200px; margin: 0 auto 5rem auto; padding: 0 1.5rem;">
        <span style="font-family: var(--font-alt); font-size: 0.8rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Vista Verde Club</span>
        <h1 style="font-size: clamp(2.8rem, 6vw, 4.5rem); line-height: 1.1; margin-bottom: 1.5rem;">Nuestras<br><span>Instalaciones.</span></h1>
        <p style="color: var(--color-text-secondary); max-width: 650px;">
            Descubra espacios concebidos para la excelencia deportiva y el esparcimiento social, donde el diseño arquitectónico de vanguardia se funde con el entorno natural.
        </p>
    </header>

    <!-- ==========================================
       BLOQUE DEPORTIVO (Grid de Disciplinas)
       ========================================== -->
    <section class="premium-section" style="padding: 0 1.5rem 6rem 1.5rem; max-width: 1200px; margin: 0 auto;" id="deportivo">
        <div class="section-header-editorial" style="margin-bottom: 3rem;">
            <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 0.5rem;">Área Fitness & Performance</span>
            <h2 style="font-size: 2.2rem; color: var(--color-text-primary);">Club Deportivo</h2>
            <p style="color: var(--color-text-secondary); font-size: 0.95rem;">Entrenamientos de élite y bienestar físico en instalaciones equipadas con la última tecnología deportiva.</p>
        </div>

        <div class="sports-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 2rem;">
            
            <!-- 1. Tenis -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/tenis') }}'">
                <div class="bento-img-container" style="height: 200px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?auto=format&fit=crop&w=600&q=80" alt="Tenis Vista Verde" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Tenis</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem; flex-grow: 1;">Canchas profesionales de arcilla y superficie dura con iluminación LED de alta definición.</p>
                    <a href="{{ url('/instalaciones/tenis') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem;">Explorar Área &rarr;</a>
                </div>
            </div>

            <!-- 2. Pádel -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/padel') }}'">
                <div class="bento-img-container" style="height: 200px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?auto=format&fit=crop&w=600&q=80" alt="Pádel Vista Verde" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Pádel</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem; flex-grow: 1;">Canchas panorámicas techadas de última generación con superficie de césped texturizado.</p>
                    <a href="{{ url('/instalaciones/padel') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem;">Explorar Área &rarr;</a>
                </div>
            </div>

            <!-- 3. Natación -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/natacion') }}'">
                <div class="bento-img-container" style="height: 200px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1519315901367-f34ff9154487?auto=format&fit=crop&w=600&q=80" alt="Natación Vista Verde" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Natación</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem; flex-grow: 1;">Alberca semiolímpica templada con carriles anti-turbulencia para entrenamiento y recreación.</p>
                    <a href="{{ url('/instalaciones/natacion') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem;">Explorar Área &rarr;</a>
                </div>
            </div>

            <!-- 4. Box -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/box') }}'">
                <div class="bento-img-container" style="height: 200px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1549719386-74dfcbf7dbed?auto=format&fit=crop&w=600&q=80" alt="Box Vista Verde" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Box</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem; flex-grow: 1;">Estudio completo de boxeo con ring reglamentario profesional y equipamiento Everlast.</p>
                    <a href="{{ url('/instalaciones/box') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem;">Explorar Área &rarr;</a>
                </div>
            </div>

            <!-- 5. Taekwondo -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/taekwondo') }}'">
                <div class="bento-img-container" style="height: 200px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1555597673-b21d5c935865?auto=format&fit=crop&w=600&q=80" alt="Taekwondo Vista Verde" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Taekwondo</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem; flex-grow: 1;">Área acondicionada con tatami profesional para la práctica de defensa personal y disciplina física.</p>
                    <a href="{{ url('/instalaciones/taekwondo') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem;">Explorar Área &rarr;</a>
                </div>
            </div>

            <!-- 6. Zumba -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/zumba') }}'">
                <div class="bento-img-container" style="height: 200px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=600&q=80" alt="Zumba Vista Verde" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Zumba</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem; flex-grow: 1;">Salón climatizado y equipado con sistemas de audio premium para rutinas dinámicas grupales.</p>
                    <a href="{{ url('/instalaciones/zumba') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem;">Explorar Área &rarr;</a>
                </div>
            </div>

            <!-- 7. Jumping -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/jumping') }}'">
                <div class="bento-img-container" style="height: 200px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1526506118085-60ce8714f8c5?auto=format&fit=crop&w=600&q=80" alt="Jumping Vista Verde" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Jumping</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem; flex-grow: 1;">Entrenamiento aeróbico en trampolines individuales para quemar calorías y fortalecer piernas.</p>
                    <a href="{{ url('/instalaciones/jumping') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem;">Explorar Área &rarr;</a>
                </div>
            </div>

            <!-- 8. Spinning -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/spinning') }}'">
                <div class="bento-img-container" style="height: 200px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=600&q=80" alt="Spinning Vista Verde" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Spinning</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem; flex-grow: 1;">Estudio inmersivo de ciclismo indoor con sistema de iluminación ambiental y audio digital.</p>
                    <a href="{{ url('/instalaciones/spinning') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem;">Explorar Área &rarr;</a>
                </div>
            </div>

            <!-- 9. Pilates -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/pilates') }}'">
                <div class="bento-img-container" style="height: 200px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1599447421416-3414500d18a5?auto=format&fit=crop&w=600&q=80" alt="Pilates Vista Verde" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Pilates</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem; flex-grow: 1;">Camas reformadoras y aditamentos de alineación postural en un ambiente de total quietud.</p>
                    <a href="{{ url('/instalaciones/pilates') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem;">Explorar Área &rarr;</a>
                </div>
            </div>

            <!-- 10. Sauna y vapor -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/sauna-vapor') }}'">
                <div class="bento-img-container" style="height: 200px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1596178065887-1198b6148b2b?auto=format&fit=crop&w=600&q=80" alt="Sauna y Vapor Vista Verde" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Sauna y vapor</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem; flex-grow: 1;">Cabinas relajantes de calor seco y húmedo con esencias naturales para desintoxicación muscular.</p>
                    <a href="{{ url('/instalaciones/sauna-vapor') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem;">Explorar Área &rarr;</a>
                </div>
            </div>

            <!-- 11. Gimnasio -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/gimnasio') }}'">
                <div class="bento-img-container" style="height: 200px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=600&q=80" alt="Gimnasio Vista Verde" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Gimnasio</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem; flex-grow: 1;">Máquinas de fuerza premium Life Fitness, peso libre y áreas integrales de resistencia.</p>
                    <a href="{{ url('/instalaciones/gimnasio') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem;">Explorar Área &rarr;</a>
                </div>
            </div>

        </div>
    </section>

</div>
@endsection
