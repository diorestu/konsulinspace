import Dropzone from 'dropzone';
import 'dropzone/dist/dropzone.css';
import Lenis from 'lenis';
import 'lenis/dist/lenis.css';

window.Dropzone = Dropzone;
Dropzone.autoDiscover = false;

// Initialize Lenis Smooth Scrolling
document.addEventListener('DOMContentLoaded', () => {
    // Only initialize smooth scroll on non-admin pages or if body is not in iframe
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        smoothWheel: true,
        touchMultiplier: 1.5,
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);

    window.lenis = lenis;

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#' && targetId.length > 1) {
                const targetEl = document.querySelector(targetId);
                if (targetEl) {
                    e.preventDefault();
                    lenis.scrollTo(targetEl, { offset: -80 });
                }
            }
        });
    });

    // Scroll to Top button functionality
    const scrollBtn = document.getElementById('scrollToTopBtn');
    if (scrollBtn) {
        const toggleScrollBtn = () => {
            if (window.scrollY > 300) {
                scrollBtn.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-3');
                scrollBtn.classList.add('opacity-100', 'pointer-events-auto', 'translate-y-0');
            } else {
                scrollBtn.classList.remove('opacity-100', 'pointer-events-auto', 'translate-y-0');
                scrollBtn.classList.add('opacity-0', 'pointer-events-none', 'translate-y-3');
            }
        };

        window.addEventListener('scroll', toggleScrollBtn, { passive: true });
        // Initial check in case page is reloaded halfway down
        toggleScrollBtn();

        scrollBtn.addEventListener('click', () => {
            if (window.lenis) {
                window.lenis.scrollTo(0, { duration: 1.2 });
            } else {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });
    }
});
