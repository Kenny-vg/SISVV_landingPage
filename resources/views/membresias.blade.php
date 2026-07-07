@extends('layouts.public')

@section('title', 'Membresías — Vista Verde Country Club')
@section('meta_description', 'Conoce los planes de membresía del Club Vista Verde y elige el que mejor se adapte a ti.')

@section('content')
<div class="membresias-page" style="padding-top: 120px; min-height: 100vh; background-color: var(--color-bg);">

    <!-- Hero -->
    <div class="membresias-hero" style="background-image: url('{{ asset('images/hero.jpg') }}');">
        <div class="membresias-hero-overlay"></div>
        <div class="membresias-hero-content">
            <span class="membresias-hero-tag">Vista Verde Club</span>
            <h1>Nuestras<br><span>Membresías.</span></h1>
            <p>Elige el plan que mejor se adapte a tu estilo de vida y disfruta de todos los beneficios que Vista Verde tiene para ti y tu familia.</p>
        </div>
    </div>

    <!-- Cards -->
    <section class="membresias-section">

        @if($memberships->isEmpty())
            <div class="membresias-empty">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 64px; height: 64px; margin: 0 auto 1.5rem; opacity: 0.3; display: block;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p style="font-size: 1.1rem;">No hay membresías disponibles actualmente.</p>
                <p style="font-size: 0.9rem; margin-top: 0.5rem; opacity: 0.7;">Pronto publicaremos nuestros planes.</p>
            </div>
        @else
            <div class="membresias-grid">

                @foreach($memberships as $membership)
                <div class="membresia-card @if($loop->iteration == 2) featured @endif">

                    @if($loop->iteration == 2)
                    <span class="membresia-card-badge">Recomendado</span>
                    @endif

                    <h3 class="membresia-card-name">{{ $membership->name }}</h3>

                    <div class="membresia-card-price">{{ $membership->price }}</div>

                    @if($membership->benefits->isNotEmpty())
                    <ul class="membresia-card-benefits">
                        @foreach($membership->benefits as $benefit)
                        <li>
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>{{ $benefit->benefit }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif

                </div>
                @endforeach

            </div>
        @endif

    </section>

</div>
@endSection
