 // =============================================
    // MOBILE MENU TOGGLE
    // =============================================
    const toggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    toggle.addEventListener('click', () => {
        const isOpen = mobileMenu.classList.toggle('open');
        toggle.classList.toggle('open', isOpen);
        toggle.setAttribute('aria-expanded', isOpen);
    });

    // Close menu when a link is clicked
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('open');
            toggle.classList.remove('open');
            toggle.setAttribute('aria-expanded', false);
        });
    });

    // =============================================
    // SCROLL EFFECT — adds shadow on scroll
    // =============================================
    const navbar = document.getElementById('siteNavbar');

    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 10);
    }, { passive: true });

    // =============================================
    // ACTIVE LINK — highlight current page link
    // =============================================
    const currentPath = window.location.pathname;
    document.querySelectorAll('.navbar-nav-links a').forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            link.classList.add('active');
        }
    });

document.addEventListener('DOMContentLoaded', function () {
    const carousel = new bootstrap.Carousel(
        document.querySelector('#testimonialCarousel'),
        {
            interval: 3000,
            ride: 'carousel',
            pause: false,
            wrap: true
        }
    );
});
