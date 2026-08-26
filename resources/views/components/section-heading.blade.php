@props([
    'text' => '',
    'accent' => null,
])

<h2 {{ $attributes }}>{{ trim((string) $text) }}@if (trim((string) $accent) !== '')<br><span style="font-style: italic; font-weight: 300; color: var(--color-accent-gold);">{{ trim((string) $accent) }}</span>@endif</h2>
