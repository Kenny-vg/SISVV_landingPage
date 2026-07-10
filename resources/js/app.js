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

    // 5a. Protección de créditos (MutationObserver)
    const CREDIT_TEXT = 'Desarrollado por Kendra Aiman de la Vega Anaya y Cristhian Emanuel Meza Acevedo';

    function injectCredits() {
        let creditEl = document.querySelector('.footer-dev-credits');
        if (!creditEl) {
            const footerBottom = document.querySelector('.footer-bottom');
            if (footerBottom) {
                creditEl = document.createElement('p');
                creditEl.className = 'footer-dev-credits';
                creditEl.textContent = CREDIT_TEXT;
                footerBottom.appendChild(creditEl);
            }
        }
    }

    injectCredits();

    const creditObserver = new MutationObserver(() => {
        const el = document.querySelector('.footer-dev-credits');
        if (!el || el.textContent !== CREDIT_TEXT) {
            injectCredits();
        }
    });

    const footerBottom = document.querySelector('.footer-bottom');
    if (footerBottom) {
        creditObserver.observe(footerBottom, { childList: true, subtree: true, characterData: true });
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

