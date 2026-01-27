@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] pt-20 bg-gray-100 px-4 py-10 flex justify-center">
        <div class="w-full max-w-6xl space-y-8">

            {{-- Nadpis --}}
            <h1 class="text-3xl font-bold text-blue-950 text-center">
                Správa udalostí
            </h1>

            @if(session('success'))
                <div class="mb-4 rounded-md bg-green-100 border border-green-400 text-green-900 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('warning'))
                <div class="mb-4 rounded-md bg-yellow-100 border border-yellow-400 text-yellow-900 px-4 py-3 flex justify-between items-center">
                    <span>{{ session('warning') }}</span>
                    @if(session('deleted_event_id'))
                        <form action="{{ route('events.restore', session('deleted_event_id')) }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                                Vrátiť späť
                            </button>
                        </form>
                    @endif
                </div>
            @endif

            {{-- Tlačidlo pridania --}}
            <div class="flex justify-center">
                <a href="{{ route('events.create') }}"
                   class="bg-green-200 border-2 border-green-900 text-green-900 px-6 py-2 rounded-md font-semibold hover:bg-green-300">
                    Pridať novú udalosť
                </a>
            </div>

            {{-- TABUĽKA --}}
            <div class="bg-white shadow-md rounded-md">
                <div class="overflow-x-auto rounded-md">
                    <table class="min-w-full">
                        <thead class="bg-blue-950 text-blue-50">
                        <tr>
                            <th class="px-6 py-3 text-start">Názov</th>
                            <th class="px-6 py-3 text-center">Dátum</th>
                            <th class="px-3 py-3 text-center">Kalendár</th>
                            <th class="px-3 py-3 text-center">Domov</th>
                            <th class="px-3 py-3 text-center">Stránka</th>
                            <th class="px-4 py-3 text-center">Upraviť</th>
                            <th class="px-4 py-3 text-center">Vymazať</th>
                            <th class="px-4 py-3 text-center">Archív</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($events as $event)
                            <tr class="border-t hover:bg-blue-50">

                                {{-- Názov --}}
                                <td class="px-6 py-4 font-medium text-blue-950">
                                    {{ $event->title_sk }}
                                </td>

                                {{-- Dátum --}}
                                <td class="px-6 py-4 text-center text-blue-950">
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
                                <td class="px-3 py-4 text-center">
                                    @if($event->inCalendar)
                                        <span class="inline-block w-4 h-4 rounded-full"
                                              style="background-color: {{ $eventColors[$event->color] ?? '#ccc' }}"></span>
                                    @else
                                        <i class="fas fa-times text-red-600"></i>
                                    @endif
                                </td>

                                {{-- Domov --}}
                                <td class="px-3 py-4 text-center">
                                    @if($event->inHome)
                                        <i class="fas fa-check text-green-600"></i>
                                    @else
                                        <i class="fas fa-times text-red-600"></i>
                                    @endif
                                </td>

                                {{-- Stránka --}}
                                <td class="px-3 py-4 text-center">
                                    @if($event->inGallery)
                                        <i class="fas fa-check text-green-600"></i>
                                    @else
                                        <i class="fas fa-times text-red-600"></i>
                                    @endif
                                </td>

                                {{-- Upraviť --}}
                                <td class="px-4 py-4 text-center">
                                    <a href="{{ route('events.edit', $event->id) }}"
                                       class="text-blue-950 hover:text-gray-700 text-lg cursor-pointer">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </td>

                                {{-- Vymazať --}}
                                <td class="px-4 py-4 text-center">
                                    <button onclick="openDeleteModal({{ $event->id }}, '{{ addslashes($event->title_sk) }}')"
                                            class="text-red-600 hover:text-red-800 text-lg cursor-pointer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>

                                {{-- Archív --}}
                                <td class="px-4 py-4 text-center">
                                    @if($event->archived)
                                        <form action="{{ route('events.unarchive', $event->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="font-medium text-blue-950 hover:text-gray-700 cursor-pointer">
                                                Obnoviť
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('events.archive', $event->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="font-medium text-blue-950 hover:text-gray-700 cursor-pointer">
                                                Archivovať
                                            </button>
                                        </form>
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-6 text-center text-gray-500">
                                    Žiadne udalosti
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-transparent bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-gray-200 p-6 rounded-md shadow-md space-y-4 w-96">
            <p class="mb-6">Naozaj chcete vymazať udalosť: <span id="deleteEventName" class="font-bold"></span>?</p>
            <div class="flex justify-end gap-3">
                <button onclick="closeDeleteModal()"
                        class="px-4 py-2 bg-white rounded-md hover:bg-gray-300">Zrušiť</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Vymazať</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(eventId, eventName) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            const nameSpan = document.getElementById('deleteEventName');

            nameSpan.textContent = eventName;
            form.action = '/votumaci/admin/events/' + eventId;

            modal.classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>

@endsection
