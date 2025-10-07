@extends('layouts.app')

@section('title','Home')

@section('content')
    <x-hero :team="$team" />

    <!-- in resources/views/home.blade.php -->
    <section id="events" class="mb-10 " aria-labelledby="upcoming-heading">
        <h3 id="upcoming-heading" class="text-2xl font-semibold mb-4">Čo nás čaká? / Upcoming</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
            <!-- Calendar (left) -->
            <x-calendar :calendar="$calendar" :monthLabel="$monthLabel" />

            <!-- Events list (right) -->
            <div class="space-y-3">
                @foreach($events as $ev)
                    <article class="bg-white p-4 rounded shadow-sm flex justify-between items-start" role="article" aria-labelledby="event-{{ $ev['id'] }}">
                        <div>
                            <h4 id="event-{{ $ev['id'] }}" class="font-semibold text-slate-800">{{ \Carbon\Carbon::parse($ev['date'])->format('j.n.Y') }} — {{ $ev['title'] }}</h4>
                            <p class="text-sm text-slate-600 mt-1">{{ $ev['description'] }}</p>
                        </div>
                        <div class="flex flex-col items-end gap-2">
                            <button class="px-3 py-1 text-sm border rounded" aria-label="Share event">Zdieľať</button>
                            <a class="px-3 py-1 text-sm bg-[var(--accent)] rounded" href="#" aria-label="More details">Viac</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>


    <section id="activities" class="relative mt-16 mb-20 px-6">
        <div class="relative bg-[var(--cream)] text-blue-950 rounded-[2rem] shadow-lg overflow-hidden max-w-6xl mx-auto">
            <!-- Decorative overlay (optional, subtle tone variation) -->
            <div class="absolute inset-0 bg-white/30"></div>

            <div class="relative z-10 flex flex-col items-center text-center py-12 px-6 md:px-12">
                <h3 class="text-3xl md:text-4xl font-bold mb-10">Naše aktivity</h3>

                <!-- Activities grid -->
                <div class="grid md:grid-cols-2 gap-6 w-full max-w-5xl">
                    @foreach($featured as $f)
                        <x-featured-event :title="$f['title']" :image="$f['image']" :excerpt="$f['excerpt']" />
                    @endforeach
                </div>

                <!-- Button -->
                <div class="mt-10">
                    <a href="#events"
                       class="inline-block bg-blue-300 text-blue-950 font-semibold text-lg px-6 py-3 rounded-full shadow hover:bg-blue-400 transition">
                        Zobraziť viac udalostí
                    </a>
                </div>
            </div>
        </div>
    </section>


    <x-team-section :image="$team['image']" :alt="$team['alt']" />
@endsection
