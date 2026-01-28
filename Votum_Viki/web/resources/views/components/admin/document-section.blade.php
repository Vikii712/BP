@props([
    'section',
    'sectionIndex',
])

<div class="mt-6 border-2 border-blue-950 rounded-xl shadow-lg overflow-hidden section">

    {{-- HLAVIČKA SEKCIE --}}
    <div class="bg-blue-950 px-6 py-2">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-bold text-white flex items-center gap-3">
                <span class="px-3 py-1 rounded-md text-lg">
                    #{{ $sectionIndex + 1 }} Sekcia
                </span>
            </h2>
            <button type="button"
                    class="removeSectionBtn px-4 py-2 border-2 text-blue-950 bg-white rounded-md hover:bg-blue-200 hover:cursor-pointer transition-colors flex items-center gap-2">
                <i class="fa-solid fa-trash"></i>
                <span class="hidden sm:inline">Vymazať sekciu</span>
            </button>
        </div>
    </div>

    <div class="p-6 space-y-6 bg-white ">

        {{-- Hidden ID field pre existujúce sekcie --}}
        @if(isset($section->id))
            <input type="hidden" name="sections[{{ $sectionIndex }}][id]" value="{{ $section->id }}">
        @endif

        {{-- NÁZOV SEKCIE --}}
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    SK – Názov sekcie:
                </label>
                <input type="text"
                       name="sections[{{ $sectionIndex }}][name_sk]"
                       value="{{ $section->title_sk ?? '' }}"
                       placeholder="Zadajte názov sekcie"
                       required
                       class="w-full border-2 border-gray-300 rounded-md px-3 py-2 focus:border-votum3 focus:outline-none transition-colors">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    EN – Názov sekcie:
                </label>
                <input type="text"
                       name="sections[{{ $sectionIndex }}][name_en]"
                       value="{{ $section->title_en ?? '' }}"
                       placeholder="Enter section name"
                       required
                       class="w-full border-2 border-gray-300 rounded-md px-3 py-2 focus:border-votum3 focus:outline-none transition-colors">
            </div>
        </div>

        {{-- DOKUMENTY --}}
        <div class="space-y-4">
            <div class="flex justify-between items-center pt-4 border-t-2 border-gray-200">
                <h3 class="font-semibold text-lg text-votum3 flex items-center gap-2">
                    <i class="fa-solid fa-file-lines"></i>
                    Dokumenty v sekcii
                </h3>
                <button type="button"
                        class="addDocBtn px-4 py-2 font-semibold hover:cursor-pointer border-2 border-votum3 text-votum3 rounded-md hover:opacity-90 transition-opacity flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i>
                    Pridať dokument
                </button>
            </div>

            <div class="grid lg:grid-cols-2 gap-6 documentsWrapper">
                @foreach ($section->documents ?? [] as $docIndex => $doc)
                    <div class="border-2 border-votum3 rounded-lg bg-votum3 shadow-sm overflow-hidden document">

                        {{-- HLAVIČKA DOKUMENTU --}}
                        <div class="bg-dark-votum3 flex items-center justify-between px-4 py-3">
                            <div class="flex items-center gap-3">
                                <span class="text-white px-3 py-1 rounded-md text-sm font-bold" style="background-color: rgba(255, 255, 255, 0.2);">
                                    #{{ $docIndex + 1 }}
                                </span>
                                <span class="font-semibold text-white">Dokument</span>
                            </div>
                            <i class="fa-solid fa-trash px-3 py-2 border-2 border-votum3 text-votum3 bg-white rounded-md cursor-pointer hover:bg-votum3 hover:text-white transition-colors removeDocBtn"></i>
                        </div>

                        {{-- OBSAH DOKUMENTU --}}
                        <div class="bg-votum3  p-4 space-y-4">

                            {{-- Hidden ID field pre existujúce dokumenty --}}
                            @if(isset($doc->id))
                                <input type="hidden" name="sections[{{ $sectionIndex }}][documents][{{ $docIndex }}][id]" value="{{ $doc->id }}">
                            @endif

                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        SK – Názov dokumentu:
                                    </label>
                                    <input type="text"
                                           name="sections[{{ $sectionIndex }}][documents][{{ $docIndex }}][name_sk]"
                                           value="{{ $doc->title_sk ?? '' }}"
                                           placeholder="Zadajte názov v slovenčine"
                                           required
                                           class="w-full border-2 border-gray-300 rounded-md px-3 py-2 bg-white focus:border-votum3 focus:outline-none transition-colors">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        EN – Názov dokumentu:
                                    </label>
                                    <input type="text"
                                           name="sections[{{ $sectionIndex }}][documents][{{ $docIndex }}][name_en]"
                                           value="{{ $doc->title_en ?? '' }}"
                                           placeholder="Enter name in English"
                                           required
                                           class="w-full border-2 border-gray-300 rounded-md px-3 py-2 bg-white focus:border-votum3 focus:outline-none transition-colors">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Súbor dokumentu:
                                </label>
                                <div class="flex gap-3 items-center">
                                    <input type="text"
                                           readonly
                                           value="{{ $doc->url ? basename($doc->url) : '— žiadny súbor —' }}"
                                           class="file-name-display border-2 border-gray-300 bg-gray-100 px-3 py-2 flex-1 rounded-md text-sm">
                                    <label class="px-4 py-2 bg-dark-votum3 text-white rounded-md cursor-pointer hover:opacity-90 transition-opacity">
                                        Nahrať
                                        <input type="file"
                                               name="sections[{{ $sectionIndex }}][documents][{{ $docIndex }}][file]"
                                               accept=".pdf,.doc,.docx,.jpg,.png"
                                               {{ ($doc->url ?? false) ? '' : 'required' }}
                                               class="hidden file-input">
                                    </label>
                                    @if($doc->url ?? false)
                                        <button type="button"
                                                class="px-4 py-2 border-2 bg-white hover:cursor-pointer border-votum3 text-votum3 rounded-md hover:bg-votum3 hover:text-white transition-colors"
                                                onclick="removeFile(this)">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>
