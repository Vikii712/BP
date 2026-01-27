@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] pt-20 bg-gray-100 px-4 py-10">
        <div class="max-w-6xl mx-auto space-y-10">

            <h1 class="text-3xl font-bold text-blue-950 text-center">
                Úprava dokumentov
            </h1>

            {{-- PRIDAŤ NOVÚ SEKCIU --}}
            <div class="flex justify-center">
                <button type="button"
                        id="addSectionBtn"
                        class="px-6 py-3 bg-blue-950 text-white rounded-lg hover:opacity-90">
                    + Pridať novú sekciu
                </button>
            </div>

            {{-- SEKCIE --}}
            <div id="sectionsWrapper" class="space-y-10">
                @foreach ($sections as $sectionIndex => $section)
                    <x-admin.document-section
                        :section="$section"
                        :sectionIndex="$sectionIndex"
                    />
                @endforeach
            </div>

        </div>
    </div>


    <script>
        document.addEventListener('click', e => {

            // odstráni dokument
            if (e.target.closest('.removeDocBtn')) {
                e.target.closest('.document').remove();
            }

            // odstráni sekciu
            if (e.target.closest('.removeSectionBtn')) {
                e.target.closest('.section').remove();
            }

            // pridá dokument do sekcie
            if (e.target.closest('.addDocBtn')) {
                const section = e.target.closest('.section');
                const wrapper = section.querySelector('.documentsWrapper');

                const index = wrapper.children.length;

                wrapper.insertAdjacentHTML('beforeend', `
            <div class="border-2 rounded-lg p-4 space-y-4 bg-gray-50 document">
                <div class="flex justify-between">
                    <strong>Dokument</strong>
                    <button type="button" class="removeDocBtn text-red-600">✕</button>
                </div>
                <input type="text" placeholder="Názov SK" class="border-2 rounded-md px-3 py-2 w-full">
                <input type="text" placeholder="Názov EN" class="border-2 rounded-md px-3 py-2 w-full">
                <input type="file">
            </div>
        `);
            }
        });
    </script>

@endsection


