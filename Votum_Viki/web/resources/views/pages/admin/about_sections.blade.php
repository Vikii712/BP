@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] bg-gray-100 px-4 p-10 flex justify-center">
        <div class="w-full max-w-5xl space-y-10">

            {{-- NADPIS --}}
            <h1 class="text-3xl font-bold text-blue-950 text-center">
                Úprava sekcií – O nás
            </h1>

            {{-- TLAČIDLO --}}
            <div class="flex justify-center">
                <button id="toggleAddForm"
                        class="bg-green-200 border-2 border-green-900 text-green-900 px-4 py-2 rounded-md font-semibold hover:bg-green-300">
                    Pridať novú sekciu
                </button>
            </div>

            {{-- ================= ADD FORM ================= --}}
            <div id="addAboutForm"
                 class="bg-white border border-gray-200 shadow-md rounded-md p-6 pt-0 hidden space-y-6">

                <div class="bg-blue-950 text-lg -mx-6 px-6 py-4 text-white font-bold rounded-t-md">
                    Pridať sekciu O nás
                </div>

                <form method="POST"
                      action="{{ route('about.sections.add') }}"
                      enctype="multipart/form-data"
                      class="space-y-6">
                    @csrf

                    {{-- NADPIS --}}
                    <div class="flex items-center bg-gray-100 -mt-6 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Názov sekcie
                    </div>

                    <div class="space-y-3">
                        <div class="flex gap-3">
                            <span class="w-10 font-semibold pt-2">SK –</span>
                            <input type="text" name="sk[title]" required
                                   class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                        </div>
                        <div class="flex gap-3">
                            <span class="w-10 font-semibold pt-2">EN –</span>
                            <input type="text" name="en[title]" required
                                   class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                        </div>
                    </div>

                    {{-- TEXT --}}
                    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Text sekcie
                    </div>

                    <div class="space-y-3">
                        <div class="flex gap-3">
                            <span class="w-10 font-semibold pt-2">SK –</span>
                            <textarea name="sk[content]" rows="4" required
                                      class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"></textarea>
                        </div>
                        <div class="flex gap-3">
                            <span class="w-10 font-semibold pt-2">EN –</span>
                            <textarea name="en[content]" rows="4" required
                                      class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"></textarea>
                        </div>
                    </div>

                    {{-- IMAGE --}}
                    <div class="flex bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Obrázok sekcie
                    </div>

                    <div class="flex gap-3 px-6">
                        <input id="newAboutFilename" readonly
                               value="— žiadny obrázok —"
                               class="border-2 border-gray-300 bg-gray-100 px-3 py-2 w-1/3 rounded-md">

                        <label class="px-4 py-2 border-2 border-blue-950 rounded-md cursor-pointer">
                            Nahrať
                            <input type="file" name="image" accept="image/*" class="hidden"
                                   onchange="onNewImage(this)">
                        </label>

                        <button type="button" id="removeNewBtn"
                                onclick="removeNewImage()"
                                class="hidden px-4 py-2 border-2 border-red-600 text-red-600 rounded-md">
                            Odstrániť
                        </button>
                    </div>

                    <input type="hidden" name="remove_image" id="removeNewFlag" value="0">

                    {{-- ALT --}}
                    <div id="newAltWrapper" class="hidden">
                        <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Alternatívny text obrázka <x-InfoTooltip typ="alt"/>
                        </div>

                        <div class="space-y-3 px-6 mt-6">
                            <div class="flex gap-3">
                                <span class="w-10 font-semibold pt-2">SK –</span>
                                <textarea name="image_alt_sk" rows="3"
                                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"></textarea>
                            </div>
                            <div class="flex gap-3">
                                <span class="w-10 font-semibold pt-2">EN –</span>
                                <textarea name="image_alt_en" rows="3"
                                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button class="bg-green-200 border-2 border-green-900 text-green-900 px-6 py-2 rounded-md font-semibold">
                            Pridať sekciu
                        </button>
                    </div>
                </form>
            </div>

            {{-- ================= TABLE ================= --}}
            <h2 class="text-xl font-bold text-center text-blue-950">Sekcie O nás</h2>

            <div class="bg-white shadow-md rounded-md overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-blue-950 text-blue-50">
                    <tr>
                        <th class="px-6 py-3">Poradie</th>
                        <th class="px-6 py-3">Názov</th>
                        <th class="px-6 py-3 text-right">Akcia</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($about as $item)
                        <tr class="border-t hover:bg-blue-50">
                            <td class="px-6 py-4 flex gap-1">
                                <form method="POST" action="{{ route('about.sections.up', $item->id) }}">
                                    @csrf
                                    <button type="submit" class="text-blue-950 hover:text-gray-700 text-lg"><i class="fas fa-arrow-up"></i></button>
                                </form>
                                <form method="POST" action="{{ route('about.sections.down', $item->id) }}">
                                    @csrf
                                    <button type="submit" class="text-blue-950 hover:text-gray-700 text-lg"><i class="fas fa-arrow-down"></i></button>
                                </form>
                            </td>
                            <td class="px-6 py-4 font-medium">{{ $item->title_sk }}</td>
                            <td class="px-6 py-4 text-right flex justify-end gap-3">
                                <button class="toggle-edit" data-id="{{ $item->id }}"><i class="fas fa-pen"></i></button>
                                <form method="POST" action="{{ route('about.sections.delete', $item->id) }}">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <tr id="edit-row-{{ $item->id }}" class="hidden bg-gray-50">
                            <td colspan="3" class="px-6 py-6">

                                <form method="POST"
                                      action="{{ route('about.sections.update', $item->id) }}"
                                      enctype="multipart/form-data"
                                      class="bg-white border rounded-md p-6 space-y-6">
                                    @csrf
                                    @method('PUT')

                                    {{-- NADPIS --}}
                                    <div class="bg-gray-100 -mx-6 -mt-6 px-6 py-2 font-medium text-blue-950 rounded-t-md">
                                        Upraviť názov sekcie
                                    </div>

                                    <div class="space-y-3">
                                        <div class="flex gap-3">
                                            <span class="w-10 font-semibold pt-2">SK –</span>
                                            <input name="title_sk" required value="{{ $item->title_sk }}"
                                                   class="flex-1 border-2 rounded-md px-3 py-2">
                                        </div>
                                        <div class="flex gap-3">
                                            <span class="w-10 font-semibold pt-2">EN –</span>
                                            <input name="title_en" required value="{{ $item->title_en }}"
                                                   class="flex-1 border-2 rounded-md px-3 py-2">
                                        </div>
                                    </div>

                                    {{-- TEXT --}}
                                    <div class="bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                                        Upraviť text sekcie
                                    </div>

                                    <div class="space-y-3">
                                        <textarea name="content_sk" rows="4" required class="w-full border-2 rounded-md px-3 py-2">{{ $item->content_sk }}</textarea>
                                        <textarea name="content_en" rows="4" required class="w-full border-2 rounded-md px-3 py-2">{{ $item->content_en }}</textarea>
                                    </div>


                                    {{-- IMAGE --}}
                                    <div class="flex bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                                        Obrázok sekcie
                                    </div>

                                    <div class="flex gap-3 px-6">
                                        <input id="aboutFilename-{{ $item->id }}"
                                               readonly
                                               value="{{ $item->image ? basename($item->image->url) : '— žiadny obrázok —' }}"
                                               class="border-2 border-gray-300 bg-gray-100 px-3 py-2 w-1/3 rounded-md">

                                        <label class="px-4 py-2 border-2 border-blue-950 rounded-md cursor-pointer">
                                            Nahrať
                                            <input type="file"
                                                   name="image"
                                                   accept="image/*"
                                                   class="hidden"
                                                   onchange="onEditImage(this, {{ $item->id }})">
                                        </label>

                                        <button type="button"
                                                onclick="removeEditImage({{ $item->id }})"
                                                class="px-4 py-2 border-2 border-red-600 text-red-600 rounded-md {{ $item->image ? '' : 'hidden' }}"
                                                id="removeBtn-{{ $item->id }}">
                                            Odstrániť
                                        </button>
                                    </div>

                                    <input type="hidden" name="remove_image" id="removeFlag-{{ $item->id }}" value="0">

                                    {{-- ALT --}}
                                    <div id="altWrapper-{{ $item->id }}" class="{{ $item->image ? '' : 'hidden' }}">
                                        <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                                            Alternatívny text obrázka <x-InfoTooltip typ="alt"/>
                                        </div>

                                        <div class="space-y-3 px-6 mt-6">
                                            <div class="flex gap-3">
                                                <span class="w-10 font-semibold pt-2">SK –</span>
                                                <textarea name="image_alt_sk" rows="3"
                                                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ old('image_alt_sk', $item->image?->alt_sk) }}</textarea>
                                            </div>

                                            <div class="flex gap-3">
                                                <span class="w-10 font-semibold pt-2">EN –</span>
                                                <textarea name="image_alt_en" rows="3"
                                                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ old('image_alt_en', $item->image?->alt_en) }}</textarea>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- TLAČIDLÁ --}}
                                    <div class="flex justify-end gap-3">
                                        <button class="bg-blue-200 border-2 border-blue-900 px-6 py-2 rounded-md font-semibold">
                                            Uložiť
                                        </button>
                                        <button type="button" class="close-edit" data-id="{{ $item->id }}">
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
                document.getElementById('addAboutForm').classList.toggle('hidden');
            });

        function setAltRequired(req, id) {
            document.getElementById(id)?.querySelectorAll('textarea')
                .forEach(t => req ? t.setAttribute('required','required') : t.removeAttribute('required'));
        }

        function onNewImage(input) {
            document.getElementById('newAboutFilename').value = input.files[0].name;
            document.getElementById('newAltWrapper').classList.remove('hidden');
            document.getElementById('removeNewBtn').classList.remove('hidden');
            setAltRequired(true,'newAltWrapper');
        }

        function removeNewImage() {
            document.querySelector('#addAboutForm input[name="image"]').value='';
            document.getElementById('newAboutFilename').value='— žiadny obrázok —';
            document.getElementById('newAltWrapper').classList.add('hidden');
            document.getElementById('removeNewBtn').classList.add('hidden');
            setAltRequired(false,'newAltWrapper');
        }

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
        function onEditImage(input, id) {
            if (!input.files.length) return;

            document.getElementById(`aboutFilename-${id}`).value = input.files[0].name;
            document.getElementById(`altWrapper-${id}`).classList.remove('hidden');
            document.getElementById(`removeBtn-${id}`).classList.remove('hidden');
            document.getElementById(`removeFlag-${id}`).value = 0;

            document.querySelectorAll(`#altWrapper-${id} textarea`)
                .forEach(t => t.setAttribute('required', 'required'));
        }

        function removeEditImage(id) {
            document.querySelector(`#edit-row-${id} input[type="file"]`).value = '';
            document.getElementById(`aboutFilename-${id}`).value = '— žiadny obrázok —';
            document.getElementById(`altWrapper-${id}`).classList.add('hidden');
            document.getElementById(`removeBtn-${id}`).classList.add('hidden');
            document.getElementById(`removeFlag-${id}`).value = 1;

            document.querySelectorAll(`#altWrapper-${id} textarea`)
                .forEach(t => t.removeAttribute('required'));
        }


    </script>
@endsection
