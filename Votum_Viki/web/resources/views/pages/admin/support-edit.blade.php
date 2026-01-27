@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] pt-20 bg-gray-100 px-4 py-10">
        <div class="max-w-6xl mx-auto space-y-10">

            <h1 class="text-3xl font-bold text-blue-950 text-center">
                Editácia sekcií - {{ ucfirst($type) }}
            </h1>

            @if(session('success'))
                <div class="mb-4 rounded-md bg-green-100 border border-green-400 text-green-900 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

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
        const quillSk{{ $sectionKey }}{{ $index }} = new Quill(
            '#editor-{{ $sectionKey }}-sk-{{ $index }}',
            { theme: 'snow', modules: { toolbar: toolbarOptions } }
        );

        const quillEn{{ $sectionKey }}{{ $index }} = new Quill(
            '#editor-{{ $sectionKey }}-en-{{ $index }}',
            { theme: 'snow', modules: { toolbar: toolbarOptions } }
        );

        preventImagePaste(quillSk{{ $sectionKey }}{{ $index }});
        preventImagePaste(quillEn{{ $sectionKey }}{{ $index }});
        fixLinks(quillSk{{ $sectionKey }}{{ $index }});
        fixLinks(quillEn{{ $sectionKey }}{{ $index }});

        const skTextarea{{ $sectionKey }}{{ $index }} = document.getElementById('content-{{ $sectionKey }}-sk-{{ $index }}');
        const enTextarea{{ $sectionKey }}{{ $index }} = document.getElementById('content-{{ $sectionKey }}-en-{{ $index }}');

        if (skTextarea{{ $sectionKey }}{{ $index }}?.value?.trim()) {
            quillSk{{ $sectionKey }}{{ $index }}.clipboard.dangerouslyPasteHTML(skTextarea{{ $sectionKey }}{{ $index }}.value);
        }

        if (enTextarea{{ $sectionKey }}{{ $index }}?.value?.trim()) {
            quillEn{{ $sectionKey }}{{ $index }}.clipboard.dangerouslyPasteHTML(enTextarea{{ $sectionKey }}{{ $index }}.value);
        }

        quillSk{{ $sectionKey }}{{ $index }}.on('text-change', () => {
            skTextarea{{ $sectionKey }}{{ $index }}.value = quillSk{{ $sectionKey }}{{ $index }}.root.innerHTML;
        });

        quillEn{{ $sectionKey }}{{ $index }}.on('text-change', () => {
            enTextarea{{ $sectionKey }}{{ $index }}.value = quillEn{{ $sectionKey }}{{ $index }}.root.innerHTML;
        });
        @endforeach
        @endforeach
    </script>
@endsection
