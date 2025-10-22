@extends('layouts.app')

@section('content')
    <main class="bg-[#f1ebe3] text-[#051647] min-h-screen">
        <section class="max-w-6xl mx-auto px-6 py-12 space-y-12">

            {{-- HEADER + YEAR FILTER --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <h1 class="text-3xl md:text-4xl font-bold">Udalosti</h1>

                {{-- Filter by Year --}}
                <form method="GET" class="flex items-center gap-3">
                    <label for="year" class="font-semibold">Skočiť na rok:</label>
                    <select name="year" id="year" onchange="this.form.submit()"
                            class="border border-[#051647] rounded-lg px-3 py-2 bg-white text-[#051647] focus:outline-none focus:ring-2 focus:ring-[#051647]">
                        <option value="">Všetky</option>
                        @foreach($years as $yr)
                            <option value="{{ $yr }}" {{ request('year') == $yr ? 'selected' : '' }}>{{ $yr }}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            {{-- UPCOMING EVENTS --}}
            <section class="bg-white rounded-xl p-6 shadow-sm">
                <h2 class="text-2xl font-semibold mb-6">Čo nás čaká:</h2>

                @if(count($upcomingEvents))
                    <div class="space-y-6">
                        @foreach($upcomingEvents as $event)
                            <article class="flex flex-col md:flex-row items-center gap-6 border border-gray-200 rounded-lg p-4 shadow-sm">
                                <img src="{{ asset($event['image']) }}" alt="{{ $event['title'] }}" class="w-full md:w-1/3 h-40 object-cover rounded">
                                <div class="flex-1">
                                    <h3 class="text-xl font-semibold mb-1">{{ $event['title'] }}</h3>
                                    <p class="text-sm mb-3">{{ $event['description'] }}</p>
                                    <a href="{{route('event')}}" class="inline-block px-4 py-2 border border-[#051647] rounded-lg hover:bg-[#051647] hover:text-white transition">Viac</a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-600">Žiadne nadchádzajúce udalosti.</p>
                @endif
            </section>

            {{-- PAST EVENTS --}}
            <section class="space-y-10">
                @foreach($groupedEvents as $year => $events)
                    <div>
                        <h2 class="text-2xl font-semibold mb-4">{{ $year }}</h2>
                        <div class="space-y-6">
                            @foreach($events as $event)
                                <article class="flex flex-col md:flex-row items-center gap-6 bg-white p-4 rounded-lg shadow-sm">
                                    <img src="{{ asset($event['image']) }}" alt="{{ $event['title'] }}" class="w-full md:w-1/3 h-40 object-cover rounded">
                                    <div class="flex-1">
                                        <h3 class="text-xl font-semibold mb-1">{{ $event['title'] }}</h3>
                                        <p class="text-sm mb-3">{{ $event['description'] }}</p>
                                        <a href="#" class="inline-block px-4 py-2 border border-[#051647] rounded-lg hover:bg-[#051647] hover:text-white transition">Viac</a>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </section>

            {{-- PAGER --}}
            <div class="flex justify-center mt-8">
                {{ $pagination->links() }}
            </div>

            {{-- HOME BUTTON --}}
            <div class="flex justify-center mt-12">
                <a href="{{ route('home') }}" class="flex items-center gap-2 bg-[#051647] text-white px-6 py-3 rounded-full hover:bg-blue-900 transition">
                    🏠 Domov
                </a>
            </div>

        </section>
    </main>
@endsection
