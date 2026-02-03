@php
    $icons = [
        // PDF
        'pdf'  => 'fa-file-pdf',

        // Word
        'doc'  => 'fa-file-word',
        'docx' => 'fa-file-word',

        // Excel
        'xls'  => 'fa-file-excel',
        'xlsx' => 'fa-file-excel',

        // Obrázky
        'jpg'  => 'fa-file-image',
        'jpeg' => 'fa-file-image',
        'png'  => 'fa-file-image',
    ];

@endphp

@props([
    'color' => true,
    'text',
    'size',
    'url',
    'type',
])





<div class="border-2 border-votum1 {{ $color ? 'bg-blue-100' : 'bg-white' }} rounded-lg shadow-lg p-6 mb-auto">

    <div class="flex items-start gap-4 mb-4">
        <div class="{{ $color ? 'bg-white' : 'bg-blue-100' }} w-16 h-16 rounded-lg border border-votum1 flex justify-center items-center flex-shrink-0">
            <i class="fas {{ $icons[strtolower($type)] ?? 'fa-file' }} text-blue-600 text-3xl"></i>
        </div>

        <div class="flex flex-col">
            <h3 class="txt font-bold text-votum-blue mb-1">{{ $text }}</h3>

            <div class="flex items-center gap-2 text-lg text-gray-600">
                <span class="font-semibold">{{ strtoupper($type) }}</span>
                <span>•</span>
                <span>{{ $size }} KB</span>
            </div>
        </div>
    </div>

    <a href="{{ $url }}" target="_blank"
       class="txt-btn w-full flex items-center justify-center gap-2 bg-votum-blue text-white py-4 rounded-lg font-semibold">
        <i class="fas fa-download"></i>
        <span>{{ __('nav.download') }}</span>
    </a>

</div>
