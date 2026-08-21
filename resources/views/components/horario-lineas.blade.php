@php
    $lineas = array_values(array_filter(array_map('trim', explode(',', (string) $schedule)), fn ($linea) => $linea !== ''));
@endphp
@foreach($lineas as $linea)
    <span style="display: block;">{{ $linea }}</span>
@endforeach
