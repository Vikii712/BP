@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] bg-gray-100 px-4 py-10 flex justify-center">
        <div class="w-full max-w-5xl space-y-10">

            {{-- NADPIS STRÁNKY --}}
            <h1 class="text-3xl font-bold text-blue-950 text-center">
                Pridať novú udalosť
            </h1>

            @if(session('success'))
                <div class="mb-4 rounded-md bg-green-100 border border-green-400 text-green-900 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

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
                            <input type="checkbox" id="inCalendar" name="inCalendar" class="rounded">
                            <span>Zobraziť v kalendári</span>
                        </label>

                        <!-- Radio buttony pre farbu, na začiatku skryté -->
                        <div id="calendarColorWrapper" class="flex gap-3 flex-wrap mt-2 hidden">
                            <!-- Radio buttons sa doplnia JS -->
                        </div>

                        <label class="flex items-center gap-2">
                            <input type="checkbox" id="inHome" name="inHome" class="rounded">
                            <span>Pridať medzi vybrané udalosti na domovskej stránke</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" id="inGallery" name="inGallery" class="rounded">
                            <span>Vytvoriť vlastnú stránku v časti udalosti s textom, fotkami alebo videom</span>
                        </label>
                    </div>

                    {{-- HLAVNÁ FOTKA --}}
                    <div id="mainImageSection" class="hidden">
                        <div class="flex bg-gray-100 -mx-6 px-6 mb-6 py-2 font-medium text-blue-950">
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
                        <div id="newAltWrapper" class="hidden mt-6">
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
                    </div>

                    {{-- TEXT --}}
                    <div id="textSection" class="hidden">
                        <div class="flex items-center bg-gray-100 -mx-6 mb-6 px-6 py-2 font-medium text-blue-950">
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
                    </div>

                    {{-- FOTKY --}}
                    <div id="gallerySection" class="space-y-3 hidden">
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
                    <div id="videoSection" class="space-y-3 hidden">
                        <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Odkaz na youtube video
                        </div>

                        <!-- + tlačidlo naľavo -->
                        <div class="px-6 flex gap-3 mb-2">
                            <button type="button"
                                    id="addVideoLink"
                                    class="h-10 w-10 flex items-center justify-center border-2 border-blue-950 rounded-md hover:bg-blue-50">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>

                        <!-- Wrapper pre všetky inputy (prázdny) -->
                        <div id="videoLinksWrapper" class="px-6 space-y-4"></div>
                    </div>


                    {{--SPONZOR--}}
                    <div id="sponsorSection" class="space-y-3 hidden">
                        <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Pridať sponzora
                        </div>

                        <div class="space-y-3 px-6">

                            {{-- Pridať existujúceho alebo nový --}}
                            <div class="flex items-center gap-3">
                                <button type="button"
                                        id="addEmptySponsor"
                                        class="h-10 w-10 flex items-center justify-center border-2 border-blue-950 rounded-md hover:bg-blue-50">
                                    <i class="fa-solid fa-plus"></i>
                                </button>

                                <select id="existingSponsorSelect"
                                        class="flex-1 h-10 border-2 border-gray-300 rounded-md px-3">
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


                    {{-- DOKUMENTY --}}
                    <div id="documentSection" class="space-y-3 hidden">
                        <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Pridať dokument
                        </div>

                        <!-- + tlačidlo a výber existujúceho súboru -->
                        <div class="px-6 flex items-center gap-3 mb-2">
                            <button type="button"
                                    id="addDocumentBtn"
                                    class="h-10 w-10 flex items-center justify-center border-2 border-blue-950 rounded-md hover:bg-blue-50">
                                <i class="fa-solid fa-plus"></i>
                            </button>

                            <select id="existingDocumentSelect"
                                    class="flex-1 h-10 border-2 border-gray-300 rounded-md px-3">
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

            // ================= VIDITEĽNOSŤ SEKCIÍ NA ZÁKLADE CHECKBOXOV =================
            const inHomeCheckbox = document.getElementById('inHome');
            const inGalleryCheckbox = document.getElementById('inGallery');

            const mainImageSection = document.getElementById('mainImageSection');
            const textSection = document.getElementById('textSection');
            const gallerySection = document.getElementById('gallerySection');
            const videoSection = document.getElementById('videoSection');
            const sponsorSection = document.getElementById('sponsorSection');
            const documentSection = document.getElementById('documentSection');

            function updateSectionsVisibility() {
                const isHomeChecked = inHomeCheckbox.checked;
                const isGalleryChecked = inGalleryCheckbox.checked;

                if (isGalleryChecked) {
                    // Ak je inGallery zaškrtnuté, zobraziť všetky sekcie
                    mainImageSection.classList.remove('hidden');
                    textSection.classList.remove('hidden');
                    gallerySection.classList.remove('hidden');
                    videoSection.classList.remove('hidden');
                    sponsorSection.classList.remove('hidden');
                    documentSection.classList.remove('hidden');
                } else if (isHomeChecked) {
                    // Ak je iba inHome zaškrtnuté, zobraziť iba hlavnú fotku
                    mainImageSection.classList.remove('hidden');
                    textSection.classList.add('hidden');
                    gallerySection.classList.add('hidden');
                    videoSection.classList.add('hidden');
                    sponsorSection.classList.add('hidden');
                    documentSection.classList.add('hidden');
                } else {
                    // Ak nie je nič zaškrtnuté, skryť všetko
                    mainImageSection.classList.add('hidden');
                    textSection.classList.add('hidden');
                    gallerySection.classList.add('hidden');
                    videoSection.classList.add('hidden');
                    sponsorSection.classList.add('hidden');
                    documentSection.classList.add('hidden');
                }
            }

            // Event listenery pre checkboxy
            inHomeCheckbox.addEventListener('change', updateSectionsVisibility);
            inGalleryCheckbox.addEventListener('change', updateSectionsVisibility);

            // Inicializácia pri načítaní stránky
            updateSectionsVisibility();

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


        // ================= VIDEO LINKY =================
        document.addEventListener('DOMContentLoaded', function() {
            const addVideoBtn = document.getElementById('addVideoLink');
            const wrapper = document.getElementById('videoLinksWrapper');
            let videoCounter = 0;

            function createVideoInput() {
                videoCounter++;
                const div = document.createElement('div');
                div.className = 'bg-votum3 border-2 border-votum3 rounded-lg shadow-sm overflow-hidden';

                // Hlavička
                const header = document.createElement('div');
                header.className = 'bg-dark-votum3 flex items-center justify-between px-4 py-3';

                const headerTitle = document.createElement('div');
                headerTitle.className = 'flex items-center gap-3';
                const numberBadge = document.createElement('span');
                numberBadge.className = 'text-white px-3 py-1 rounded-md text-sm font-bold';
                numberBadge.style.backgroundColor = 'rgba(255, 255, 255, 0.2)';
                numberBadge.textContent = `#${videoCounter}`;
                const headerText = document.createElement('span');
                headerText.className = 'font-semibold text-white';
                headerText.textContent = 'YouTube video';
                headerTitle.appendChild(numberBadge);
                headerTitle.appendChild(headerText);

                const trashIcon = document.createElement('i');
                trashIcon.className = 'fa-solid fa-trash px-3 py-2 border-2 border-votum3 text-votum3 bg-white rounded-md cursor-pointer hover:bg-votum3 hover:text-white transition-colors';
                trashIcon.addEventListener('click', () => div.remove());

                header.appendChild(headerTitle);
                header.appendChild(trashIcon);
                div.appendChild(header);

                // Obsah
                const content = document.createElement('div');
                content.className = 'p-4';

                // Input
                const inputWrapper = document.createElement('div');
                const label = document.createElement('label');
                label.className = 'block text-sm font-medium text-gray-700 mb-2';
                label.textContent = 'URL adresa videa:';
                const input = document.createElement('input');
                input.type = 'url';
                input.name = 'video_url[]';
                input.placeholder = 'https://youtube.com/watch?v=...';
                input.className = 'w-full border-2 border-gray-300 rounded-md px-3 py-2 bg-white';
                inputWrapper.appendChild(label);
                inputWrapper.appendChild(input);
                content.appendChild(inputWrapper);

                div.appendChild(content);
                wrapper.appendChild(div);
            }

            addVideoBtn.addEventListener('click', createVideoInput);
        });

        // ================= SPONZORI =================
        document.addEventListener('DOMContentLoaded', function() {
            const addEmptyBtn = document.getElementById('addEmptySponsor');
            const select = document.getElementById('existingSponsorSelect');
            const list = document.getElementById('sponsorsList');
            let sponsorCounter = 0;

            function createSponsorDiv(name = '') {
                sponsorCounter++;
                const sponsorDiv = document.createElement('div');
                sponsorDiv.className = 'bg-votum3 border-2 border-votum3 rounded-lg shadow-sm overflow-hidden';

                // Hlavička s číslom a košom
                const header = document.createElement('div');
                header.className = 'bg-dark-votum3 flex items-center justify-between px-4 py-3';

                const headerTitle = document.createElement('div');
                headerTitle.className = 'flex items-center gap-3';
                const numberBadge = document.createElement('span');
                numberBadge.className = 'text-white px-3 py-1 rounded-md text-sm font-bold';
                numberBadge.style.backgroundColor = 'rgba(255, 255, 255, 0.2)';
                numberBadge.textContent = `#${sponsorCounter}`;
                const headerText = document.createElement('span');
                headerText.className = 'font-semibold text-white';
                headerText.textContent = 'Sponzor';
                headerTitle.appendChild(numberBadge);
                headerTitle.appendChild(headerText);

                const trashIcon = document.createElement('i');
                trashIcon.className = 'fa-solid fa-trash px-3 py-2 border-2 border-votum3 text-votum3 bg-white rounded-md cursor-pointer hover:bg-votum3 hover:text-white transition-colors';
                trashIcon.addEventListener('click', () => sponsorDiv.remove());

                header.appendChild(headerTitle);
                header.appendChild(trashIcon);
                sponsorDiv.appendChild(header);

                // Obsah s paddingom
                const content = document.createElement('div');
                content.className = 'p-4 space-y-4';

                // Názov sponzora
                const nameWrapper = document.createElement('div');
                const nameLabel = document.createElement('label');
                nameLabel.className = 'block text-sm font-medium text-gray-700 mb-2';
                nameLabel.textContent = 'Názov sponzora:';
                const nameInput = document.createElement('input');
                nameInput.type = 'text';
                nameInput.name = 'sponsors[]';
                nameInput.value = name;
                nameInput.placeholder = 'Zadajte názov sponzora';
                nameInput.className = 'w-full border-2 border-gray-300 rounded-md px-3 py-2 bg-white';
                nameWrapper.appendChild(nameLabel);
                nameWrapper.appendChild(nameInput);
                content.appendChild(nameWrapper);

                // Logo sponzora
                const logoWrapper = document.createElement('div');
                const logoLabel = document.createElement('label');
                logoLabel.className = 'block text-sm font-medium text-gray-700 mb-2';
                logoLabel.textContent = 'Logo sponzora:';
                logoWrapper.appendChild(logoLabel);

                const fileRow = document.createElement('div');
                fileRow.className = 'flex gap-3 items-center';

                const fileNameInput = document.createElement('input');
                fileNameInput.type = 'text';
                fileNameInput.readOnly = true;
                fileNameInput.value = '— žiadny obrázok —';
                fileNameInput.className = 'border-2 border-gray-300 bg-gray-100 px-3 py-2 flex-1 rounded-md';
                fileRow.appendChild(fileNameInput);

                const fileLabel = document.createElement('label');
                fileLabel.className = 'px-4 py-2 bg-dark-votum3 text-white rounded-md cursor-pointer hover:opacity-90 transition-opacity';
                fileLabel.textContent = 'Nahrať';
                const fileInput = document.createElement('input');
                fileInput.type = 'file';
                fileInput.accept = 'image/*';
                fileInput.className = 'hidden';
                fileInput.addEventListener('change', () => {
                    if (fileInput.files?.[0]) {
                        fileNameInput.value = fileInput.files[0].name;
                        removeFileBtn.classList.remove('hidden');
                    }
                });
                fileLabel.appendChild(fileInput);
                fileRow.appendChild(fileLabel);

                const removeFileBtn = document.createElement('button');
                removeFileBtn.type = 'button';
                removeFileBtn.className = 'hidden px-4 py-2 border-2 border-votum3 text-votum3 rounded-md hover:bg-votum3 hover:text-white transition-colors';
                removeFileBtn.innerHTML = '<i class="fa-solid fa-trash"></i>';
                removeFileBtn.addEventListener('click', () => {
                    fileInput.value = '';
                    fileNameInput.value = '— žiadny obrázok —';
                    removeFileBtn.classList.add('hidden');
                });
                fileRow.appendChild(removeFileBtn);

                logoWrapper.appendChild(fileRow);
                content.appendChild(logoWrapper);

                sponsorDiv.appendChild(content);
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

        // ================= DOKUMENTY =================
        document.addEventListener('DOMContentLoaded', function() {
            const addDocBtn = document.getElementById('addDocumentBtn');
            const existingSelect = document.getElementById('existingDocumentSelect');
            const wrapper = document.getElementById('documentsWrapper');
            let docCounter = 0;

            const existingSections = ['2%', 'GDPR', 'Výlety'];

            function createDocument(preselectedFileType = '') {
                docCounter++;
                const div = document.createElement('div');
                div.className = 'bg-votum3 border-2 border-votum3 rounded-lg shadow-sm overflow-hidden';

                // Hlavička
                const header = document.createElement('div');
                header.className = 'bg-dark-votum3 flex items-center justify-between px-4 py-3';

                const headerTitle = document.createElement('div');
                headerTitle.className = 'flex items-center gap-3';
                const numberBadge = document.createElement('span');
                numberBadge.className = 'text-white px-3 py-1 rounded-md text-sm font-bold';
                numberBadge.style.backgroundColor = 'rgba(255, 255, 255, 0.2)';
                numberBadge.textContent = `#${docCounter}`;
                const headerText = document.createElement('span');
                headerText.className = 'font-semibold text-white';
                headerText.textContent = 'Dokument';
                headerTitle.appendChild(numberBadge);
                headerTitle.appendChild(headerText);

                const trashIcon = document.createElement('i');
                trashIcon.className = 'fa-solid fa-trash px-3 py-2 border-2 border-votum3 text-votum3 bg-white rounded-md cursor-pointer hover:bg-votum3 hover:text-white transition-colors';
                trashIcon.addEventListener('click', () => div.remove());

                header.appendChild(headerTitle);
                header.appendChild(trashIcon);
                div.appendChild(header);

                // Obsah
                const content = document.createElement('div');
                content.className = 'p-4 space-y-4';

                // Názvy SK/EN
                const namesWrapper = document.createElement('div');
                namesWrapper.className = 'space-y-3';

                const nameSKWrapper = document.createElement('div');
                const labelSK = document.createElement('label');
                labelSK.className = 'block text-sm font-medium text-gray-700 mb-1';
                labelSK.textContent = 'SK – Názov dokumentu:';
                const inputSK = document.createElement('input');
                inputSK.type = 'text';
                inputSK.name = 'doc_name_sk[]';
                inputSK.placeholder = 'Zadajte názov v slovenčine';
                inputSK.className = 'w-full border-2 border-gray-300 rounded-md px-3 py-2 bg-white';
                nameSKWrapper.appendChild(labelSK);
                nameSKWrapper.appendChild(inputSK);

                const nameENWrapper = document.createElement('div');
                const labelEN = document.createElement('label');
                labelEN.className = 'block text-sm font-medium text-gray-700 mb-1';
                labelEN.textContent = 'EN – Názov dokumentu:';
                const inputEN = document.createElement('input');
                inputEN.type = 'text';
                inputEN.name = 'doc_name_en[]';
                inputEN.placeholder = 'Enter name in English';
                inputEN.className = 'w-full border-2 border-gray-300 rounded-md px-3 py-2 bg-white';
                nameENWrapper.appendChild(labelEN);
                nameENWrapper.appendChild(inputEN);

                namesWrapper.appendChild(nameSKWrapper);
                namesWrapper.appendChild(nameENWrapper);
                content.appendChild(namesWrapper);

                // Nahratie súboru
                const fileWrapper = document.createElement('div');
                const fileLabel = document.createElement('label');
                fileLabel.className = 'block text-sm font-medium text-gray-700 mb-2';
                fileLabel.textContent = 'Súbor dokumentu:';
                fileWrapper.appendChild(fileLabel);

                const fileRow = document.createElement('div');
                fileRow.className = 'flex gap-3 items-center';
                const fileNameInput = document.createElement('input');
                fileNameInput.type = 'text';
                fileNameInput.readOnly = true;
                fileNameInput.value = '— žiadny súbor —';
                fileNameInput.className = 'border-2 border-gray-300 bg-gray-100 px-3 py-2 flex-1 rounded-md';
                fileRow.appendChild(fileNameInput);

                const uploadLabel = document.createElement('label');
                uploadLabel.className = 'px-4 py-2 bg-dark-votum3 text-white rounded-md cursor-pointer hover:opacity-90 transition-opacity';
                uploadLabel.textContent = 'Nahrať';
                const fileInput = document.createElement('input');
                fileInput.type = 'file';
                fileInput.accept = '.pdf,.doc,.docx,.jpg,.png';
                fileInput.className = 'hidden';
                fileInput.addEventListener('change', () => {
                    if(fileInput.files?.[0]) {
                        fileNameInput.value = fileInput.files[0].name;
                        removeDocBtn.classList.remove('hidden');
                    }
                });
                uploadLabel.appendChild(fileInput);
                fileRow.appendChild(uploadLabel);

                const removeDocBtn = document.createElement('button');
                removeDocBtn.type = 'button';
                removeDocBtn.className = 'hidden px-4 py-2 border-2 border-votum3 text-votum3 rounded-md hover:bg-votum3 hover:text-white transition-colors';
                removeDocBtn.innerHTML = '<i class="fa-solid fa-trash"></i>';
                removeDocBtn.addEventListener('click', () => {
                    fileInput.value = '';
                    fileNameInput.value = '— žiadny súbor —';
                    removeDocBtn.classList.add('hidden');
                });
                fileRow.appendChild(removeDocBtn);

                fileWrapper.appendChild(fileRow);
                content.appendChild(fileWrapper);

                // Sekcia dokumentu
                const sectionWrapper = document.createElement('div');
                const sectionLabel = document.createElement('label');
                sectionLabel.className = 'block text-sm font-medium text-gray-700 mb-2';
                sectionLabel.textContent = 'Sekcia dokumentu:';
                sectionWrapper.appendChild(sectionLabel);

                const sectionRow = document.createElement('div');
                sectionRow.className = 'flex gap-2';
                const sectionSelect = document.createElement('select');
                sectionSelect.className = 'border-2 border-gray-300 rounded-md px-3 py-2 flex-1 bg-white';
                sectionSelect.innerHTML = '<option value="">Vybrať existujúcu</option>';
                existingSections.forEach(sec => {
                    const option = document.createElement('option');
                    option.value = sec;
                    option.textContent = sec;
                    sectionSelect.appendChild(option);
                });

                const newSectionInput = document.createElement('input');
                newSectionInput.type = 'text';
                newSectionInput.placeholder = 'Alebo nová sekcia';
                newSectionInput.className = 'flex-1 border-2 border-gray-300 rounded-md px-3 py-2 bg-white';
                sectionSelect.addEventListener('change', () => {
                    newSectionInput.value = sectionSelect.value || '';
                });

                sectionRow.appendChild(sectionSelect);
                sectionRow.appendChild(newSectionInput);
                sectionWrapper.appendChild(sectionRow);
                content.appendChild(sectionWrapper);

                div.appendChild(content);
                wrapper.appendChild(div);
            }

            addDocBtn.addEventListener('click', () => createDocument());

            existingSelect.addEventListener('change', () => {
                const type = existingSelect.value;
                if(!type) return;
                createDocument(type);
                existingSelect.value = '';
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const eventColors = {
                'c1': '#FF0000', 'c2': '#FF7F00', 'c3': '#FFFF00', 'c4': '#00FF00',
                'c5': '#0000FF', 'c6': '#4B0082', 'c7': '#8B00FF', 'c8': '#FF1493',
            };

            const wrapper = document.getElementById('calendarColorWrapper');

            // vytvoríme radio buttony
            for (const [key, color] of Object.entries(eventColors)) {
                const label = document.createElement('label');
                label.className = 'cursor-pointer';

                const input = document.createElement('input');
                input.type = 'radio';
                input.name = 'calendarColor';
                input.value = key;
                input.className = 'hidden peer';

                const circle = document.createElement('div');
                circle.className = 'w-10 h-10 rounded-full border-3 border-gray-300 transition-transform peer-checked:scale-110 peer-checked:border-black';
                circle.style.backgroundColor = color;

                label.appendChild(input);
                label.appendChild(circle);
                wrapper.appendChild(label);
            }

            // zobrazovanie wrappera podľa checkboxu
            const checkbox = document.getElementById('inCalendar');
            checkbox.addEventListener('change', () => {
                if (checkbox.checked) {
                    wrapper.classList.remove('hidden');
                } else {
                    wrapper.classList.add('hidden');
                }
            });
        });
    </script>

@endsection
