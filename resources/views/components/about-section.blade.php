@php
    if (!isset($pageSections)) {
        $pageSections = \App\Models\PageSection::where('is_active', true)->get()->keyBy('key');
    }
    $section = $pageSections['about_intro'] ?? null;
    $aboutTitle = $section?->title ?? 'Quiénes somos';
    $aboutHeading = setting('about_heading', 'Un refugio privado<br><span style="font-style: italic; font-weight: 300; color: var(--color-accent-gold);">donde el deporte y la naturaleza convergen.</span>');
    $aboutBody = $section?->content ?? 'Vista Verde Country Club nació como un sueño: crear un espacio donde la excelencia deportiva, el bienestar y la naturaleza se fundieran en perfecta armonía.';
@endphp
<section class="premium-section bg-obsidian fade-in-section" id="nosotros">
    <div class="about-home-grid">
        <div>
            <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">{{ $aboutTitle }}</span>
            <h2 style="font-family: var(--font-editorial); font-size: clamp(2.5rem, 5vw, 4rem); color: var(--color-text-primary); line-height: 1.1; margin: 0 0 1.5rem 0;">
                {!! $aboutHeading !!}
            </h2>
            <p style="color: var(--color-about-text); font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                {!! $aboutBody !!}
            </p>
            <a href="{{ url('/nosotros') }}" class="btn-gold" style="text-decoration: none; display: inline-block; margin-top: 0.5rem;">
                Conócenos más →
            </a>
        </div>
        <div style="border-radius: 24px; overflow: hidden; height: 500px; background-color: var(--color-surface);">
            <img src="{{ setting('about_image') ? asset('storage/' . setting('about_image')) : asset('images/about.jpg') }}" alt="Vista Verde Country Club" style="width: 100%; height: 100%; max-width: 100%; object-fit: cover; display: block;">
        </div>
    </div>
</section>
