@props([
    'name',
    'route',
    'icon',
    'inverted' => false,
    'image' => null
])

<a href="{{ $route }}"
    @class([
         'group rounded-xl shadow-md transition-all duration-300 p-8 flex flex-col items-center justify-center space-y-4 hover:-translate-y-1',
         'text-blue-950 bg-white border-2 border-blue-950/10 hover:border-blue-950 hover:shadow-xl' => !$inverted,
         'text-white bg-blue-950 border-2 border-blue-900 hover:shadow-xl hover:ring-4 hover:ring-blue-900/40' => $inverted,
    ])>

    <div class="w-20 h-20 rounded-full flex items-center justify-center transition-colors duration-300
                {{ $inverted ? 'bg-white' : 'bg-blue-950' }}">
        @if($image)
            <img src="{{ asset('images/nav/' . $image) }}" alt="{{ $name }}" class="w-10 h-10 object-contain">
        @else
            <i class="fas {{ $icon }} text-3xl {{ $inverted ? 'text-blue-950' : 'group-hover:text-white' }}"></i>
        @endif
    </div>

    <h3 class="text-xl font-bold">
        {{ $name }}
    </h3>

</a>
