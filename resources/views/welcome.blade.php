@extends('layouts.public')

@section('content')

    <section class="hero-asymmetric">
        <div class="hero-left-content">
            <h1>Donde la naturaleza<br><span>encuentra su santuario.</span></h1>
            <p>
                El escenario perfecto para tus mejores momentos.
            </p>
            <button class="btn-gold" onclick="document.getElementById('instalaciones').scrollIntoView({behavior: 'smooth'})">
                Explorar el Club
            </button>
        </div>
        <div class="hero-right-media">
            <img src="https://images.unsplash.com/photo-1587174486073-ae5e5cff23aa?auto=format&fit=crop&w=1200&q=80" alt="Campo de golf VistaVerde al amanecer">
        </div>
    </section>

    <x-about-section />

    <x-facilities-section />

    <x-menu-section />

    <!-- ==========================================
       SECCIÓN DE MEMBRESÍAS (PLANES)
       ========================================== -->
    <section class="premium-section bg-obsidian fade-in-section" id="membresias" style="background-color: var(--color-bg); padding: 8rem 8% 6rem 8%;">
        <div class="section-header-editorial" style="text-align: center; max-width: 800px; margin: 0 auto 5rem auto;">
            <span style="font-family: var(--font-alt); font-size: 0.8rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Membresías Exclusivas</span>
            <h2 style="color: var(--color-text-primary);">Planes de Acceso<br><span>a su medida.</span></h2>
            <p style="color: var(--color-text-secondary); max-width: 600px; margin: 2rem auto 0 auto;">
                Únase a la comunidad de VistaVerde y disfrute de un estilo de vida inigualable. Seleccione la membresía que mejor se adapte a sus necesidades.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2.5rem; max-width: 1200px; margin: 0 auto; align-items: stretch;">
            
            <!-- Plan 1: Individual -->
            <div class="bento-item" style="background-color: var(--color-surface); border: 1px solid var(--color-border-subtle); border-radius: 24px; padding: 3rem 2.2rem; display: flex; flex-direction: column; position: relative;">
                <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); margin-bottom: 1rem; display: block;">Acceso Single</span>
                <h3 style="font-family: var(--font-editorial); font-size: 2rem; color: var(--color-text-primary); margin: 0 0 1rem 0;">Individual</h3>
                <div style="margin-bottom: 2rem;">
                    <span style="font-size: 2.2rem; font-weight: 300; color: var(--color-text-primary);">$3,500</span>
                    <span style="color: var(--color-text-secondary); font-size: 0.9rem;">MXN / mes</span>
                </div>
                <p style="color: var(--color-text-secondary); font-size: 0.95rem; line-height: 1.6; margin-bottom: 2.2rem;">Acceso individual completo para deportistas y profesionales que buscan excelencia física.</p>
                <div style="border-top: 1px solid var(--color-border-subtle); padding-top: 2rem; margin-bottom: 3rem; flex-grow: 1;">
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem;">
                        <li style="display: flex; align-items: center; gap: 0.8rem; font-size: 0.9rem; color: var(--color-text-primary);">
                            <svg fill="none" stroke="var(--color-accent-gold)" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 16px; height: 16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                            Acceso ilimitado a gimnasio y alberca
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.8rem; font-size: 0.9rem; color: var(--color-text-primary);">
                            <svg fill="none" stroke="var(--color-accent-gold)" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 16px; height: 16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                            Reservación de canchas de tenis y pádel
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.8rem; font-size: 0.9rem; color: var(--color-text-primary);">
                            <svg fill="none" stroke="var(--color-accent-gold)" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 16px; height: 16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                            Ingreso a Casa Club y restaurant
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.8rem; font-size: 0.9rem; color: var(--color-text-primary);">
                            <svg fill="none" stroke="var(--color-accent-gold)" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 16px; height: 16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                            Tarifas preferentes en torneos del club
                        </li>
                    </ul>
                </div>
                <a href="#contacto" class="btn-gold" style="text-decoration: none; text-align: center; display: block; border: 1px solid var(--color-accent-gold); background: transparent; color: var(--color-text-primary);">Solicitar Informes</a>
            </div>

            <!-- Plan 2: Familiar (Destacado con acentos dorados) -->
            <div class="bento-item" style="background-color: var(--color-surface); border: 2px solid var(--color-accent-gold); border-radius: 24px; padding: 3rem 2.2rem; display: flex; flex-direction: column; position: relative; box-shadow: 0 10px 30px rgba(193, 201, 77, 0.08);">
                <div style="position: absolute; top: 0; left: 50%; transform: translate(-50%, -50%); background-color: var(--color-accent-gold); color: #07361B; font-family: var(--font-alt); font-size: 0.7rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; padding: 0.4rem 1.2rem; border-radius: 30px; white-space: nowrap;">
                    Más Popular
                </div>
                <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); margin-bottom: 1rem; display: block;">Acceso Familiar</span>
                <h3 style="font-family: var(--font-editorial); font-size: 2rem; color: var(--color-text-primary); margin: 0 0 1rem 0;">Familiar</h3>
                <div style="margin-bottom: 2rem;">
                    <span style="font-size: 2.2rem; font-weight: 300; color: var(--color-text-primary);">$6,500</span>
                    <span style="color: var(--color-text-secondary); font-size: 0.9rem;">MXN / mes</span>
                </div>
                <p style="color: var(--color-text-secondary); font-size: 0.95rem; line-height: 1.6; margin-bottom: 2.2rem;">La experiencia familiar completa de bienestar, deporte y convivencia en comunidad.</p>
                <div style="border-top: 1px solid var(--color-border-subtle); padding-top: 2rem; margin-bottom: 3rem; flex-grow: 1;">
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem;">
                        <li style="display: flex; align-items: center; gap: 0.8rem; font-size: 0.9rem; color: var(--color-text-primary);">
                            <svg fill="none" stroke="var(--color-accent-gold)" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 16px; height: 16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                            Titular, cónyuge e hijos menores de 18 años
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.8rem; font-size: 0.9rem; color: var(--color-text-primary);">
                            <svg fill="none" stroke="var(--color-accent-gold)" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 16px; height: 16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                            Acceso total a áreas deportivas y sociales
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.8rem; font-size: 0.9rem; color: var(--color-text-primary);">
                            <svg fill="none" stroke="var(--color-accent-gold)" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 16px; height: 16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                            4 pases de invitado de cortesía al mes
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.8rem; font-size: 0.9rem; color: var(--color-text-primary);">
                            <svg fill="none" stroke="var(--color-accent-gold)" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 16px; height: 16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                            Descuentos especiales en clases e instrucción
                        </li>
                    </ul>
                </div>
                <a href="#contacto" class="btn-gold" style="text-decoration: none; text-align: center; display: block; background-color: var(--color-accent-gold); color: #07361B; border: none;">Solicitar Informes</a>
            </div>

            <!-- Plan 3: Corporativo -->
            <div class="bento-item" style="background-color: var(--color-surface); border: 1px solid var(--color-border-subtle); border-radius: 24px; padding: 3rem 2.2rem; display: flex; flex-direction: column; position: relative;">
                <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); margin-bottom: 1rem; display: block;">Acceso Business</span>
                <h3 style="font-family: var(--font-editorial); font-size: 2rem; color: var(--color-text-primary); margin: 0 0 1rem 0;">Corporativo</h3>
                <div style="margin-bottom: 2rem;">
                    <span style="font-size: 1.8rem; font-weight: 300; color: var(--color-text-primary);">A Medida</span>
                </div>
                <p style="color: var(--color-text-secondary); font-size: 0.95rem; line-height: 1.6; margin-bottom: 2.2rem;">Soluciones corporativas de esparcimiento y bienestar para su equipo de ejecutivos.</p>
                <div style="border-top: 1px solid var(--color-border-subtle); padding-top: 2rem; margin-bottom: 3rem; flex-grow: 1;">
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem;">
                        <li style="display: flex; align-items: center; gap: 0.8rem; font-size: 0.9rem; color: var(--color-text-primary);">
                            <svg fill="none" stroke="var(--color-accent-gold)" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 16px; height: 16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                            Para 5 o más ejecutivos designados
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.8rem; font-size: 0.9rem; color: var(--color-text-primary);">
                            <svg fill="none" stroke="var(--color-accent-gold)" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 16px; height: 16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                            Uso de salas de juntas en Casa Club
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.8rem; font-size: 0.9rem; color: var(--color-text-primary);">
                            <svg fill="none" stroke="var(--color-accent-gold)" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 16px; height: 16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                            Tarifas especiales para eventos empresariales
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.8rem; font-size: 0.9rem; color: var(--color-text-primary);">
                            <svg fill="none" stroke="var(--color-accent-gold)" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 16px; height: 16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                            Facturación mensual unificada corporativa
                        </li>
                    </ul>
                </div>
                <a href="#contacto" class="btn-gold" style="text-decoration: none; text-align: center; display: block; border: 1px solid var(--color-accent-gold); background: transparent; color: var(--color-text-primary);">Cotizar Plan</a>
            </div>

        </div>
    </section>

    <!-- ==========================================
       SECCIÓN DE CONTACTO & UBICACIÓN (REFACTORIZACIÓN)
       ========================================== -->
    <section class="premium-section bg-obsidian fade-in-section" style="background-color: var(--color-bg); padding: 8rem 8%;" id="contacto">
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
            <div class="contacto-grid-wrapper" style="display: grid; grid-template-columns: 1fr 1.1fr; gap: 5rem; align-items: center;">
                
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