@extends('layouts.admin')

        @section('head')
            {{-- Quill CSS --}}
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <style>
            /* Vlastný styling pre Quill editory */
        .quill-wrapper {
        border: 2px solid #d1d5db;
        border-radius: 0.375rem;
        overflow: visible;
    }
        .quill-wrapper .ql-toolbar {
            border: none;
            border-bottom: 2px solid #d1d5db;
            background: #f9fafb;
        }
        .quill-wrapper .ql-container {
            border: none;
            min-height: 150px;
            font-size: 1rem;
            overflow: visible;
        }
        .quill-wrapper .ql-editor {
            min-height: 150px;
        }


        /* Custom URL Modal */
        .url-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            opacity: 0;
            transition: opacity 0.2s;
            pointer-events: none;
        }
        .url-modal-overlay.active {
            opacity: 1;
            pointer-events: all;
        }
        .url-modal {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            max-width: 500px;
            width: 90%;
            transform: scale(0.95);
            transition: transform 0.2s;
        }
        .url-modal-overlay.active .url-modal {
            transform: scale(1);
        }
</style>
@endsection

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
                      class="space-y-6"
                      id="addForm">
                    @csrf

                    {{-- NADPIS --}}
                    <div class="flex items-center bg-gray-100 -mt-6 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Názov sekcie
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block font-semibold text-gray-700 mb-2">
                                <span class="text-blue-600">SK</span> – Slovenský názov
                            </label>
                            <input type="text" name="sk[title]" required
                                   class="w-full border-2 border-gray-300 rounded-md px-3 py-2 focus:border-blue-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-700 mb-2">
                                <span class="text-blue-600">EN</span> – Anglický názov
                            </label>
                            <input type="text" name="en[title]" required
                                   class="w-full border-2 border-gray-300 rounded-md px-3 py-2 focus:border-blue-500 focus:outline-none">
                        </div>
                    </div>

                    {{-- TEXT --}}
                    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Text sekcie
                    </div>

                    <div class="space-y-4">
                        <div class="editor-group">
                            <label class="block font-semibold text-gray-700 mb-2">
                                <span class="text-blue-600">SK</span> – Slovenský text
                            </label>
                            <div class="quill-wrapper">
                                <div id="editor-new-sk"></div>
                            </div>
                            <textarea name="sk[content]" id="content-new-sk" required class="hidden"></textarea>
                        </div>

                        <div class="editor-group">
                            <label class="block font-semibold text-gray-700 mb-2">
                                <span class="text-blue-600">EN</span> – Anglický text
                            </label>
                            <div class="quill-wrapper">
                                <div id="editor-new-en"></div>
                            </div>
                            <textarea name="en[content]" id="content-new-en" required class="hidden"></textarea>
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

                        <label class="px-4 py-2 border-2 border-blue-950 rounded-md cursor-pointer hover:bg-blue-50">
                            Nahrať
                            <input type="file" name="image" accept="image/*" class="hidden"
                                   onchange="onNewImage(this)">
                        </label>

                        <button type="button" id="removeNewBtn"
                                onclick="removeNewImage()"
                                class="hidden px-4 py-2 border-2 border-red-600 text-red-600 rounded-md hover:bg-red-50">
                            Odstrániť
                        </button>
                    </div>

                    <input type="hidden" name="remove_image" id="removeNewFlag" value="0">

                    {{-- ALT --}}
                    <div id="newAltWrapper" class="hidden">
                        <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Alternatívny text obrázka <x-InfoTooltip typ="alt"/>
                        </div>

                        <div class="space-y-3 mt-6">
                            <div class="flex flex-col gap-1">
                                <label class="font-semibold text-gray-700">
                                    <span class="text-blue-600">SK</span> – Slovenský alternatívny text
                                </label>
                                <textarea name="image_alt_sk" rows="3"
                                          class="w-full border-2 border-gray-300 rounded-md px-3 py-2"></textarea>
                            </div>

                            <div class="flex flex-col gap-1">
                                <label class="font-semibold text-gray-700">
                                    <span class="text-blue-600">EN</span> – Anglický alternatívny text
                                </label>
                                <textarea name="image_alt_en" rows="3"
                                          class="w-full border-2 border-gray-300 rounded-md px-3 py-2"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="flex justify-end gap-3">
                        <button type="submit" class="bg-green-200 border-2 border-green-900 text-green-900 px-6 py-2 rounded-md font-semibold hover:bg-green-300">
                            Pridať sekciu
                        </button>
                        <button type="button" id="cancelAddForm" class="border-2 border-gray-400 px-6 py-2 rounded-md hover:bg-gray-100">
                            Zrušiť
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
                        <th class="px-6 py-3 text-start">Poradie</th>
                        <th class="px-6 py-3 text-start">Názov</th>
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
                                      class="bg-white border rounded-md p-6 space-y-6"
                                      id="editForm-{{ $item->id }}">
                                    @csrf
                                    @method('PUT')

                                    {{-- NADPIS --}}
                                    <div class="bg-gray-100 -mx-6 -mt-6 px-6 py-2 font-medium text-blue-950 rounded-t-md">
                                        Upraviť názov sekcie
                                    </div>

                                    <div class="space-y-4">
                                        <div>
                                            <label class="block font-semibold text-gray-700 mb-2">
                                                <span class="text-blue-600">SK</span> – Slovenský názov
                                            </label>
                                            <input name="title_sk" required value="{{ $item->title_sk }}"
                                                   class="w-full border-2 border-gray-300 rounded-md px-3 py-2 focus:border-blue-500 focus:outline-none">
                                        </div>
                                        <div>
                                            <label class="block font-semibold text-gray-700 mb-2">
                                                <span class="text-blue-600">EN</span> – Anglický názov
                                            </label>
                                            <input name="title_en" required value="{{ $item->title_en }}"
                                                   class="w-full border-2 border-gray-300 rounded-md px-3 py-2 focus:border-blue-500 focus:outline-none">
                                        </div>
                                    </div>

                                    {{-- TEXT --}}
                                    <div class="bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                                        Upraviť text sekcie
                                    </div>

                                    <div class="space-y-4">
                                        <div class="editor-group">
                                            <label class="block font-semibold text-gray-700 mb-2">
                                                <span class="text-blue-600">SK</span> – Slovenský text
                                            </label>
                                            <div class="quill-wrapper">
                                                <div id="editor-edit-{{ $item->id }}-sk"></div>
                                            </div>
                                            <textarea name="content_sk" id="content-edit-{{ $item->id }}-sk" required class="hidden">{{ $item->content_sk }}</textarea>
                                        </div>

                                        <div class="editor-group">
                                            <label class="block font-semibold text-gray-700 mb-2">
                                                <span class="text-blue-600">EN</span> – Anglický text
                                            </label>
                                            <div class="quill-wrapper">
                                                <div id="editor-edit-{{ $item->id }}-en"></div>
                                            </div>
                                            <textarea name="content_en" id="content-edit-{{ $item->id }}-en" required class="hidden">{{ $item->content_en }}</textarea>
                                        </div>
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

                                        <label class="px-4 py-2 border-2 border-blue-950 rounded-md cursor-pointer hover:bg-blue-50">
                                            Nahrať
                                            <input type="file"
                                                   name="image"
                                                   accept="image/*"
                                                   class="hidden"
                                                   onchange="onEditImage(this, {{ $item->id }})">
                                        </label>

                                        <button type="button"
                                                onclick="removeEditImage({{ $item->id }})"
                                                class="px-4 py-2 border-2 border-red-600 text-red-600 rounded-md hover:bg-red-50 {{ $item->image ? '' : 'hidden' }}"
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

                                        <div class="space-y-3  mt-6">
                                            <div class="flex flex-col gap-1">
                                                <label class="font-semibold text-gray-700">
                                                    <span class="text-blue-600">SK</span> – Slovenský alternatívny text
                                                </label>
                                                <textarea name="image_alt_sk" rows="3"
                                                          class="w-full border-2 border-gray-300 rounded-md px-3 py-2">{{ old('image_alt_sk', $item->image?->alt_sk) }}</textarea>
                                            </div>

                                            <div class="flex flex-col gap-1">
                                                <label class="font-semibold text-gray-700">
                                                    <span class="text-blue-600">EN</span> – Anglický alternatívny text
                                                </label>
                                                <textarea name="image_alt_en" rows="3"
                                                          class="w-full border-2 border-gray-300 rounded-md px-3 py-2">{{ old('image_alt_en', $item->image?->alt_en) }}</textarea>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- TLAČIDLÁ --}}
                                    <div class="flex justify-end gap-3">
                                        <button type="submit" class="bg-blue-200 border-2 border-blue-900 px-6 py-2 rounded-md font-semibold hover:bg-blue-300">
                                            Uložiť
                                        </button>
                                        <button type="button" class="close-edit border-2 border-gray-400 px-6 py-2 rounded-md hover:bg-gray-100" data-id="{{ $item->id }}">
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

    {{-- Custom URL Modal --}}
    <div id="urlModal" class="url-modal-overlay">
        <div class="url-modal">
            <div class="bg-blue-950 text-white px-6 py-4 rounded-t-md">
                <h3 class="text-lg font-semibold">Pridať odkaz</h3>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        URL adresa
                    </label>
                    <input type="text"
                           id="urlInput"
                           placeholder="napr. google.com alebo https://example.com"
                           class="w-full border-2 border-gray-300 rounded-md px-3 py-2 focus:border-blue-500 focus:outline-none">
                    <p class="text-xs text-gray-500 mt-1">Ak nezadáte https://, bude pridané automaticky</p>
                </div>
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button"
                            id="urlCancel"
                            class="border-2 border-gray-400 px-6 py-2 rounded-md hover:bg-gray-100">
                        Zrušiť
                    </button>
                    <button type="button"
                            id="urlConfirm"
                            class="bg-blue-200 border-2 border-blue-900 text-blue-900 px-6 py-2 rounded-md font-semibold hover:bg-blue-300">
                        Pridať odkaz
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Quill JS --}}
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    {{-- JS --}}
    <script>
        // Konfigurácia toolbaru
        const toolbarOptions = [
            [{ 'header': [1, 2, 3, false] }],
            ['bold', 'italic', 'underline'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            ['link']
        ];

        // Custom URL Modal handling
        let currentQuillInstance = null;
        let currentLinkRange = null;

        function showUrlModal(quill, range) {
            currentQuillInstance = quill;
            currentLinkRange = range;

            const modal = document.getElementById('urlModal');
            const input = document.getElementById('urlInput');

            // Ak už existuje link, načítaj jeho hodnotu
            const format = quill.getFormat(range);
            if (format.link) {
                input.value = format.link;
            } else {
                input.value = '';
            }

            modal.classList.add('active');
            input.focus();
        }

        function hideUrlModal() {
            const modal = document.getElementById('urlModal');
            modal.classList.remove('active');
            currentQuillInstance = null;
            currentLinkRange = null;
            document.getElementById('urlInput').value = '';
        }

        function confirmUrl() {
            const input = document.getElementById('urlInput');
            let href = input.value.trim();

            if (href && currentQuillInstance && currentLinkRange) {
                // Pridaj https:// ak chýba protokol
                if (!href.match(/^https?:\/\//i) && !href.match(/^mailto:/i)) {
                    href = 'https://' + href;
                }

                currentQuillInstance.format('link', href);

                // Nastav target="_blank" na práve vytvorený link
                setTimeout(() => {
                    const links = currentQuillInstance.root.querySelectorAll('a');
                    links.forEach(link => {
                        link.setAttribute('target', '_blank');
                        link.setAttribute('rel', 'noopener noreferrer');
                    });
                }, 10);
            }

            hideUrlModal();
        }

        // Event listeners pre modal
        document.getElementById('urlCancel').addEventListener('click', hideUrlModal);
        document.getElementById('urlConfirm').addEventListener('click', confirmUrl);

        // Enter pre potvrdenie, Escape pre zrušenie
        document.getElementById('urlInput').addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                confirmUrl();
            } else if (e.key === 'Escape') {
                hideUrlModal();
            }
        });

        // Zatvor modal pri kliknutí mimo neho
        document.getElementById('urlModal').addEventListener('click', (e) => {
            if (e.target.id === 'urlModal') {
                hideUrlModal();
            }
        });

        // Funkcia na zablokovanie paste obrázkov do Quill
        function preventImagePaste(quill) {
            quill.clipboard.addMatcher('IMG', function() {
                return { ops: [] };
            });
        }

        // Funkcia na opravu odkazov - pridá https:// a target="_blank"
        function fixLinks(quill) {
            quill.on('text-change', function(delta, oldDelta, source) {
                if (source === 'user') {
                    const links = quill.root.querySelectorAll('a');
                    links.forEach(link => {
                        let href = link.getAttribute('href');

                        // Ak URL nezačína protokolom, pridaj https://
                        if (href && !href.match(/^https?:\/\//i) && !href.match(/^mailto:/i)) {
                            link.setAttribute('href', 'https://' + href);
                        }

                        // Pridaj target="_blank" pre všetky odkazy
                        link.setAttribute('target', '_blank');
                        link.setAttribute('rel', 'noopener noreferrer');
                    });
                }
            });

            // Pri pridávaní odkazu cez toolbar zobraz custom modal
            const toolbar = quill.getModule('toolbar');
            if (toolbar) {
                toolbar.addHandler('link', function(value) {
                    if (!value) {
                        quill.format('link', false);
                        return;
                    }

                    isUserLinkAction = true;

                    const range = quill.getSelection();
                    if (range && range.length > 0) {
                        showUrlModal(quill, range);
                    }

                    // reset flag po ticku
                    setTimeout(() => {
                        isUserLinkAction = false;
                    }, 0);
                });
            }
        }

        // Globálne úložisko editorov
        let quillEditors = {};
        let currentOpenEdit = null;

        // ========== ADD FORM ==========
        let addFormEditors = null;

        // Funkcia na zatvorenie add formulára
        function closeAddForm() {
            const form = document.getElementById('addAboutForm');
            form.classList.add('hidden');

            document.getElementById('addForm').reset();

            if (addFormEditors) {
                addFormEditors.sk.setText('');
                addFormEditors.en.setText('');
            }

            removeNewImage();
        }

        document.getElementById('toggleAddForm').addEventListener('click', () => {
            const form = document.getElementById('addAboutForm');
            const isHidden = form.classList.contains('hidden');

            document.querySelectorAll('[id^="edit-row-"]').forEach(r => {
                r.classList.add('hidden');
            });
            currentOpenEdit = null;

            form.classList.toggle('hidden');

            if (isHidden && !addFormEditors) {
                addFormEditors = {
                    sk: new Quill('#editor-new-sk', {
                        theme: 'snow',
                        modules: { toolbar: toolbarOptions }
                    }),
                    en: new Quill('#editor-new-en', {
                        theme: 'snow',
                        modules: { toolbar: toolbarOptions }
                    })
                };

                preventImagePaste(addFormEditors.sk);
                preventImagePaste(addFormEditors.en);
                fixLinks(addFormEditors.sk);
                fixLinks(addFormEditors.en);
            }
        });

        document.getElementById('cancelAddForm').addEventListener('click', closeAddForm);

        document.getElementById('addForm').addEventListener('submit', function(e) {
            if (addFormEditors) {
                document.getElementById('content-new-sk').value = addFormEditors.sk.root.innerHTML;
                document.getElementById('content-new-en').value = addFormEditors.en.root.innerHTML;
            }
        });
        // ========== EDIT FORMS ==========
        function initEditEditors(id) {
            if (!quillEditors[id]) {
                const textareaSk = document.getElementById(`content-edit-${id}-sk`);
                const textareaEn = document.getElementById(`content-edit-${id}-en`);

                const contentSk = textareaSk.value;
                const contentEn = textareaEn.value;

                // Uložíme pôvodné hodnoty pre reset
                if (!textareaSk.defaultValue) textareaSk.defaultValue = contentSk;
                if (!textareaEn.defaultValue) textareaEn.defaultValue = contentEn;

                quillEditors[id] = {
                    sk: new Quill(`#editor-edit-${id}-sk`, {
                        theme: 'snow',
                        modules: { toolbar: toolbarOptions }
                    }),
                    en: new Quill(`#editor-edit-${id}-en`, {
                        theme: 'snow',
                        modules: { toolbar: toolbarOptions }
                    })
                };

                // Zablokuj paste obrázkov
                preventImagePaste(quillEditors[id].sk);
                preventImagePaste(quillEditors[id].en);

                // Pridaj fixLinks pre oba editory
                fixLinks(quillEditors[id].sk);
                fixLinks(quillEditors[id].en);

                // Nastav existujúci obsah - použijeme clipboard API pre správne parsovanie HTML
                if (contentSk && contentSk.trim()) {
                    quillEditors[id].sk.clipboard.dangerouslyPasteHTML(contentSk);
                }
                if (contentEn && contentEn.trim()) {
                    quillEditors[id].en.clipboard.dangerouslyPasteHTML(contentEn);
                }
            }
        }

        function destroyEditEditors(id) {
            if (quillEditors[id]) {
                delete quillEditors[id];
            }
        }

        // Toggle edit - zatvorí ostatné, otvorí kliknutý
        document.querySelectorAll('.toggle-edit').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                const row = document.getElementById(`edit-row-${id}`);
                const wasHidden = row.classList.contains('hidden');

                // Zatvor add formulár ak je otvorený
                const addForm = document.getElementById('addAboutForm');
                if (!addForm.classList.contains('hidden')) {
                    closeAddForm();
                }

                // Zatvor všetky ostatné edit riadky
                document.querySelectorAll('[id^="edit-row-"]').forEach(r => {
                    if (r.id !== `edit-row-${id}`) {
                        r.classList.add('hidden');
                    }
                });

                // Toggle current
                row.classList.toggle('hidden');

                if (wasHidden) {
                    // Otvárame - inicializuj editory
                    currentOpenEdit = id;
                    initEditEditors(id);
                } else {
                    // Zatvárame
                    currentOpenEdit = null;
                }
            });
        });

        // Close edit button - obnoví pôvodné hodnoty
        document.querySelectorAll('.close-edit').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                const row = document.getElementById(`edit-row-${id}`);

                // Zatvor riadok
                row.classList.add('hidden');
                currentOpenEdit = null;

                // Obnovíme pôvodné hodnoty z hidden textarea
                if (quillEditors[id]) {
                    const originalSk = document.getElementById(`content-edit-${id}-sk`).defaultValue || document.getElementById(`content-edit-${id}-sk`).getAttribute('data-original');
                    const originalEn = document.getElementById(`content-edit-${id}-en`).defaultValue || document.getElementById(`content-edit-${id}-en`).getAttribute('data-original');

                    if (originalSk) {
                        quillEditors[id].sk.clipboard.dangerouslyPasteHTML(originalSk);
                    }
                    if (originalEn) {
                        quillEditors[id].en.clipboard.dangerouslyPasteHTML(originalEn);
                    }
                }

                // Reset formulára (obnoví titulky a ostatné inputy)
                document.getElementById(`editForm-${id}`).reset();
            });
        });

        // Pred submitom edit formu skopíruj obsah
        document.querySelectorAll('[id^="editForm-"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                const id = this.id.replace('editForm-', '');
                if (quillEditors[id]) {
                    document.getElementById(`content-edit-${id}-sk`).value = quillEditors[id].sk.root.innerHTML;
                    document.getElementById(`content-edit-${id}-en`).value = quillEditors[id].en.root.innerHTML;
                }
            });
        });

        // ========== IMAGE HANDLING ==========
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
