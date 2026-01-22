@extends('layouts.admin')

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

        ['urlCancel', 'urlConfirm', 'urlInput', 'urlModal'].forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                if (id === 'urlCancel') el.addEventListener('click', hideUrlModal);
                if (id === 'urlConfirm') el.addEventListener('click', confirmUrl);
                if (id === 'urlInput') {
                    el.addEventListener('keydown', e => {
                        if (e.key === 'Enter') { e.preventDefault(); confirmUrl(); }
                        else if (e.key === 'Escape') hideUrlModal();
                    });
                }
                if (id === 'urlModal') {
                    el.addEventListener('click', e => {
                        if (e.target.id === 'urlModal') hideUrlModal();
                    });
                }
            }
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
                    if (!value) { quill.format('link', false); return; }
                    const range = quill.getSelection();
                    if (range && range.length > 0) showUrlModal(quill, range);
                });
            }
        }

        // ========== GLOBÁLNE PREMENNÉ ==========
        let quillEditors = {};
        let addFormEditors = null;
        let currentOpenEdit = null;
        const isHistory = {{ $category === 'history' ? 'true' : 'false' }};

        // ========== ADD FORM SUBMIT - HLAVNÝ FIX ==========
        function handleAddFormSubmit(e) {
            console.log('=== ADD FORM SUBMIT ===');
            e.preventDefault(); // ZASTAV DEFAULT PRE DEBUG

            // 1. Nájdi hidden polia
            const skContentField = document.getElementById('content-new-sk') ||
                document.querySelector('input[name="sk[content]"], input[name="sk.content"]');
            const enContentField = document.getElementById('content-new-en') ||
                document.querySelector('input[name="en[content]"], input[name="en.content"]');
            const skTitleField = document.querySelector('input[name="sk[title]"], input[name="sk.title"]');
            const enTitleField = document.querySelector('input[name="en[title]"], input[name="en.title"]');

            console.log('Polia:', { skContent: skContentField, enContent: enContentField, skTitle: skTitleField, enTitle: enTitleField });

            // 2. Prepíš Quill obsah
            if (addFormEditors && skContentField && enContentField) {
                const skContent = addFormEditors.sk.root.innerHTML.trim();
                const enContent = addFormEditors.en.root.innerHTML.trim();

                console.log('Quill obsah:', { sk: skContent.substring(0, 100), en: enContent.substring(0, 100) });

                skContentField.value = skContent;
                enContentField.value = enContent;

                // 3. Validácia
                if (!skContent || !enContent || !skTitleField?.value.trim() || !enTitleField?.value.trim()) {
                    alert('Vyplňte všetky povinné polia (tituly + obsah)!');
                    return false;
                }
            }

            // 4. Odešli formulár
            console.log('Odosielam formulár...');
            e.target.submit();
        }

        // ========== IMAGE HANDLING ==========
        function onNewImage(input) {
            if (!input.files?.[0]) return;
            const filenameEl = document.getElementById('newImageFilename');
            if (filenameEl) filenameEl.textContent = input.files[0].name;
            const altWrapper = document.getElementById('newAltWrapper');
            const removeBtn = document.getElementById('removeNewBtn');
            if (altWrapper) altWrapper.classList.remove('hidden');
            if (removeBtn) removeBtn.classList.remove('hidden');
            document.querySelectorAll('#newAltWrapper textarea').forEach(t => t.setAttribute('required', 'required'));
        }

        function removeNewImage() {
            const fileInput = document.querySelector('#addForm input[name="image"]');
            if (fileInput) fileInput.value = '';
            const filenameEl = document.getElementById('newImageFilename');
            if (filenameEl) filenameEl.textContent = '— žiadny obrázok —';
            const altWrapper = document.getElementById('newAltWrapper');
            const removeBtn = document.getElementById('removeNewBtn');
            if (altWrapper) altWrapper.classList.add('hidden');
            if (removeBtn) removeBtn.classList.add('hidden');
            document.querySelectorAll('#newAltWrapper textarea').forEach(t => t.removeAttribute('required'));
        }

        // ========== ADD FORM FUNCTIONS ==========
        function openAddForm() {
            const formWrapper = document.getElementById('addFormWrapper');
            if (!formWrapper) return;
            formWrapper.style.display = 'block';
        }

        function closeAddForm() {
            const formWrapper = document.getElementById('addFormWrapper');
            if (!formWrapper) return;
            formWrapper.style.display = 'none';

            const addForm = document.getElementById('addForm');
            if (addForm) addForm.reset();

            if (addFormEditors) {
                addFormEditors.sk.setText('');
                addFormEditors.en.setText('');
                addFormEditors = null;
            }
            removeNewImage();
        }

        // Toggle add form
        const toggleBtn = document.getElementById('toggleAddFormBtn');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', () => {
                const formWrapper = document.getElementById('addFormWrapper');
                if (!formWrapper) return;

                const isHidden = getComputedStyle(formWrapper).display === 'none';
                if (isHidden) {
                    openAddForm();

                    // Inicializuj Quill LEN AK NEEXISTUJE
                    if (!addFormEditors && !isHistory) {
                        setTimeout(() => {
                            const skContainer = document.getElementById('editor-new-sk');
                            const enContainer = document.getElementById('editor-new-en');

                            if (skContainer && enContainer && !skContainer.__quill) {
                                console.log('Inicializujem nové Quill editory');
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
                        }, 200);
                    }
                } else {
                    closeAddForm();
                }
            });
        }

        const cancelBtn = document.getElementById('cancelAddForm');
        if (cancelBtn) cancelBtn.addEventListener('click', closeAddForm);

        // ADD FORM SUBMIT - NASTAV LISTENER LEN RAZ
        const addForm = document.getElementById('addForm');
        if (addForm && !addForm.hasAttribute('data-submit-handler')) {
            addForm.setAttribute('data-submit-handler', 'true');
            addForm.addEventListener('submit', handleAddFormSubmit);
        }

        // Image listeners
        document.addEventListener('change', e => {
            if (e.target.matches('#addForm input[name="image"]')) onNewImage(e.target);
        });

        // ========== EDIT FORMS (zostáva rovnaké) ==========
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
                sk: new Quill(`#editor-edit-${id}-sk`, { theme: 'snow', modules: { toolbar: toolbarOptions } }),
                en: new Quill(`#editor-edit-${id}-en`, { theme: 'snow', modules: { toolbar: toolbarOptions } })
            };

            preventImagePaste(quillEditors[id].sk);
            preventImagePaste(quillEditors[id].en);
            fixLinks(quillEditors[id].sk);
            fixLinks(quillEditors[id].en);

            if (contentSk?.trim()) quillEditors[id].sk.clipboard.dangerouslyPasteHTML(contentSk);
            if (contentEn?.trim()) quillEditors[id].en.clipboard.dangerouslyPasteHTML(contentEn);
        }

        // Ostatné edit funkcie zostávajú rovnaké...
        document.querySelectorAll('.toggle-edit').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                const row = document.getElementById(`edit-row-${id}`);
                const wasHidden = row.classList.contains('hidden');

                const addFormWrapper = document.getElementById('addFormWrapper');
                if (addFormWrapper && getComputedStyle(addFormWrapper).display !== 'none') {
                    closeAddForm();
                }

                document.querySelectorAll('[id^="edit-row-"]').forEach(r => {
                    if (r.id !== `edit-row-${id}`) r.classList.add('hidden');
                });

                row.classList.toggle('hidden');
                if (wasHidden) {
                    currentOpenEdit = id;
                    if (!isHistory) setTimeout(() => initEditEditors(id), 200);
                } else {
                    currentOpenEdit = null;
                }
            });
        });

        document.querySelectorAll('.close-edit').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                const row = document.getElementById(`edit-row-${id}`);
                row.classList.add('hidden');
                currentOpenEdit = null;

                if (quillEditors[id]) {
                    const originalSk = document.getElementById(`content-edit-${id}-sk`)?.defaultValue;
                    const originalEn = document.getElementById(`content-edit-${id}-en`)?.defaultValue;
                    if (originalSk) quillEditors[id].sk.clipboard.dangerouslyPasteHTML(originalSk);
                    if (originalEn) quillEditors[id].en.clipboard.dangerouslyPasteHTML(originalEn);
                }
                document.getElementById(`editForm-${id}`)?.reset();
            });
        });

        document.querySelectorAll('[id^="editForm-"]').forEach(form => {
            form.addEventListener('submit', function() {
                const id = this.id.replace('editForm-', '');
                if (quillEditors[id]) {
                    const skField = document.getElementById(`content-edit-${id}-sk`);
                    const enField = document.getElementById(`content-edit-${id}-en`);
                    if (skField) skField.value = quillEditors[id].sk.root.innerHTML;
                    if (enField) enField.value = quillEditors[id].en.root.innerHTML;
                }
            });
        });

        console.log('Script načítaný úspešne');
    </script>

@endsection
