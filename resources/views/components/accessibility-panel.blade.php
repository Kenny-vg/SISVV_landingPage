<button class="a11y-toggle" id="a11y-toggle" aria-label="Panel de accesibilidad" title="Accesibilidad">
    <span>♿</span>
</button>

<div class="a11y-panel" id="a11y-panel">
    <h3 class="a11y-panel-title">Accesibilidad</h3>

    <div class="a11y-group">
        <span class="a11y-group-label">Tamaño de texto</span>
        <div class="a11y-size-options">
            <button class="a11y-size-btn" data-size="md" data-a11y="text-size">A</button>
            <button class="a11y-size-btn" data-size="lg" data-a11y="text-size">A+</button>
            <button class="a11y-size-btn" data-size="xl" data-a11y="text-size">A++</button>
        </div>
    </div>

    <div class="a11y-group">
        <div class="a11y-toggle-option">
            <span class="a11y-toggle-option-label">Alto contraste</span>
            <label class="a11y-switch">
                <input type="checkbox" data-a11y="contrast">
                <span class="a11y-switch-slider"></span>
            </label>
        </div>
        <div class="a11y-toggle-option">
            <span class="a11y-toggle-option-label">Escala de grises</span>
            <label class="a11y-switch">
                <input type="checkbox" data-a11y="grayscale">
                <span class="a11y-switch-slider"></span>
            </label>
        </div>
        <div class="a11y-toggle-option">
            <span class="a11y-toggle-option-label">Fuente dislexia</span>
            <label class="a11y-switch">
                <input type="checkbox" data-a11y="dyslexia">
                <span class="a11y-switch-slider"></span>
            </label>
        </div>
        <div class="a11y-toggle-option">
            <span class="a11y-toggle-option-label">Pausar animaciones</span>
            <label class="a11y-switch">
                <input type="checkbox" data-a11y="no-animations">
                <span class="a11y-switch-slider"></span>
            </label>
        </div>
        <div class="a11y-toggle-option">
            <span class="a11y-toggle-option-label">Resaltar enlaces</span>
            <label class="a11y-switch">
                <input type="checkbox" data-a11y="highlight-links">
                <span class="a11y-switch-slider"></span>
            </label>
        </div>
    </div>

    <button class="a11y-reset-btn" id="a11y-reset">Restablecer todo</button>
</div>
