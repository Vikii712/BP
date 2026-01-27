@props([
    'category',
    'sections' => collect(),
])

<?php
    switch($category){
        case 'address':
            $title = 'Adresy';
            break;
        case 'mail':
            $title = 'Mailové adresy';
            break;
        case 'phone':
            $title = 'Telefónne čísla';
            break;
        case 'bank':
            $title = 'Bankové údaje';
            break;
        case 'map':
            $title = 'Link na mapu';
            break;
    }
?>


<div class="bg-blue-50 border border-gray-200 shadow-md rounded-md p-6 space-y-6">

    {{-- HLAVNÝ NADPIS SEKCIE --}}
    <div class="bg-blue-950 -mt-6 text-white text-lg -mx-6 px-6 py-4 font-medium rounded-t-md">
        {{ $title }}
    </div>

    <button type="button"
            class="h-10 w-10 flex items-center justify-center border-2 border-blue-950 rounded-md hover:bg-blue-100 text-blue-950"
            onclick="addSection('{{ $category }}')">
        <i class="fa-solid fa-plus"></i>
    </button>

    <form method="POST"
          action="{{ route('support.update', ['id' => $category]) }}"
          enctype="multipart/form-data"
          class="space-y-6">
        @csrf
        @method('PUT')

        @foreach($sections as $index => $section)
            <input type="hidden" name="sk[{{ $index }}][id]" value="{{ $section->id }}">

            <div class="bg-white border border-gray-200 rounded-md p-4 shadow-sm space-y-4">


                <input type="hidden" name="sk[{{ $index }}][id]" value="{{ $section->id }}">
                <input type="hidden" name="sk[{{ $index }}][_delete]" value="0">

                <div class="flex justify-end mb-0">
                    <button type="button"
                            class="text-red-600 hover:text-red-800 hover:border-red-800 hover:bg-red-100 px-4 py-2 border-2 border-red-600 rounded-md"
                            onclick="markForDelete(this)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>

                {{-- Nadpis --}}
                <div class="w-full font-bold text-blue-950 text-lg ">Názov</div>
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
                <div class="w-full font-bold text-blue-950 text-lg mb-3">Obsah</div>
                <div class="flex gap-3 mb-2">
                    <span class="w-10 font-semibold text-gray-700 pt-2">SK –</span>
                    <input type="text"
                           name="sk[{{ $index }}][content]"
                           value="{{ $section->content_sk ?? '' }}"
                           required
                           class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                           placeholder="Obsah SK">
                </div>
                <div class="flex gap-3 mb-2">
                    <span class="w-10 font-semibold text-gray-700 pt-2">EN –</span>
                    <input type="text"
                           name="en[{{ $index }}][content]"
                           value="{{ $section->content_en ?? '' }}"
                           required
                           class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                           placeholder="Content EN">
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
