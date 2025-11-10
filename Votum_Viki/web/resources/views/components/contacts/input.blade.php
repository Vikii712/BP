@props(['name', 'value', 'color' => '1'])

<div>
    <p class="text-lg text-bold text-gray-900 mb-1">{{$name}}:</p>
    <div class="flex items-center justify-between {{$color == '1' ? 'bg-votum-cream' : 'bg-other-cream'}} p-3 rounded">
        <span class="font-semibold text-xl">{{$value}}</span>

        <button
            onclick="copyToClipboard('{{$value}}')"
                class="copy-btn text-gray-600 active:scale-90 transition transform duration-150 ease-in-out"
                title="{{$name}}">
            <i class="fas fa-copy text-3xl"></i>
        </button>

    </div>
</div>
