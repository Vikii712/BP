document.addEventListener('DOMContentLoaded', () => {
    const toggles = document.querySelectorAll('.a11y-toggle-btns');
    const panel = document.getElementById('a11y-panel');
    const closeBtn = document.getElementById('a11y-close');

    let lastTrigger = null;

    const FOCUSABLE = 'button:not([disabled]), [tabindex="0"]';
    let firstEl, lastEl;

    function openPanel() {
        if (!panel) return;

        panel.classList.remove('hidden');

        const els = panel.querySelectorAll(FOCUSABLE);
        firstEl = els[0];
        lastEl = els[els.length - 1];
        firstEl?.focus();

        document.addEventListener('keydown', onKeydown);
    }

    function closePanel() {
        if (!panel) return;

        if (panel.contains(document.activeElement)) {
            lastTrigger?.focus();
        }

        panel.classList.add('hidden');
        document.removeEventListener('keydown', onKeydown);
    }

    function onKeydown(e) {
        if (e.key === 'Escape') {
            closePanel();
            return;
        }

        if (e.key === 'Tab') {
            if (!firstEl || !lastEl) return;

            if (e.shiftKey) {
                if (document.activeElement === firstEl) {
                    e.preventDefault();
                    lastEl.focus();
                }
            } else {
                if (document.activeElement === lastEl) {
                    e.preventDefault();
                    firstEl.focus();
                }
            }
        }

        if (e.key === 'Enter' || e.key === ' ') {
            const active = document.activeElement;
            if (active?.getAttribute('role') === 'button') {
                e.preventDefault();
                active.closest('label')?.querySelector('input')?.click();
            }
        }
    }

    if (panel && toggles.length) {
        toggles.forEach(toggle => {
            toggle.addEventListener('click', (e) => {
                e.stopPropagation();
                lastTrigger = e.currentTarget;

                if (panel.classList.contains('hidden')) {
                    openPanel();
                } else {
                    closePanel();
                }
            });
        });

        closeBtn?.addEventListener('click', closePanel);

        document.addEventListener('click', (e) => {
            if (
                !panel.classList.contains('hidden') &&
                !panel.contains(e.target) &&
                !e.target.closest('.a11y-toggle-btns')
            ) {
                closePanel();
            }
        });

        panel.addEventListener('click', (e) => e.stopPropagation());
    }

    // ===== A11Y TOAST =====
    const toast = document.getElementById('a11y-toast');

    if (toast && !localStorage.getItem('a11yToastShown')) {
        setTimeout(() => {
            toast.classList.remove('hidden');
            toast.classList.add('opacity-0', 'translate-y-2');

            requestAnimationFrame(() => {
                toast.classList.add('transition', 'duration-300');
                toast.classList.remove('opacity-0', 'translate-y-2');
            });

            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-2');

                setTimeout(() => {
                    toast.classList.add('hidden');
                }, 300);
            }, 5000);
        }, 2000);

        localStorage.setItem('a11yToastShown', 'true');
    }
});
