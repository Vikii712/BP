@props([
    'category',
    'sections' => collect(),
])

<?php
switch($category){
    case 'address': $title = 'Adresa'; break;
    case 'email': $title = 'Mailová adresa'; break;
    case 'tel': $title = 'Telefónne číslo'; break;
    case 'bank': $title = 'Bankové údaje'; break;
    case 'map': $title = 'Link na mapu'; break;
}
?>

<div class="bg-blue-50 border border-gray-200 shadow-md rounded-md p-6 space-y-6">

    {{-- HLAVNÝ NADPIS --}}
    <div class="bg-blue-950 -mt-6 text-white text-lg -mx-6 px-6 py-4 font-medium rounded-t-md">
        {{ $title }}
    </div>

    <button type="button"
            class="h-10 px-4 font-bold flex items-center justify-center border-2 border-blue-950 rounded-md hover:bg-blue-100 text-blue-950"
            onclick="addSection('{{ $category }}')">
        <i class="fa-solid fa-plus pe-2"></i> Pridať novú položku na koniec
    </button>

    <form method="POST"
          action="{{ route('support.update', ['id' => $category]) }}"
          data-category="{{ $category }}"
          class="space-y-6">
        @csrf
        @method('PUT')

        @foreach($sections as $index => $section)

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

                {{-- NÁZOV --}}
                <div class="w-full font-bold text-blue-950 text-lg">Názov</div>

                <div class="flex gap-3 mb-2">
                    <span class="w-10 font-semibold text-gray-700 pt-2">SK –</span>
                    <div class="flex-1">
                        <div class="quill-wrapper"
                             data-quill
                             data-textarea="title-sk-{{ $category }}-{{ $index }}"></div>
                        <textarea name="sk[{{ $index }}][title]"
                                  id="title-sk-{{ $category }}-{{ $index }}"
                                  class="hidden">{{ $section->title_sk ?? '' }}</textarea>
                    </div>
                </div>

                <div class="flex gap-3 mb-2">
                    <span class="w-10 font-semibold text-gray-700 pt-2">EN –</span>
                    <div class="flex-1">
                        <div class="quill-wrapper"
                             data-quill
                             data-textarea="title-en-{{ $category }}-{{ $index }}"></div>
                        <textarea name="en[{{ $index }}][title]"
                                  id="title-en-{{ $category }}-{{ $index }}"
                                  class="hidden">{{ $section->title_en ?? '' }}</textarea>
                    </div>
                </div>

                {{-- OBSAH --}}
                <div class="w-full font-bold text-blue-950 text-lg">Obsah</div>

                <div class="flex gap-3 mb-2">
                    <span class="w-10 font-semibold text-gray-700 pt-2">SK –</span>
                    <div class="flex-1">
                        <div class="quill-wrapper"
                             data-quill
                             data-textarea="content-sk-{{ $category }}-{{ $index }}"></div>
                        <textarea name="sk[{{ $index }}][content]"
                                  id="content-sk-{{ $category }}-{{ $index }}"
                                  class="hidden">{{ $section->content_sk ?? '' }}</textarea>
                    </div>
                </div>

                <div class="flex gap-3 mb-2">
                    <span class="w-10 font-semibold text-gray-700 pt-2">EN –</span>
                    <div class="flex-1">
                        <div class="quill-wrapper"
                             data-quill
                             data-textarea="content-en-{{ $category }}-{{ $index }}"></div>
                        <textarea name="en[{{ $index }}][content]"
                                  id="content-en-{{ $category }}-{{ $index }}"
                                  class="hidden">{{ $section->content_en ?? '' }}</textarea>
                    </div>
                </div>

            </div>
        @endforeach

        <div class="sections-anchor"></div>

        <div class="flex justify-end gap-3">
            <button type="submit"
                    class="bg-green-200 border-2 border-green-900 text-green-900 px-6 py-2 rounded-md font-semibold hover:bg-green-300">
                Uložiť zmeny
            </button>
        </div>
    </form>
</div>
