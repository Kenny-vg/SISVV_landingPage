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

    const updateIcons = (theme) => {
        if (theme === 'dark') {
            if (moonIcon) moonIcon.style.display = 'none';
            if (sunIcon) sunIcon.style.display = 'block';
        } else {
            if (moonIcon) moonIcon.style.display = 'block';
            if (sunIcon) sunIcon.style.display = 'none';
        }
    };

    // Inicializar iconos de acuerdo al tema actual cargado
    const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
    updateIcons(currentTheme);

    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', () => {
            const activeTheme = document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
            document.documentElement.setAttribute('data-theme', activeTheme);
            localStorage.setItem('theme', activeTheme);
            updateIcons(activeTheme);
        });
    }
});

