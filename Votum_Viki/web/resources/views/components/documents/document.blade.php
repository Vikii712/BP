@props(['color' => false])

<div class="document-card {{$color ? 'bg-votum-cream' : 'bg-white'}} rounded-lg shadow-lg p-6">
    <div class="flex items-center justify-between gap-4">
        <div class="flex items-center gap-4">
            <div class="bg-blue-100 p-4 rounded-lg flex-shrink-0 border-1 border-blue-300">
                <i class="fas fa-file-pdf text-blue-600 text-3xl"></i>
            </div>
            <div>
                <h3 class="text-xl font-bold text-votum-blue mb-2">Prihláška Tábor 2026</h3>
                <p class="text-sm text-gray-600">
                    <span class="inline-block bg-gray-100 px-2 py-1 rounded mr-2">PDF</span>
                    <span class="text-gray-500">450 KB</span>
                </p>
            </div>
        </div>

        <a href="#" download class="inline-flex items-center gap-2 bg-votum-blue text-white px-5 py-2 rounded-lg hover-scale font-semibold">
            <i class="fas fa-download"></i>
            <span>Stiahnuť</span>
        </a>
    </div>
</div>
