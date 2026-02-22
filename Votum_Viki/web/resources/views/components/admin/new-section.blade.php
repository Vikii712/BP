@props([
    'category',
    'title' => 'Pridať novú sekciu',
])

@php
    $isHistory = $category === 'history';
    $isTeam = $category === 'team';
    $isDocs = $category === 'documentSection';
@endphp

<div class="space-y-6">

    {{-- Tlačidlo na zobrazenie formulára --}}
    <div class="flex justify-center">
        <button type="button" id="toggleAddFormBtn" class="bg-green-200 border-2 border-green-900 text-green-900 px-4 py-2 rounded-md font-semibold hover:bg-green-300">
            {{ $isHistory ? 'Pridať novú udalosť' : ($isTeam ? 'Pridať nového člena' : 'Pridať novú sekciu') }}
        </button>
    </div>

    {{-- Formulár (skrytý) --}}
    <div id="addFormWrapper" class="bg-white border border-gray-200 shadow-md rounded-md p-6 pt-0 hidden space-y-6">

        {{-- HLAVNÝ NADPIS --}}
        <div class="bg-blue-950 text-lg -mx-6 px-6 py-4 text-white font-bold rounded-t-md">
            {{ $isHistory ? 'Pridať udalosť' : ($isTeam ? 'Pridať nového člena' : ($isDocs ? 'Pridať sekciu dokumentov' : 'Pridať sekciu o nás'))  }}
        </div>

        <form method="POST"
              action="{{ route('section.add', ['category' => $category]) }}"
              enctype="multipart/form-data"
              class="space-y-6"
              id="addForm"
              >

            @csrf

            {{-- Rok (len history) --}}
            @if($isHistory)
                <div class="flex items-center bg-gray-100 -mt-6 -mx-6 px-6 py-2 font-medium text-blue-950">
                    Rok udalosti
                </div>
                <div class="space-y-4">
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">Rok</label>
                        <input type="number"
                               name="year"
                               required
                               class="w-full border-2 border-gray-300 rounded-md px-3 py-2 focus:border-blue-500 focus:outline-none"
                               placeholder="napr. 2002">
                    </div>
                </div>
            @endif

            {{-- Nadpis --}}
            <div class="flex items-center bg-gray-100 {{ $isHistory ? '' : '-mt-6' }} -mx-6 px-6 py-2 font-medium text-blue-950">
                {{ $isHistory ? 'Nadpis udalosti' : ($isTeam ? 'Meno člena / názov skupiny' : 'Názov sekcie')  }}
            </div>
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <span class="w-10 font-semibold text-blue-950">SK –</span>
                    <input type="text"
                           name="sk[title]"
                           required
                           class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                           placeholder="{{ $isHistory ? 'Nadpis v slovenčine' : ($isTeam ? 'Meno člena' : 'Názov sekcie SK') }}">
                </div>
                <div class="flex items-center gap-3">
                    <span class="w-10 font-semibold text-blue-950">EN –</span>
                    <input type="text"
                           name="en[title]"
                           required
                           class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                           placeholder="{{ $isHistory ? 'Title in English' : ($isTeam ? 'Name of member' : 'Title of section in EN') }}">
                </div>
            </div>

            @if(!$isDocs)
            {{-- Text --}}
            <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                {{($isTeam ? 'Popis člena' : 'Text sekcie')}}
            </div>

            <div class="space-y-4">
                @if($isHistory)
                    <div class="flex items-center gap-3">
                        <span class="w-10 font-semibold text-blue-950">SK –</span>
                        <textarea name="sk[content]" rows="4" required
                                  class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"></textarea>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-10 font-semibold text-blue-950">EN –</span>
                        <textarea name="en[content]" rows="4" required
                                  class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"></textarea>
                    </div>
                @else
                    <div class="flex gap-3">
                        <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
                        <div class="flex-1">
                            <div class="quill-wrapper">
                                <div id="editor-new-sk"></div>
                            </div>
                            <textarea name="sk[content]" id="content-new-sk" class="hidden"></textarea>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <span class="w-10 font-semibold text-blue-950 pt-2">EN –</span>
                        <div class="flex-1">
                            <div class="quill-wrapper">
                                <div id="editor-new-en"></div>
                            </div>
                            <textarea name="en[content]" id="content-new-en" class="hidden"></textarea>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Obrázok --}}
            <div class="flex bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                {{($isTeam ? 'Fotka člena' : 'Obrázok sekcie')}}
            </div>
            <div class="flex gap-3 px-6">
                <input id="newImageFilename" readonly value="— žiadny obrázok —"
                       class="border-2 border-gray-300 bg-gray-100 px-3 py-2 w-1/3 rounded-md">
                <label class="px-4 py-2 border-2 border-blue-950 rounded-md cursor-pointer hover:bg-blue-50">
                    Nahrať
                    <input type="file" name="image" accept="image/*" class="hidden"
                           onchange="onNewImage(this)">
                </label>
                <button type="button" id="removeNewBtn" onclick="removeNewImage()"
                        class="hidden px-4 py-2 border-2 border-red-600 text-red-600 rounded-md hover:bg-red-50">
                    Odstrániť
                </button>
            </div>

            <input type="hidden" name="remove_image" id="removeNewFlag" value="0">

            {{-- ALT text --}}
            <div id="newAltWrapper" class="hidden">
                <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                    Alternatívny text obrázka <x-InfoTooltip typ="alt"/>
                </div>
                <div class="space-y-3 mt-6">
                    <div class="flex gap-3">
                        <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
                        <input name="image_alt_sk"
                                  class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                    </div>
                    <div class="flex gap-3">
                        <span class="w-10 font-semibold text-blue-950 pt-2">EN –</span>
                        <input name="image_alt_en"
                                  class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                    </div>
                </div>
            </div>
            @endif

            {{-- Tlačidlá --}}
            <div class="flex justify-end gap-3">
                <button type="submit" class="bg-green-200 border-2 border-green-900 text-green-900 px-6 py-2 rounded-md font-semibold hover:bg-green-300">
                    {{($isTeam ? 'Pridať člena' : 'Pridať sekciu')}}
                </button>
                <button type="button" id="cancelAddForm"
                        class="border-2 border-gray-400 px-6 py-2 rounded-md hover:bg-gray-100">
                    Zrušiť
                </button>
            </div>

        </form>
    </div>
</div>
