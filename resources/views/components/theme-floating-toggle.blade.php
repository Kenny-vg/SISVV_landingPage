<div class="theme-floating-toggle" id="themeToggleWidget">
    <button id="theme-toggle" class="theme-float-btn" aria-label="Alternar tema" title="Alternar tema">
        <svg class="theme-icon-moon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 18px; height: 18px;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
        </svg>
        <svg class="theme-icon-sun" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 18px; height: 18px; display: none;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"></path>
        </svg>
    </button>
</div>

<style>
.theme-floating-toggle {
    position: fixed;
    bottom: 1.5rem;
    right: 1.5rem;
    z-index: 999;
}

.theme-float-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--color-surface);
    border: 1px solid var(--color-border-subtle);
    color: var(--color-text-secondary);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    padding: 0;
}

.theme-float-btn:hover {
    color: var(--color-accent-gold);
    border-color: var(--color-accent-gold);
    transform: scale(1.05);
}
</style>
