@props(['color' => false])

<div class="document-card {{ $color ? 'bg-votum-cream' : 'bg-white' }} rounded-lg shadow-lg p-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-center sm:justify-between gap-4">

        <!-- Ikona -->
        <div class="flex-shrink-0 flex justify-center sm:justify-start w-full sm:w-auto mb-4 sm:mb-0">
            <div class="bg-blue-100 p-4 rounded-lg border border-blue-300 inline-flex justify-center items-center">
                <i class="fas fa-file-pdf text-blue-600 text-3xl"></i>
            </div>
        </div>

        <!-- Text a veľkosť súboru -->
        <div class="flex flex-col flex-1 text-center sm:text-left">
            <h3 class="text-xl font-bold text-votum-blue mb-1">Prihláška Tábor 2026</h3>
            <p class="text-sm text-gray-600 mb-2">
                <span class="inline-block bg-gray-100 px-2 py-1 rounded mr-2">PDF</span>
                <span class="text-gray-500">450 KB</span>
            </p>
        </div>

        <!-- Tlačidlo -->
        <a href="#"
           class="w-full sm:w-auto sm:px-4 inline-flex items-center justify-center sm:justify-start gap-2 bg-votum-blue text-white py-4 rounded-lg font-semibold hover:scale-105 transition transform mt-2 sm:mt-0">
            <i class="fas fa-download"></i>
            <span>Stiahnuť</span>
        </a>

    </div>
</div>
