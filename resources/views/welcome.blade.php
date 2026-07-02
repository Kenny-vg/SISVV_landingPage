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

    <x-facilities-section />

    <x-menu-section />

    <section class="premium-section" style="background-color: #15221B;" id="ubicacion">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div class="section-header-editorial">
                <h2 style="color: #FDFCF9;">Ubicación<br><span>encuéntranos.</span></h2>
                <p style="color: rgba(253, 252, 249, 0.7);">Estamos ubicados en Tehuacán, Puebla. Te esperamos.</p>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; align-items: stretch;">
                <div style="border-radius: 24px; overflow: hidden; min-height: 400px;">
                    <img src="{{ asset('images/club-ubicacion.jpg') }}" alt="Vista Verde Country Club" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                </div>
                <div style="border-radius: 24px; overflow: hidden; min-height: 400px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3784.002589867335!2d-97.41330921649934!3d18.483541887826103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c5a2cf77bbf7f9%3A0x992163d342c0d985!2sCasa%20Club%20Vista%20Verde%20Country%20Club!5e0!3m2!1ses-419!2smx!4v1783023157035!5m2!1ses-419!2smx" width="100%" height="100%" style="border:0; display: block;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                </div>
            </div>
        </div>
    </section>

@endsection