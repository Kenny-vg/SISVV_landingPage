@props([
    'title',
    'price',
    'desc',
    'tags' => [],
    'category' => ''
])

@php
    // Convertimos las etiquetas a formato JSON para usarlas en JS
    $tagsJson = json_encode($tags);
    // Generamos un string de búsqueda para buscar por título y descripción
    $searchString = strtolower($title . ' ' . $desc);
@endphp

<article class="lector-item" 
         data-tags="{{ $tagsJson }}" 
         data-search="{{ $searchString }}" 
         data-category="{{ $category }}">
    <div class="lector-item-header">
        <h3 class="lector-item-title">{{ $title }}</h3>
        <span class="lector-item-price">${{ $price }}</span>
    </div>
    <p class="lector-item-desc">{{ $desc }}</p>
    @if(!empty($tags))
        <div class="lector-item-tags">
            @foreach($tags as $tag)
                @php
                    $tagClass = '';
                    $tagLabel = '';
                    switch (strtolower($tag)) {
                        case 'vegan':
                            $tagClass = 'tag-vegan';
                            $tagLabel = 'Vegano';
                            break;
                        case 'gf':
                        case 'gluten-free':
                            $tagClass = 'tag-gf';
                            $tagLabel = 'Sin Gluten';
                            break;
                        case 'special':
                        case 'especial':
                            $tagClass = 'tag-special';
                            $tagLabel = 'Especialidad';
                            break;
                        default:
                            $tagClass = '';
                            $tagLabel = ucwords($tag);
                    }
                @endphp
                <span class="lector-tag {{ $tagClass }}">{{ $tagLabel }}</span>
            @endforeach
        </div>
    @endif
</article>
