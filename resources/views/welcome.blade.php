@extends('layouts.public')

@section('content')

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