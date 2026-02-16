@props([
    'category',
    'title',
    'sections' => collect(),
    'qrImage',
])

@php
$add = false;
$qr = false;
$icon = false;

switch ($title){
    case 'PercentWhy':
        $title = 'Prečo venovať 2%';
        break;
    case 'PercentInfo':
        $title = 'Potrebné údaje pri vypĺňaní žiadosti o 2%';
        $add = true;
        break;
    case 'PercentHow':
        $title = 'Postup podávania žiadostí o 2%';
        break;
    case 'PercentThanks':
        $title = 'Poďakovanie za 2%';
        break;
    case 'QrHow':
        $title = 'Finančná podpora pomocou QR kódu';
        $qr = true;
        break;
    case 'FinancialWhy':
        $title = 'Prečo finančne podporiť?';
        break;
    case 'Bank':
        $title = 'Údaje o bankovom účte';
        $add = true;
        break;
    case 'FinancialThanks':
        $title = 'Poďakovanie za finančnú podporu';
        break;
    case 'OtherWhy':
        $title = 'Ako inak sa dá pomôcť';
        break;
    case 'OtherType':
        $title = 'Iné druhy podpory (podrobne)';
        $add = true;
        $icon = true;
        break;
    case 'OtherIdea':
        $title = 'Ak má niekto iný nápad na podporu';
        break;
    case 'OtherThanks':
        $title = 'Poďakovanie za iné formy podpory';
        break;
}

$icons = [
    'fa-handshake-angle',
    'fa-drum',
    'fa-gift',
    'fa-hand-holding-heart',
    'fa-hand-holding-medical',
    'fa-person-skating',
    'fa-person-swimming',
    'fa-basketball',
    'fa-heart',
    'fa-plane',
    'fa-horse',
    'fa-music',
    'fa-guitar',
    'fa-children',
    'fa-pizza-slice',
    'fa-desktop',
];
@endphp


<div class="bg-blue-50 border border-gray-200 shadow-md rounded-md p-6 space-y-6">

    {{-- HLAVNÝ NADPIS SEKCIE --}}
    <div class="bg-blue-950 -mt-6 text-white text-lg -mx-6 px-6 py-4 font-medium rounded-t-md">
        {{ $title }}
    </div>

    @if($add)
        <button type="button"
                class="h-10 px-4 font-bold flex items-center justify-center border-2 border-blue-950 rounded-md hover:bg-blue-100 text-blue-950"
                onclick="addSection('{{ $category }}')">
            <i class="fa-solid fa-plus pe-2"></i> Pridať novú položku na koniec
        </button>
    @endif

    <form method="POST"
          action="{{ route('support.update', ['id' => $category]) }}"
          data-category="{{ $category }}"
          enctype="multipart/form-data"
          class="space-y-6">
        @csrf
        @method('PUT')

        @foreach($sections as $index => $section)
            <input type="hidden" name="sk[{{ $index }}][id]" value="{{ $section->id }}">

            <div class="bg-white border border-gray-200 rounded-md p-4 shadow-sm space-y-4">

                @if($add)
                    <input type="hidden" name="sk[{{ $index }}][id]" value="{{ $section->id }}">
                    <input type="hidden" name="sk[{{ $index }}][_delete]" value="0">

                    <div class="flex justify-end mb-0">
                        <button type="button"
                                class="text-red-600 hover:text-red-800  hover:border-red-800 hover:bg-red-100 px-4 py-2 border-2 border-red-600 rounded-md"
                                onclick="markForDelete(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                @endif

                {{-- Nadpis --}}
                    <div class="w-full font-bold text-blue-950 text-lg">Názov</div>


                    <div class="flex gap-3 mb-2">
                    <span class="w-10 font-semibold text-gray-700 pt-2">SK –</span>
                    <input type="text"
                           name="sk[{{ $index }}][title]"
                           value="{{ $section->title_sk ?? '' }}"
                           required
                           class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                           placeholder="Nadpis SK">
                    </div>
                    <div class="flex gap-3 mb-2">
                        <span class="w-10 font-semibold text-gray-700 pt-2">EN –</span>
                        <input type="text"
                               name="en[{{ $index }}][title]"
                               value="{{ $section->title_en ?? '' }}"
                               required
                               class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                               placeholder="Title EN">
                    </div>

                    <div class="w-full font-bold text-blue-950 text-lg">Obsah</div>

                    {{-- Text --}}
                    <div class="flex gap-3 mt-2">
                        <span class="w-10 font-semibold text-gray-700 pt-2">SK –</span>
                        <div class="flex-1">
                            <div class="quill-wrapper  ">
                                <div id="editor-{{ $category }}-sk-{{ $index }}"></div>
                            </div>
                            <textarea name="sk[{{ $index }}][content]"
                                      id="content-{{ $category }}-sk-{{ $index }}"
                                      class="hidden">{!! $section->content_sk ?? '' !!}</textarea>
                        </div>
                    </div>

                    <div class="flex gap-3 mt-2">
                        <span class="w-10 font-semibold text-gray-700 pt-2">EN –</span>
                        <div class="flex-1">
                            <div class="quill-wrapper  ">
                                <div id="editor-{{ $category }}-en-{{ $index }}"></div>
                            </div>
                            <textarea name="en[{{ $index }}][content]"
                                      id="content-{{ $category }}-en-{{ $index }}"
                                      class="hidden">{!! $section->content_en ?? '' !!}</textarea>
                        </div>
                    </div>

                    @if($qr)
                        <div class="flex bg-gray-100 -mx-4 px-4 py-2 font-semibold text-lg text-blue-950">
                            Obrázok QR kódu
                        </div>

                        <div class="flex gap-3">
                            <input id="newImageFilename"
                                   readonly
                                   value="{{ $qrImage ? basename($qrImage->url) : '— žiadny qr kód —' }}"
                                   class="border-2 border-gray-300 bg-gray-100 px-3 py-2 w-1/3 rounded-md">

                            <label class="px-4 py-2 border-2 border-blue-950 rounded-md cursor-pointer hover:bg-blue-50">
                                Nahrať
                                <input type="file"
                                       name="qr_image"
                                       accept="image/*"
                                       class="hidden"
                                       onchange="onNewImage(this)">
                            </label>

                            <button type="button"
                                    id="removeNewBtn"
                                    onclick="removeNewImage()"
                                    class="{{ $qrImage ? '' : 'hidden' }} px-4 py-2 border-2 border-red-600 text-red-600 rounded-md hover:bg-red-50">
                                Odstrániť
                            </button>
                        </div>

                        <input type="hidden" name="remove_qr_image" id="removeNewFlag" value="0">
                    @endif

                    @if($icon)

                        <div class="w-full font-bold text-blue-950 text-lg">Ikona</div>

                        <div class="flex flex-wrap gap-2 ms-14">

                            @foreach($icons as $iconName)
                                <label class="cursor-pointer">

                                    <input
                                        type="radio"
                                        name="sk[{{ $index }}][iconName]"
                                        value="{{ $iconName }}"
                                        class="hidden peer"
                                        required
                                        @checked($iconName === ($section->files->first()?->url ?? null))
                                    >

                                    <span class="border-2 rounded-xl w-12 h-12 inline-flex items-center justify-center
                                    transition-all duration-200
                                    border-gray-300
                                    peer-checked:border-blue-950
                                    peer-checked:bg-blue-100
                                    hover:border-blue-950">

                                    <i class="fa-solid {{ $iconName }} text-2xl"></i>
                                    </span>

                                </label>
                            @endforeach

                        </div>
                    @endif


            </div>
        @endforeach

        {{-- ANCHOR PRE PRIDÁVANIE NOVÝCH SEKCIÍ --}}
        <div class="sections-anchor"></div>

        {{-- Submit --}}
        <div class="flex justify-end gap-3">
            <button type="submit"
                    class="bg-green-200 border-2 border-green-900 text-green-900 px-6 py-2 rounded-md font-semibold hover:bg-green-300">
                Uložiť zmeny
            </button>
        </div>
    </form>
</div>
