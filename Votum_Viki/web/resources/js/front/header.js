document.addEventListener('DOMContentLoaded', () => {

    // Mobile menu toggle + position adjustment
    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('mobile-menu');
    const header = document.querySelector('header');
    const main = document.getElementById('site-main');
    let open = false;

    // Make sure menu is attached to body (avoids z-index/transform problems)
    if (menu && menu.parentElement !== document.body) document.body.appendChild(menu);

    function adjustLayout() {
        const headerHeight = header ? header.offsetHeight : 0;

        // move main down
        if (main) main.style.marginTop = headerHeight + 'px';

        // position mobile menu
        if (menu) {
            menu.style.top = headerHeight - 1 + 'px';
            menu.style.height = `calc(100vh - ${headerHeight}px)`;
        }
    }

    adjustLayout();
    window.addEventListener('resize', adjustLayout);

    if (window.ResizeObserver) {
        new ResizeObserver(adjustLayout).observe(header);
    }

    if (toggle && menu) {
        toggle.addEventListener('click', e => {
            e.stopPropagation();
            open = !open;
            menu.classList.toggle('hidden', !open);
            document.body.style.overflow = open ? 'hidden' : '';
            if (open) adjustLayout();
        });

        // close when clicking outside
        document.addEventListener('click', (e) => {
            if (open && !menu.contains(e.target) && e.target !== toggle) {
                open = false;
                menu.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });

        // close with Escape
        document.addEventListener('keydown', (e) => {
            if (open && e.key === 'Escape') {
                open = false;
                menu.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });
    }

    // ========== LOCALE SWITCHING FIX ==========
    // Use event delegation on document to catch form submits from mobile menu
    document.addEventListener('submit', (e) => {

        // Check if submitted form is the mobile locale form
        if (e.target && e.target.id === 'locale-form-mobile') {
            // Remember that menu was open
            sessionStorage.setItem('votum:mobile-menu-open', 'true');
        }
    });

    // Restore mobile menu state after page reload
    if (sessionStorage.getItem('votum:mobile-menu-open') === 'true') {
        sessionStorage.removeItem('votum:mobile-menu-open');
        if (toggle && menu) {
            open = true;
            menu.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            adjustLayout();
        }
    }
});
