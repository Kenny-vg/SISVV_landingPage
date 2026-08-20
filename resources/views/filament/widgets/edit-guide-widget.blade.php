<x-filament-widgets::widget>
    <x-filament::section icon="heroicon-o-squares-2x2" icon-color="success">
        <x-slot name="heading">
            ¿Qué quieres editar?
        </x-slot>
        <x-slot name="description">
            Cada tarjeta te lleva a la parte del panel que edita esa sección del sitio web.
        </x-slot>

        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:0.75rem;">
            @foreach ($this->getSections() as $section)
                <a href="{{ $section['url'] }}" style="display:flex;gap:0.85rem;align-items:flex-start;padding:0.95rem 1rem;border-radius:0.75rem;border:1px solid rgba(148,163,184,.25);background:rgba(255,255,255,.35);text-decoration:none;transition:border-color .15s ease, box-shadow .15s ease;">
                    <x-filament::icon
                        :icon="$section['icon']"
                        class="h-6 w-6 text-primary-600 shrink-0"
                        style="margin-top:2px;"
                    />
                    <div>
                        <p style="margin:0 0 .2rem;font-size:0.9rem;font-weight:700;color:#111827;">{{ $section['title'] }}</p>
                        <p style="margin:0;font-size:0.78rem;line-height:1.5;color:#6b7280;">{{ $section['description'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>