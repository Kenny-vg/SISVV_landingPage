@props([
    'path' => null,
    'alt' => '',
    'fallback' => null,
    'widths' => [400, 800, 1200],
    'sizes' => '(max-width: 768px) 100vw, 660px',
    'eager' => false,
    'class' => '',
    'style' => null,
])

@php
    // Sin imagen de origen: renderizar el fallback como <img> plano (los SVG no se procesan)
    if (empty($path)) {
        echo '<img src="'.e($fallback ?? '').'" alt="'.e($alt).'"'
            .($class !== '' ? ' class="'.e($class).'"' : '')
            .($style ? ' style="'.e($style).'"' : '')
            .'>';
        return;
    }

    $url = fn (int $w): string => url('/img/'.$path.'?w='.$w.'&f=webp');

    $srcset = collect($widths)
        ->map(fn (int $w): string => $url($w).' '.$w.'w')
        ->implode(', ');

    $attrs = [
        'src' => $url(min($widths)),
        'srcset' => $srcset,
        'sizes' => $sizes,
        'alt' => $alt,
        'loading' => $eager ? 'eager' : 'lazy',
        'fetchpriority' => $eager ? 'high' : 'auto',
        'decoding' => 'async',
    ];

    if ($class !== '') {
        $attrs['class'] = $class;
    }
    if ($style) {
        $attrs['style'] = $style;
    }

    $attrString = collect($attrs)
        ->map(fn ($value, $key): string => $key.'="'.e($value).'"')
        ->implode(' ');
@endphp

<img {!! $attrString !!}>
