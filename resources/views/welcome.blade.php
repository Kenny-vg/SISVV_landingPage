@extends('layouts.public')

@section('content')
    @if (Route::has('login'))
        <div class="auth-navigation-wrapper" style="position: absolute; top: 1.5rem; right: 18%; z-index: 1001; font-family: var(--font-base); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px;">
            <livewire:welcome.navigation />
        </div>
    @endif

    <section class="hero-asymmetric">
        <div class="hero-left-content">
            <h1>Donde la naturaleza<br><span>encuentra su santuario.</span></h1>
            <p>
                Descubre la exclusividad de un oasis privado donde el golf de clase mundial y el bienestar termal se fusionan en un entorno inigualable.
            </p>
            <button class="btn-gold" onclick="document.getElementById('instalaciones').scrollIntoView({behavior: 'smooth'})">
                Explorar el Club
            </button>
        </div>
        <div class="hero-right-media">
            <img src="https://images.unsplash.com/photo-1587174486073-ae5e5cff23aa?auto=format&fit=crop&w=1200&q=80" alt="Campo de golf VistaVerde al amanecer">
        </div>
    </section>

    <x-facilities-section />

    <x-menu-section />

@endsection