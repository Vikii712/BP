<script>
    // Mobile menu toggle
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const button = document.getElementById('mobile-menu-button');
        const icon = button.querySelector('i');

        const isShowing = menu.classList.contains('show');

        if (isShowing) {
            menu.classList.remove('show');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
            button.setAttribute('aria-expanded', 'false');
        } else {
            menu.classList.add('show');
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
            button.setAttribute('aria-expanded', 'true');
        }
    }

    // Font size control
    let currentSize = 1;
    function increaseFontSize() {
        if (currentSize < 2) {
            currentSize++;
            updateFontSize();
        }
    }

    function decreaseFontSize() {
        if (currentSize > 0) {
            currentSize--;
            updateFontSize();
        }
    }

    function updateFontSize() {
        const sizes = ['font-size-small', 'font-size-normal', 'font-size-large'];
        document.documentElement.className = sizes[currentSize];
    }

    // Language switcher
    function changeLanguage(lang) {
        window.location.href = '?lang=' + lang;
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                // Close mobile menu if open
                const menu = document.getElementById('mobile-menu');
                if (menu && menu.classList.contains('show')) {
                    toggleMobileMenu();
                }

                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Close mobile menu on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const menu = document.getElementById('mobile-menu');
            if (menu && menu.classList.contains('show')) {
                toggleMobileMenu();
            }
        }
    });
</script>
