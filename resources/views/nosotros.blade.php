@php
    if (!isset($pageSections)) {
        $pageSections = \App\Models\PageSection::where('is_active', true)->get()->keyBy('key');
    }

    $mission = $pageSections['about_mission'] ?? null;
    $vision = $pageSections['about_vision'] ?? null;
    $values = $pageSections['about_values'] ?? null;
    $philosophy = $pageSections['about_philosophy'] ?? null;

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

    $aboutImage = setting('about_image') ? asset('storage/' . setting('about_image')) : asset('images/about.jpg');
@endphp

@extends('layouts.public')

@section('content')
<div style="padding-top: 120px; min-height: 100vh; background-color: var(--color-bg); color: var(--color-text-primary); transition: background-color 0.3s ease;">

    <!-- Hero con imagen de fondo (como membresías) -->
    <div class="about-hero" style="background-image: url('{{ $aboutImage }}');">
        <div class="about-hero-overlay"></div>
        <div class="about-hero-content">
            <span class="about-hero-tag">Vista Verde Club</span>
            <h1>Sobre<br><span>Nosotros.</span></h1>
            <p>Conoce nuestra historia, nuestra filosofía y el compromiso que nos define como el club campestre más exclusivo de la región.</p>
        </div>
    </div>

    <!-- Misión (como about-home-grid del homepage) -->
    @if($mission)
    <section class="premium-section bg-obsidian fade-in-section">
        <div class="about-home-grid">
            <div>
                <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Vista Verde Club</span>
                @php
                    $mW = explode(' ', $mission->title, 2);
                @endphp
                <h2 style="font-family: var(--font-editorial); font-size: clamp(2.5rem, 5vw, 4rem); color: var(--color-text-primary); line-height: 1.1; margin: 0 0 1.5rem 0;">
                    {{ $mW[0] }}<br><span style="font-style: italic; font-weight: 300; color: var(--color-accent-gold);">{{ $mW[1] ?? $mission->title }}.</span>
                </h2>
                <p style="color: var(--color-about-text); font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                    {!! $mission->content !!}
                </p>
            </div>
            <div style="border-radius: 24px; overflow: hidden; height: 500px; background-color: var(--color-surface);">
                <img src="{{ $mission->image ? asset('storage/'.$mission->image) : $aboutImage }}" alt="{{ $mission->title }}" style="width: 100%; height: 100%; max-width: 100%; object-fit: cover; display: block;">
            </div>
        </div>
    </section>
    @endif

    <!-- Visión (invertido: imagen izq, texto der) -->
    @if($vision)
    <section class="premium-section bg-obsidian fade-in-section" style="padding-top: 0;">
        <div class="about-home-grid" style="direction: rtl;">
            <div style="direction: ltr;">
                <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Vista Verde Club</span>
                @php
                    $vW = explode(' ', $vision->title, 2);
                @endphp
                <h2 style="font-family: var(--font-editorial); font-size: clamp(2.5rem, 5vw, 4rem); color: var(--color-text-primary); line-height: 1.1; margin: 0 0 1.5rem 0;">
                    {{ $vW[0] }}<br><span style="font-style: italic; font-weight: 300; color: var(--color-accent-gold);">{{ $vW[1] ?? $vision->title }}.</span>
                </h2>
                <p style="color: var(--color-about-text); font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                    {!! $vision->content !!}
                </p>
            </div>
            <div style="direction: ltr; border-radius: 24px; overflow: hidden; height: 500px; background-color: var(--color-surface);">
                <img src="{{ $vision->image ? asset('storage/'.$vision->image) : $aboutImage }}" alt="{{ $vision->title }}" style="width: 100%; height: 100%; max-width: 100%; object-fit: cover; display: block;">
            </div>
        </div>
    </section>
    @endif

    <!-- Valores -->
    @if($values)
    <section class="premium-section bg-obsidian fade-in-section" style="padding-top: 0;">
        <div class="about-home-grid" style="display: block; text-align: center;">
            <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 3px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">Vista Verde Club</span>
            @php
                $valsT = explode(' ', $values->title, 2);
            @endphp
            <h2 style="font-family: var(--font-editorial); font-size: clamp(2.5rem, 5vw, 4rem); color: var(--color-text-primary); line-height: 1.1; margin: 0 0 1.5rem 0;">
                {{ $valsT[0] }}<br><span style="font-style: italic; font-weight: 300; color: var(--color-accent-gold);">{{ $valsT[1] ?? $values->title }}.</span>
            </h2>
            @if(count($valoresItems) >= 2)
            <div class="about-values-grid">
                @foreach($valoresItems as $valor)
                <span class="about-values-tag">{{ $valor }}</span>
                @endforeach
            </div>
            @else
            <p style="color: var(--color-about-text); font-size: 1rem; line-height: 1.8; max-width: 700px; margin: 0 auto;">
                {!! $values->content !!}
            </p>
            @endif
        </div>
    </section>
    @endif

    <!-- Filosofía como banner full-width -->
    @if($philosophy)
    <section class="about-banner fade-in-section" style="background-image: url('{{ $philosophy->image ? asset('storage/'.$philosophy->image) : $aboutImage }}');">
        <div class="about-banner-overlay"></div>
        <div class="about-banner-content">
            <span class="about-hero-tag">Vista Verde Club</span>
            @php
                $pT = explode(' ', $philosophy->title, 2);
            @endphp
            <h2 class="about-banner-title">{{ $pT[0] }}<br><span>{{ $pT[1] ?? $philosophy->title }}.</span></h2>
            <p class="about-banner-desc">{!! $philosophy->content !!}</p>
        </div>
    </section>
    @endif

</div>
@stop