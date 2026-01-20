@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] bg-gray-100 px-4 p-10 flex justify-center">
        <div class="w-full max-w-5xl space-y-10">

            {{-- Nadpis --}}
            <h1 class="text-3xl font-bold text-blue-950 text-center">
                Úprava histórie
            </h1>

            {{-- Tlačidlo na zobrazenie formulára --}}
            <div class="flex justify-center">
                <button id="toggleAddForm" class="bg-green-200 border-2 border-green-900 text-green-900 px-4 py-2 rounded-md font-semibold hover:bg-green-300">
                    Pridať novú udalosť
                </button>
            </div>

            {{-- Formulár na pridanie novej udalosti (skryty) --}}
            <div id="addHistoryForm"
                 class="bg-white border border-gray-200 shadow-md rounded-md p-6 pt-0 mb-8 w-full hidden space-y-6">

                {{-- HLAVNÝ NADPIS --}}
                <div class="bg-blue-950 text-lg -mx-6 px-6 py-4 text-white font-bold rounded-t-md">
                    Pridať novú udalosť do histórie
                </div>

                <form method="POST"
                      action="{{ route('history.add') }}"
                      enctype="multipart/form-data"
                      class="space-y-6">
                    @csrf

                    {{-- ROK --}}
                    <div class="flex items-center bg-gray-100 -mt-6 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Rok udalosti
                    </div>

                    <div class="flex gap-3">
                        <span class="w-10 font-semibold text-blue-950 pt-2">Rok</span>
                        <input type="number"
                               name="year"
                               required
                               class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                               placeholder="napr. 2002">
                    </div>

                    {{-- NADPIS --}}
                    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Nadpis udalosti
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <span class="w-10 font-semibold text-blue-950">SK –</span>
                            <input type="text"
                                   name="sk[title]"
                                   required
                                   class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                                   placeholder="Nadpis v slovenčine">
                        </div>

                        <div class="flex items-center gap-3">
                            <span class="w-10 font-semibold text-blue-950">EN –</span>
                            <input type="text"
                                   name="en[title]"
                                   required
                                   class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                                   placeholder="Title in English">
                        </div>
                    </div>

                    {{-- TEXT --}}
                    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Text udalosti
                    </div>

                    <div class="space-y-3">
                        <div class="flex gap-3">
                            <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
                            <textarea name="sk[content]"
                                      rows="4"
                                      required
                                      class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                                      placeholder="Text v slovenčine"></textarea>
                        </div>

                        <div class="flex gap-3">
                            <span class="w-10 font-semibold pt-2">EN –</span>
                            <textarea name="en[content]"
                                      rows="4"
                                      required
                                      class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                                      placeholder="Text in English"></textarea>
                        </div>
                    </div>

                    {{-- ================= HISTORY IMAGE ================= --}}

                    {{-- SIVÝ NADPIS – FOTKA --}}
                    <div class="flex flex-row bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950 mt-6">
                        Obrázok udalosti
                    </div>

                    {{-- FILENAME + BUTTON --}}
                    <div class="flex gap-3 px-6 mt-4">
                        <input id="newHistoryImageFilename"
                               type="text"
                               readonly
                               value="— žiadny obrázok —"
                               class="border-2 border-gray-300 rounded-md px-3 py-2 bg-gray-100 w-1/3">

                        <label class="px-4 py-2 border-2 border-blue-950 rounded-md cursor-pointer">
                            Nahrať
                            <input type="file"
                                   name="image"
                                   accept="image/*"
                                   class="hidden"
                                   onchange="onNewHistoryImageSelected(this)">
                        </label>
                        <button type="button"
                                id="removeNewHistoryImageBtn"
                                onclick="removeNewHistoryImage()"
                                class="px-4 py-2 border-2 border-red-600 text-red-600 rounded-md hidden">
                            Odstrániť
                        </button>

                    </div>

                    <input type="hidden"
                           name="remove_image"
                           id="newHistoryRemoveImageFlag"
                           value="0">

                    {{-- ALT WRAPPER --}}
                    <div id="newHistoryAltWrapper" class="hidden">
                        <div class="flex flex-row items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950 mt-6">
                            Alternatívny text obrázka
                            <x-InfoTooltip typ="alt" />
                        </div>

                        <div class="space-y-3 px-6 mt-4">
                            <div class="flex gap-3">
                                <span class="w-10 font-semibold pt-2">SK –</span>
                                <textarea name="image_alt_sk"
                                          rows="3"
                                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"></textarea>
                            </div>

                            <div class="flex gap-3">
                                <span class="w-10 font-semibold pt-2">EN –</span>
                                <textarea name="image_alt_en"
                                          rows="3"
                                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"></textarea>
                            </div>
                        </div>
                    </div>



                    {{-- TLAČIDLO --}}
                    <div class="pt-2 flex w-full justify-end">
                        <button type="submit"
                                class="bg-green-200 border-2 border-green-900 text-green-900 px-6 py-2 rounded-md font-semibold hover:bg-green-300">
                            Pridať udalosť
                        </button>
                    </div>
                </form>
            </div>


            {{-- Tabuľka histórie --}}
            <h2 class="text-xl font-bold text-center text-blue-950 mb-3">História</h2>
            <div class="bg-white shadow-md rounded-md overflow-hidden w-full">
                <table class="min-w-full text-left border-collapse">
                    <thead class="bg-blue-950">
                    <tr>
                        <th class="px-6 py-3 text-blue-50">Poradie</th>
                        <th class="px-6 py-3 text-blue-50">Rok</th>
                        <th class="px-6 py-3 text-blue-50">Nadpis</th>
                        <th class="px-6 py-3 text-blue-50 text-right">Akcia</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($history as $item)

                        {{-- HLAVNÝ RIADOK --}}
                        <tr class="border-t hover:bg-blue-50">
                            <td class="px-6 py-4 flex gap-1">
                                <form method="POST" action="{{ route('history.moveUp', $item->id) }}">
                                    @csrf
                                    <button type="submit" class="text-blue-950 hover:text-gray-700 text-lg"><i class="fas fa-arrow-up"></i></button>
                                </form>
                                <form method="POST" action="{{ route('history.moveDown', $item->id) }}">
                                    @csrf
                                    <button type="submit" class="text-blue-950 hover:text-gray-700 text-lg"><i class="fas fa-arrow-down"></i></button>
                                </form>
                            </td>

                            <td class="px-6 py-4">{{ $item->year }}</td>
                            <td class="px-6 py-4 font-medium">{{ $item->title_sk }}</td>

                            <td class="px-6 py-4 text-right flex justify-end gap-3">
                                <button class="toggle-edit text-blue-900"
                                        data-id="{{ $item->id }}"><i class="fas fa-pen"></i></button>

                                <form method="POST" action="{{ route('history.delete', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                        {{-- INLINE EDIT RIADOK --}}
                        <tr id="edit-row-{{ $item->id }}" class="hidden bg-gray-50">
                            <td colspan="4" class="px-6 py-6">

                                <form method="POST"
                                      action="{{ route('history.update', $item->id) }}"
                                      enctype="multipart/form-data"
                                      class="bg-white border rounded-md p-6 space-y-6">
                                    @csrf
                                    @method('PUT')

                                    {{-- ROK --}}
                                    <div class="flex rounded-t-md items-center bg-gray-100 -mx-6 -mt-6 px-6 py-2 font-medium text-blue-950">
                                        Upraviť rok udalosti
                                    </div>

                                    <div class="flex gap-3">
                                        <span class="w-10 font-semibold text-blue-950 pt-2">Rok</span>
                                        <input type="number"
                                               name="year"
                                               required
                                               value="{{ $item->year }}"
                                               class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                                    </div>

                                    {{-- NADPIS --}}
                                    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                                        Upraviť nadpis udalosti
                                    </div>

                                    <div class="space-y-3">
                                        <div class="flex items-center gap-3">
                                            <span class="w-10 font-semibold text-blue-950">SK –</span>
                                            <input type="text"
                                                   name="title_sk"
                                                   required
                                                   value="{{ $item->title_sk }}"
                                                   class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                                        </div>

                                        <div class="flex items-center gap-3">
                                            <span class="w-10 font-semibold text-blue-950">EN –</span>
                                            <input type="text"
                                                   name="title_en"
                                                   required
                                                   value="{{ $item->title_en }}"
                                                   class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                                        </div>
                                    </div>

                                    {{-- TEXT --}}
                                    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                                        Upraviť text udalosti
                                    </div>

                                    <div class="space-y-3">
                                        <div class="flex gap-3">
                                            <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
                                            <textarea name="content_sk"
                                                      rows="4"
                                                      required
                                                      class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ $item->content_sk }}</textarea>
                                        </div>

                                        <div class="flex gap-3">
                                            <span class="w-10 font-semibold pt-2">EN –</span>
                                            <textarea name="content_en"
                                                      rows="4"
                                                      required
                                                      class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ $item->content_en }}</textarea>
                                        </div>
                                    </div>




                                    {{-- ================= HISTORY IMAGE ================= --}}

                                    {{-- SIVÝ NADPIS – FOTKA --}}
                                    <div class="flex flex-row -mx-6 bg-gray-100 items-center px-6 py-2 font-medium text-blue-950 mt-6">
                                        Upraviť obrázok udalosti
                                    </div>

                                    {{-- FILENAME + BUTTON --}}
                                    <div class="flex gap-3 px-6 mt-4">
                                        <input id="historyImageFilename-{{ $item->id }}"
                                               type="text"
                                               readonly
                                               value="{{ $item->image ? basename($item->image->url) : '— žiadny obrázok —' }}"
                                               class="border-2 border-gray-300 rounded-md px-3 py-2 bg-gray-100 w-1/3">

                                        <label class="px-4 py-2 border-2 border-blue-950 rounded-md cursor-pointer">
                                            Nahradiť
                                            <input type="file"
                                                   name="image"
                                                   accept="image/*"
                                                   class="hidden"
                                                   onchange="onEditHistoryImageSelected(this, {{ $item->id }})">
                                        </label>


                                        <button type="button"
                                                onclick="removeHistoryImage({{ $item->id }})"
                                                class="px-4 py-2 border-2 border-red-600 text-red-600 rounded-md">
                                            Odstrániť
                                        </button>

                                    </div>

                                    <input type="hidden"
                                           name="remove_image"
                                           id="removeImageFlag-{{ $item->id }}"
                                           value="0">


                                    <div id="historyAltWrapper-{{ $item->id }}"
                                         class="{{ $item->image ? '' : 'hidden' }}">
                                        {{-- SIVÝ NADPIS – ALT --}}
                                        <div class="flex flex-row -mx-6 bg-gray-100 items-center px-6 py-2 font-medium text-blue-950 mt-6">
                                            Upraviť alternatívny text obrázka
                                            <x-InfoTooltip typ="alt" />
                                        </div>

                                        {{-- ALT TEXTAREAS --}}
                                        <div class="space-y-3 px-6 mt-4">
                                            <div class="flex gap-3">
                                                <span class="w-10 font-semibold pt-2">SK –</span>
                                                <textarea name="image_alt_sk"
                                                          rows="3"
                                                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ old('image_alt_sk', $item->image->alt_sk ?? '') }}</textarea>
                                            </div>

                                            <div class="flex gap-3">
                                                <span class="w-10 font-semibold pt-2">EN –</span>
                                                <textarea name="image_alt_en"
                                                          rows="3"
                                                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ old('image_alt_en', $item->image->alt_en ?? '') }}</textarea>
                                            </div>
                                        </div>
                                    </div>




                                    {{-- TLAČIDLÁ --}}
                                    <div class="pt-2 flex justify-end gap-3">
                                        <button type="submit"
                                                class="bg-blue-200 border-2 border-blue-900 text-blue-900 px-6 py-2 rounded-md font-semibold hover:bg-blue-300">
                                            Uložiť zmeny
                                        </button>

                                        <button type="button"
                                                class="close-edit text-gray-600 font-medium"
                                                data-id="{{ $item->id }}">
                                            Zrušiť
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>


                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    {{-- JS --}}
    <script>
        document.getElementById('toggleAddForm')
            .addEventListener('click', () => {
                document.getElementById('addHistoryForm').classList.toggle('hidden');
            });

        document.querySelectorAll('.toggle-edit').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('edit-row-' + btn.dataset.id)
                    .classList.toggle('hidden');
            });
        });

        document.querySelectorAll('.close-edit').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('edit-row-' + btn.dataset.id)
                    .classList.add('hidden');
            });
        });

        function updateFilename(input, targetId) {
            if (input.files.length > 0) {
                document.getElementById(targetId).value = input.files[0].name;
            }
        }

        function setAltRequired(required, wrapperId) {
            const wrapper = document.getElementById(wrapperId);
            if (!wrapper) return;

            wrapper.querySelectorAll('textarea').forEach(el => {
                if (required) {
                    el.setAttribute('required', 'required');
                } else {
                    el.removeAttribute('required');
                }
            });
        }

        function onNewHistoryImageSelected(input) {
            if (input.files.length > 0) {
                document.getElementById('newHistoryImageFilename').value = input.files[0].name;
                document.getElementById('newHistoryAltWrapper').classList.remove('hidden');
                document.getElementById('removeNewHistoryImageBtn').classList.remove('hidden');
                document.getElementById('newHistoryRemoveImageFlag').value = 0;

                setAltRequired(true, 'newHistoryAltWrapper');
            }
        }

        function removeNewHistoryImage() {
            const fileInput = document.querySelector('#addHistoryForm input[name="image"]');

            fileInput.value = '';
            document.getElementById('newHistoryImageFilename').value = '— žiadny obrázok —';
            document.getElementById('newHistoryAltWrapper').classList.add('hidden');
            document.getElementById('removeNewHistoryImageBtn').classList.add('hidden');
            document.getElementById('newHistoryRemoveImageFlag').value = 1;

            setAltRequired(false, 'newHistoryAltWrapper');
        }

        function onEditHistoryImageSelected(input, id) {
            if (input.files.length > 0) {
                document.getElementById('historyImageFilename-' + id).value = input.files[0].name;
                document.getElementById('historyAltWrapper-' + id).classList.remove('hidden');

                setAltRequired(true, 'historyAltWrapper-' + id);
            }
        }

        function removeHistoryImage(id) {
            document.getElementById('historyImageFilename-' + id).value = '— žiadny obrázok —';
            document.getElementById('historyAltWrapper-' + id).classList.add('hidden');
            document.getElementById('removeImageFlag-' + id).value = 1;

            setAltRequired(false, 'historyAltWrapper-' + id);
        }


    </script>
@endsection
