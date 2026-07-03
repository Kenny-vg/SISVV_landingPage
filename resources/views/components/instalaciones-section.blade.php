<!-- resources/views/components/instalaciones-section.blade.php -->
<section class="premium-section bg-obsidian fade-in-section" id="instalaciones">

    <!-- Encabezado -->
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2.5rem; flex-wrap: wrap; gap: 2rem;">
        <div class="section-header-editorial" style="margin-bottom: 0; max-width: 700px;">
            <h2>Espacios del<br><span>Club.</span></h2>
            <p>
                Cada rincón de Vista Verde ha sido diseñado para ofrecerte una experiencia de exclusividad y confort sin igual, desde la Casa Club hasta nuestro Spa de bienestar.
            </p>
        </div>
        <a href="{{ url('/instalaciones') }}" class="btn-gold" style="text-decoration: none; display: inline-block; white-space: nowrap;">
            Ver Todas
        </a>
    </div>

    <!-- Grid 2×2 de Lugares -->
    <div class="instalaciones-grid">

        <!-- Casa Club -->
        <a href="{{ url('/instalaciones/casa-club') }}" class="bento-fullbleed">
            <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=1200&q=80" alt="Casa Club Vista Verde" class="bento-fullbleed-img">
            <div class="bento-fullbleed-overlay"></div>
            <div class="bento-fullbleed-content">
                <span class="bento-fullbleed-number">01</span>
                <div class="bento-fullbleed-bottom">
                    <h3 class="bento-fullbleed-title">Casa Club</h3>
                    <p class="bento-fullbleed-desc">El corazón social del club. Vestíbulos de lujo, salones con chimenea y biblioteca privada.</p>
                    <span class="bento-fullbleed-link">Conocer más &rarr;</span>
                </div>
            </div>
        </a>

        <!-- Spa & Bienestar -->
        <a href="{{ url('/instalaciones/spa-bienestar') }}" class="bento-fullbleed">
            <img src="https://images.unsplash.com/photo-1519699047748-de8e457a634e?auto=format&fit=crop&w=1200&q=80" alt="Spa Vista Verde" class="bento-fullbleed-img">
            <div class="bento-fullbleed-overlay"></div>
            <div class="bento-fullbleed-content">
                <span class="bento-fullbleed-number">02</span>
                <div class="bento-fullbleed-bottom">
                    <h3 class="bento-fullbleed-title">Spa & Bienestar</h3>
                    <p class="bento-fullbleed-desc">Santuario de relajación con masajes, faciales y cabina zen para recuperación total.</p>
                    <span class="bento-fullbleed-link">Conocer más &rarr;</span>
                </div>
            </div>
        </a>

        <!-- Salón de Eventos -->
        <a href="{{ url('/instalaciones/salon-eventos') }}" class="bento-fullbleed">
            <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=1200&q=80" alt="Salón de Eventos Vista Verde" class="bento-fullbleed-img">
            <div class="bento-fullbleed-overlay"></div>
            <div class="bento-fullbleed-content">
                <span class="bento-fullbleed-number">03</span>
                <div class="bento-fullbleed-bottom">
                    <h3 class="bento-fullbleed-title">Salón de Eventos</h3>
                    <p class="bento-fullbleed-desc">Bodas, banquetes y eventos corporativos con sonido Bose e iluminación adaptable.</p>
                    <span class="bento-fullbleed-link">Conocer más &rarr;</span>
                </div>
            </div>
        </a>

        <!-- Gimnasio -->
        <a href="{{ url('/instalaciones/gimnasio') }}" class="bento-fullbleed">
            <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=1200&q=80" alt="Gimnasio Vista Verde" class="bento-fullbleed-img">
            <div class="bento-fullbleed-overlay"></div>
            <div class="bento-fullbleed-content">
                <span class="bento-fullbleed-number">04</span>
                <div class="bento-fullbleed-bottom">
                    <h3 class="bento-fullbleed-title">Gimnasio</h3>
                    <p class="bento-fullbleed-desc">Equipamiento premium Life Fitness con zona de peso libre y cardio de última generación.</p>
                    <span class="bento-fullbleed-link">Conocer más &rarr;</span>
                </div>
            </div>
        </a>

    </div>

</section>
