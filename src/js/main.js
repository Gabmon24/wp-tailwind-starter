/**
 * WP Tailwind Starter — Main JavaScript
 * Author: Gabriel Montiel Chamorro (@Gabmon24)
 * Pure Vanilla JS, Zero jQuery dependency
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Mobile Menu Drawer Toggle
  const toggleBtn = document.getElementById('wpts-menu-toggle');
  const mobileMenu = document.getElementById('wpts-mobile-menu');
  const burgerIcon = document.getElementById('wpts-burger-icon');
  const closeIcon = document.getElementById('wpts-close-icon');

  if (toggleBtn && mobileMenu) {
    toggleBtn.addEventListener('click', () => {
      const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';
      toggleBtn.setAttribute('aria-expanded', !isExpanded);
      mobileMenu.classList.toggle('hidden');

      if (burgerIcon && closeIcon) {
        burgerIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
      }
    });
  }

  // 2. Reading Progress Bar (Single post)
  const progressBar = document.getElementById('wpts-progress');
  const header = document.getElementById('wpts-header');
  const backToTopBtn = document.getElementById('wpts-back-to-top');

  window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;

    // Header shadow on scroll
    if (header) {
      if (scrollY > 20) {
        header.classList.add('shadow-sm');
      } else {
        header.classList.remove('shadow-sm');
      }
    }

    // Progress bar calculation
    if (progressBar) {
      const totalHeight = document.documentElement.scrollHeight - window.innerHeight;
      if (totalHeight > 0) {
        const progress = (scrollY / totalHeight) * 100;
        progressBar.style.width = `${Math.min(100, Math.max(0, progress))}%`;
      }
    }

    // Back to top button visibility
    if (backToTopBtn) {
      if (scrollY > 400) {
        backToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
        backToTopBtn.classList.add('opacity-100', 'pointer-events-auto');
      } else {
        backToTopBtn.classList.add('opacity-0', 'pointer-events-none');
        backToTopBtn.classList.remove('opacity-100', 'pointer-events-auto');
      }
    }
  }, { passive: true });

  // Back to top click
  if (backToTopBtn) {
    backToTopBtn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }
});
