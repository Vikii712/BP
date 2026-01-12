@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] bg-gray-100 px-4 p-10 flex justify-center">
        <div class="w-full max-w-5xl space-y-10">

            {{-- Nadpis --}}
            <h1 class="text-3xl font-bold text-blue-950 text-center">
                Úprava histórie
            </h1>

            {{-- Tlačidlo na zobrazenie formulára --}}
            <div class="flex justify-center">
                <button id="toggleAddForm" class="bg-green-200 border-2 border-green-900 text-green-900 px-4 py-2 rounded-md font-semibold hover:bg-green-300">
                    Pridať novú udalosť
                </button>
            </div>

            {{-- Formulár na pridanie novej udalosti (skryty) --}}
            <div id="addHistoryForm"
                 class="bg-white border border-gray-200 shadow-md rounded-md p-6 pt-0 mb-8 w-full hidden space-y-6">

                {{-- HLAVNÝ NADPIS --}}
                <div class="bg-blue-950 text-lg -mx-6 px-6 py-4 text-white font-bold rounded-t-md">
                    Pridať novú udalosť do histórie
                </div>

                <form method="POST" action="{{ route('history.add') }}" class="space-y-6">
                    @csrf

                    {{-- ROK --}}
                    <div class="flex items-center bg-gray-100 -mt-6 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Rok udalosti
                    </div>

                    <div class="flex gap-3">
                        <span class="w-10 font-semibold text-blue-950 pt-2">Rok</span>
                        <input type="number"
                               name="year"
                               required
                               class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                               placeholder="napr. 2002">
                    </div>

                    {{-- NADPIS --}}
                    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Nadpis udalosti
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <span class="w-10 font-semibold text-blue-950">SK –</span>
                            <input type="text"
                                   name="sk[title]"
                                   required
                                   class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                                   placeholder="Nadpis v slovenčine">
                        </div>

                        <div class="flex items-center gap-3">
                            <span class="w-10 font-semibold text-blue-950">EN –</span>
                            <input type="text"
                                   name="en[title]"
                                   required
                                   class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                                   placeholder="Title in English">
                        </div>
                    </div>

                    {{-- TEXT --}}
                    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                        Text udalosti
                    </div>

                    <div class="space-y-3">
                        <div class="flex gap-3">
                            <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
                            <textarea name="sk[content]"
                                      rows="4"
                                      required
                                      class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                                      placeholder="Text v slovenčine"></textarea>
                        </div>

                        <div class="flex gap-3">
                            <span class="w-10 font-semibold pt-2">EN –</span>
                            <textarea name="en[content]"
                                      rows="4"
                                      required
                                      class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                                      placeholder="Text in English"></textarea>
                        </div>
                    </div>

                    {{-- TLAČIDLO --}}
                    <div class="pt-2 flex w-full justify-end">
                        <button type="submit"
                                class="bg-green-200 border-2 border-green-900 text-green-900 px-6 py-2 rounded-md font-semibold hover:bg-green-300">
                            Pridať udalosť
                        </button>
                    </div>
                </form>
            </div>


            {{-- Tabuľka histórie --}}
            <h2 class="text-xl font-bold text-center text-blue-950 mb-3">História</h2>
            <div class="bg-white shadow-md rounded-md overflow-hidden w-full">
                <table class="min-w-full text-left border-collapse">
                    <thead class="bg-blue-950">
                    <tr>
                        <th class="px-6 py-3 text-blue-50">Poradie</th>
                        <th class="px-6 py-3 text-blue-50">Rok</th>
                        <th class="px-6 py-3 text-blue-50">Nadpis</th>
                        <th class="px-6 py-3 text-blue-50 text-right">Akcia</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($history as $item)

                        {{-- HLAVNÝ RIADOK --}}
                        <tr class="border-t hover:bg-blue-50">
                            <td class="px-6 py-4 flex gap-1">
                                <form method="POST" action="{{ route('history.moveUp', $item->id) }}">
                                    @csrf
                                    <button type="submit" class="text-blue-950 hover:text-gray-700 text-lg"><i class="fas fa-arrow-up"></i></button>
                                </form>
                                <form method="POST" action="{{ route('history.moveDown', $item->id) }}">
                                    @csrf
                                    <button type="submit" class="text-blue-950 hover:text-gray-700 text-lg"><i class="fas fa-arrow-down"></i></button>
                                </form>
                            </td>

                            <td class="px-6 py-4">{{ $item->year }}</td>
                            <td class="px-6 py-4 font-medium">{{ $item->title_sk }}</td>

                            <td class="px-6 py-4 text-right flex justify-end gap-3">
                                <button class="toggle-edit text-blue-900"
                                        data-id="{{ $item->id }}"><i class="fas fa-pen"></i></button>

                                <form method="POST" action="{{ route('history.delete', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                        {{-- INLINE EDIT RIADOK --}}
                        <tr id="edit-row-{{ $item->id }}" class="hidden bg-gray-50">
                            <td colspan="4" class="px-6 py-6">

                                <div class="bg-blue-950 text-white font-bold px-4 py-2 rounded-t-md">
                                    Upraviť udalosť v histórii
                                </div>

                                <form method="POST"
                                      action="{{ route('history.update', $item->id) }}"
                                      class="bg-white border border-t-0 rounded-b-md p-4 space-y-4">
                                    @csrf
                                    @method('PUT')

                                    <input type="number" name="year" required
                                           value="{{ $item->year }}"
                                           class="w-full border-2 border-gray-300 rounded-md px-3 py-2">

                                    <input type="text" name="title_sk" required
                                           value="{{ $item->title_sk }}"
                                           class="w-full border-2 border-gray-300 rounded-md px-3 py-2">

                                    <input type="text" name="title_en" required
                                           value="{{ $item->title_en }}"
                                           class="w-full border-2 border-gray-300 rounded-md px-3 py-2">

                                    <textarea name="content_sk" required rows="4"
                                              class="w-full border-2 border-gray-300 rounded-md px-3 py-2">{{ $item->content_sk }}</textarea>

                                    <textarea name="content_en" required rows="4"
                                              class="w-full border-2 border-gray-300 rounded-md px-3 py-2">{{ $item->content_en }}</textarea>

                                    <div class="flex justify-end gap-3">
                                        <button type="submit"
                                                class="bg-blue-200 border-2 border-blue-900 text-blue-900 px-5 py-2 rounded-md font-semibold">
                                            Uložiť zmeny
                                        </button>
                                        <button type="button"
                                                class="close-edit text-gray-600"
                                                data-id="{{ $item->id }}">
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

    {{-- JS --}}
    <script>
        document.getElementById('toggleAddForm')
            .addEventListener('click', () => {
                document.getElementById('addHistoryForm').classList.toggle('hidden');
            });

        document.querySelectorAll('.toggle-edit').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('edit-row-' + btn.dataset.id)
                    .classList.toggle('hidden');
            });
        });

        document.querySelectorAll('.close-edit').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('edit-row-' + btn.dataset.id)
                    .classList.add('hidden');
            });
        });
    </script>
@endsection
