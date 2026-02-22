@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] pt-20 bg-gray-100 px-4 py-10">
        <div class="max-w-6xl mx-auto space-y-10">

            <h1 class="text-3xl font-bold text-blue-950 text-center">
                Úprava sekcie
            </h1>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="bg-green-100 border-2 border-green-600 text-green-800 px-6 py-4 rounded-lg flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-check-circle text-xl"></i>
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-green-800 hover:text-green-900">
                        <i class="fa-solid fa-times"></i>
                    </button>
                </div>
            @endif

            <form method="POST" action="{{ route('documents.update') }}" enctype="multipart/form-data" id="documentsForm">
                @csrf
                @method('PUT')

                {{-- SEKCIA --}}
                <div class="bg-votum3 border-2 border-blue-950 rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-blue-950 px-6 py-2">
                        <h2 class="text-xl font-bold text-white flex items-center gap-3">
                            <span class="px-3 py-1 rounded-md text-lg">Sekcia</span>
                        </h2>
                    </div>

                    <div class="p-6 space-y-6 bg-white">
                        <input type="hidden" name="section_id" value="{{ $section->id }}">

                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">SK – Názov sekcie:</label>
                                <input type="text"
                                       name="section[name_sk]"
                                       value="{{ $section->title_sk }}"
                                       placeholder="Zadajte názov sekcie"
                                       required
                                       class="w-full border-2 border-gray-300 rounded-md px-3 py-2 focus:border-votum3 focus:outline-none transition-colors">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">EN – Názov sekcie:</label>
                                <input type="text"
                                       name="section[name_en]"
                                       value="{{ $section->title_en }}"
                                       placeholder="Enter section name"
                                       required
                                       class="w-full border-2 border-gray-300 rounded-md px-3 py-2 focus:border-votum3 focus:outline-none transition-colors">
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex justify-between items-center pt-4 border-t-2 border-gray-200">
                                <h3 class="font-semibold text-lg text-votum3 flex items-center gap-2">
                                    <i class="fa-solid fa-file-lines"></i>
                                    Dokumenty v sekcii
                                </h3>
                                <button type="button"
                                        id="addDocBtn"
                                        class="px-4 py-2 font-semibold hover:cursor-pointer border-2 border-votum3 text-votum3 rounded-md hover:opacity-90 transition-opacity flex items-center gap-2">
                                    <i class="fa-solid fa-plus"></i>
                                    Pridať dokument
                                </button>
                            </div>

                            <div class="grid lg:grid-cols-2 gap-6" id="documentsWrapper">
                                @foreach($section->documents as $docIndex => $document)
                                    <div class="border-2 border-votum3 rounded-lg bg-votum3 shadow-sm overflow-hidden document">
                                        <div class="bg-dark-votum3 flex items-center justify-between px-4 py-3">
                                            <div class="flex items-center gap-3">
                                                <span class="text-white px-3 py-1 rounded-md text-sm font-bold" style="background-color: rgba(255, 255, 255, 0.2);">
                                                    #{{ $docIndex + 1 }}
                                                </span>
                                                <span class="font-semibold text-white">Dokument</span>
                                            </div>
                                            <i class="fa-solid fa-trash px-3 py-2 border-2 border-votum3 text-votum3 bg-white rounded-md cursor-pointer hover:bg-votum3 hover:text-white transition-colors removeDocBtn"></i>
                                        </div>
                                        <div class="bg-white p-4 space-y-4">
                                            <input type="hidden" name="documents[{{ $docIndex }}][id]" value="{{ $document->id }}">
                                            <div class="space-y-3">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">SK – Názov dokumentu:</label>
                                                    <input type="text"
                                                           name="documents[{{ $docIndex }}][name_sk]"
                                                           value="{{ $document->title_sk }}"
                                                           placeholder="Zadajte názov v slovenčine"
                                                           required
                                                           class="w-full border-2 border-gray-300 rounded-md px-3 py-2 bg-white focus:border-votum3 focus:outline-none transition-colors">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">EN – Názov dokumentu:</label>
                                                    <input type="text"
                                                           name="documents[{{ $docIndex }}][name_en]"
                                                           value="{{ $document->title_en }}"
                                                           placeholder="Enter name in English"
                                                           required
                                                           class="w-full border-2 border-gray-300 rounded-md px-3 py-2 bg-white focus:border-votum3 focus:outline-none transition-colors">
                                                </div>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Súbor dokumentu:</label>
                                                <div class="mb-2 text-sm text-gray-600 flex items-center gap-2">
                                                    <i class="fa-solid fa-file"></i>
                                                    <span>Aktuálny súbor: <strong>{{ basename($document->url) }}</strong></span>
                                                </div>
                                                <div class="flex gap-3 items-center">
                                                    <input type="text"
                                                           readonly
                                                           value="— žiadny nový súbor —"
                                                           class="file-name-display border-2 border-gray-300 bg-gray-100 px-3 py-2 flex-1 rounded-md text-sm">
                                                    <label class="px-4 py-2 bg-dark-votum3 text-white rounded-md cursor-pointer hover:opacity-90 transition-opacity">
                                                        Nahradiť
                                                        <input type="file"
                                                               name="documents[{{ $docIndex }}][file]"
                                                               accept=".pdf,.doc,.docx,.jpg,.png"
                                                               class="hidden file-input"
                                                               onchange="handleFileChange(this)">
                                                    </label>
                                                    <button type="button"
                                                            class="hidden remove-file-btn px-4 py-2 border-2 border-votum3 text-votum3 rounded-md hover:bg-votum3 hover:text-white transition-colors"
                                                            onclick="removeFile(this)">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ULOŽIŤ --}}
                <div class="fixed bottom-4 left-1/2 transform -translate-x-1/2 z-50">
                    <button type="submit"
                            class="px-8 py-2 hover:bg-green-300 bg-green-200 border-2 border-green-900 font-bold text-lg rounded-lg transition-colors flex items-center gap-3 shadow-lg">
                        <i class="fa-solid fa-check"></i>
                        Uložiť
                    </button>
                </div>

            </form>
        </div>
        <x-admin.modal />
    </div>

    <script>
        let docCounter = {{ count($section->documents) }};

        // ===== REINDEXUJE ČÍSLA VIZUÁLNE =====
        function reindexAll() {
            document.querySelectorAll('.document').forEach((doc, dIndex) => {
                const docLabel = doc.querySelector('.bg-dark-votum3 span');
                if (docLabel) {
                    docLabel.textContent = `#${dIndex + 1}`;
                }
            });
        }

        // ===== PRIDÁ DOKUMENT =====
        document.getElementById('addDocBtn').addEventListener('click', function () {
            const wrapper = document.getElementById('documentsWrapper');
            const docIndex = wrapper.children.length;
            docCounter++;

            const docHTML = `
                <div class="border-2 border-votum3 rounded-lg bg-votum3 shadow-sm overflow-hidden document">
                    <div class="bg-dark-votum3 flex items-center justify-between px-4 py-3">
                        <div class="flex items-center gap-3">
                            <span class="text-white px-3 py-1 rounded-md text-sm font-bold" style="background-color: rgba(255, 255, 255, 0.2);">
                                #${docIndex + 1}
                            </span>
                            <span class="font-semibold text-white">Dokument</span>
                        </div>
                        <i class="fa-solid fa-trash px-3 py-2 border-2 border-votum3 text-votum3 bg-white rounded-md cursor-pointer hover:bg-votum3 hover:text-white transition-colors removeDocBtn"></i>
                    </div>
                    <div class="bg-white p-4 space-y-4">
                        <div class="space-y-3">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">SK – Názov dokumentu:</label>
                                <input type="text"
                                       name="documents[${docIndex}][name_sk]"
                                       placeholder="Zadajte názov v slovenčine"
                                       required
                                       class="w-full border-2 border-gray-300 rounded-md px-3 py-2 bg-white focus:border-votum3 focus:outline-none transition-colors">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">EN – Názov dokumentu:</label>
                                <input type="text"
                                       name="documents[${docIndex}][name_en]"
                                       placeholder="Enter name in English"
                                       required
                                       class="w-full border-2 border-gray-300 rounded-md px-3 py-2 bg-white focus:border-votum3 focus:outline-none transition-colors">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Súbor dokumentu:</label>
                            <div class="flex gap-3 items-center">
                                <input type="text"
                                       readonly
                                       value="— žiadny súbor —"
                                       class="file-name-display border-2 border-gray-300 bg-gray-100 px-3 py-2 flex-1 rounded-md text-sm">
                                <label class="px-4 py-2 bg-dark-votum3 text-white rounded-md cursor-pointer hover:opacity-90 transition-opacity">
                                    Nahrať
                                    <input type="file"
                                           name="documents[${docIndex}][file]"
                                           accept=".pdf,.doc,.docx,.jpg,.png"
                                           required
                                           class="hidden file-input"
                                           onchange="handleFileChange(this)">
                                </label>
                                <button type="button"
                                        class="hidden remove-file-btn px-4 py-2 border-2 border-votum3 text-votum3 rounded-md hover:bg-votum3 hover:text-white transition-colors"
                                        onclick="removeFile(this)">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            wrapper.insertAdjacentHTML('beforeend', docHTML);
        });

        // ===== ODSTRÁNI DOKUMENT =====
        document.addEventListener('click', e => {
            if (e.target.closest('.removeDocBtn')) {
                e.preventDefault();
                e.stopPropagation();
                const docElement = e.target.closest('.document');
                const docNumber = docElement.querySelector('.bg-dark-votum3 span').textContent.trim();
                openDeleteModal(`Dokument ${docNumber}`, () => {
                    docElement.remove();
                    reindexAll();
                });
            }
        });

        // ===== HELPER FUNCTIONS =====
        function handleFileChange(input) {
            const fileNameDisplay = input.closest('.flex').querySelector('.file-name-display');
            const removeBtn = input.closest('.flex').querySelector('.remove-file-btn');

            if (input.files && input.files[0]) {
                fileNameDisplay.value = input.files[0].name;
                removeBtn.classList.remove('hidden');
            }
        }

        function removeFile(button) {
            const container = button.closest('.flex');
            const fileInput = container.querySelector('.file-input');
            const fileNameDisplay = container.querySelector('.file-name-display');

            fileInput.value = '';
            fileNameDisplay.value = '— žiadny súbor —';
            button.classList.add('hidden');
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.file-input').forEach(input => {
                input.addEventListener('change', function () {
                    handleFileChange(this);
                });
            });
        });
    </script>

@endsection
