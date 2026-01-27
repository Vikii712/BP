@props([
    'category',
    'title',
    'sections' => collect(),
])

<?php
    $add = false;
    $editor = true;

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
            break;
        case 'FinancialWhy':
            $title = 'Prečo finančne podporiť?';
            break;
        case 'Bank':
            $title = 'Údaje o bankovom účte';
            $editor = false;
            break;
        case 'FinancialThanks':
            $title = 'Poďakovanie za finančnú podporu';
            break;
        case 'OtherWhy':
            $title = 'Ako inak sa dá pomôcť';
            break;
        case 'OtherTypes':
            $title = 'Iné druhy podpory (podrobne)';
            break;
        case 'OtherIdea':
            $title = 'Ak má niekto iný nápad na podporu';
            break;
        case 'OtherThanks':
            $title = 'Poďakovanie za iné formy podpory';
            break;
    }
?>

<div class="bg-blue-50 border border-gray-200 shadow-md rounded-md p-6 space-y-6">

    {{-- HLAVNÝ NADPIS SEKCIE --}}
    <div class="bg-blue-950 -mt-6 text-white text-lg -mx-6 px-6 py-4 font-medium rounded-t-md">
        {{ $title }}
    </div>

    <form method="POST"
          action="{{ route('support.update', ['id' => $category]) }}"
          enctype="multipart/form-data"
          class="space-y-6">
        @csrf
        @method('PUT')

        @foreach($sections as $index => $section)


            <div class="bg-white border border-gray-200 rounded-md p-4 shadow-sm space-y-4">

                {{-- Nadpis --}}
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

            </div>
        @endforeach

        {{-- Submit --}}
        <div class="flex justify-end gap-3">
            <button type="submit"
                    class="bg-green-200 border-2 border-green-900 text-green-900 px-6 py-2 rounded-md font-semibold hover:bg-green-300">
                Uložiť zmeny
            </button>
        </div>
    </form>
</div>
