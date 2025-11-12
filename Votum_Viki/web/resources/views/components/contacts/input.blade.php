@props(['name', 'value', 'color'])

<div class="">
    <p class="text-lg font-bold text-gray-900 mb-1">{{ $name }}:</p>

    <div class="flex items-center justify-between border-2
                {{ $color == 1 ? 'border-votum1' : ($color == 2 ? 'border-votum2' : 'border-votum3') }}
                bg-white p-3 rounded">
        <span class="font-semibold text-lg sm:text-xl whitespace-normal min-w-0 flex-1 [overflow-wrap:anywhere]">
            {{ $value }}
        </span>

        <button
            onclick="copyToClipboard('{{ $value }}')"
            class="copy-btn text-gray-600 hover:scale-110 active:scale-90
                   transition transform duration-150 ease-in-out ml-4"
            title="{{ $name }}">
            <i class="fas fa-copy text-3xl"></i>
        </button>
    </div>
</div>
