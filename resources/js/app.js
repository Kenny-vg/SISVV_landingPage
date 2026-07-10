import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    // 1. Efecto Scroll en el Navbar
    const navbar = document.getElementById('main-navbar');
    
    const handleScroll = () => {
        if (navbar) {
            if (window.scrollY > 30) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        }
    };
    
    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Ejecutar inicialmente
    
    // 2. Animaciones de entrada al hacer Scroll (Intersection Observer)
    const animatedElements = document.querySelectorAll('.fade-in-section');
    
    if ('IntersectionObserver' in window) {
        const observerOptions = {
            root: null,
            rootMargin: '0px 0px -10% 0px',
            threshold: 0.1
        };
        
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target); // Animación única
                }
            });
        }, observerOptions);
        
        animatedElements.forEach(element => {
            observer.observe(element);
        });
    } else {
        // Fallback para navegadores antiguos
        animatedElements.forEach(element => {
            element.classList.add('visible');
        });
    }
    
    // 3. Tema Claro / Oscuro Toggler
    const themeToggleBtn = document.getElementById('theme-toggle');
    const moonIcon = document.querySelector('.theme-icon-moon');
    const sunIcon = document.querySelector('.theme-icon-sun');
    const logosLight = document.querySelectorAll('.logo-light');
    const logosDark = document.querySelectorAll('.logo-dark');

    const updateTheme = (theme) => {
        const isDark = theme === 'dark';
        if (moonIcon) moonIcon.style.display = isDark ? 'none' : 'block';
        if (sunIcon) sunIcon.style.display = isDark ? 'block' : 'none';
        logosLight.forEach(el => el.style.display = isDark ? 'none' : 'block');
        logosDark.forEach(el => el.style.display = isDark ? 'block' : 'none');
    };

    // Inicializar de acuerdo al tema actual cargado
    const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
    updateTheme(currentTheme);

    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', () => {
            const activeTheme = document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
            document.documentElement.setAttribute('data-theme', activeTheme);
            localStorage.setItem('theme', activeTheme);
            updateTheme(activeTheme);
        });
    }

    // 4. Menú móvil (hamburguesa)
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const mobileDrawer = document.getElementById('mobileDrawer');
    const mobileOverlay = document.getElementById('mobileOverlay');

    function openMobileMenu() {
        hamburgerBtn?.classList.add('is-active');
        mobileDrawer?.classList.add('is-open');
        mobileOverlay?.classList.add('is-visible');
        document.body.style.overflow = 'hidden';
    }

    function closeMobileMenu() {
        hamburgerBtn?.classList.remove('is-active');
        mobileDrawer?.classList.remove('is-open');
        mobileOverlay?.classList.remove('is-visible');
        document.body.style.overflow = '';
    }

    hamburgerBtn?.addEventListener('click', () => {
        if (mobileDrawer?.classList.contains('is-open')) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    });

    mobileOverlay?.addEventListener('click', closeMobileMenu);

    // Cerrar menú al hacer clic en un link
    mobileDrawer?.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', closeMobileMenu);
    });

    // 5a. Panel de accesibilidad
    const a11y = {
        html: document.documentElement,
        toggle: document.getElementById('a11y-toggle'),
        panel: document.getElementById('a11y-panel'),
        resetBtn: document.getElementById('a11y-reset'),
        storageKey: 'a11y_preferences',
        focusableSelector: 'button, input, [tabindex]:not([tabindex="-1"])',

        defaults: {
            'text-size': 'md',
            'contrast': false,
            'grayscale': false,
            'dyslexia': false,
            'no-animations': false,
            'highlight-links': false,
        },

        init() {
            const saved = this.load();
            this.apply(saved);
            this.bindEvents();
            this.syncUI(saved);
        },

        load() {
            try {
                const data = JSON.parse(localStorage.getItem(this.storageKey));
                return data ? { ...this.defaults, ...data } : { ...this.defaults };
            } catch {
                return { ...this.defaults };
            }
        },

        save(state) {
            localStorage.setItem(this.storageKey, JSON.stringify(state));
        },

        apply(state) {
            const classes = [
                'a11y-contrast', 'a11y-grayscale', 'a11y-dyslexia',
                'a11y-no-animations', 'a11y-highlight-links',
            ];
            this.html.classList.remove('a11y-text-md', 'a11y-text-lg', 'a11y-text-xl', ...classes);
            this.html.classList.add('a11y-text-' + state['text-size']);
            if (state.contrast) this.html.classList.add('a11y-contrast');
            if (state.grayscale) this.html.classList.add('a11y-grayscale');
            if (state.dyslexia) this.html.classList.add('a11y-dyslexia');
            if (state['no-animations']) this.html.classList.add('a11y-no-animations');
            if (state['highlight-links']) this.html.classList.add('a11y-highlight-links');
        },

        syncUI(state) {
            document.querySelectorAll('[data-a11y="text-size"]').forEach(btn => {
                const isActive = btn.dataset.size === state['text-size'];
                btn.classList.toggle('is-active', isActive);
                btn.setAttribute('aria-checked', isActive);
            });
            document.querySelectorAll('.a11y-panel input[type="checkbox"]').forEach(input => {
                const key = input.dataset.a11y;
                input.checked = !!state[key];
                input.setAttribute('aria-checked', !!state[key]);
            });
        },

        getState() {
            const state = {};
            state['text-size'] = document.querySelector('[data-a11y="text-size"].is-active')?.dataset.size || 'md';
            document.querySelectorAll('.a11y-panel input[type="checkbox"]').forEach(input => {
                state[input.dataset.a11y] = input.checked;
            });
            return state;
        },

        open() {
            this.panel?.classList.add('is-open');
            this.panel?.setAttribute('aria-hidden', 'false');
            this.toggle?.setAttribute('aria-expanded', 'true');
            const firstFocusable = this.panel?.querySelector(this.focusableSelector);
            setTimeout(() => firstFocusable?.focus(), 100);
        },

        close() {
            this.panel?.classList.remove('is-open');
            this.panel?.setAttribute('aria-hidden', 'true');
            this.toggle?.setAttribute('aria-expanded', 'false');
            this.toggle?.focus();
        },

        bindEvents() {
            this.toggle?.addEventListener('click', () => {
                if (this.panel?.classList.contains('is-open')) {
                    this.close();
                } else {
                    this.open();
                }
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && this.panel?.classList.contains('is-open')) {
                    this.close();
                }
            });

            document.addEventListener('click', (e) => {
                if (this.panel?.classList.contains('is-open') &&
                    !this.panel.contains(e.target) &&
                    !this.toggle?.contains(e.target)) {
                    this.close();
                }
            });

            document.querySelectorAll('[data-a11y="text-size"]').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('[data-a11y="text-size"]').forEach(b => {
                        b.classList.remove('is-active');
                        b.setAttribute('aria-checked', 'false');
                    });
                    btn.classList.add('is-active');
                    btn.setAttribute('aria-checked', 'true');
                    this.apply(this.getState());
                    this.save(this.getState());
                });
            });

            document.querySelectorAll('.a11y-panel input[type="checkbox"]').forEach(input => {
                input.addEventListener('change', () => {
                    input.setAttribute('aria-checked', input.checked);
                    this.apply(this.getState());
                    this.save(this.getState());
                });
            });

            this.resetBtn?.addEventListener('click', () => {
                this.apply(this.defaults);
                this.syncUI(this.defaults);
                this.save(this.defaults);
            });
        },
    };

    a11y.init();

    // 5b. Protección de créditos (MutationObserver)
    function buildCreditsHTML() {
        const div = document.createElement('div');
        div.className = 'footer-dev';
        div.innerHTML = `
            <div class="footer-dev-divider"></div>
            <p class="footer-dev-label">Desarrollado por</p>
            <div class="footer-dev-names">
                <div class="footer-dev-name">
                    <span class="footer-dev-first">Kendra Aiman</span>
                    <span class="footer-dev-last">de la Vega Anaya</span>
                </div>
                <span class="footer-dev-ampersand">&amp;</span>
                <div class="footer-dev-name">
                    <span class="footer-dev-first">Cristhian Emanuel</span>
                    <span class="footer-dev-last">Meza Acevedo</span>
                </div>
            </div>
        `;
        return div;
    }

    function injectCredits() {
        if (!document.querySelector('.footer-dev')) {
            const footer = document.querySelector('.premium-footer');
            if (footer) {
                footer.appendChild(buildCreditsHTML());
            }
        }
    }

    injectCredits();

    const creditObserver = new MutationObserver(() => {
        const el = document.querySelector('.footer-dev');
        if (!el || el.innerHTML.indexOf('Kendra Aiman') === -1 || el.innerHTML.indexOf('Cristhian Emanuel') === -1) {
            const existing = document.querySelector('.footer-dev');
            if (existing) existing.remove();
            injectCredits();
        }
    });

    const footer = document.querySelector('.premium-footer');
    if (footer) {
        creditObserver.observe(footer, { childList: true, subtree: true, characterData: true });
    }

    // 5b. Carrusel de imágenes (Instalaciones / Clases)
    document.querySelectorAll('[data-carousel]').forEach(container => {
        const track = container.querySelector('[data-track]');
        const slides = track.querySelectorAll('.carousel-slide');
        const prevBtn = container.querySelector('[data-prev]');
        const nextBtn = container.querySelector('[data-next]');
        const dots = container.querySelectorAll('[data-dots] .carousel-dot');

        if (slides.length < 2) return;

        let current = 0;

        function update() {
            track.style.transform = `translateX(-${current * 100}%)`;
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === current);
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                current = (current - 1 + slides.length) % slides.length;
                update();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                current = (current + 1) % slides.length;
                update();
            });
        }

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                current = parseInt(dot.dataset.index);
                update();
            });
        });
    });
});

