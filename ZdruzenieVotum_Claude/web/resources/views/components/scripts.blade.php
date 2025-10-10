<script>
    // Mobile menu toggle
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const overlay = document.getElementById('mobile-menu-overlay');
        const button = document.getElementById('mobile-menu-button');

        const isHidden = menu.classList.contains('hidden');

        if (isHidden) {
            menu.classList.remove('hidden');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            button.setAttribute('aria-expanded', 'true');
            setTimeout(() => menu.classList.add('show'), 10);
        } else {
            menu.classList.remove('show');
            setTimeout(() => {
                menu.classList.add('hidden');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
                button.setAttribute('aria-expanded', 'false');
            }, 300);
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
            if (!menu.classList.contains('hidden')) {
                toggleMobileMenu();
            }
        }
    });
</script>
