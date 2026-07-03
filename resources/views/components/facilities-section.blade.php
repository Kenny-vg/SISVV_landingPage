<!-- resources/views/components/facilities-section.blade.php -->
<section class="premium-section bg-obsidian fade-in-section" id="clases">

    <!-- Encabezado con botones de navegación del carrusel -->
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem; flex-wrap: wrap; gap: 2rem;">
        <div class="section-header-editorial" style="margin-bottom: 0; max-width: 700px;">
            <h2>Clases &<br><span>Disciplinas.</span></h2>
            <p>
                Instructores certificados, metodología de élite y espacios de primer nivel para elevar tu rendimiento y bienestar en cada sesión.
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
            <a href="{{ url('/clases/tenis') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?auto=format&fit=crop&w=600&q=80" alt="Tenis" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">01</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Tenis</h3>
                        <p class="bento-fullbleed-desc">Canchas profesionales de arcilla y dura con iluminación LED de alto rendimiento.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- Tarjeta 2: Pádel -->
            <a href="{{ url('/clases/padel') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?auto=format&fit=crop&w=600&q=80" alt="Pádel" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">02</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Pádel</h3>
                        <p class="bento-fullbleed-desc">Canchas panorámicas techadas de cristal templado y césped texturizado.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- Tarjeta 3: Natación -->
            <a href="{{ url('/clases/natacion') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1519315901367-f34ff9154487?auto=format&fit=crop&w=600&q=80" alt="Natación" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">03</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Natación</h3>
                        <p class="bento-fullbleed-desc">Alberca semiolímpica templada para entrenamiento de alto rendimiento.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- Tarjeta 4: Box -->
            <a href="{{ url('/clases/box') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1578500351865-d6c3706f46bc?auto=format&fit=crop&w=600&q=80" alt="Box" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">04</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Box</h3>
                        <p class="bento-fullbleed-desc">Ring profesional, sacos de entrenamiento y área de sparring supervisado.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- Tarjeta 5: Taekwondo -->
            <a href="{{ url('/clases/taekwondo') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1555597673-b21d5c9356e0?auto=format&fit=crop&w=600&q=80" alt="Taekwondo" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">05</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Taekwondo</h3>
                        <p class="bento-fullbleed-desc">Dojo con piso de competencia, espejos y entrenadores certificados.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- Tarjeta 6: Zumba -->
            <a href="{{ url('/clases/zumba') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=600&q=80" alt="Zumba" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">06</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Zumba</h3>
                        <p class="bento-fullbleed-desc">Clases grupales de baile y cardio con instructores de clase mundial.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- Tarjeta 7: Jumping -->
            <a href="{{ url('/clases/jumping') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?auto=format&fit=crop&w=600&q=80" alt="Jumping" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">07</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Jumping</h3>
                        <p class="bento-fullbleed-desc">Alto impacto sobre mini-camas elásticas para quemar calorías y ganar resistencia.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- Tarjeta 8: Spinning -->
            <a href="{{ url('/clases/spinning') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1534258936925-c58bed479fcb?auto=format&fit=crop&w=600&q=80" alt="Spinning" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">08</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Spinning</h3>
                        <p class="bento-fullbleed-desc">Bicicletas estáticas de última generación con audio envolvente y ambiente inmersivo.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- Tarjeta 9: Pilates -->
            <a href="{{ url('/clases/pilates') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1599447421416-3414500d18a5?auto=format&fit=crop&w=600&q=80" alt="Pilates" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">09</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Pilates</h3>
                        <p class="bento-fullbleed-desc">Camas reformadoras y aditamentos en un estudio zen cerrado de total quietud.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- Tarjeta 10: Sauna y Vapor -->
            <a href="{{ url('/clases/sauna-vapor') }}" class="bento-fullbleed">
                <img src="https://images.unsplash.com/photo-1570333361746-e0527b0d6c6b?auto=format&fit=crop&w=600&q=80" alt="Sauna y Vapor" class="bento-fullbleed-img">
                <div class="bento-fullbleed-overlay"></div>
                <div class="bento-fullbleed-content">
                    <span class="bento-fullbleed-number">10</span>
                    <div class="bento-fullbleed-bottom">
                        <h3 class="bento-fullbleed-title">Sauna y Vapor</h3>
                        <p class="bento-fullbleed-desc">Sauna seca finlandesa y baño de vapor turco para una recuperación total.</p>
                        <span class="bento-fullbleed-link">Ver Clase &rarr;</span>
                    </div>
                </div>
            </a>

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

        const scrollAmount = 375 * direction;
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
