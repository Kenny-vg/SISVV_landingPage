<button class="a11y-toggle" id="a11y-toggle" aria-label="Panel de accesibilidad" aria-expanded="false" title="Accesibilidad">
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 18px; height: 18px;" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
        <path d="M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1" />
        <circle cx="12" cy="7.5" r=".5" fill="currentColor" />
    </svg>
</button>

<aside class="a11y-panel" id="a11y-panel" role="dialog" aria-modal="true" aria-labelledby="a11y-title" aria-hidden="true">
    <h2 class="a11y-panel-title" id="a11y-title">Accesibilidad</h2>

    <div class="a11y-group">
        <span class="a11y-group-label" id="a11y-size-label">Tamaño de texto</span>
        <div class="a11y-size-options" role="radiogroup" aria-labelledby="a11y-size-label">
            <button class="a11y-size-btn" data-size="md" data-a11y="text-size" role="radio" aria-checked="true" aria-label="Tamaño normal">A</button>
            <button class="a11y-size-btn" data-size="lg" data-a11y="text-size" role="radio" aria-checked="false" aria-label="Tamaño grande">A+</button>
            <button class="a11y-size-btn" data-size="xl" data-a11y="text-size" role="radio" aria-checked="false" aria-label="Tamaño extra grande">A++</button>
        </div>
    </div>

    <div class="a11y-group">
        <div class="a11y-toggle-option">
            <span class="a11y-toggle-option-label" id="a11y-label-contrast">Alto contraste</span>
            <label class="a11y-switch">
                <input type="checkbox" data-a11y="contrast" role="switch" aria-checked="false" aria-labelledby="a11y-label-contrast">
                <span class="a11y-switch-slider"></span>
            </label>
        </div>
        <div class="a11y-toggle-option">
            <span class="a11y-toggle-option-label" id="a11y-label-grayscale">Escala de grises</span>
            <label class="a11y-switch">
                <input type="checkbox" data-a11y="grayscale" role="switch" aria-checked="false" aria-labelledby="a11y-label-grayscale">
                <span class="a11y-switch-slider"></span>
            </label>
        </div>
        <div class="a11y-toggle-option">
            <span class="a11y-toggle-option-label" id="a11y-label-dyslexia">Fuente dislexia</span>
            <label class="a11y-switch">
                <input type="checkbox" data-a11y="dyslexia" role="switch" aria-checked="false" aria-labelledby="a11y-label-dyslexia">
                <span class="a11y-switch-slider"></span>
            </label>
        </div>
        <div class="a11y-toggle-option">
            <span class="a11y-toggle-option-label" id="a11y-label-noanim">Pausar animaciones</span>
            <label class="a11y-switch">
                <input type="checkbox" data-a11y="no-animations" role="switch" aria-checked="false" aria-labelledby="a11y-label-noanim">
                <span class="a11y-switch-slider"></span>
            </label>
        </div>
        <div class="a11y-toggle-option">
            <span class="a11y-toggle-option-label" id="a11y-label-links">Resaltar enlaces</span>
            <label class="a11y-switch">
                <input type="checkbox" data-a11y="highlight-links" role="switch" aria-checked="false" aria-labelledby="a11y-label-links">
                <span class="a11y-switch-slider"></span>
            </label>
        </div>
        <div class="a11y-toggle-option">
            <span class="a11y-toggle-option-label" id="a11y-label-reader">Lector de pantalla</span>
            <label class="a11y-switch">
                <input type="checkbox" data-a11y="reader" role="switch" aria-checked="false" aria-labelledby="a11y-label-reader">
                <span class="a11y-switch-slider"></span>
            </label>
        </div>
    </div>

    <button class="a11y-reset-btn" id="a11y-reset">Restablecer todo</button>
</aside>
