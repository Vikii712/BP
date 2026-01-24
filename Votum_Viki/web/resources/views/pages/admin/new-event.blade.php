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

                    {{-- RADIO BUTTONY pre výber dátumu --}}
                    <div class="flex gap-6 px-6 py-3">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="dateOption" value="none" checked>
                            Bez dátumu
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="dateOption" value="add">
                            Pridať dátum
                        </label>
                    </div>

                    <div id="datesWrapper" class="flex flex-col sm:flex-row gap-6">

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

                    {{--SPONZOR--}}
                    <div class="space-y-3">
                        <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Sponzor
                        </div>

                        <div class="space-y-3 px-6">

                            {{-- Pridať existujúceho alebo nový --}}
                            <div class="flex items-center gap-2">
                                <button type="button"
                                        id="addEmptySponsor"
                                        class="px-3 py-2 border-2 border-blue-950 rounded-md hover:bg-blue-50">
                                    <i class="fa-solid fa-plus"></i>
                                </button>

                                <select id="existingSponsorSelect"
                                        class="border-2 border-gray-300 rounded-md px-3 py-2 w-64">
                                    <option value="">Pridať existujúceho sponzora</option>
                                    <option value="Mesto Bratislava">Mesto Bratislava</option>
                                    <option value="SPP">SPP</option>
                                    <option value="Websupport">Websupport</option>
                                </select>
                            </div>

                            {{-- Zoznam pridaných sponzorov --}}
                            <div id="sponsorsList" class="space-y-5"></div>

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
                            Odkaz na youtube video
                        </div>

                        <!-- + tlačidlo naľavo -->
                        <div class="px-6 flex mb-2">
                            <button type="button" id="addVideoLink" class="px-3 py-1 border-2 border-blue-950 rounded-md hover:bg-blue-50 mr-2">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>

                        <!-- Wrapper pre všetky inputy (prázdny) -->
                        <div id="videoLinksWrapper" class="px-6 space-y-3"></div>
                    </div>



                    {{-- DOKUMENTY --}}
                    <!-- Dokumenty -->
                    <div class="space-y-3">
                        <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Dokumenty
                        </div>

                        <!-- + tlačidlo a výber existujúceho súboru -->
                        <div class="px-6 flex items-center gap-2 mb-2">
                            <button type="button" id="addDocumentBtn" class="px-3 py-1 border-2 border-blue-950 rounded-md hover:bg-blue-50">
                                <i class="fa-solid fa-plus"></i>
                            </button>

                            <select id="existingDocumentSelect" class="border-2 border-gray-300 rounded-md px-3 py-2 flex-1">
                                <option value="">Pridať existujúci dokument</option>
                                <option value="2%">2%</option>
                                <option value="2022">2022</option>
                                <option value="GDPR">GDPR</option>
                                <option value="Prihláška">Prihláška</option>
                            </select>
                        </div>

                        <!-- Wrapper pre nové dokumenty -->
                        <div id="documentsWrapper" class="px-6 space-y-5 my-5"></div>
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


        const datesWrapper = document.getElementById('datesWrapper');
        const dateRadios = document.querySelectorAll('input[name="dateOption"]');

        // na začiatku skryť kalendár, ak je vybrané "none"
        datesWrapper.style.display = 'none';

        dateRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'add') {
                    datesWrapper.style.display = 'flex';
                } else {
                    datesWrapper.style.display = 'none';
                    // vyčistiť vybrané dátumy
                    datesList.innerHTML = '';
                    datesInput.value = '';
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const addEmptyBtn = document.getElementById('addEmptySponsor');
            const select = document.getElementById('existingSponsorSelect');
            const list = document.getElementById('sponsorsList');

            function createSponsorDiv(name = '') {
                const sponsorDiv = document.createElement('div');
                sponsorDiv.className = 'border-2 border-gray-300 rounded-md p-3 flex flex-col gap-3 ';

                // riadok s názvom a košom
                const topRow = document.createElement('div');
                topRow.className = 'flex items-center justify-between';

                const nameInput = document.createElement('input');
                nameInput.type = 'text';
                nameInput.name = 'sponsors[]';
                nameInput.value = name;
                nameInput.placeholder = 'Názov sponzora';
                nameInput.className = 'border-2 border-gray-300 rounded-md px-3 py-2 flex-1';
                topRow.appendChild(nameInput);

                const trashIcon = document.createElement('i');
                trashIcon.className = 'fa-solid fa-trash px-4 py-3 border-2 border-red-600 text-red-600 rounded-md cursor-pointer hover:bg-red-50 ml-2';
                trashIcon.addEventListener('click', () => sponsorDiv.remove());
                topRow.appendChild(trashIcon);


                sponsorDiv.appendChild(topRow);

                // Upload fotky
                const fileWrapper = document.createElement('div');
                fileWrapper.className = 'flex gap-3 items-center';

                const fileNameInput = document.createElement('input');
                fileNameInput.type = 'text';
                fileNameInput.readOnly = true;
                fileNameInput.value = '— žiadny obrázok —';
                fileNameInput.className = 'border-2 border-gray-300 bg-gray-100 px-3 py-2 flex-1 rounded-md';
                fileWrapper.appendChild(fileNameInput);

                const fileLabel = document.createElement('label');
                fileLabel.className = 'px-4 py-2 border-2 border-blue-950 rounded-md cursor-pointer hover:bg-blue-50';
                fileLabel.textContent = 'Nahrať';
                const fileInput = document.createElement('input');
                fileInput.type = 'file';
                fileInput.accept = 'image/*';
                fileInput.className = 'hidden';
                fileInput.addEventListener('change', () => {
                    if (fileInput.files?.[0]) fileNameInput.value = fileInput.files[0].name;
                });
                fileLabel.appendChild(fileInput);
                fileWrapper.appendChild(fileLabel);

                sponsorDiv.appendChild(fileWrapper);

                list.appendChild(sponsorDiv);
            }

            // pridať prázdny sponzor
            addEmptyBtn.addEventListener('click', () => createSponsorDiv());

            // pridať existujúceho sponzora
            select.addEventListener('change', () => {
                const name = select.value;
                if (!name) return;
                createSponsorDiv(name);
                select.value = '';
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const addVideoBtn = document.getElementById('addVideoLink');
            const wrapper = document.getElementById('videoLinksWrapper');

            function createVideoInput() {
                const div = document.createElement('div');
                div.className = 'flex items-center';

                const input = document.createElement('input');
                input.type = 'url';
                input.name = 'video_url[]';
                input.placeholder = 'https://youtube.com/...';
                input.className = 'w-full border-2 border-gray-300 rounded-md px-3 py-2';
                div.appendChild(input);

                const trashIcon = document.createElement('i');
                trashIcon.className = 'fa-solid fa-trash px-4 py-2 border-2 border-red-600 text-red-600 rounded-md cursor-pointer hover:bg-red-50 ml-2';
                trashIcon.addEventListener('click', () => div.remove());
                div.appendChild(trashIcon);

                wrapper.appendChild(div);
            }

            // tlačidlo + pridáva nový input
            addVideoBtn.addEventListener('click', createVideoInput);
        });

        document.addEventListener('DOMContentLoaded', function() {
            const addDocBtn = document.getElementById('addDocumentBtn');
            const existingSelect = document.getElementById('existingDocumentSelect');
            const wrapper = document.getElementById('documentsWrapper');

            const existingSections = ['2%', 'GDPR', 'Výlety'];

            function createDocument(preselectedFileType = '') {
                const div = document.createElement('div');
                div.className = 'border-2 border-gray-300 rounded-md p-3 flex flex-col gap-3 relative';

                // riadok s názvom SK + EN
                const topRow = document.createElement('div');
                topRow.className = 'flex flex-col gap-2';

                const nameSKRow = document.createElement('div');
                nameSKRow.className = 'flex items-center gap-2';
                const labelSK = document.createElement('span');
                labelSK.textContent = 'SK -';
                labelSK.className = 'w-12';
                const inputSK = document.createElement('input');
                inputSK.type = 'text';
                inputSK.name = 'doc_name_sk[]';
                inputSK.placeholder = 'Názov dokumentu SK';
                inputSK.className = 'flex-1 border-2 border-gray-300 rounded-md px-3 py-2';
                nameSKRow.appendChild(labelSK);
                nameSKRow.appendChild(inputSK);
                topRow.appendChild(nameSKRow);

                const nameENRow = document.createElement('div');
                nameENRow.className = 'flex items-center gap-2';
                const labelEN = document.createElement('span');
                labelEN.textContent = 'EN -';
                labelEN.className = 'w-12';
                const inputEN = document.createElement('input');
                inputEN.type = 'text';
                inputEN.name = 'doc_name_en[]';
                inputEN.placeholder = 'Názov dokumentu EN';
                inputEN.className = 'flex-1 border-2 border-gray-300 rounded-md px-3 py-2';
                nameENRow.appendChild(labelEN);
                nameENRow.appendChild(inputEN);
                topRow.appendChild(nameENRow);

                div.appendChild(topRow);

                // Upload súboru
                const fileWrapper = document.createElement('div');
                fileWrapper.className = 'flex gap-3 items-center';
                const fileNameInput = document.createElement('input');
                fileNameInput.type = 'text';
                fileNameInput.readOnly = true;
                fileNameInput.value = '— žiadny súbor —';
                fileNameInput.className = 'border-2 border-gray-300 bg-gray-100 px-3 py-2 flex-1 rounded-md';
                fileWrapper.appendChild(fileNameInput);

                const fileLabel = document.createElement('label');
                fileLabel.className = 'px-4 py-2 border-2 border-blue-950 rounded-md cursor-pointer hover:bg-blue-50';
                fileLabel.textContent = 'Nahrať';
                const fileInput = document.createElement('input');
                fileInput.type = 'file';
                fileInput.accept = '.pdf,.doc,.docx,.jpg,.png';
                fileInput.className = 'hidden';
                fileInput.addEventListener('change', () => {
                    if(fileInput.files?.[0]) fileNameInput.value = fileInput.files[0].name;
                });
                fileLabel.appendChild(fileInput);
                fileWrapper.appendChild(fileLabel);
                div.appendChild(fileWrapper);

                // Sekcia dokumentu
                const sectionRow = document.createElement('div');
                sectionRow.className = 'flex flex-col gap-1 mt-2';
                const sectionLabel = document.createElement('span');
                sectionLabel.textContent = 'Sekcia:';
                sectionRow.appendChild(sectionLabel);

                const sectionSelectRow = document.createElement('div');
                sectionSelectRow.className = 'flex items-center gap-2';
                const sectionSelect = document.createElement('select');
                sectionSelect.className = 'border-2 border-gray-300 rounded-md px-3 py-2 flex-1';
                sectionSelect.innerHTML = '<option value="">Vybrať existujúcu sekciu</option>';
                existingSections.forEach(sec => {
                    const option = document.createElement('option');
                    option.value = sec;
                    option.textContent = sec;
                    sectionSelect.appendChild(option);
                });

                const newSectionInput = document.createElement('input');
                newSectionInput.type = 'text';
                newSectionInput.placeholder = 'Alebo nový názov sekcie';
                newSectionInput.className = 'flex-1 border-2 border-gray-300 rounded-md px-3 py-2';
                sectionSelect.addEventListener('change', () => {
                    newSectionInput.value = sectionSelect.value || '';
                });

                sectionSelectRow.appendChild(sectionSelect);
                sectionSelectRow.appendChild(newSectionInput);
                sectionRow.appendChild(sectionSelectRow);
                div.appendChild(sectionRow);

                // Samostatný riadok s košom úplne dole napravo
                const trashRow = document.createElement('div');
                trashRow.className = 'flex justify-end mt-2';
                const trashIcon = document.createElement('i');
                trashIcon.className = 'fa-solid fa-trash px-4 py-2 border-2 border-red-600 text-red-600 rounded-md cursor-pointer hover:bg-red-50';
                trashIcon.addEventListener('click', () => div.remove());
                trashRow.appendChild(trashIcon);
                div.appendChild(trashRow);

                wrapper.appendChild(div);
            }



            // + tlačidlo pridá nový prázdny dokument
            addDocBtn.addEventListener('click', () => createDocument());

            // Výber existujúceho dokumentu
            existingSelect.addEventListener('change', () => {
                const type = existingSelect.value;
                if(!type) return;
                createDocument(type);
                existingSelect.value = '';
            });
        });



    </script>

@endsection
