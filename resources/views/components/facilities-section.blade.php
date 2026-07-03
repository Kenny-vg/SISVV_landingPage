<!-- resources/views/components/facilities-section.blade.php -->
<section class="premium-section bg-obsidian fade-in-section" id="instalaciones">

    <!-- Encabezado con botones de navegación del carrusel -->
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem; flex-wrap: wrap; gap: 2rem;">
        <div class="section-header-editorial" style="margin-bottom: 0; max-width: 700px;">
            <h2>Instalaciones<br><span>sin precedentes.</span></h2>
            <p>
                Cada espacio de VistaVerde ha sido concebido para fundirse con el paisaje y ofrecer una vivencia de privacidad y sofisticación absoluta.
            </p>
        </div>

        <!-- Flechas de navegación para desktop -->
        <div style="display: flex; gap: 1rem; margin-bottom: 1.5rem;">
            <button class="facilities-carousel-btn" id="fac-prev-btn" onclick="scrollCarousel(-1)" aria-label="Anterior" title="Anterior">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button class="facilities-carousel-btn" id="fac-next-btn" onclick="scrollCarousel(1)" aria-label="Siguiente" title="Siguiente">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Carousel -->
    <div class="facilities-carousel-wrapper" id="wrapper-deportivo" style="display: block;">
        <div class="facilities-carousel-track" id="track-deportivo">

            <!-- Tarjeta 1: Tenis -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/tenis') }}'">
                <div class="bento-img-container" style="height: 220px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?auto=format&fit=crop&w=600&q=80" alt="Tenis" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Tenis</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">Canchas profesionales de arcilla y dura con iluminación LED de alto rendimiento.</p>
                    <a href="{{ url('/instalaciones/tenis') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem; margin-top: auto; align-self: flex-start;">Ver Detalles &rarr;</a>
                </div>
            </div>

            <!-- Tarjeta 2: Pádel -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/padel') }}'">
                <div class="bento-img-container" style="height: 220px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?auto=format&fit=crop&w=600&q=80" alt="Pádel" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Pádel</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">Canchas panorámicas techadas de cristal templado y césped texturizado.</p>
                    <a href="{{ url('/instalaciones/padel') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem; margin-top: auto; align-self: flex-start;">Ver Detalles &rarr;</a>
                </div>
            </div>

            <!-- Tarjeta 3: Natación -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/natacion') }}'">
                <div class="bento-img-container" style="height: 220px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1519315901367-f34ff9154487?auto=format&fit=crop&w=600&q=80" alt="Natación" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Natación</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">Alberca semiolímpica templada para entrenamiento de alto rendimiento.</p>
                    <a href="{{ url('/instalaciones/natacion') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem; margin-top: auto; align-self: flex-start;">Ver Detalles &rarr;</a>
                </div>
            </div>

            <!-- Tarjeta 4: Box -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/box') }}'">
                <div class="bento-img-container" style="height: 220px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1578500351865-d6c3706f46bc?auto=format&fit=crop&w=600&q=80" alt="Box" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Box</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">Ring profesional, sacos de entrenamiento y área de sparring supervisado.</p>
                    <a href="{{ url('/instalaciones/box') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem; margin-top: auto; align-self: flex-start;">Ver Detalles &rarr;</a>
                </div>
            </div>

            <!-- Tarjeta 5: Taekwondo -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/taekwondo') }}'">
                <div class="bento-img-container" style="height: 220px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1555597673-b21d5c9356e0?auto=format&fit=crop&w=600&q=80" alt="Taekwondo" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Taekwondo</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">Dojo equipado con piso de competencia, espejos y entrenadores certificados.</p>
                    <a href="{{ url('/instalaciones/taekwondo') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem; margin-top: auto; align-self: flex-start;">Ver Detalles &rarr;</a>
                </div>
            </div>

            <!-- Tarjeta 6: Zumba -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/zumba') }}'">
                <div class="bento-img-container" style="height: 220px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=600&q=80" alt="Zumba" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Zumba</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">Clases grupales de baile y cardio con instructores de clase mundial.</p>
                    <a href="{{ url('/instalaciones/zumba') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem; margin-top: auto; align-self: flex-start;">Ver Detalles &rarr;</a>
                </div>
            </div>

            <!-- Tarjeta 7: Jumping -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/jumping') }}'">
                <div class="bento-img-container" style="height: 220px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?auto=format&fit=crop&w=600&q=80" alt="Jumping" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Jumping</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">Ejercicio de alto impacto sobre mini-camas elásticas para quemar calorías.</p>
                    <a href="{{ url('/instalaciones/jumping') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem; margin-top: auto; align-self: flex-start;">Ver Detalles &rarr;</a>
                </div>
            </div>

            <!-- Tarjeta 8: Spinning -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/spinning') }}'">
                <div class="bento-img-container" style="height: 220px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1534258936925-c58bed479fcb?auto=format&fit=crop&w=600&q=80" alt="Spinning" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Spinning</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">Sala con bicicletas estáticas de última generación y música envolvente.</p>
                    <a href="{{ url('/instalaciones/spinning') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem; margin-top: auto; align-self: flex-start;">Ver Detalles &rarr;</a>
                </div>
            </div>

            <!-- Tarjeta 9: Pilates -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/pilates') }}'">
                <div class="bento-img-container" style="height: 220px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1599447421416-3414500d18a5?auto=format&fit=crop&w=600&q=80" alt="Pilates" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Pilates</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">Camas reformadoras y aditamentos en un estudio zen cerrado.</p>
                    <a href="{{ url('/instalaciones/pilates') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem; margin-top: auto; align-self: flex-start;">Ver Detalles &rarr;</a>
                </div>
            </div>

            <!-- Tarjeta 10: Sauna y Vapor -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/sauna-vapor') }}'">
                <div class="bento-img-container" style="height: 220px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1570333361746-e0527b0d6c6b?auto=format&fit=crop&w=600&q=80" alt="Sauna y Vapor" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Sauna y Vapor</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">Sauna seca finlandesa y baño de vapor turco para una recuperación total.</p>
                    <a href="{{ url('/instalaciones/sauna-vapor') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem; margin-top: auto; align-self: flex-start;">Ver Detalles &rarr;</a>
                </div>
            </div>

        </div>
    </div>

</section>

<!-- ==========================================
   LÓGICA DEL CARRUSEL E INTERACCIÓN
   ========================================== -->
<script>
    let activeCategory = 'deportivo';

    function scrollCarousel(direction) {
        const track = document.getElementById(`track-${activeCategory}`);
        if (!track) return;

        const scrollAmount = 395 * direction;
        track.scrollBy({ left: scrollAmount, behavior: 'smooth' });

        setTimeout(updateButtonStates, 400);
    }

    function updateButtonStates() {
        const track = document.getElementById(`track-${activeCategory}`);
        if (!track) return;

        const prevBtn = document.getElementById('fac-prev-btn');
        const nextBtn = document.getElementById('fac-next-btn');

        prevBtn.disabled = track.scrollLeft <= 10;

        nextBtn.disabled = (track.scrollLeft + track.clientWidth) >= (track.scrollWidth - 10);
    }

    document.addEventListener('DOMContentLoaded', () => {
        const el = document.getElementById('track-deportivo');
        if (el) {
            el.addEventListener('scroll', () => {
                clearTimeout(el.scrollTimeout);
                el.scrollTimeout = setTimeout(updateButtonStates, 100);
            });
        }

        setTimeout(updateButtonStates, 200);

        window.addEventListener('resize', updateButtonStates);
    });
</script>
