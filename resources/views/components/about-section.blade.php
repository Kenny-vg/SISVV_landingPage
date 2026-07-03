<!-- resources/views/components/about-section.blade.php -->
<section class="premium-section bg-obsidian fade-in-section" id="nosotros">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 5rem; align-items: center; max-width: 1200px; margin: 0 auto;">
        <div>
            <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Quiénes somos</span>
            <h2 style="font-family: var(--font-editorial); font-size: clamp(2.5rem, 5vw, 4rem); color: var(--color-text-primary); line-height: 1.1; margin: 0 0 1.5rem 0;">
                Un refugio privado<br><span style="font-style: italic; font-weight: 300; color: var(--color-accent-gold);">donde el deporte y la naturaleza convergen.</span>
            </h2>
            <p style="color: var(--color-about-text); font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                Vista Verde Country Club nació como un sueño: crear un espacio donde la excelencia deportiva, el bienestar y la naturaleza se fundieran en perfecta armonía. Hoy somos un destino exclusivo para quienes buscan más que un club, un estilo de vida.
            </p>
            <p style="color: var(--color-about-text); font-size: 1rem; line-height: 1.8;">
                Nuestras instalaciones de primer nivel, rodeadas de paisajes que inspiran, ofrecen a cada socio una experiencia única de privacidad, sofisticación y conexión con el entorno.
            </p>
        </div>
        <div style="border-radius: 24px; overflow: hidden; height: 500px;">
            <img src="{{ asset('images/about.jpg') }}" alt="Vista Verde Country Club" style="width: 100%; height: 100%; object-fit: cover; display: block;">
        </div>
    </div>
</section>
