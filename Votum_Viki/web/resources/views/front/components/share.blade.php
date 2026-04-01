<div class="flex gap-3 justify-center">
    <button id="shareBtn" class="bg-dark-votum3 text-white p-5 rounded-md flex items-center gap-2 txt-btn">
        <i class="fas fa-share-alt"></i>
        <span class="px-4 text-lg font-bold">{{ __('nav.share') }}</span>
    </button>
</div>
<!-- Dialog -->
<div id="shareDialog" role="dialog" aria-modal="true" aria-labelledby="dialogTitle"
     class="fixed inset-0 flex items-center justify-center bg-black/50 hidden z-[9999] p-4"
     tabindex="-1"
    >
    <div class="bg-white rounded-lg p-6 w-80 max-h-[90vh] overflow-y-auto text-center relative flex flex-col gap-4">
        <h2 id="dialogTitle" class="text-lg font-semibold mb-4">Zdieľať túto stránku</h2>

        <div class="flex flex-col gap-3">
            <!-- Facebook -->
            <a id="shareFb" target="_blank"
               class="px-3 py-4 border-2 border-black txt-btn-block w-full bg-blue-600 text-white rounded hover:bg-blue-700 flex items-center justify-center gap-2">
                <i class="fab text-xl fa-facebook-f"></i>
                Facebook
            </a>

            <!-- WhatsApp -->
            <a id="shareWa" target="_blank"
               class="px-3 py-4 border-2 border-black txt-btn-block w-full bg-green-500 text-white rounded hover:bg-green-600 flex items-center justify-center gap-2">
                <i class="fab text-xl fa-whatsapp"></i>
                WhatsApp
            </a>

            <!-- Messenger -->
            <a id="shareMs" target="_blank"
               class="px-3 py-4 border-2 border-black txt-btn-block w-full bg-blue-400 text-white rounded hover:bg-blue-500 flex items-center justify-center gap-2">
                <i class="fab text-xl fa-facebook-messenger"></i>
                Messenger
            </a>

            <!-- Email -->
            <a id="shareMail" target="_blank"
               class="px-3 py-4 border-2 border-black txt-btn-block w-full bg-gray-800 text-white rounded hover:bg-gray-900 flex items-center justify-center gap-2">
                <i class="fas text-xl fa-envelope"></i>
                Email
            </a>

            <!-- Kopírovať URL -->
            <button id="copyUrl"
                    class="px-3 py-4 border-2 w-full bg-gray-200 txt-btn-block rounded hover:bg-gray-300 flex items-center justify-center gap-2">
                <i class="fas text-xl fa-link"></i>
                Kopírovať URL
            </button>
        </div>

        <button id="closeDialog" class="mt-4 px-6 py-3 border-2 txt-btn-block rounded self-center flex items-center gap-2">
            <i class="fas text-xl fa-xmark"></i>
            Zavrieť
        </button>
    </div>
</div>

<script>
    (() => {
        const shareBtn     = document.getElementById('shareBtn');
        const shareDialog  = document.getElementById('shareDialog');
        const closeDialog  = document.getElementById('closeDialog');
        const currentURL   = encodeURIComponent(window.location.href);

        const FOCUSABLE = 'a[href], button:not([disabled])';

        let firstEl, lastEl;

        function openModal() {
            shareDialog.classList.remove('hidden');

            const els = shareDialog.querySelectorAll(FOCUSABLE);
            firstEl = els[0];
            lastEl  = els[els.length - 1];
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
            if (e.target === shareDialog) closeModal();
        });

        // Share links
        document.getElementById('shareFb').href   = `https://www.facebook.com/sharer/sharer.php?u=${currentURL}`;
        document.getElementById('shareWa').href   = `https://api.whatsapp.com/send?text=${currentURL}`;
        document.getElementById('shareMs').href   = `fb-messenger://share/?link=${currentURL}`;
        document.getElementById('shareMail').href = `mailto:?subject=Pozri si toto&body=${currentURL}`;

        document.getElementById('copyUrl').addEventListener('click', async () => {
            try {
                await navigator.clipboard.writeText(window.location.href);
                alert('URL bola skopírovaná do schránky!');
            } catch {
                alert('Nepodarilo sa skopírovať URL.');
            }
        });
    })();
</script>
