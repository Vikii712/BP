@props(['name', 'value'])

<div>
    <p class="text-sm text-gray-600 mb-1">{{$name}}:</p>
    <div class="flex items-center justify-between bg-votum-cream p-3 rounded">
        <span class="font-semibold">{{$value}}</span>

        <button
            onclick="copyToClipboard('{{$value}}')"
                class="copy-btn text-gray-600 active:scale-90 transition transform duration-150 ease-in-out"
                title="{{$name}}">
            <i class="fas fa-copy text-lg"></i>
        </button>

    </div>
</div>
