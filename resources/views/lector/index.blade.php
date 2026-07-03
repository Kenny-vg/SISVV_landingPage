@extends('layouts.public')

@section('content')
<div class="lector-page" style="padding-top: 120px; min-height: 100vh; background-color: var(--color-bg); transition: background-color 0.3s ease;">
    <div class="lector-container" style="max-width: 1200px; margin: 0 auto; padding: 2rem 1.5rem 8rem 1.5rem;">
        
        <!-- Cabecera Editorial Elegante -->
        <header class="section-header-editorial" style="margin-bottom: 4rem; text-align: center; max-width: 800px; margin-left: auto; margin-right: auto;">
            <span style="font-family: var(--font-alt); font-size: 0.8rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Experiencia Gastronómica</span>
            <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); color: var(--color-text-primary); margin-bottom: 1.5rem; line-height: 1.1;">Nuestra Carta</h1>
            <p style="color: var(--color-text-secondary); max-width: 600px; margin: 0 auto;">
                Seleccione una de nuestras categorías para descubrir una propuesta culinaria de temporada diseñada para deleitar sus sentidos.
            </p>
        </header>

        <!-- Bento Grid para las Categorías del Menú -->
        <div class="bento-grid">
            
            <!-- Desayunos (Ancho 6) -->
            <div class="bento-item bento-col-6" style="cursor: pointer;" onclick="window.location.href='{{ url('/lector-pdf?category=desayunos') }}'">
                <div class="bento-img-container" style="height: 300px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1496042409852-2434aff974de?auto=format&fit=crop&w=1000&q=80" alt="Desayunos y Brunch Vista Verde" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 2.2rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); margin-bottom: 0.5rem; display: block;">08:00 AM - 12:30 PM</span>
                    <h3 style="font-family: var(--font-editorial); font-size: 1.8rem; margin-bottom: 0.75rem; color: var(--color-text-primary);">Desayunos & Brunch</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;">Comience el día con una selección de repostería artesanal, platillos tradicionales, frutas de temporada y jugos naturales prensados.</p>
                    <a href="{{ url('/lector-pdf?category=desayunos') }}" class="btn-link" style="margin-top: auto; align-self: flex-start; text-decoration: none; color: var(--color-text-primary); font-weight: 600;">Ver Menú &rarr;</a>
                </div>
            </div>

            <!-- Comida (Ancho 6) -->
            <div class="bento-item bento-col-6" style="cursor: pointer;" onclick="window.location.href='{{ url('/lector-pdf?category=comida') }}'">
                <div class="bento-img-container" style="height: 300px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=1000&q=80" alt="Comida Vista Verde" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 2.2rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); margin-bottom: 0.5rem; display: block;">01:00 PM - 06:00 PM</span>
                    <h3 style="font-family: var(--font-editorial); font-size: 1.8rem; margin-bottom: 0.75rem; color: var(--color-text-primary);">Comidas</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;">Una propuesta de cortes premium, ensaladas frescas y platillos de mar ideales para disfrutar en nuestra terraza frente al lago.</p>
                    <a href="{{ url('/lector-pdf?category=comida') }}" class="btn-link" style="margin-top: auto; align-self: flex-start; text-decoration: none; color: var(--color-text-primary); font-weight: 600;">Ver Menú &rarr;</a>
                </div>
            </div>

            <!-- Cena (Ancho 6) -->
            <div class="bento-item bento-col-6" style="cursor: pointer;" onclick="window.location.href='{{ url('/lector-pdf?category=cena') }}'">
                <div class="bento-img-container" style="height: 300px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=1000&q=80" alt="Cena Fine Dining Vista Verde" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 2.2rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); margin-bottom: 0.5rem; display: block;">07:00 PM - 11:00 PM</span>
                    <h3 style="font-family: var(--font-editorial); font-size: 1.8rem; margin-bottom: 0.75rem; color: var(--color-text-primary);">Cenas</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;">Una experiencia de alta cocina y gastronomía de autor maridada con una selecta colección de vinos nacionales e internacionales.</p>
                    <a href="{{ url('/lector-pdf?category=cena') }}" class="btn-link" style="margin-top: auto; align-self: flex-start; text-decoration: none; color: var(--color-text-primary); font-weight: 600;">Ver Menú &rarr;</a>
                </div>
            </div>

            <!-- Café (Ancho 6) -->
            <div class="bento-item bento-col-6" style="cursor: pointer;" onclick="window.location.href='{{ url('/lector-pdf?category=cafe') }}'">
                <div class="bento-img-container" style="height: 300px; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1497515114629-f71d768fd07c?auto=format&fit=crop&w=1000&q=80" alt="Café y Bar Vista Verde" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
                </div>
                <div class="bento-card-content" style="padding: 2.2rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); margin-bottom: 0.5rem; display: block;">Todo el día</span>
                    <h3 style="font-family: var(--font-editorial); font-size: 1.8rem; margin-bottom: 0.75rem; color: var(--color-text-primary);">Café & Coctelería</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;">Disfrute de nuestra barra de cafés de especialidad, mixología de autor y repostería gourmet en un ambiente de total privacidad.</p>
                    <a href="{{ url('/lector-pdf?category=cafe') }}" class="btn-link" style="margin-top: auto; align-self: flex-start; text-decoration: none; color: var(--color-text-primary); font-weight: 600;">Ver Menú &rarr;</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
