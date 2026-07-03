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

    <!-- Pestañas Selectoras de Categoría -->
    <div class="facilities-tab-container">
        <button class="facilities-tab active" onclick="switchCategory('deportivo', this)">Club Deportivo</button>
        <button class="facilities-tab" onclick="switchCategory('social', this)">Club Social</button>
    </div>

    <!-- ==========================================
       CAROUSEL: CLUB DEPORTIVO
       ========================================== -->
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

            <!-- Tarjeta 4: Gimnasio -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/gimnasio') }}'">
                <div class="bento-img-container" style="height: 220px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=600&q=80" alt="Gimnasio" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Gimnasio</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">Área de cardio y fuerza equipada con máquinas Life Fitness de última generación.</p>
                    <a href="{{ url('/instalaciones/gimnasio') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem; margin-top: auto; align-self: flex-start;">Ver Detalles &rarr;</a>
                </div>
            </div>

            <!-- Tarjeta 5: Pilates -->
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

            <!-- Tarjeta de Cierre: Ver todos -->
            <div class="bento-item" style="cursor: pointer; background-color: var(--color-surface); border: 2px dashed var(--color-accent-gold); display: flex; align-items: center; justify-content: center; text-align: center;" onclick="window.location.href='{{ url('/instalaciones#deportivo') }}'">
                <div style="padding: 2.2rem; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%;">
                    <div style="color: var(--color-accent-gold); margin-bottom: 1.5rem;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 48px; height: 48px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 style="font-family: var(--font-editorial); font-size: 1.6rem; color: var(--color-text-primary); margin-bottom: 0.8rem;">Ver Todo</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; margin-bottom: 1.5rem;">Explore las 11 disciplinas deportivas disponibles en nuestro club.</p>
                    <span style="font-family: var(--font-alt); font-size: 0.8rem; letter-spacing: 1px; text-transform: uppercase; color: var(--color-accent-gold); font-weight: 600;">Explorar Club &rarr;</span>
                </div>
            </div>

        </div>
    </div>

    <!-- ==========================================
       CAROUSEL: CLUB SOCIAL
       ========================================== -->
    <div class="facilities-carousel-wrapper" id="wrapper-social" style="display: none;">
        <div class="facilities-carousel-track" id="track-social">
            
            <!-- Tarjeta 1: Casa Club -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/casa-club') }}'">
                <div class="bento-img-container" style="height: 220px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=600&q=80" alt="Casa Club" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Casa Club</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">El punto de encuentro social y gastronómico con vistas espectaculares.</p>
                    <a href="{{ url('/instalaciones/casa-club') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem; margin-top: auto; align-self: flex-start;">Ver Detalles &rarr;</a>
                </div>
            </div>

            <!-- Tarjeta 2: Spa & Bienestar -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/spa-bienestar') }}'">
                <div class="bento-img-container" style="height: 220px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1519699047748-de8e457a634e?auto=format&fit=crop&w=600&q=80" alt="Spa & Bienestar" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Spa & Bienestar</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">Santuario zen para masajes y terapias holísticas de relajación profunda.</p>
                    <a href="{{ url('/instalaciones/spa-bienestar') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem; margin-top: auto; align-self: flex-start;">Ver Detalles &rarr;</a>
                </div>
            </div>

            <!-- Tarjeta 3: Terraza del Lago -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/terraza-lago') }}'">
                <div class="bento-img-container" style="height: 220px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1587174486073-ae5e5cff23aa?auto=format&fit=crop&w=600&q=80" alt="Terraza del Lago" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Terraza del Lago</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">Mixología premium y platillos finos frente al atardecer del lago.</p>
                    <a href="{{ url('/instalaciones/terraza-lago') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem; margin-top: auto; align-self: flex-start;">Ver Detalles &rarr;</a>
                </div>
            </div>

            <!-- Tarjeta 4: Salón de Eventos -->
            <div class="bento-item" style="cursor: pointer;" onclick="window.location.href='{{ url('/instalaciones/salon-eventos') }}'">
                <div class="bento-img-container" style="height: 220px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=600&q=80" alt="Salón de Eventos" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 1.8rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-family: var(--font-editorial); font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--color-text-primary);">Salón de Eventos</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">Salón de banquetes versátil para celebraciones corporativas y sociales.</p>
                    <a href="{{ url('/instalaciones/salon-eventos') }}" class="btn-link" style="text-decoration: none; color: var(--color-text-primary); font-weight: 600; font-size: 0.85rem; margin-top: auto; align-self: flex-start;">Ver Detalles &rarr;</a>
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

    function switchCategory(category, tabElement) {
        if (activeCategory === category) return;
        activeCategory = category;
        
        // Actualizar pestañas activas
        document.querySelectorAll('.facilities-tab').forEach(btn => btn.classList.remove('active'));
        tabElement.classList.add('active');

        // Mostrar/Ocultar carruseles
        const deportivoSlider = document.getElementById('wrapper-deportivo');
        const socialSlider = document.getElementById('wrapper-social');

        if (category === 'deportivo') {
            deportivoSlider.style.display = 'block';
            socialSlider.style.display = 'none';
        } else {
            deportivoSlider.style.display = 'none';
            socialSlider.style.display = 'block';
        }
        
        // Resetear posición de scroll al cambiar y actualizar estado de botones
        const currentTrack = document.getElementById(`track-${category}`);
        if (currentTrack) {
            currentTrack.scrollLeft = 0;
        }
        updateButtonStates();
    }

    function scrollCarousel(direction) {
        const track = document.getElementById(`track-${activeCategory}`);
        if (!track) return;
        
        // Desplazar 1 tarjeta + el gap (360px ancho + 35px gap aproximadamente = 395px)
        const scrollAmount = 395 * direction;
        track.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        
        // Espera corta a que termine el scroll para actualizar estado
        setTimeout(updateButtonStates, 400);
    }

    function updateButtonStates() {
        const track = document.getElementById(`track-${activeCategory}`);
        if (!track) return;

        const prevBtn = document.getElementById('fac-prev-btn');
        const nextBtn = document.getElementById('fac-next-btn');

        // Botón anterior
        prevBtn.disabled = track.scrollLeft <= 10;

        // Botón siguiente
        nextBtn.disabled = (track.scrollLeft + track.clientWidth) >= (track.scrollWidth - 10);
    }

    // Registrar oyentes para actualizar botones al arrastrar táctilmente en móviles
    document.addEventListener('DOMContentLoaded', () => {
        const tracks = ['track-deportivo', 'track-social'];
        tracks.forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('scroll', () => {
                    clearTimeout(el.scrollTimeout);
                    el.scrollTimeout = setTimeout(updateButtonStates, 100);
                });
            }
        });
        
        // Actualizar botones tras carga de la página
        setTimeout(updateButtonStates, 200);
        
        // Al cambiar el tamaño de la pantalla, actualizar estado por cambios de ancho visible
        window.addEventListener('resize', updateButtonStates);
    });
</script>