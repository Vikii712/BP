@props(['name', 'value', 'color'])

@php
    $decodedName = html_entity_decode($name);
    $decodedValue = html_entity_decode($value);
    $plainText = strip_tags($decodedValue);
@endphp

<div class="">
    <div class="text-lg first-line-bold text-gray-900 mb-1">{!! $decodedName !!} </div>

    <div class="flex flex-wrap items-center gap-2 border-2
            {{ $color == 1 ? 'border-votum1' : ($color == 2 ? 'border-votum2' : 'border-votum3') }}
            bg-white p-3 rounded">

        <!-- TEXT -->
        <div class="font-semibold text-lg sm:text-xl min-w-[200px] flex-1 [overflow-wrap:anywhere]">
            {!! $decodedValue !!}
        </div>

        <!-- BUTTON -->
        <button
            onclick="copyToClipboard('{{ json_encode($plainText) }}')"
            class="copy-btn txt-btn-block shrink-0 mx-auto"
            title="{{ $name }}">
            <i class="fas fa-copy text-3xl"></i>
        </button>
    </div>
</div>


<style>
    .first-line-bold::first-line {
        font-weight: bold;
    }
</style>
