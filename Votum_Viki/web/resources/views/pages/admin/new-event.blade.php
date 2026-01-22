@extends('layouts.admin')


@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] bg-gray-100 px-4 py-10 flex justify-center">
        <div class="w-full max-w-5xl space-y-10">

            {{-- NADPIS STRÁNKY --}}
            <h1 class="text-3xl font-bold text-blue-950 text-center">
                Pridať novú udalosť
            </h1>

            {{-- FORMULÁR --}}
            <div class="bg-white border border-gray-200 shadow-md rounded-md p-6 pt-0 space-y-6">

                <form method="POST"
                      action="{{ route('events.store') }}"
                      enctype="multipart/form-data"
                      class="space-y-6">

                    @csrf

                    {{-- NÁZOV --}}
                    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Názov udalosti
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <span class="w-10 font-semibold text-blue-950">SK –</span>
                            <input type="text"
                                   name="title_sk"
                                   required
                                   class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                        </div>

                        <div class="flex items-center gap-3">
                            <span class="w-10 font-semibold text-blue-950">EN –</span>
                            <input type="text"
                                   name="title_en"
                                   required
                                   class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                        </div>
                    </div>

                    {{-- DÁTUMY UDALOSTI --}}
                    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Dátumy udalosti
                    </div>

                    <div class="flex flex-col sm:flex-row gap-6">

                        {{-- KALENDÁR vľavo --}}
                        <div class="sm:w-1/2 flex justify-center">
                            <div id="multiDatePicker"></div>
                        </div>

                        {{-- ZOZNAM vybraných dátumov vpravo --}}
                        <div class="sm:w-1/2 flex flex-col">
                            <div class="flex items-start gap-2">
                                <label class="font-semibold text-gray-700 ms-2 mt-3 w-32">Vybrané dátumy:</label>
                                <div id="datesList" class="text-gray-700 rounded-md py-3 max-h-[280px] overflow-y-auto flex-1">
                                    <!-- dátumy sa doplnia JS -->
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Skrytý input pre formulár --}}
                    <input type="hidden" name="dates" id="datesInput">



                    {{-- FARBA + VOĽBY --}}
                    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Nastavenia udalosti
                    </div>

                    <div class="space-y-3 px-6">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="inCalendar" class="rounded">
                            <span>Zobraziť v kalendári</span>
                        </label>

                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="inHome" class="rounded">
                            <span>Pridať medzi vybrané udalosti na domovskej stránke</span>
                        </label>
                    </div>

                    {{-- HLAVNÁ FOTKA --}}
                    <div class="flex bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Hlavná fotka udalosti
                    </div>

                    <div class="flex gap-3 px-6">
                        <input id="newImageFilename"
                               readonly
                               value="— žiadny obrázok —"
                               class="border-2 border-gray-300 bg-gray-100 px-3 py-2 w-1/3 rounded-md">

                        <label class="px-4 py-2 border-2 border-blue-950 rounded-md cursor-pointer hover:bg-blue-50">
                            Nahrať
                            <input type="file"
                                   name="main_pic"
                                   accept="image/*"
                                   class="hidden"
                                   onchange="onNewImage(this)">
                        </label>

                        <button type="button"
                                id="removeNewBtn"
                                onclick="removeNewImage()"
                                class="hidden px-4 py-2 border-2 border-red-600 text-red-600 rounded-md hover:bg-red-50">
                            Odstrániť
                        </button>
                    </div>

                    <input type="hidden" name="remove_image" id="removeNewFlag" value="0">

                    {{-- ALT TEXT --}}
                    <div id="newAltWrapper" class="hidden">
                        <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Alternatívny text obrázka <x-InfoTooltip typ="alt"/>
                        </div>

                        <div class="space-y-3 mt-6">
                            <div class="flex gap-3">
                                <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
                                <textarea name="image_alt_sk" rows="3"
                                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"></textarea>
                            </div>

                            <div class="flex gap-3">
                                <span class="w-10 font-semibold text-blue-950 pt-2">EN –</span>
                                <textarea name="image_alt_en" rows="3"
                                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"></textarea>
                            </div>
                        </div>
                    </div>

                    {{-- TEXT --}}
                    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Text udalosti
                    </div>

                    <div class="space-y-4">
                        <div class="flex gap-3">
                            <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
                            <div class="flex-1">
                                <div class="quill-wrapper">
                                    <div id="editor-new-sk"></div>
                                </div>
                                <textarea name="content_sk" id="content-new-sk" class="hidden"></textarea>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <span class="w-10 font-semibold text-blue-950 pt-2">EN –</span>
                            <div class="flex-1">
                                <div class="quill-wrapper">
                                    <div id="editor-new-en"></div>
                                </div>
                                <textarea name="content_en" id="content-new-en" class="hidden"></textarea>
                            </div>
                        </div>
                    </div>

                    {{-- SPONZOR --}}
                    <div class="space-y-3">
                        <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Sponzor – logo
                        </div>

                        <div class="space-y-3 px-6">
                            <input type="file"
                                   name="sponsor_logo"
                                   accept="image/*"
                                   class="block w-full"
                                   onchange="onSponsorImage(this)">

                            <p id="sponsorImageFilename" class="text-sm text-gray-500">— žiadny obrázok —</p>

                            <input type="text"
                                   name="sponsor_name"
                                   placeholder="Názov sponzora"
                                   class="w-full border-2 border-gray-300 rounded-md px-3 py-2">

                            <input type="url"
                                   name="sponsor_url"
                                   placeholder="https://..."
                                   class="w-full border-2 border-gray-300 rounded-md px-3 py-2">
                        </div>
                    </div>

                    {{-- FOTKY --}}
                    <div class="space-y-3">
                        <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Odkaz na fotogalériu
                        </div>
                        <div class="px-6">
                            <input type="url"
                                   name="gallery_url"
                                   placeholder="https://photos.google.com/..."
                                   class="w-full border-2 border-gray-300 rounded-md px-3 py-2">
                        </div>
                    </div>

                    {{-- VIDEO --}}
                    <div class="space-y-3">
                        <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Video (YouTube / Vimeo)
                        </div>
                        <div class="px-6">
                            <input type="url"
                                   name="video_url"
                                   placeholder="https://youtube.com/..."
                                   class="w-full border-2 border-gray-300 rounded-md px-3 py-2">
                        </div>
                    </div>

                    {{-- DOKUMENTY --}}
                    <div class="space-y-3">
                        <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Dokument
                        </div>
                        <div class="px-6">
                            <input type="file"
                                   name="document"
                                   accept=".pdf,.doc,.docx"
                                   class="block w-full border-2 border-gray-300 rounded-md px-3 py-2">
                            <p class="text-xs text-gray-500 mt-1">PDF alebo Word</p>
                        </div>
                    </div>


                    {{-- TLAČIDLÁ --}}
                    <div class="flex justify-end gap-3">
                        <button type="submit"
                                class="bg-green-200 border-2 border-green-900 text-green-900 px-6 py-2 rounded-md font-semibold hover:bg-green-300">
                            Uložiť
                        </button>

                        <a href="{{ route('admin.events') }}"
                           class="border-2 border-gray-400 px-6 py-2 rounded-md hover:bg-gray-100">
                            Zrušiť
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ================= TOOLBAR =================
            const toolbarOptions = [
                [{ header: [1, 2, 3, false] }],
                ['bold', 'italic', 'underline'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                ['link']
            ];

            // ================= QUILL EDITORS =================
            const addFormEditors = {
                sk: new Quill('#editor-new-sk', { theme: 'snow', modules: { toolbar: toolbarOptions } }),
                en: new Quill('#editor-new-en', { theme: 'snow', modules: { toolbar: toolbarOptions } })
            };

            // prevent images paste
            [addFormEditors.sk, addFormEditors.en].forEach(quill => {
                quill.clipboard.addMatcher('IMG', () => ({ ops: [] }));
                // fix links
                quill.on('text-change', () => {
                    quill.root.querySelectorAll('a').forEach(link => {
                        let href = link.getAttribute('href');
                        if(href && !href.match(/^https?:\/\//i) && !href.match(/^mailto:/i)){
                            link.setAttribute('href','https://'+href);
                        }
                        link.setAttribute('target','_blank');
                        link.setAttribute('rel','noopener noreferrer');
                    });
                });

                const toolbar = quill.getModule('toolbar');
                if(toolbar){
                    toolbar.addHandler('link', value => {
                        if(!value){ quill.format('link', false); return; }
                        const range = quill.getSelection();
                        if(range && range.length>0){
                            const url = prompt('Zadaj URL:');
                            if(url) quill.format('link', url.startsWith('http') ? url : 'https://'+url);
                        }
                    });
                }
            });

            // ================= FORM SUBMIT =================
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e){
                document.getElementById('content-new-sk').value = addFormEditors.sk.root.innerHTML;
                document.getElementById('content-new-en').value = addFormEditors.en.root.innerHTML;
            });

            // ================= IMAGE HANDLING =================
            const fileInput = document.querySelector('input[name="main_pic"]');
            const filenameEl = document.getElementById('newImageFilename');
            const removeBtn = document.getElementById('removeNewBtn');
            const altWrapper = document.getElementById('newAltWrapper');
            const altTextareas = altWrapper.querySelectorAll('textarea');

            fileInput.addEventListener('change', function(){
                if(this.files && this.files[0]){
                    filenameEl.value = this.files[0].name;
                    altWrapper.classList.remove('hidden');
                    removeBtn.classList.remove('hidden');
                    altTextareas.forEach(t => t.setAttribute('required','required'));
                }
            });

            removeBtn.addEventListener('click', function(){
                fileInput.value = '';
                filenameEl.value = '— žiadny obrázok —';
                altWrapper.classList.add('hidden');
                removeBtn.classList.add('hidden');
                altTextareas.forEach(t => t.removeAttribute('required'));
            });

            // ================= FLATPICKR CALENDAR =================
            const datePickerDiv = document.getElementById('multiDatePicker');
            const datesInput = document.getElementById('datesInput');
            const datesList = document.getElementById('datesList');

            flatpickr(datePickerDiv, {
                inline: true,
                mode: "multiple",
                dateFormat: "d-m-Y",
                locale: {
                    firstDayOfWeek: 1,
                    weekdays: {
                        shorthand: ['Ne', 'Po', 'Ut', 'St', 'Št', 'Pi', 'So'],
                        longhand: ['Nedeľa', 'Pondelok', 'Utorok', 'Streda', 'Štvrtok', 'Piatok', 'Sobota']
                    },
                    months: {
                        shorthand: ['Jan', 'Feb', 'Mar', 'Apr', 'Máj', 'Jún', 'Júl', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'],
                        longhand: ['Január', 'Február', 'Marec', 'Apríl', 'Máj', 'Jún', 'Júl', 'August', 'September', 'Október', 'November', 'December']
                    }
                },
                onChange: function(selectedDates, dateStr, instance) {
                    selectedDates.sort((a, b) => a - b);
                    const datesArray = selectedDates.map(d => instance.formatDate(d, "d.m.Y"));
                    datesInput.value = JSON.stringify(datesArray);

                    datesList.innerHTML = datesArray.map(d => `<p>-> ${d}</p>`).join('');
                }
            });

        });

        function onSponsorImage(input) {
            if (!input.files?.[0]) return;
            document.getElementById('sponsorImageFilename').textContent = input.files[0].name;
        }

    </script>

@endsection
