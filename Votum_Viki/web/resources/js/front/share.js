(() => {
    const shareBtn = document.getElementById('shareBtn');
    const shareDialog = document.getElementById('shareDialog');
    const closeDialog = document.getElementById('closeDialog');
    const shareFb = document.getElementById('shareFb');
    const shareWa = document.getElementById('shareWa');
    const shareMs = document.getElementById('shareMs');
    const shareMail = document.getElementById('shareMail');
    const copyUrl = document.getElementById('copyUrl');

    if (
        !shareBtn ||
        !shareDialog ||
        !closeDialog ||
        !shareFb ||
        !shareWa ||
        !shareMs ||
        !shareMail ||
        !copyUrl
    ) {
        return;
    }

    const currentURL = encodeURIComponent(window.location.href);
    const FOCUSABLE = 'a[href], button:not([disabled])';

    let firstEl;
    let lastEl;

    function openModal() {
        shareDialog.classList.remove('hidden');

        const els = shareDialog.querySelectorAll(FOCUSABLE);
        firstEl = els[0];
        lastEl = els[els.length - 1];
        firstEl?.focus();

        document.addEventListener('keydown', onKeydown);
    }

    function closeModal() {
        shareDialog.classList.add('hidden');
        document.removeEventListener('keydown', onKeydown);
        shareBtn.focus();
    }

    function onKeydown(e) {
        if (e.key === 'Escape') {
            closeModal();
            return;
        }

        if (e.key === 'Tab') {
            if (!firstEl || !lastEl) return;

            if (e.shiftKey && document.activeElement === firstEl) {
                e.preventDefault();
                lastEl.focus();
            } else if (!e.shiftKey && document.activeElement === lastEl) {
                e.preventDefault();
                firstEl.focus();
            }
        }
    }

    shareBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        openModal();
    });

    closeDialog.addEventListener('click', closeModal);

    shareDialog.addEventListener('click', (e) => {
        if (e.target === shareDialog) {
            closeModal();
        }
    });

    shareFb.href = `https://www.facebook.com/sharer/sharer.php?u=${currentURL}`;
    shareWa.href = `https://api.whatsapp.com/send?text=${currentURL}`;
    shareMs.href = `fb-messenger://share/?link=${currentURL}`;
    shareMail.href = `mailto:?subject=Pozri si toto&body=${currentURL}`;

    copyUrl.addEventListener('click', async () => {
        try {
            await navigator.clipboard.writeText(window.location.href);
            alert('URL bola skopírovaná do schránky!');
        } catch {
            alert('Nepodarilo sa skopírovať URL.');
        }
    });
})();
