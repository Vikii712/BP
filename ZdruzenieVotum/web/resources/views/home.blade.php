@extends('layouts.app')

@section('title','Home')

@section('content')
    <x-hero :team="$team" />

    <!-- in resources/views/home.blade.php -->
    <section id="events" class="mb-10" aria-labelledby="upcoming-heading">
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


    <section class="mb-10">
        <h3 class="text-2xl font-semibold mb-4">Naše Aktivity</h3>
        <div class="grid md:grid-cols-2 gap-4">
            @foreach($featured as $f)
                <x-featured-event :title="$f['title']" :image="$f['image']" :excerpt="$f['excerpt']" />
            @endforeach
        </div>
        <div class="mt-6 text-center">
            <a href="#events" class="px-4 py-2 bg-[var(--accent)] rounded">See more events</a>
        </div>
    </section>

    <x-team-section :image="$team['image']" :alt="$team['alt']" />
@endsection
