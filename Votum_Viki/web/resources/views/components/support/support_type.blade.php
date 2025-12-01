@props(['type'])

@php
    $route = $type == 'p' ? route('2percent') : ($type == 'f' ? route('financial') : route('other'));

    $text = $type == 'p'
        ? __('nav.2percent')
        : ($type == 'f'
            ? __('nav.financial')
            : __('nav.otherSupport'));

    $icon = $type == 'p' ? 'percent' : ($type == 'f' ? 'money' : 'other');
    $border = $type == 'p' ? 'border-votum1' : ($type == 'f' ? 'border-votum2' : 'border-votum3');
    $bg = $type == 'p' ? 'bg-blue-100' : ($type == 'f' ? 'bg-votum2' : 'bg-votum3');
    $text_col = $type == 'p' ? 'text-votum1' : ($type == 'f' ? 'text-votum2' : 'text-votum3');
@endphp

<a href="{{ $route }}"
   class="group block {{$bg}} border-5 {{$border}} text-white rounded-3xl shadow-xl overflow-hidden txt-btn-block">
    <div class="flex flex-col items-center justify-center text-center p-10 space-y-6">
        <div class="p-5 rounded-2xl h-36 w-36 flex items-center justify-center">
            <img src="{{ asset('images/' . $icon . '.svg') }}" alt="" class="object-contain h-full w-full">
        </div>
        <h2 class="h2 font-bold {{$text_col}}">{{ $text }}</h2>
    </div>
</a>
