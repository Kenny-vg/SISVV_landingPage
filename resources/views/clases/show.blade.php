@extends('layouts.public')

@section('content')
<div class="clase-detalle-page" style="padding-top: 120px; min-height: 100vh; background-color: var(--color-bg); color: var(--color-text-primary); transition: background-color 0.3s ease;">

    <style>
        @media (max-width: 991px) {
            .detalle-grid-container {
                grid-template-columns: 1fr !important;
                gap: 3rem !important;
            }
            .main-img-wrapper {
                height: 320px !important;
            }
            .editorial-col {
                position: relative !important;
                top: 0 !important;
            }
        }
    </style>

    <div style="max-width: 1200px; margin: 0 auto; padding: 2rem 1.5rem 8rem 1.5rem;">

        <!-- Botón Volver -->
        <a href="{{ url('/clases') }}" style="text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; color: var(--color-accent-gold); font-family: var(--font-alt); font-size: 0.85rem; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 3rem; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateX(-5px)'" onmouseout="this.style.transform='translateX(0)'">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 18px; height: 18px;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Volver a Clases
        </a>

        <!-- Contenedor Asimétrico de 2 Columnas -->
        <div class="detalle-grid-container" style="display: grid; grid-template-columns: 1.2fr 1.8fr; gap: 4rem; align-items: start;">

            <!-- Columna Izquierda: Información Editorial -->
            <div class="editorial-col" style="position: sticky; top: 100px;">
                <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 0.8rem;">
                    Club {{ $area['category'] }}
                </span>

                <h1 style="font-family: var(--font-editorial); font-size: clamp(2.5rem, 4vw, 3.5rem); line-height: 1.1; color: var(--color-text-primary); margin-bottom: 2rem;">
                    {{ $area['title'] }}
                </h1>

                <p style="color: var(--color-text-secondary); font-size: 1.05rem; line-height: 1.8; margin-bottom: 3rem;">
                    {{ $area['description'] }}
                </p>

                <!-- Caja de Horario Estilo Premium -->
                <div style="background-color: var(--color-surface); padding: 2rem; border-radius: 20px; border: 1px solid var(--color-border-subtle); display: flex; align-items: flex-start; gap: 1.5rem;">
                    <div style="color: var(--color-accent-gold); margin-top: 0.2rem;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 style="font-family: var(--font-alt); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1.5px; margin: 0 0 0.5rem 0; color: var(--color-text-primary);">
                            Horarios de Clases
                        </h4>
                        <p style="margin: 0; color: var(--color-text-secondary); font-size: 0.95rem; line-height: 1.5;">
                            {{ $area['schedule'] }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha: Galería de Fotos Interactiva -->
            <div>
                <!-- Imagen Principal Ampliada -->
                <div class="main-img-wrapper" style="width: 100%; height: 500px; border-radius: 24px; overflow: hidden; box-shadow: 0 15px 40px rgba(0,0,0,0.15); border: 1px solid var(--color-border-subtle); background-color: var(--color-surface); position: relative;">
                    <img id="main-gallery-img" src="{{ $area['images'][0] }}" alt="{{ $area['title'] }}" style="width: 100%; height: 100%; object-fit: cover; transition: opacity 0.5s ease; opacity: 1;">
                </div>

                <!-- Miniaturas (Thumbnails) -->
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-top: 2rem;">
                    @foreach($area['images'] as $index => $imgUrl)
                        <div class="gallery-thumbnail {{ $index === 0 ? 'active' : '' }}"
                             onclick="changeMainImage('{{ $imgUrl }}', this)"
                             style="cursor: pointer; height: 120px; border-radius: 16px; overflow: hidden; border: 2px solid {{ $index === 0 ? 'var(--color-accent-gold)' : 'transparent' }}; transition: all 0.3s ease; background-color: var(--color-surface);">
                            <img src="{{ $imgUrl }}" alt="Vista {{ $index + 1 }}" style="width: 100%; height: 100%; object-fit: cover; opacity: {{ $index === 0 ? '1' : '0.6' }}; transition: opacity 0.3s ease;" onmouseover="this.style.opacity='1'" onmouseout="if(!this.parentNode.classList.contains('active')) this.style.opacity='0.6'">
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function changeMainImage(url, element) {
        const mainImg = document.getElementById('main-gallery-img');
        mainImg.style.opacity = '0';
        setTimeout(() => {
            mainImg.src = url;
            mainImg.style.opacity = '1';
        }, 300);
        document.querySelectorAll('.gallery-thumbnail').forEach(el => {
            el.classList.remove('active');
            el.style.borderColor = 'transparent';
            el.querySelector('img').style.opacity = '0.6';
        });
        element.classList.add('active');
        element.style.borderColor = 'var(--color-accent-gold)';
        element.querySelector('img').style.opacity = '1';
    }
</script>
@endsection
