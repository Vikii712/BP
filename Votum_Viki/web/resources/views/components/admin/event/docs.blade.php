@props([ 'event'])


{{-- DOKUMENTY --}}
<div id="documentSection" class="space-y-3 {{ old('inGallery', $event->inGallery ?? false) ? '' : 'hidden' }}">
    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
        Pridať dokument
    </div>

    <!-- + tlačidlo a výber existujúceho súboru -->
    <div class="px-6 flex items-center gap-3 mb-2">
        <button type="button"
                id="addDocumentBtn"
                class="h-10 w-10 flex items-center justify-center border-2 border-blue-950 rounded-md hover:bg-blue-50">
            <i class="fa-solid fa-plus"></i>
        </button>

    </div>


    <!-- Wrapper pre nové dokumenty -->
    <div id="documentsWrapper" class="px-6 space-y-5 my-5"></div>
</div>
