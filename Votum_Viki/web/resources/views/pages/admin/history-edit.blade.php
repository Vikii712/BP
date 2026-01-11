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
            <div id="addHistoryForm" class="bg-white shadow-md rounded-md p-6 mb-8 border border-gray-200 w-full hidden">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-5 h-9 flex items-center justify-center rounded-md text-blue-950">
                        <i class="fas fa-plus"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-blue-950">Pridať novú udalosť do histórie</h2>
                </div>

                <form method="POST" action="{{ route('history.add') }}" class="flex flex-col gap-3 w-full">
                    @csrf

                    {{-- Nadpis --}}
                    <div class="flex gap-3">
                        <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
                        <input type="text" name="sk[title]" required
                               class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                               placeholder="Nadpis v slovenčine">
                    </div>
                    <div class="flex gap-3">
                        <span class="w-10 font-semibold pt-2">EN –</span>
                        <input type="text" name="en[title]" required
                               class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                               placeholder="Title in English">
                    </div>

                    {{-- Obsah --}}
                    <div class="space-y-3">
                        <div class="flex gap-3">
                            <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
                            <textarea name="sk[content]" rows="4"
                                      class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                                      placeholder="Obsah v slovenčine"></textarea>
                        </div>

                        <div class="flex gap-3">
                            <span class="w-10 font-semibold pt-2">EN –</span>
                            <textarea name="en[content]" rows="4"
                                      class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                                      placeholder="Content in English"></textarea>
                        </div>
                    </div>

                    {{-- Rok --}}
                    <div class="flex gap-3 mt-2">
                        <span class="w-10 font-semibold text-blue-950 pt-2">Rok –</span>
                        <input type="number" name="year" required
                               class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2"
                               placeholder="Rok udalosti">
                    </div>

                    <button type="submit" class="bg-green-200 border-2 border-green-900 text-green-900 px-4 py-2 rounded-md font-semibold hover:bg-green-300 mt-3 w-full sm:w-auto">
                        Pridať
                    </button>
                </form>
            </div>

            {{-- Tabuľka histórie --}}
            <h2 class="text-xl font-bold text-center text-blue-950 mb-3">História</h2>
            <div class="bg-white shadow-md rounded-md overflow-hidden w-full">
                <table class="min-w-full text-left border-collapse">
                    <thead class="bg-blue-950">
                    <tr>
                        <th class="px-6 py-3 font-medium text-blue-50">Poradie</th>
                        <th class="px-6 py-3 font-medium text-blue-50">Rok</th>
                        <th class="px-6 py-3 font-medium text-blue-50">Nadpis</th>
                        <th class="px-6 py-3 font-medium text-blue-50 text-right">Akcia</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($history as $item)
                        <tr class="border-t border-blue-950/20 hover:bg-blue-50">

                            {{-- Šípky úplne naľavo --}}
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

                            {{-- Rok --}}
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $item->year }}</td>

                            {{-- Nadpis --}}
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $item->title_sk }}</td>

                            {{-- Akcie --}}
                            <td class="px-6 py-4 text-right flex justify-end gap-2">
                                <a href="{{ route('history.editItem', $item->id) }}" class="text-blue-950 hover:text-gray-700 text-lg">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form method="POST" action="{{ route('history.delete', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 text-lg"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        const toggleBtn = document.getElementById('toggleAddForm');
        const addForm = document.getElementById('addHistoryForm');

        toggleBtn.addEventListener('click', () => {
            addForm.classList.toggle('hidden');
        });
    </script>
@endsection
