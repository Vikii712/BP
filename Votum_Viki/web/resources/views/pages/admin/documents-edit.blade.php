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
                        class="px-6 py-3 font-semibold bg-green-200 border-2 border-green-900 text-green-900  rounded-lg hover:opacity-90 transition-opacity flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i>
                    Pridať novú sekciu
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
                    <div class="bg-votum3 border-2 border-votum3 rounded-lg shadow-sm overflow-hidden document">
                        <div class="bg-dark-votum3 flex items-center justify-between px-4 py-3">
                            <div class="flex items-center gap-3">
                                <span class="text-white px-3 py-1 rounded-md text-sm font-bold" style="background-color: rgba(255, 255, 255, 0.2);">
                                    #${index + 1}
                                </span>
                                <span class="font-semibold text-white">Dokument</span>
                            </div>
                            <i class="fa-solid fa-trash px-3 py-2 border-2 border-votum3 text-votum3 bg-white rounded-md cursor-pointer hover:bg-votum3 hover:text-white transition-colors removeDocBtn"></i>
                        </div>
                        <div class="p-4 space-y-4">
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">SK – Názov dokumentu:</label>
                                    <input type="text" placeholder="Zadajte názov v slovenčine" class="w-full border-2 border-gray-300 rounded-md px-3 py-2 bg-white">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">EN – Názov dokumentu:</label>
                                    <input type="text" placeholder="Enter name in English" class="w-full border-2 border-gray-300 rounded-md px-3 py-2 bg-white">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Súbor dokumentu:</label>
                                <div class="flex gap-3 items-center">
                                    <input type="text" readonly value="— žiadny súbor —" class="border-2 border-gray-300 bg-gray-100 px-3 py-2 flex-1 rounded-md">
                                    <label class="px-4 py-2 bg-dark-votum3 text-white rounded-md cursor-pointer hover:opacity-90 transition-opacity">
                                        Nahrať
                                        <input type="file" accept=".pdf,.doc,.docx,.jpg,.png" class="hidden">
                                    </label>
                                    <button type="button" class="hidden px-4 py-2 border-2 border-votum3 text-votum3 rounded-md hover:bg-votum3 hover:text-white transition-colors">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
            }
        });
    </script>

@endsection
