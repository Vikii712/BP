@php
    $options = [
        'size' => [
            ['title' => 'Väčšie písmo', 'icon' => 'fa-solid fa-plus', 'function' => 'increaseFont'],
        ],
        'read' => [
            ['title' => 'Zvýraznenie čítaného textu', 'icon' => 'fa-solid fa-highlighter', 'function' => 'highlightReading'],
            ['title' => 'Pravítko', 'icon' => 'fa-solid fa-ruler-horizontal', 'function' => 'readingGuide'],
            ['title' => 'Tieň nad a pod kurzorom', 'icon' => 'fa-solid fa-pause rotate-90', 'function' => 'cursorShadow'],
            ['title' => 'Veľký kurzor', 'icon' => 'fa-solid fa-arrow-pointer', 'function' => 'bigCursor'],
            ['title' => 'Skryť obrázky', 'icon' => 'fa-solid fa-image', 'function' => 'disableImages'],
            ['title' => 'Zvýrazniť odkazy', 'icon' => 'fa-solid fa-link', 'function' => 'highlightLinks'],
        ],
        'text' => [
            ['title' => 'Medzery medzi písmenami', 'icon' => 'fa-solid fa-text-height', 'function' => 'letterSpacing', 'spectrum' => true],
            ['title' => 'Vzdialenosť medzi riadkami', 'icon' => 'fa-solid fa-lines-leaning', 'function' => 'lineSpacing', 'spectrum' => true],
        ],
        'font' => [
            ['title' => 'Atkinson', 'font' => '"Atkinson Hyperlegible", sans-serif', 'key' => 'atkinson'],
            ['title' => 'Arial', 'font' => 'Arial, sans-serif', 'key' => 'arial'],
            ['title' => 'Comic Sans', 'font' => '"Comic Sans MS", cursive', 'key' => 'comic'],
            ['title' => 'Open Dyslexic', 'font' => 'OpenDyslexicRegular, sans-serif', 'key' => 'dyslexic'],
        ],
        'color' => [
            ['title' => 'Normálne', 'icon' => 'fa-solid fa-palette', 'function' => 'none'],
            ['title' => 'Čierno/biele', 'icon' => 'fa-solid fa-circle-half-stroke', 'function' => 'monochrome'],
            ['title' => 'Znížiť saturáciu', 'icon' => ' fa-solid fa-droplet-slash', 'function' => 'lowSaturation'],
            ['title' => 'Zvýšiť saturáciu', 'icon' => 'fa-solid fa-droplet', 'function' => 'highSaturation'],
            ['title' => 'Tmavý kontrast', 'icon' => ' fa-solid fa-moon', 'function' => 'darkMode'],
            ['title' => 'Svetlý kontrast', 'icon' => 'fa-regular fa-moon', 'function' => 'lightMode'],

        ],
    ];
@endphp

<div>

    {{-- Trigger Button --}}
    <button
        id="a11y-toggle"
        class="fixed bottom-6 right-6 z-50 w-14 h-14 rounded-full bg-yellow-300 border-2 border-black shadow-[3px_3px_0_#000] flex items-center justify-center text-2xl cursor-pointer"
        aria-label="Otvoriť panel prístupnosti"
    >
        <i class="fa-solid fa-universal-access"></i>
    </button>

    {{-- PANEL --}}
    <div
        id="a11y-panel"
        class="hidden fixed rounded-xl bottom-20 right-6 z-[9999] w-96 max-h-[80vh] border-2 border-black flex flex-col overflow-hidden"
    >
        {{-- HEADER --}}
        <div class="bg-yellow-300 border-b-2 border-black px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-2 font-bold text-lg">
                <i class="fa-solid fa-universal-access text-xl"></i>
                {{__('nav.a11y')}}
            </div>
            <button id="a11y-close" class="text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        {{-- Scrollable body --}}
        <div class="overflow-y-auto flex-1 p-4 pr-2 space-y-3 bg-white">

            {{-- RESET BUTTON --}}

                <button id="a11y-reset" class="flex justify-center items-center w-full px-4 py-5 bg-gray-200 border-2 border-black rounded-md text-black font-bold text-center cursor-pointer hover:bg-red-300">
                    <i class="fa-solid text-3xl fa-xmark px-2"></i>
                    Vypnúť všetko
                </button>

            @foreach($options as $section => $items)
                <div class="rounded-xl border-2 border-black bg-neutral-400 shadow-sm overflow-hidden">

                    {{-- Sekcia header --}}
                    <div class="px-4 py-2.5 bg-neutral-900 text-white font-bold uppercase tracking-widest">
                        {{ __('nav.acc_' . $section) }}
                    </div>

                    @if($section === 'size')

                        <div class="p-3">
                            <button
                                id="fontScaleButton"
                                class="w-full flex flex-col items-center gap-3 p-4 rounded-lg border-2 border-black bg-gray-50 hover:bg-yellow-300">

                                <div class="flex flex-col items-center gap-3">
                                    <i class="fa-solid text-3xl fa-text-height"></i>
                                    <span class="font-medium">Veľkosť písma</span>
                                </div>

                                <div id="fontScaleSpectrum" class="flex w-full gap-1">
                                    @for($i = 0; $i < 7; $i++)
                                        <div
                                            class="flex-1 h-3 border border-black bg-white"
                                            data-font-scale="{{ $i }}">
                                        </div>
                                    @endfor
                                </div>

                            </button>
                        </div>


                    @elseif($section === 'font' || $section === 'color')
                        <div class="grid grid-cols-2 gap-2 p-3">
                            @foreach($items as $item)
                                <label class="group cursor-pointer">
                                    <input
                                        type="radio"
                                        name="a11y-{{ $section }}"
                                        class="peer hidden"
                                        @if($section === 'font')
                                            data-font="{{ $item['font'] }}"
                                        data-font-key="{{ $item['key'] }}"
                                        @else
                                            data-filter="{{ $item['function'] }}"
                                        @endif
                                        >
                                        <div class="flex flex-col items-center justify-center gap-2 p-4 rounded-lg border-2 border-black bg-gray-50
                                        peer-checked:bg-yellow-300 h-full
                                        peer-checked:border-yellow-800
                                        hover:bg-yellow-300">

                                        <span class="text-3xl text-black py-2">
                                            @if(isset($item['icon']))
                                                <i class="{{ $item['icon'] }}"></i>
                                            @else
                                                <span class="text-2xl font-medium" style="font-family: {{ $item['font'] }}">Aa</span>
                                            @endif
                                        </span>

                                        <span class="text-md text-center font-medium text-black leading-tight">
                                            {{ $item['title'] }}
                                        </span>

                                    </div>
                                </label>
                            @endforeach
                        </div>
                    @else
                        <div class="grid grid-cols-2 gap-2 p-3">
                            @foreach($items as $item)
                                <label class="group cursor-pointer">
                                    <input
                                        type="checkbox"
                                        class="peer hidden a11y-toggle"
                                        data-feature="{{ $item['function'] }}"
                                    >
                                    <div class="flex flex-col items-center gap-2 p-4 rounded-lg border-2 border-black bg-gray-50
                                        peer-checked:bg-yellow-300 h-full
                                        peer-checked:border-yellow-800
                                        hover:bg-yellow-300">
                                        <span class="text-3xl text-black py-2">
                                            <i class="{{ $item['icon'] }}"></i>
                                        </span>
                                        <span class="text-md text-center font-medium text-black leading-tight">
                                            {{ $item['title'] }}
                                        </span>
                                        @if(!empty($item['spectrum']))
                                            <div class="flex w-full overflow-hidden gap-1" data-spectrum="{{ $item['function'] }}">
                                                <div class="flex-1 h-2 bg-black border border-black" data-step="1"></div>
                                                <div class="flex-1 h-2 bg-white border border-black" data-step="2"></div>
                                                <div class="flex-1 h-2 bg-white border border-black" data-step="3"></div>
                                            </div>
                                        @endif
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    @endif

                </div>
            @endforeach

        </div>
    </div>

</div>

{{-- Reading Guide --}}
<div id="readingGuide"
     class="hidden fixed left-0 w-full h-[4px] bg-black shadow-[0_0_10px_rgba(0,0,0,0.5)] pointer-events-none z-[9999]">
</div>

{{-- Tieň okolo kurzora --}}
<div id="cursorShadowTop"
     class="hidden fixed left-0 top-0 w-full bg-black/60 pointer-events-none z-[9998]">
</div>
<div id="cursorShadowBottom"
     class="hidden fixed left-0 bottom-0 w-full bg-black/60 pointer-events-none z-[9998]">
</div>

<script>
    const toggle = document.getElementById("a11y-toggle");
    const panel = document.getElementById("a11y-panel");
    const closeBtn = document.getElementById("a11y-close");

    toggle.addEventListener("click", (e) => {
        e.stopPropagation();
        panel.classList.toggle("hidden");
    });

    closeBtn.addEventListener("click", () => {
        panel.classList.add("hidden");
    });

    panel.addEventListener("click", (e) => {
        e.stopPropagation();
    });

    document.addEventListener("click", () => {
        panel.classList.add("hidden");
    });
</script>
