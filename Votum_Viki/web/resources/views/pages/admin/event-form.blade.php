@extends('layouts.admin')
@section('back-url', route('admin.events'))

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] pt-20 bg-gray-100 px-4 py-10 flex justify-center">
        <div class="w-full max-w-5xl space-y-10">

            {{-- NADPIS STRÁNKY --}}
            <h1 class="text-3xl font-bold text-blue-950 text-center">
                {{ $isEdit ? 'Upraviť udalosť' : 'Pridať novú udalosť' }}
            </h1>

            @if(session('success'))
                <div class="mb-4 rounded-md bg-green-100 border border-green-400 text-green-900 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            {{-- FORMULÁR --}}
            <div class="bg-white border border-gray-200 shadow-md rounded-md p-6 pt-0 space-y-6">

                <form method="POST"
                      action="{{ $isEdit ? route('events.update', $event) : route('events.store') }}"
                      enctype="multipart/form-data"
                      class="space-y-6">

                    @csrf
                    @if($isEdit)
                        @method('PUT')
                    @endif

                    {{-- NÁZOV --}}
                    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Názov udalosti
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <span class="w-10 font-semibold text-blue-950">SK –</span>
                            <input type="text"
                                   name="title_sk"
                                   value="{{ old('title_sk', $event->title_sk ?? '') }}"
                                   required
                                   class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                        </div>

                        <div class="flex items-center gap-3">
                            <span class="w-10 font-semibold text-blue-950">EN –</span>
                            <input type="text"
                                   name="title_en"
                                   value="{{ old('title_en', $event->title_en ?? '') }}"
                                   required
                                   class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                        </div>
                    </div>

                    <x-admin.event.calendar
                        :isEdit="$isEdit"
                        :event="$event"

                    />

                    <x-admin.event.main_pic
                        :isEdit="$isEdit"
                        :event="$event"
                    />

                    <x-admin.event.text
                        :event="$event"
                    />

                    <x-admin.event.media
                        :isEdit="$isEdit"
                        :event="$event"
                    />

                    <x-admin.event.sponsor
                        :isEdit="$isEdit"
                        :event="$event"
                        :allSponsors="$allSponsors"
                    />

                    <x-admin.event.docs
                        :event="$event"
                    />


                    {{-- TLAČIDLÁ --}}
                    <div class="flex justify-end gap-3">
                        <button type="submit"
                                class="bg-green-200 border-2 border-green-900 text-green-900 px-6 py-2 rounded-md font-semibold hover:bg-green-300">
                            {{ $isEdit ? 'Aktualizovať' : 'Uložiť' }}
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
        // Prenos PHP dát do JS
        const isEdit = {{ $isEdit ? 'true' : 'false' }};
        const existingDates = @json($isEdit && $event->dates ? $event->dates->pluck('date')->map(fn($d) => $d->format('d-m-Y'))->toArray() : []);
        const existingVideoUrls = @json($videoUrls ?? []);
        const existingSponsors = @json($isEdit && $event->sponsors ? $event->sponsors->map(fn($s) => ['name' => $s->name, 'logo' => $s->file ? $s->file->url : null])->toArray() : []);
        const existingDocuments = @json($documents ?? []);
        const existingColor = @json($isEdit && $event->color ? $event->color : null);
        const existingContentSK = @json($isEdit && $event->content_sk ? $event->content_sk : '');
        const existingContentEN = @json($isEdit && $event->content_en ? $event->content_en : '');
        const allSponsors = @json($allSponsors);


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

            addFormEditors.sk.on('text-change', function() {
                document.getElementById('content-new-sk').value = addFormEditors.sk.root.innerHTML;
            });

            addFormEditors.en.on('text-change', function() {
                document.getElementById('content-new-en').value = addFormEditors.en.root.innerHTML;
            });

            if (isEdit) {
                if (existingContentSK) {
                    addFormEditors.sk.root.innerHTML = existingContentSK;
                    document.getElementById('content-new-sk').value = existingContentSK;
                }
                if (existingContentEN) {
                    addFormEditors.en.root.innerHTML = existingContentEN;
                    document.getElementById('content-new-en').value = existingContentEN;
                }
            }

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
                // Najprv skontroluj či existujú Quill editory
                if (addFormEditors && addFormEditors.sk && addFormEditors.en) {
                    const skContent = addFormEditors.sk.root.innerHTML;
                    const enContent = addFormEditors.en.root.innerHTML;

                    document.getElementById('content-new-sk').value = skContent;
                    document.getElementById('content-new-en').value = enContent;

                    console.log('SK obsah:', skContent); // Pre debugging
                    console.log('EN obsah:', enContent); // Pre debugging
                }
            });

            // ================= IMAGE HANDLING =================
            const fileInput = document.querySelector('input[name="main_pic"]');
            const filenameEl = document.getElementById('newImageFilename');
            const removeBtn = document.getElementById('removeNewBtn');
            const altWrapper = document.getElementById('newAltWrapper');
            const altTextareas = altWrapper.querySelectorAll('textarea');

            window.onNewImage = function(input) {
                if(input.files && input.files[0]){
                    filenameEl.value = input.files[0].name;
                    altWrapper.classList.remove('hidden');
                    removeBtn.classList.remove('hidden');
                    altTextareas.forEach(t => t.setAttribute('required','required'));
                    document.getElementById('removeNewFlag').value = '0';
                }
            };

            window.removeNewImage = function() {
                fileInput.value = '';
                filenameEl.value = '— žiadny obrázok —';
                altWrapper.classList.add('hidden');
                removeBtn.classList.add('hidden');
                altTextareas.forEach(t => {
                    t.removeAttribute('required');
                    t.value = '';
                });
                document.getElementById('removeNewFlag').value = '1';
            };

            // ================= FLATPICKR CALENDAR =================
            const datePickerDiv = document.getElementById('multiDatePicker');
            const datesInput = document.getElementById('datesInput');
            const datesList = document.getElementById('datesList');

            const fp = flatpickr(datePickerDiv, {
                inline: true,
                mode: "multiple",
                dateFormat: "d-m-Y",
                defaultDate: existingDates,
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
                    mainImageSection.classList.remove('hidden');
                    textSection.classList.remove('hidden');
                    gallerySection.classList.remove('hidden');
                    videoSection.classList.remove('hidden');
                    sponsorSection.classList.remove('hidden');
                    documentSection.classList.remove('hidden');
                } else if (isHomeChecked) {
                    mainImageSection.classList.remove('hidden');
                    textSection.classList.add('hidden');
                    gallerySection.classList.add('hidden');
                    videoSection.classList.add('hidden');
                    sponsorSection.classList.add('hidden');
                    documentSection.classList.add('hidden');
                } else {
                    mainImageSection.classList.add('hidden');
                    textSection.classList.add('hidden');
                    gallerySection.classList.add('hidden');
                    videoSection.classList.add('hidden');
                    sponsorSection.classList.add('hidden');
                    documentSection.classList.add('hidden');
                }
            }

            inHomeCheckbox.addEventListener('change', updateSectionsVisibility);
            inGalleryCheckbox.addEventListener('change', updateSectionsVisibility);
            updateSectionsVisibility();

            // ================= DÁTUMY WRAPPER =================
            const datesWrapper = document.getElementById('datesWrapper');
            const dateRadios = document.querySelectorAll('input[name="dateOption"]');

            function updateDatesWrapper() {
                const selected = document.querySelector('input[name="dateOption"]:checked');
                if (selected && selected.value === 'add') {
                    datesWrapper.style.display = 'flex';
                } else {
                    datesWrapper.style.display = 'none';
                    datesList.innerHTML = '';
                    datesInput.value = '';
                    fp.clear();
                }
            }

            dateRadios.forEach(radio => {
                radio.addEventListener('change', updateDatesWrapper);
            });
            updateDatesWrapper();

            // ================= VIDEO LINKY =================
            const addVideoBtn = document.getElementById('addVideoLink');
            const videoWrapper = document.getElementById('videoLinksWrapper');
            let videoCounter = 0;

            function createVideoInput(url = '') {
                videoCounter++;
                const div = document.createElement('div');
                div.className = 'bg-votum3 border-2 border-votum3 rounded-lg shadow-sm overflow-hidden';

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

                const content = document.createElement('div');
                content.className = 'p-4';

                const inputWrapper = document.createElement('div');
                const label = document.createElement('label');
                label.className = 'block text-sm font-medium text-gray-700 mb-2';
                label.textContent = 'URL adresa videa:';
                const input = document.createElement('input');
                input.type = 'url';
                input.name = 'video_url[]';
                input.value = url;
                input.placeholder = 'https://youtube.com/watch?v=...';
                input.className = 'w-full border-2 border-gray-300 rounded-md px-3 py-2 bg-white';
                inputWrapper.appendChild(label);
                inputWrapper.appendChild(input);
                content.appendChild(inputWrapper);

                div.appendChild(content);
                videoWrapper.appendChild(div);
            }

            addVideoBtn.addEventListener('click', () => createVideoInput());

            // Načítanie existujúcich videí
            if (isEdit && existingVideoUrls.length > 0) {
                existingVideoUrls.forEach(url => createVideoInput(url));
            }

            // ================= SPONZORI =================
            const addEmptyBtn = document.getElementById('addEmptySponsor');
            const sponsorSelect = document.getElementById('existingSponsorSelect');
            const sponsorsList = document.getElementById('sponsorsList');
            let sponsorCounter = 0;

            function createSponsorDiv(name = '', logoUrl = null, id = null) {
                sponsorCounter++;
                const sponsorDiv = document.createElement('div');
                sponsorDiv.className = 'bg-votum3 border-2 border-votum3 rounded-lg shadow-sm overflow-hidden';

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

                const content = document.createElement('div');
                content.className = 'p-4 space-y-4';

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

                const logoWrapper = document.createElement('div');
                const logoLabel = document.createElement('label');
                logoLabel.className = 'block text-sm font-medium text-gray-700 mb-2';
                logoLabel.textContent = 'Logo sponzora:';
                logoWrapper.appendChild(logoLabel);

                if (logoUrl) {
                    const existingImage = document.createElement('div');
                    existingImage.className = 'mb-3';
                    const img = document.createElement('img');
                    img.src = '/storage/' + logoUrl;
                    img.className = 'max-w-xs rounded-md border-2 border-gray-300';
                    existingImage.appendChild(img);
                    logoWrapper.appendChild(existingImage);
                }

                const fileRow = document.createElement('div');
                fileRow.className = 'flex gap-3 items-center';

                const fileNameInput = document.createElement('input');
                fileNameInput.type = 'text';
                fileNameInput.readOnly = true;
                fileNameInput.value = logoUrl ? 'Aktuálne logo nastavené' : '— žiadny obrázok —';
                fileNameInput.className = 'border-2 border-gray-300 bg-gray-100 px-3 py-2 flex-1 rounded-md';
                fileRow.appendChild(fileNameInput);

                const fileLabel = document.createElement('label');
                fileLabel.className = 'px-4 py-2 bg-dark-votum3 text-white rounded-md cursor-pointer hover:opacity-90 transition-opacity';
                fileLabel.textContent = logoUrl ? 'Zmeniť' : 'Nahrať';
                const fileInput = document.createElement('input');
                fileInput.type = 'file';
                fileInput.name = 'sponsor_images[]';
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

                if(id) {
                    const hiddenId = document.createElement('input');
                    hiddenId.type = 'hidden';
                    hiddenId.name = 'existing_sponsor_ids[]';
                    hiddenId.value = id;
                    sponsorDiv.appendChild(hiddenId);
                }

                sponsorsList.appendChild(sponsorDiv);
            }

            addEmptyBtn.addEventListener('click', () => createSponsorDiv());

            sponsorSelect.addEventListener('change', () => {
                const sponsorId = sponsorSelect.value;
                if (!sponsorId) return;

                const sponsor = allSponsors.find(s => s.id == sponsorId);
                if (!sponsor) return;

                createSponsorDiv(sponsor.name, sponsor.file?.url ?? null, sponsor.id);

                sponsorSelect.value = '';
            });

            // Načítanie existujúcich sponzorov
            if (isEdit && existingSponsors.length > 0) {
                existingSponsors.forEach(sponsor => createSponsorDiv(sponsor.name, sponsor.logo));
            }

            // ================= DOKUMENTY =================
            const addDocBtn = document.getElementById('addDocumentBtn');
            const existingDocSelect = document.getElementById('existingDocumentSelect');
            const docsWrapper = document.getElementById('documentsWrapper');
            let docCounter = 0;

            const existingSections = ['2%', 'GDPR', 'Výlety'];

            function createDocument(preselectedFileType = '') {
                docCounter++;
                const div = document.createElement('div');
                div.className = 'bg-votum3 border-2 border-votum3 rounded-lg shadow-sm overflow-hidden';

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

                const content = document.createElement('div');
                content.className = 'p-4 space-y-4';

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
                fileInput.name = 'documents[]';
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

                const sectionWrapper = document.createElement('div');
                const sectionLabel = document.createElement('label');
                sectionLabel.className = 'block text-sm font-medium text-gray-700 mb-2';
                sectionLabel.textContent = 'Sekcia dokumentu:';
                sectionWrapper.appendChild(sectionLabel);

                const sectionRow = document.createElement('div');
                sectionRow.className = 'flex gap-2';
                const sectionSelect = document.createElement('select');
                sectionSelect.name = 'doc_section[]';
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
                newSectionInput.name = 'doc_section_new[]';
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
                docsWrapper.appendChild(div);
            }

            function createDocumentFromExisting(doc) {
                docCounter++;
                const div = document.createElement('div');
                div.className = 'bg-votum3 border-2 border-votum3 rounded-lg shadow-sm overflow-hidden';

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

                const content = document.createElement('div');
                content.className = 'p-4 space-y-4';

                // SK názov
                const nameSKWrapper = document.createElement('div');
                const labelSK = document.createElement('label');
                labelSK.className = 'block text-sm font-medium text-gray-700 mb-1';
                labelSK.textContent = 'SK – Názov dokumentu:';
                const inputSK = document.createElement('input');
                inputSK.type = 'text';
                inputSK.name = 'doc_name_sk[]';
                inputSK.value = doc.title_sk || '';
                inputSK.className = 'w-full border-2 border-gray-300 rounded-md px-3 py-2 bg-white';
                nameSKWrapper.appendChild(labelSK);
                nameSKWrapper.appendChild(inputSK);

                // EN názov
                const nameENWrapper = document.createElement('div');
                const labelEN = document.createElement('label');
                labelEN.className = 'block text-sm font-medium text-gray-700 mb-1';
                labelEN.textContent = 'EN – Názov dokumentu:';
                const inputEN = document.createElement('input');
                inputEN.type = 'text';
                inputEN.name = 'doc_name_en[]';
                inputEN.value = doc.title_en || '';
                inputEN.className = 'w-full border-2 border-gray-300 rounded-md px-3 py-2 bg-white';
                nameENWrapper.appendChild(labelEN);
                nameENWrapper.appendChild(inputEN);

                content.appendChild(nameSKWrapper);
                content.appendChild(nameENWrapper);

                // Link na existujúci súbor
                const fileInfo = document.createElement('div');
                fileInfo.className = 'text-sm text-gray-600 bg-gray-50 p-3 rounded-md border border-gray-300';
                const fileName = doc.url.split('/').pop();
                fileInfo.innerHTML = `
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-file-pdf text-red-600"></i>
                    <span>Aktuálny súbor: </span>
                    <a href="/storage/${doc.url}" target="_blank" class="text-blue-600 hover:underline font-medium">${fileName}</a>
                </div>
            `;
                content.appendChild(fileInfo);

                // Hidden input pre ID existujúceho dokumentu
                const hiddenId = document.createElement('input');
                hiddenId.type = 'hidden';
                hiddenId.name = 'existing_doc_ids[]';
                hiddenId.value = doc.id;
                content.appendChild(hiddenId);

                div.appendChild(content);
                docsWrapper.appendChild(div);
            }

            addDocBtn.addEventListener('click', () => createDocument());

            existingDocSelect.addEventListener('change', () => {
                const type = existingDocSelect.value;
                if(!type) return;
                createDocument(type);
                existingDocSelect.value = '';
            });

            // Načítanie existujúcich dokumentov
            if (isEdit && existingDocuments.length > 0) {
                existingDocuments.forEach(doc => createDocumentFromExisting(doc));
            }

            // ================= FARBY PRE KALENDÁR =================
            const eventColors = {
                'c1': '#FF0000', 'c2': '#FF7F00', 'c3': '#FFFF00', 'c4': '#00FF00',
                'c5': '#0000FF', 'c6': '#4B0082', 'c7': '#8B00FF', 'c8': '#FF1493',
            };

            const colorWrapper = document.getElementById('calendarColorWrapper');

            for (const [key, color] of Object.entries(eventColors)) {
                const label = document.createElement('label');
                label.className = 'cursor-pointer';

                const input = document.createElement('input');
                input.type = 'radio';
                input.name = 'calendarColor';
                input.value = key;
                input.className = 'hidden peer';
                if (existingColor === key) {
                    input.checked = true;
                }

                const circle = document.createElement('div');
                circle.className = 'w-10 h-10 rounded-full border-3 border-gray-300 transition-transform peer-checked:scale-110 peer-checked:border-black';
                circle.style.backgroundColor = color;

                label.appendChild(input);
                label.appendChild(circle);
                colorWrapper.appendChild(label);
            }

            const inCalendarCheckbox = document.getElementById('inCalendar');
            inCalendarCheckbox.addEventListener('change', () => {
                if (inCalendarCheckbox.checked) {
                    colorWrapper.classList.remove('hidden');
                } else {
                    colorWrapper.classList.add('hidden');
                }
            });

        });
    </script>

@endsection
