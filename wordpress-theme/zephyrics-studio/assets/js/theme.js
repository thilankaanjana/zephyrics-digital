/**
 * ZephyricsStudio Theme JavaScript
 *
 * @package ZephyricsStudio
 */

(function() {
    'use strict';

    /**
     * Header scroll behavior
     */
    function initHeaderScroll() {
        const header = document.getElementById('masthead');
        if (!header) return;

        let lastScroll = 0;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            if (currentScroll > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            lastScroll = currentScroll;
        });
    }

    /**
     * Mobile menu toggle
     */
    function initMobileMenu() {
        const menuToggle = document.querySelector('.menu-toggle');
        const mainNav = document.querySelector('.main-nav');
        const menuIcon = document.querySelector('.menu-icon');
        const closeIcon = document.querySelector('.close-icon');

        if (!menuToggle || !mainNav) return;

        menuToggle.addEventListener('click', function() {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';

            menuToggle.setAttribute('aria-expanded', !isExpanded);
            mainNav.classList.toggle('active');

            if (menuIcon && closeIcon) {
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            }
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!menuToggle.contains(event.target) && !mainNav.contains(event.target)) {
                menuToggle.setAttribute('aria-expanded', 'false');
                mainNav.classList.remove('active');

                if (menuIcon && closeIcon) {
                    menuIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                }
            }
        });

        // Close menu on escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                menuToggle.setAttribute('aria-expanded', 'false');
                mainNav.classList.remove('active');

                if (menuIcon && closeIcon) {
                    menuIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                }
            }
        });
    }

    /**
     * Smooth scroll for anchor links
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    const headerHeight = document.getElementById('masthead')?.offsetHeight || 80;

                    window.scrollTo({
                        top: target.offsetTop - headerHeight,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    /**
     * Fade in animations on scroll
     */
    function initScrollAnimations() {
        const animatedElements = document.querySelectorAll('.fade-up');

        if (!animatedElements.length) return;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        animatedElements.forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
            observer.observe(el);
        });
    }

    /**
     * Current menu item highlight
     */
    function initCurrentMenuItem() {
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.main-nav a');

        navLinks.forEach(link => {
            const linkPath = new URL(link.href).pathname;

            if (linkPath === currentPath || (currentPath === '/' && linkPath === '/')) {
                link.classList.add('active');
            }
        });
    }

    /**
     * Initialize all functions on DOM ready
     */
    function init() {
        initHeaderScroll();
        initMobileMenu();
        initSmoothScroll();
        initScrollAnimations();
        initCurrentMenuItem();
    }

    // Run on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
