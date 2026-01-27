@props([
    'section',
    'sectionIndex',
])

<div class="bg-white rounded-xl shadow-md p-6 space-y-6 section">

    {{-- NÁZOV SEKCIe --}}
    <div class="grid md:grid-cols-2 gap-4">
        <div>
            <label class="text-sm font-medium">Názov sekcie (SK)</label>
            <input type="text"
                   name="sections[{{ $sectionIndex }}][name_sk]"
                   value="{{ $section->name_sk ?? '' }}"
                   class="w-full border-2 rounded-md px-3 py-2">
        </div>

        <div>
            <label class="text-sm font-medium">Názov sekcie (EN)</label>
            <input type="text"
                   name="sections[{{ $sectionIndex }}][name_en]"
                   value="{{ $section->name_en ?? '' }}"
                   class="w-full border-2 rounded-md px-3 py-2">
        </div>
    </div>

    {{-- DOKUMENTY --}}
    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h3 class="font-semibold text-lg">Dokumenty</h3>
            <button type="button"
                    class="addDocBtn px-4 py-2 border rounded-md">
                +
            </button>
        </div>

        <div class="grid lg:grid-cols-2 gap-6 documentsWrapper">
            @foreach ($section->documents ?? [] as $docIndex => $doc)
                <div class="border-2 rounded-lg p-4 space-y-4 bg-gray-50 document">

                    <div class="flex justify-between items-center">
                        <strong>Dokument</strong>
                        <button type="button" class="removeDocBtn text-red-600">✕</button>
                    </div>

                    <div>
                        <label class="text-sm">Názov (SK)</label>
                        <input type="text"
                               name="sections[{{ $sectionIndex }}][documents][{{ $docIndex }}][name_sk]"
                               value="{{ $doc->name_sk ?? '' }}"
                               class="w-full border-2 rounded-md px-3 py-2">
                    </div>

                    <div>
                        <label class="text-sm">Názov (EN)</label>
                        <input type="text"
                               name="sections[{{ $sectionIndex }}][documents][{{ $docIndex }}][name_en]"
                               value="{{ $doc->name_en ?? '' }}"
                               class="w-full border-2 rounded-md px-3 py-2">
                    </div>

                    <div class="flex gap-3 items-center">
                        <input type="file"
                               name="sections[{{ $sectionIndex }}][documents][{{ $docIndex }}][file]">
                    </div>

                </div>

            @endforeach
        </div>
    </div>

    {{-- AKCIE --}}
    <div class="flex justify-between pt-4">
        <button type="button"
                class="text-red-600 font-medium removeSectionBtn">
            ✕ Vymazať sekciu
        </button>

        <button type="submit"
                class="px-6 py-2 bg-blue-950 text-white rounded-md">
            ✔ Uložiť zmeny
        </button>
    </div>

</div>
