@props(['type'])

@php
    $route = $type == 'p' ? route('2percent') : ($type == 'f' ? route('financial') : route('other'));
    $text = $type == 'p' ? 'Venujte 2%' : ($type == 'f' ? 'Finančná podpora' : 'Iné formy podpory');
    $icon = $type == 'p' ? 'percent' : ($type == 'f' ? 'money' : 'other');
    $border = $type == 'p' ? 'border-votum1' : ($type == 'f' ? 'border-votum2' : 'border-votum3');
    $bg = $type == 'p' ? 'bg-blue-100' : ($type == 'f' ? 'bg-votum2' : 'bg-votum3');
    $text_col = $type == 'p' ? 'text-votum1' : ($type == 'f' ? 'text-votum2' : 'text-votum3');
@endphp

<a href="{{ $route }}"
   class="group block {{$bg}} border-5 {{$border}} text-white rounded-3xl shadow-xl overflow-hidden transform transition-all duration-300 hover:scale-[1.03] hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-votum-blue/50 focus:ring-offset-2">
    <div class="flex flex-col items-center justify-center text-center p-10 space-y-6">
        <div class="p-5 rounded-2xl h-36 w-36 flex items-center justify-center transition-transform group-hover:scale-110">
            <img src="{{ asset('images/' . $icon . '.svg') }}" alt="" class="object-contain h-full w-full">
        </div>
        <h2 class="h2 font-bold {{$text_col}}">{{ $text }}</h2>
    </div>
</a>
