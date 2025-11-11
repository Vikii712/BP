@props(['name', 'value', 'color'])

<div>
    <p class="text-lg text-bold text-gray-900 mb-1">{{$name}}:</p>
    <div class="flex items-center justify-between border-2 {{$color == 1 ? 'border-votum1' :($color == 2 ? 'border-votum2' : 'border-votum3')}}  bg-white p-3 rounded">
        <span class="font-semibold text-xl">{{$value}}</span>

        <button
            onclick="copyToClipboard('{{$value}}')"
                class="copy-btn text-gray-600 active:scale-90 transition transform duration-150 ease-in-out"
                title="{{$name}}">
            <i class="fas fa-copy text-3xl"></i>
        </button>

    </div>
</div>
