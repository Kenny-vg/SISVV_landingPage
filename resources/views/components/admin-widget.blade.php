@auth
<div class="admin-floating-widget" id="adminWidget">
    <button class="admin-widget-toggle" onclick="document.getElementById('adminWidget').classList.toggle('is-open')" aria-label="Admin" title="Admin">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 18px; height: 18px;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
    </button>
    <div class="admin-widget-menu">
        <a href="{{ url('/admin') }}" class="admin-widget-item">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 14px; height: 14px;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            Panel Admin
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="admin-widget-item">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 14px; height: 14px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Salir
            </button>
        </form>
    </div>
</div>

<style>
.admin-floating-widget {
    position: fixed;
    bottom: calc(1.5rem + 96px);
    right: 1.5rem;
    z-index: 999;
}

.admin-widget-toggle {
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

.admin-widget-toggle:hover {
    color: var(--color-accent-gold);
    border-color: var(--color-accent-gold);
    transform: scale(1.05);
}

.admin-widget-menu {
    position: absolute;
    bottom: calc(100% + 8px);
    right: 0;
    background: var(--color-surface);
    border: 1px solid var(--color-border-subtle);
    border-radius: 12px;
    padding: 0.5rem;
    min-width: 160px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    opacity: 0;
    transform: translateY(8px);
    pointer-events: none;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.admin-floating-widget.is-open .admin-widget-menu {
    opacity: 1;
    transform: translateY(0);
    pointer-events: auto;
}

.admin-widget-item {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    padding: 0.6rem 0.8rem;
    border-radius: 8px;
    color: var(--color-text-primary);
    text-decoration: none;
    font-size: 0.8rem;
    font-family: var(--font-base);
    font-weight: 500;
    transition: all 0.2s ease;
    border: none;
    background: none;
    width: 100%;
    cursor: pointer;
    text-align: left;
}

.admin-widget-item:hover {
    background: rgba(var(--color-accent-gold-rgb), 0.1);
    color: var(--color-accent-gold);
}

.admin-widget-item svg {
    flex-shrink: 0;
}
</style>
@endauth
