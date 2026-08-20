@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Paginación" style="display: flex; justify-content: center; margin-top: 3.5rem;">
        <ul style="display: flex; align-items: center; gap: 0.5rem; list-style: none; margin: 0; padding: 0; flex-wrap: wrap;">

            {{-- Anterior --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span style="display: inline-flex; align-items: center; justify-content: center; min-width: 44px; height: 44px; padding: 0 0.75rem; border: 1px solid var(--color-border-subtle); border-radius: 8px; color: var(--color-text-secondary); opacity: 0.45; cursor: not-allowed; font-size: 1rem; line-height: 1;">
                        &lsaquo;
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Página anterior" style="display: inline-flex; align-items: center; justify-content: center; min-width: 44px; height: 44px; padding: 0 0.75rem; border: 1px solid var(--color-border-subtle); border-radius: 8px; color: var(--color-text-primary); background-color: var(--color-surface); text-decoration: none; transition: border-color 0.2s ease, color 0.2s ease, background-color 0.2s ease;" onmouseover="this.style.borderColor='var(--color-accent-gold)'; this.style.color='var(--color-accent-gold)'" onmouseout="this.style.borderColor=''; this.style.color=''">
                        &lsaquo;
                    </a>
                </li>
            @endif

            {{-- Números de página --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li>
                        <span style="display: inline-flex; align-items: center; justify-content: center; min-width: 36px; height: 44px; color: var(--color-text-secondary); font-size: 0.9rem;">
                            &hellip;
                        </span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span aria-current="page" style="display: inline-flex; align-items: center; justify-content: center; min-width: 44px; height: 44px; padding: 0 0.75rem; border: 1px solid var(--color-accent-gold); border-radius: 8px; color: var(--color-accent-gold); background-color: rgba(var(--color-accent-gold-rgb), 0.1); font-weight: 700; font-size: 0.95rem;">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" aria-label="Ir a la página {{ $page }}" style="display: inline-flex; align-items: center; justify-content: center; min-width: 44px; height: 44px; padding: 0 0.75rem; border: 1px solid var(--color-border-subtle); border-radius: 8px; color: var(--color-text-primary); background-color: var(--color-surface); text-decoration: none; transition: border-color 0.2s ease, color 0.2s ease, background-color 0.2s ease;" onmouseover="this.style.borderColor='var(--color-accent-gold)'; this.style.color='var(--color-accent-gold)'" onmouseout="this.style.borderColor=''; this.style.color=''">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Siguiente --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Página siguiente" style="display: inline-flex; align-items: center; justify-content: center; min-width: 44px; height: 44px; padding: 0 0.75rem; border: 1px solid var(--color-border-subtle); border-radius: 8px; color: var(--color-text-primary); background-color: var(--color-surface); text-decoration: none; transition: border-color 0.2s ease, color 0.2s ease, background-color 0.2s ease;" onmouseover="this.style.borderColor='var(--color-accent-gold)'; this.style.color='var(--color-accent-gold)'" onmouseout="this.style.borderColor=''; this.style.color=''">
                        &rsaquo;
                    </a>
                </li>
            @else
                <li>
                    <span style="display: inline-flex; align-items: center; justify-content: center; min-width: 44px; height: 44px; padding: 0 0.75rem; border: 1px solid var(--color-border-subtle); border-radius: 8px; color: var(--color-text-secondary); opacity: 0.45; cursor: not-allowed; font-size: 1rem; line-height: 1;">
                        &rsaquo;
                    </span>
                </li>
            @endif

        </ul>
    </nav>
@endif