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
    <div class="min-h-[calc(100vh-5.5rem)] bg-gray-100 px-4 py-10 flex justify-center">
        <div class="w-full max-w-5xl space-y-10">

            <h1 class="text-3xl font-bold text-blue-950 text-center">
                Úprava stránky – {{ $title }}
            </h1>

            <x-admin.new-section
                :category="$category"
                :title="$title"
            />

            <x-admin.section-table
                :items="$items"
                :title="$title"
                :showYear="$category === 'history'"
            />

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

    <script>
        // ================= TOOLBAR =================
        const toolbarOptions = [
            [{ header: [1, 2, 3, false] }],
            ['bold', 'italic', 'underline'],
            [{ list: 'ordered' }, { list: 'bullet' }],
            ['link']
        ];

        // ================= LINK MODAL =================
        let currentQuillInstance = null;
        let currentLinkRange = null;

        function showUrlModal(quill, range) {
            currentQuillInstance = quill;
            currentLinkRange = range;
            const modal = document.getElementById('urlModal');
            const input = document.getElementById('urlInput');
            const format = quill.getFormat(range);
            input.value = format.link ?? '';
            modal.classList.add('active');
            input.focus();
        }

        function hideUrlModal() {
            document.getElementById('urlModal').classList.remove('active');
            document.getElementById('urlInput').value = '';
            currentQuillInstance = null;
            currentLinkRange = null;
        }

        function confirmUrl() {
            const input = document.getElementById('urlInput');
            let href = input.value.trim();
            if (href && currentQuillInstance && currentLinkRange) {
                if (!href.match(/^https?:\/\//i) && !href.match(/^mailto:/i)) {
                    href = 'https://' + href;
                }
                currentQuillInstance.format('link', href);
                setTimeout(() => {
                    currentQuillInstance.root.querySelectorAll('a').forEach(link => {
                        link.setAttribute('target', '_blank');
                        link.setAttribute('rel', 'noopener noreferrer');
                    });
                }, 10);
            }
            hideUrlModal();
        }

        document.getElementById('urlCancel')?.addEventListener('click', hideUrlModal);
        document.getElementById('urlConfirm')?.addEventListener('click', confirmUrl);
        document.getElementById('urlInput')?.addEventListener('keydown', e => {
            if (e.key === 'Enter') {
                e.preventDefault();
                confirmUrl();
            } else if (e.key === 'Escape') {
                hideUrlModal();
            }
        });
        document.getElementById('urlModal')?.addEventListener('click', e => {
            if (e.target.id === 'urlModal') hideUrlModal();
        });

        // ================= HELPERS =================
        function preventImagePaste(quill) {
            quill.clipboard.addMatcher('IMG', () => ({ ops: [] }));
        }

        function fixLinks(quill) {
            quill.on('text-change', (delta, oldDelta, source) => {
                if (source !== 'user') return;
                quill.root.querySelectorAll('a').forEach(link => {
                    let href = link.getAttribute('href');
                    if (href && !href.match(/^https?:\/\//i) && !href.match(/^mailto:/i)) {
                        link.setAttribute('href', 'https://' + href);
                    }
                    link.setAttribute('target', '_blank');
                    link.setAttribute('rel', 'noopener noreferrer');
                });
            });
            const toolbar = quill.getModule('toolbar');
            if (toolbar) {
                toolbar.addHandler('link', value => {
                    if (!value) {
                        quill.format('link', false);
                        return;
                    }
                    const range = quill.getSelection();
                    if (range && range.length > 0) {
                        showUrlModal(quill, range);
                    }
                });
            }
        }

        // ========== GLOBÁLNE PREMENNÉ ==========
        let quillEditors = {};
        let addFormEditors = null;
        let currentOpenEdit = null;
        const isHistory = {{ $category === 'history' ? 'true' : 'false' }};

        // ========== IMAGE HANDLING ==========
        function onNewImage(input) {
            if (!input.files || !input.files[0]) return;
            document.getElementById('newImageFilename').value = input.files[0].name;
            document.getElementById('newAltWrapper').classList.remove('hidden');
            document.getElementById('removeNewBtn').classList.remove('hidden');
            document.querySelectorAll('#newAltWrapper textarea').forEach(t => t.setAttribute('required', 'required'));
        }

        function removeNewImage() {
            const fileInput = document.querySelector('#addForm input[name="image"]');
            if (fileInput) fileInput.value = '';
            document.getElementById('newImageFilename').value = '— žiadny obrázok —';
            document.getElementById('newAltWrapper').classList.add('hidden');
            document.getElementById('removeNewBtn').classList.add('hidden');
            document.querySelectorAll('#newAltWrapper textarea').forEach(t => t.removeAttribute('required'));
        }

        function onEditImage(input, id) {
            if (!input.files || !input.files.length) return;
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

        // ========== ADD FORM ==========
        function openAddForm() {
            const form = document.getElementById('addFormWrapper');
            if (!form) return;

            form.style.display = 'block';
        }

        function closeAddForm() {
            const form = document.getElementById('addFormWrapper');
            if (!form) return;

            form.style.display = 'none';
            document.getElementById('addForm')?.reset();

            if (addFormEditors) {
                addFormEditors.sk.setText('');
                addFormEditors.en.setText('');
            }

            removeNewImage();
        }

        document.getElementById('toggleAddFormBtn')?.addEventListener('click', () => {
            const form = document.getElementById('addFormWrapper');
            if (!form) return;

            const isHidden = getComputedStyle(form).display === 'none';

            if (isHidden) {
                openAddForm();

                if (!addFormEditors && !isHistory) {
                    setTimeout(() => {
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
                    }, 0);
                }
            } else {
                closeAddForm();
            }
        });

        document.getElementById('cancelAddForm')?.addEventListener('click', closeAddForm);

        document.getElementById('addForm')?.addEventListener('submit', function () {
            if (addFormEditors) {
                document.getElementById('content-new-sk').value =
                    addFormEditors.sk.root.innerHTML;
                document.getElementById('content-new-en').value =
                    addFormEditors.en.root.innerHTML;
            }
        });


        // ========== EDIT FORMS ==========
        function initEditEditors(id) {
            if (quillEditors[id]) return;

            const textareaSk = document.getElementById(`content-edit-${id}-sk`);
            const textareaEn = document.getElementById(`content-edit-${id}-en`);
            if (!textareaSk || !textareaEn) return;

            const contentSk = textareaSk.value;
            const contentEn = textareaEn.value;

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

            preventImagePaste(quillEditors[id].sk);
            preventImagePaste(quillEditors[id].en);
            fixLinks(quillEditors[id].sk);
            fixLinks(quillEditors[id].en);

            if (contentSk?.trim()) {
                quillEditors[id].sk.clipboard.dangerouslyPasteHTML(contentSk);
            }
            if (contentEn?.trim()) {
                quillEditors[id].en.clipboard.dangerouslyPasteHTML(contentEn);
            }
        }

        // Toggle edit - zatvorí ostatné, otvorí kliknutý
        document.querySelectorAll('.toggle-edit').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                const row = document.getElementById(`edit-row-${id}`);
                const wasHidden = row.classList.contains('hidden');

                // Zatvor add formulár ak je otvorený
                const addForm = document.getElementById('addFormWrapper');
                if (addForm && !addForm.classList.contains('hidden')) {
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
                    // Otvárame - inicializuj editory len ak nie je history
                    currentOpenEdit = id;
                    if (!isHistory) {
                        initEditEditors(id);
                    }
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

                row.classList.add('hidden');
                currentOpenEdit = null;

                if (quillEditors[id]) {
                    const originalSk = document.getElementById(`content-edit-${id}-sk`)?.defaultValue;
                    const originalEn = document.getElementById(`content-edit-${id}-en`)?.defaultValue;

                    if (originalSk) {
                        quillEditors[id].sk.clipboard.dangerouslyPasteHTML(originalSk);
                    }
                    if (originalEn) {
                        quillEditors[id].en.clipboard.dangerouslyPasteHTML(originalEn);
                    }
                }

                document.getElementById(`editForm-${id}`)?.reset();
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
    </script>
@endsection
