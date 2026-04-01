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
