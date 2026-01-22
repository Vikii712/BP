@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] bg-gray-100 px-4 py-10 flex justify-center">
        <div class="w-full max-w-6xl space-y-8">

            {{-- Nadpis --}}
            <h1 class="text-3xl font-bold text-blue-950 text-center">
                Správa udalostí
            </h1>

            {{-- Tlačidlo pridania --}}
            <div class="flex justify-center">
                <a href="{{ route('events.create') }}"
                   class="bg-green-200 border-2 border-green-900 text-green-900 px-4 py-2 rounded-md font-semibold hover:bg-green-300">
                    Pridať novú udalosť
                </a>
            </div>

            {{-- Tabuľka udalostí --}}
            <div class="bg-white border border-gray-200 shadow-md rounded-md overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-blue-950 text-white">
                    <tr class="">
                        <th class="px-4 py-5 text-left text-sm font-medium  uppercase">Názov</th>
                        <th class="px-2 py-5 text-center text-sm font-medium  uppercase">Dátum</th>
                        <th class="px-2 py-5 text-center text-sm font-medium  uppercase">Kalendár</th>
                        <th class="px-2 py-5 text-center text-sm font-medium  uppercase">Domov</th>
                        <th class="px-2 py-5 text-center text-sm font-medium  uppercase">Stránka</th>
                        <th class="px-2 py-5 text-center text-sm font-medium  uppercase">Upraviť</th>
                        <th class="px-2 py-5 text-center text-sm font-medium  uppercase">Vymazať</th>
                        <th class="px-2 py-5 text-center text-sm font-medium  uppercase">Archív</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach($events as $event)
                        <tr class="hover:bg-gray-50">
                            {{-- Názov --}}
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $event->title_sk }}</td>

                            {{-- Dátum --}}
                            <td class="px-4 py-2 text-sm text-center text-gray-700">
                                @if($event->start_date)
                                    @if($event->start_date === $event->end_date)
                                        {{ $event->start_date }}
                                    @else
                                        {{ $event->start_date }} – {{ $event->end_date }}
                                    @endif
                                @else
                                    —
                                @endif
                            </td>

                            {{-- Kalendár --}}
                            <td class="px-4 py-2 text-center">
                                @if($event->inCalendar)
                                    <span class="inline-block w-4 h-4 rounded-full"
                                          style="background-color: {{ $eventColors[$event->color] ?? '#ccc' }}"></span>
                                @else
                                    <i class="fas fa-times "></i>
                                @endif
                            </td>

                            {{-- Domov --}}
                            <td class="px-4 py-2 text-center">
                                @if($event->inHome)
                                    <i class="fas fa-check text-green-600"></i>
                                @else
                                    <i class="fas fa-times text-red-600"></i>
                                @endif
                            </td>

                            {{-- Vlastná stránka --}}
                            <td class="px-4 py-2 text-center">
                                @if($event->inGallery)
                                    <i class="fas fa-check text-green-600"></i>
                                @else
                                    <i class="fas fa-times text-red-600"></i>
                                @endif
                            </td>

                            {{-- Upraviť --}}
                            <td class="px-4 py-2 text-center">
                                <a href="{{ route('events.edit', $event->id) }}" class=" hover:text-blue-800">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </td>

                            {{-- Vymazať --}}
                            <td class="px-4 py-2 text-center">
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="hover:text-red-800 cursor-pointer focus:outline-none">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                            {{-- Archív --}}
                            <td class="px-4 py-2 text-center">
                                @if($event->archived)
                                    <form action="{{ route('events.restore', $event->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="font-bold cursor-pointer focus:outline-none">
                                            Obnoviť
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('events.archive', $event->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="font-bold cursor-pointer focus:outline-none">
                                            Archivovať
                                        </button>
                                    </form>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @if($events->isEmpty())
                    <div class="p-6 text-center text-gray-500">
                        Žiadne udalosti
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
