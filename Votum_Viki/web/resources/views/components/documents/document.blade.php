@props(['color' => true])

<div class="border-2 border-votum1 document-card {{ $color ? 'bg-blue-100' : ' bg-white' }} rounded-lg shadow-lg p-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-center sm:justify-between gap-4">

        <!-- Ikona -->
        <div class="flex-shrink-0 flex justify-center sm:justify-start w-full sm:w-auto mb-4 sm:mb-0">
            <div class="{{ $color ? 'bg-white' : ' bg-blue-100' }} p-4 rounded-lg border border-votum1 inline-flex justify-center items-center">
                <i class="fas fa-file-pdf text-blue-600 text-3xl"></i>
            </div>
        </div>

        <!-- Text a veľkosť súboru -->
        <div class="flex flex-col flex-1 text-center sm:text-left">
            <h3 class="txt font-bold text-votum-blue mb-1">Prihláška Tábor 2026</h3>
            <p class="text-sm text-black mb-2">
                <span class="txt inline-block {{ $color ? 'bg-white' : ' bg-blue-100' }} border border-votum1 px-2 py-1 rounded mr-2">PDF</span>
                <span class="txt text-black">450 KB</span>
            </p>
        </div>

        <!-- Tlačidlo -->
        <a href="#"
           class=" txt-btn w-full sm:w-auto sm:px-4 inline-flex items-center justify-center sm:justify-start gap-2 bg-votum-blue text-white py-4 rounded-lg font-semibold hover:scale-105 transition transform mt-2 sm:mt-0">
            <i class="fas fa-download"></i>
            <span>Stiahnuť</span>
        </a>

    </div>
</div>
