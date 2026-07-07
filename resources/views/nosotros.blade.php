@php
    if (!isset($pageSections)) {
        $pageSections = \App\Models\PageSection::where('is_active', true)->get()->keyBy('key');
    }

    $mission = $pageSections['about_mission'] ?? null;
    $vision = $pageSections['about_vision'] ?? null;
    $values = $pageSections['about_values'] ?? null;
    $philosophy = $pageSections['about_philosophy'] ?? null;

    // Parse values content into individual items
    $valoresItems = [];
    if ($values && $values->content) {
        $parts = explode(',', $values->content);
        if (count($parts) >= 2) {
            foreach ($parts as $part) {
                $trimmed = trim($part);
                if ($trimmed) {
                    $valoresItems[] = ucfirst($trimmed);
                }
            }
        }
    }

    $sections = [
        ['key' => 'about_mission',   'section' => $mission,   'bg' => 'bg-obsidian'],
        ['key' => 'about_vision',    'section' => $vision,    'bg' => 'bg-forest'],
        ['key' => 'about_values',    'section' => $values,    'bg' => 'bg-obsidian'],
        ['key' => 'about_philosophy','section' => $philosophy,'bg' => 'bg-forest'],
    ];
@endphp

@extends('layouts.public')

@section('content')
<div class="about-page" style="padding-top: 120px; min-height: 100vh; background-color: var(--color-bg); color: var(--color-text-primary); transition: background-color 0.3s ease;">

    <header style="max-width: 1200px; margin: 0 auto 5rem auto; padding: 0 1.5rem;">
        <span style="font-family: var(--font-alt); font-size: 0.8rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Vista Verde Club</span>
        <h1 style="font-family: var(--font-editorial); font-size: clamp(2.8rem, 6vw, 4.5rem); line-height: 1.1; margin-bottom: 1.5rem;">Sobre<br><span style="font-style: italic; font-weight: 300; color: var(--color-accent-gold);">Nosotros.</span></h1>
        <p style="color: var(--color-text-secondary); max-width: 650px; font-size: 1.05rem; line-height: 1.7;">Conoce nuestra historia, nuestra filosofía y el compromiso que nos define como el club campestre más exclusivo de la región.</p>
    </header>

    @foreach($sections as $item)
        @php $s = $item['section']; @endphp
        @if($s)
            <section class="premium-section {{ $item['bg'] }} fade-in-section">
                <div class="section-header-editorial" style="max-width: 900px;">
                    <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 0.8rem;">Vista Verde Club</span>
                    @php
                        $titleWords = explode(' ', $s->title, 2);
                        $beforeTitle = $titleWords[0] ?? '';
                        $afterTitle = $titleWords[1] ?? $s->title;
                    @endphp
                    <h2>{{ $beforeTitle }}<br><span>{{ $afterTitle }}.</span></h2>
                    @if($item['key'] !== 'about_values')
                        <p>{{ $s->content }}</p>
                    @endif
                </div>
                @if($item['key'] === 'about_values')
                    @if(count($valoresItems) >= 2)
                        <div class="valores-grid">
                            @foreach($valoresItems as $valor)
                                <div class="valor-card">
                                    <span class="valor-card-text">{{ $valor }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p style="max-width: 900px; margin-top: 1rem;">{{ $s->content }}</p>
                    @endif
                @endif
            </section>
        @endif
    @endforeach

</div>
@endsection
