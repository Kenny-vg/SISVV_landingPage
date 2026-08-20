/**
 * Carrusel de desplazamiento horizontal para las secciones del sitio.
 * Se activa sobre elementos con [data-section-carousel] y lee los ids desde
 * data-track / data-prev / data-next / data-auto (ms, 0 = sin auto-scroll).
 */
function initCarousel(wrapper) {
    const track = document.getElementById(wrapper.dataset.track);
    if (!track) return;

    const prevBtn = document.getElementById(wrapper.dataset.prev);
    const nextBtn = document.getElementById(wrapper.dataset.next);
    const autoInterval = parseInt(wrapper.dataset.auto || '0', 10);

    let isPaused = false;
    let autoTimer = null;

    function cardStep() {
        const card = track.querySelector('.bento-fullbleed, .bento-item');
        if (!card) return 0;
        const gap = parseFloat(getComputedStyle(track).gap) || 0;
        return card.getBoundingClientRect().width + gap;
    }

    function maxScroll() {
        return track.scrollWidth - track.clientWidth;
    }

    function updateButtons() {
        if (prevBtn) prevBtn.disabled = track.scrollLeft <= 10;
        if (nextBtn) nextBtn.disabled = track.scrollLeft >= maxScroll() - 10;
    }

    function scrollBy(direction) {
        const max = maxScroll();
        if (direction > 0 && track.scrollLeft >= max - 10) {
            track.scrollTo({ left: 0, behavior: 'smooth' });
        } else if (direction < 0 && track.scrollLeft <= 10) {
            return;
        } else {
            const step = cardStep() || 360;
            track.scrollBy({ left: step * direction, behavior: 'smooth' });
        }
        setTimeout(updateButtons, 400);
    }

    function startAutoScroll() {
        if (!autoInterval || autoTimer) return;
        autoTimer = setInterval(() => {
            if (!isPaused) scrollBy(1);
        }, autoInterval);
    }

    if (prevBtn) prevBtn.addEventListener('click', () => scrollBy(-1));
    if (nextBtn) nextBtn.addEventListener('click', () => scrollBy(1));

    track.addEventListener('scroll', () => {
        clearTimeout(track._scrollTimeout);
        track._scrollTimeout = setTimeout(updateButtons, 100);
    });

    wrapper.addEventListener('mouseenter', () => { isPaused = true; });
    wrapper.addEventListener('mouseleave', () => { isPaused = false; });
    wrapper.addEventListener('touchstart', () => { isPaused = true; }, { passive: true });
    wrapper.addEventListener('touchend', () => { isPaused = false; }, { passive: true });

    updateButtons();
    startAutoScroll();
    window.addEventListener('resize', updateButtons);
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-section-carousel]').forEach(initCarousel);
});

export { initCarousel };