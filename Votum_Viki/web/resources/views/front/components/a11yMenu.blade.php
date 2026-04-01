@php
    $options = [
        'size' => [
            ['title' => 'Väčšie písmo', 'icon' => 'fa-solid fa-plus', 'function' => 'increaseFont'],
        ],
        'read' => [
            ['title' => 'Zvýrazniť text', 'icon' => 'fa-solid fa-highlighter', 'function' => 'highlightReading'],
            ['title' => 'Pravítko', 'icon' => 'fa-solid fa-ruler-horizontal', 'function' => 'readingGuide'],
            ['title' => 'Tieň kurzora', 'icon' => 'fa-solid fa-pause rotate-90', 'function' => 'cursorShadow'],
            ['title' => 'Veľký kurzor', 'icon' => 'fa-solid fa-arrow-pointer', 'function' => 'bigCursor'],
            ['title' => 'Skryť obrázky', 'icon' => 'fa-solid fa-image', 'function' => 'disableImages'],
            ['title' => 'Zvýrazniť odkazy', 'icon' => 'fa-solid fa-link', 'function' => 'highlightLinks'],
        ],
        'text' => [
            ['title' => 'Medzery písmen', 'icon' => 'fa-solid fa-text-height', 'function' => 'letterSpacing', 'spectrum' => true],
            ['title' => 'Medzery riadkov', 'icon' => 'fa-solid fa-lines-leaning', 'function' => 'lineSpacing', 'spectrum' => true],
        ],
        'font' => [
            ['title' => 'Atkinson', 'font' => '"Atkinson Hyperlegible"', 'key' => 'atkinson'],
            ['title' => 'Arial', 'font' => 'Arial, sans-serif', 'key' => 'arial'],
            ['title' => 'Comic Sans', 'font' => '"Comic Sans MS", sans-serif', 'key' => 'comic'],
            ['title' => 'Dyslexic', 'font' => '"OpenDyslexic"', 'key' => 'dyslexic'],

        ],
        'color' => [
            ['title' => 'Normálne', 'icon' => 'fa-solid fa-palette', 'function' => 'none'],
            ['title' => 'Čierno/ biele', 'icon' => 'fa-solid fa-circle-half-stroke', 'function' => 'monochrome'],
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
        class="fixed bottom-6 right-6 a11y-toggle-btns txt-btn-block z-50 w-14 h-14 rounded-full bg-yellow-300 border-2 border-black shadow-[3px_3px_0_#000] flex items-center justify-center text-2xl cursor-pointer"
        aria-label="Otvoriť panel prístupnosti"
    >
        <i class="fa-solid fa-universal-access text-4xl"></i>
    </button>

    <div
        id="a11y-toast"
        class="fixed bottom-21 right-6 z-[9999] hidden
           bg-yellow-100 border-2 border-black rounded-lg shadow-[3px_3px_0_#000]
           px-4 py-2 text-lg max-w-[220px]"
        role="status"
        aria-live="polite"
    >
        <i class="fa-solid fa-lightbulb"></i>
        Nastavenia stránky, textu a pomôcok na čítanie nájdete tu
        <i class="fa-solid fa-arrow-down"></i>
    </div>

    {{-- PANEL --}}
    <div
        id="a11y-panel"
        class="hidden fixed rounded-xl bottom-20 sm:right-6 z-[9999]
           w-[320px] max-w-[100vw]
           max-h-[80vh]
           border-2 border-black flex flex-col overflow-hidden
           text-base"
    >
        {{-- HEADER --}}
        <div class="bg-yellow-300 border-b-2 border-black px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-2 font-bold text-lg">
                <i class="fa-solid fa-universal-access text-xl"></i>
                {{__('nav.a11y')}}
            </div>
            <button id="a11y-close" class="text-xl txt-btn-block">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        {{-- Scrollable body --}}
        <div class="overflow-y-auto flex-1 p-2 space-y-3 bg-white">

            {{-- RESET BUTTON --}}

                <button id="a11y-reset" class="flex txt-btn-block justify-center items-center w-full px-2 py-3 bg-gray-200 border-2 border-black rounded-md text-black font-bold text-center cursor-pointer hover:bg-red-300">
                    <i class="fa-solid text-3xl fa-xmark pr-2"></i>
                    Vypnúť všetko
                </button>

            @foreach($options as $section => $items)
                <div class="rounded-xl border-2 border-black bg-neutral-400 shadow-sm overflow-hidden">

                    {{-- Sekcia header --}}
                    <div class="px-4 py-2 bg-neutral-900 text-white font-bold uppercase tracking-widest">
                        {{ __('nav.acc_' . $section) }}
                    </div>

                    @if($section === 'size')

                        <div class="p-2">
                            <button
                                id="fontScaleButton"
                                class=" w-full flex txt-btn-a11y flex-col items-center gap-1 p-4 rounded-lg border-2 border-black bg-gray-50 hover:bg-yellow-300">

                                <div class="flex flex-col items-center gap-1">
                                    <i class="fa-solid text-2xl fa-text-height"></i>
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
                        <div class="grid grid-cols-2 gap-2 p-1">
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
                                        <div
                                            tabindex="0" role="button"
                                            class="flex txt-btn-a11y flex-col items-center justify-center p-1 rounded-lg border-2 border-black bg-gray-50
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

                                        <span class="text-sm text-center font-medium text-black leading-tight">
                                            {{ $item['title'] }}
                                        </span>

                                    </div>
                                </label>
                            @endforeach
                        </div>
                    @else
                        <div class="grid grid-cols-2 gap-2 p-1">
                            @foreach($items as $item)
                                <label class="group cursor-pointer">
                                    <input
                                        type="checkbox"
                                        class="peer hidden a11y-toggle"
                                        data-feature="{{ $item['function'] }}"
                                    >
                                    <div
                                        tabindex="0" role="button"
                                        class="flex txt-btn-a11y flex-col items-center gap-2 p-2 rounded-lg border-2 border-black bg-gray-50
                                        peer-checked:bg-yellow-300 h-full
                                        peer-checked:border-yellow-800
                                        hover:bg-yellow-300">
                                        <span class="text-3xl text-black py-2">
                                            <i class="{{ $item['icon'] }}"></i>
                                        </span>
                                        <span class="text-sm text-center font-medium text-black leading-tight">
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

