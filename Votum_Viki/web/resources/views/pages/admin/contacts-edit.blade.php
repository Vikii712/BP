@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] pt-20 bg-gray-100 px-4 py-10">
        <div class="max-w-6xl mx-auto space-y-10">

            <h1 class="text-3xl font-bold text-blue-950 text-center">
                Úprava kontaktov
            </h1>

            @if(session('success'))
                <div class="mb-4 rounded-md bg-green-100 border border-green-400 text-green-900 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Renderovanie každej sekcie cez komponent --}}
            @foreach ($sections as $sectionKey => $sectionItems)
                <x-admin.contact-section
                    :category="$sectionKey"
                    :sections="$sectionItems" />
            @endforeach

        </div>
    </div>

    {{-- QUILL --}}
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        // ================= QUILL OPTIONS =================
        const quillOptions = {
            theme: 'snow',
            modules: { toolbar: false }
        };

        function preventImagePaste(quill) {
            quill.clipboard.addMatcher('IMG', () => ({ ops: [] }));
        }

        function fixLinks(quill) {
            quill.on('text-change', () => {
                quill.root.querySelectorAll('a').forEach(link => {
                    let href = link.getAttribute('href');
                    if (href && !href.match(/^https?:\/\//i)) {
                        link.setAttribute('href', 'https://' + href);
                    }
                    link.setAttribute('target', '_blank');
                    link.setAttribute('rel', 'noopener noreferrer');
                });
            });
        }

        // ================= INIT EXISTUJÚCICH =================
        document.querySelectorAll('[data-quill]').forEach(el => {
            const textarea = document.getElementById(el.dataset.textarea);
            const quill = new Quill(el, quillOptions);

            preventImagePaste(quill);
            fixLinks(quill);

            if (textarea?.value?.trim()) {
                quill.clipboard.dangerouslyPasteHTML(textarea.value);
            }

            quill.on('text-change', () => {
                textarea.value = quill.root.innerHTML;
            });
        });

        // ================= ADD SECTION =================
        function addSection(category) {
            const form = document.querySelector(`form[data-category="${category}"]`);
            if (!form) {
                console.warn('Form not found for category:', category);
                return;
            }

            const anchor = form.querySelector('.sections-anchor');
            if (!anchor) {
                console.warn('Anchor (.sections-anchor) not found');
                return;
            }

            const sections = form.querySelectorAll('.bg-white.border');
            const index = sections.length;

            const newSection = document.createElement('div');
            newSection.className = 'bg-white border border-gray-200 rounded-md p-4 shadow-sm space-y-4';

            newSection.innerHTML = `
            <input type="hidden" name="sk[${index}][_delete]" value="0">

            <div class="flex justify-end">
                <button type="button"
                        class="text-red-600 hover:text-red-800 hover:border-red-800 hover:bg-red-100 px-4 py-2 border-2 border-red-600 rounded-md"
                        onclick="markForDelete(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>

            <div class="w-full font-bold text-blue-950 text-lg">Názov</div>

            <div class="flex gap-3">
                <span class="w-10 font-semibold text-gray-700 pt-2">SK –</span>
                <div class="flex-1">
                    <div class="quill-wrapper" data-quill data-textarea="title-sk-${category}-${index}"></div>
                    <textarea name="sk[${index}][title]" id="title-sk-${category}-${index}" class="hidden"></textarea>
                </div>
            </div>

            <div class="flex gap-3">
                <span class="w-10 font-semibold text-gray-700 pt-2">EN –</span>
                <div class="flex-1">
                    <div class="quill-wrapper" data-quill data-textarea="title-en-${category}-${index}"></div>
                    <textarea name="en[${index}][title]" id="title-en-${category}-${index}" class="hidden"></textarea>
                </div>
            </div>

            <div class="w-full font-bold text-blue-950 text-lg">Obsah</div>

            <div class="flex gap-3">
                <span class="w-10 font-semibold text-gray-700 pt-2">SK –</span>
                <div class="flex-1">
                    <div class="quill-wrapper" data-quill data-textarea="content-sk-${category}-${index}"></div>
                    <textarea name="sk[${index}][content]" id="content-sk-${category}-${index}" class="hidden"></textarea>
                </div>
            </div>

            <div class="flex gap-3">
                <span class="w-10 font-semibold text-gray-700 pt-2">EN –</span>
                <div class="flex-1">
                    <div class="quill-wrapper" data-quill data-textarea="content-en-${category}-${index}"></div>
                    <textarea name="en[${index}][content]" id="content-en-${category}-${index}" class="hidden"></textarea>
                </div>
            </div>
        `;

            anchor.before(newSection);

            // init quill pre novú sekciu
            newSection.querySelectorAll('[data-quill]').forEach(el => {
                const textarea = document.getElementById(el.dataset.textarea);
                const quill = new Quill(el, quillOptions);

                preventImagePaste(quill);
                fixLinks(quill);

                quill.on('text-change', () => {
                    textarea.value = quill.root.innerHTML;
                });
            });
        }

        // ================= DELETE =================
        function markForDelete(btn) {
            const section = btn.closest('.bg-white');
            section.querySelector('input[name$="[_delete]"]').value = 1;
            section.style.display = 'none';
        }
    </script>

@endsection
