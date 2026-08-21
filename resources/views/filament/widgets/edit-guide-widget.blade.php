<x-filament-widgets::widget>
    <x-filament::section icon="heroicon-o-squares-2x2" icon-color="success">
        <x-slot name="heading">
            ¿Qué quieres editar?
        </x-slot>
        <x-slot name="description">
            Cada tarjeta te lleva a la parte del panel que edita esa sección del sitio web.
        </x-slot>

        <style>
            .egw-card {
                display: flex;
                gap: 0.85rem;
                align-items: flex-start;
                padding: 0.95rem 1rem;
                border-radius: 0.75rem;
                border: 1px solid rgba(148, 163, 184, .35);
                background: rgba(255, 255, 255, .6);
                text-decoration: none;
                transition: border-color .15s ease, background .15s ease, box-shadow .15s ease;
            }

            .egw-card:hover {
                border-color: rgba(22, 163, 74, .55);
                background: rgba(255, 255, 255, .85);
                box-shadow: 0 2px 10px rgba(0, 0, 0, .06);
            }

            .egw-title {
                margin: 0 0 .2rem;
                font-size: 0.9rem;
                font-weight: 700;
                color: #111827;
            }

            .egw-desc {
                margin: 0;
                font-size: 0.78rem;
                line-height: 1.5;
                color: #4b5563;
            }

            .dark .egw-card {
                border-color: rgba(148, 163, 184, .2);
                background: rgba(255, 255, 255, .06);
            }

            .dark .egw-card:hover {
                border-color: rgba(74, 222, 128, .5);
                background: rgba(255, 255, 255, .1);
                box-shadow: 0 2px 12px rgba(0, 0, 0, .35);
            }

            .dark .egw-title {
                color: #f9fafb;
            }

            .dark .egw-desc {
                color: #9ca3af;
            }
        </style>

        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:0.75rem;">
            @foreach ($this->getSections() as $section)
                <a href="{{ $section['url'] }}" class="egw-card">
                    <x-filament::icon
                        :icon="$section['icon']"
                        class="h-6 w-6 text-primary-600 shrink-0"
                        style="margin-top:2px;"
                    />
                    <div>
                        <p class="egw-title">{{ $section['title'] }}</p>
                        <p class="egw-desc">{{ $section['description'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
