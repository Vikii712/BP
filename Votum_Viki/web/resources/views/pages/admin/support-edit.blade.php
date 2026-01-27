@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] pt-20 bg-gray-100 px-4 py-10">
        <div class="max-w-6xl mx-auto space-y-10">

            <h1 class="text-3xl font-bold text-blue-950 text-center">
                Editácia sekcií - {{ ucfirst($type) }}
            </h1>

            {{-- Renderovanie každej sekcie cez komponent --}}
            @foreach ($sections as $sectionKey => $sectionItems)
                <x-admin.quill-section
                    :category="$sectionKey"
                    :title="ucfirst($sectionKey)"
                    :sections="$sectionItems" />
            @endforeach


        </div>
    </div>

    {{-- Quill inicializácia --}}
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        const toolbarOptions = [
            [{ header: [1, 2, 3, false] }],
            ['bold', 'italic', 'underline'],
            [{ list: 'ordered' }, { list: 'bullet' }],
            ['link']
        ];

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

            @foreach($sections as $sectionKey => $sectionItems)
            @foreach($sectionItems as $index => $section)
        {
            const quillSk = new Quill(
                '#editor-{{ $sectionKey }}-sk-{{ $index }}',
                { theme: 'snow', modules: { toolbar: toolbarOptions } }
            );

            const quillEn = new Quill(
                '#editor-{{ $sectionKey }}-en-{{ $index }}',
                { theme: 'snow', modules: { toolbar: toolbarOptions } }
            );

            preventImagePaste(quillSk);
            preventImagePaste(quillEn);
            fixLinks(quillSk);
            fixLinks(quillEn);

            const skTextarea = document.getElementById('content-{{ $sectionKey }}-sk-{{ $index }}');
            const enTextarea = document.getElementById('content-{{ $sectionKey }}-en-{{ $index }}');

            if (skTextarea?.value?.trim()) {
                quillSk.clipboard.dangerouslyPasteHTML(skTextarea.value);
            }

            if (enTextarea?.value?.trim()) {
                quillEn.clipboard.dangerouslyPasteHTML(enTextarea.value);
            }

            quillSk.on('text-change', () => {
                skTextarea.value = quillSk.root.innerHTML;
            });

            quillEn.on('text-change', () => {
                enTextarea.value = quillEn.root.innerHTML;
            });
        }
        @endforeach
        @endforeach
    </script>


@endsection
