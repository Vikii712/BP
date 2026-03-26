@props([
    'text' => 'ahoj',
    'id' => 1,
    'event' => false,
    'down' => false,
    'relative' => false,
])

<button
    onclick="window.toggleListen({{ json_encode($text) }}, '{{ $id }}')"
    class="
        {{ $event
            ? 'relative flex-shrink-0 rounded-md p-5'
            : 'rounded-full w-14 h-14'
        }}
        {{ $relative ? 'absolute -top-7 -right-2' : '' }}
        {{$down ? '-bottom-10' : ''}}
        txt-btn-block
        bg-votum-blue text-white
        flex items-center justify-center
        shadow-lg z-10
    "
    title="Počúvať text"
>
    <i id="ttsIcon{{ $id }}" class="fas fa-volume-up text-lg"></i>
    @if($event)
        <p class="text-lg font-bold text-white  px-4">Vypočuť</p>
    @endif
</button>

