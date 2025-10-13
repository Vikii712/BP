@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-10 space-y-12">

        <!-- HERO -->
        <section class="grid md:grid-cols-2 gap-8 items-center bg-[#f1ebe3] rounded-lg p-6 shadow-sm" aria-labelledby="hero-heading">
            <div class="space-y-4">
                <h2 id="hero-heading" class="text-3xl font-bold" style="color: var(--votum-dark)">
                    {{ $t['slogan'] }}
                </h2>
                <p class="text-gray-700">
                    A welcoming community for young people with different abilities. Programs, events and personal support.
                </p>

                <div class="flex flex-wrap gap-3 items-center">
                    <a href="#about"
                       class="inline-block px-4 py-2 bg-[var(--votum-dark)] text-white rounded focus-ring"
                       aria-label="{{ $t['more_about_us'] }}">
                        {{ $t['more_about_us'] }}
                    </a>

                    <!-- Social buttons -->
                    <a href="https://facebook.com" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 px-3 py-2 border rounded focus-ring"
                       aria-label="Facebook">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M22 12a10 10 0 10-11.6 9.9v-7H8v-3h2.4V9.3c0-2.4 1.4-3.7 3.5-3.7 1 0 2 .07 2 .07v2.2h-1.12c-1.1 0-1.44.68-1.44 1.38V12H19l-.5 3h-2.4v7A10 10 0 0022 12z"/>
                        </svg>
                    </a>

                    <a href="https://youtube.com" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 px-3 py-2 border rounded focus-ring"
                       aria-label="YouTube">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M10 15l5.2-3L10 9v6z"/>
                            <path d="M21.6 7.2s-.2-1.6-.8-2.3C19.8 4 16.3 4 16.3 4h-8.6S4.8 4 3.2 4.9C2.6 5.6 2.4 7.2 2.4 7.2S2 9 2 10.9v2.2C2 16.9 3.1 18 3.1 18s1.1 1 2.5 1.2c1.7.2 8.4.2 8.4.2s3.5 0 4.5-.8c.7-.5.9-1.6.9-2.6V10.9c0-1.9-.4-3.7-.8-3.7z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Hero image -->
            <div class="flex justify-center">
                <img src="{{ asset('images/group.jpg') }}"
                     alt="Group of young people smiling"
                     class="w-full max-w-md md:max-w-full rounded-lg object-cover aspect-[4/3]" />
            </div>
        </section>

        <!-- UPCOMING EVENTS -->
        <section aria-labelledby="upcoming-title" class="grid md:grid-cols-2 gap-6 items-start">
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <h3 id="upcoming-title" class="font-semibold text-xl mb-3">{{ $t['events'] }}</h3>

                @php
                    use Carbon\Carbon;
                    $month = $calendarMonth->month;
                    $year = $calendarMonth->year;
                    $start = Carbon::create($year, $month, 1);
                    $startWeekday = $start->dayOfWeekIso;
                    $daysInMonth = $start->daysInMonth;
                    $weekDays = ['Po','Ut','St','Št','Pi','So','Ne'];
                @endphp

                <div class="grid grid-cols-7 gap-1 text-center text-xs mb-3">
                    @foreach($weekDays as $wd)
                        <div class="font-medium border-b pb-1">{{ $wd }}</div>
                    @endforeach

                    @for($i=1;$i<$startWeekday;$i++)
                        <div></div>
                    @endfor

                    @for($day=1;$day<=$daysInMonth;$day++)
                        @php
                            $date = Carbon::create($year, $month, $day)->format('Y-m-d');
                            $has = collect($events)->contains(fn($e) => $e['date'] === $date);
                        @endphp
                        <div class="py-2 rounded text-sm {{ $has ? 'bg-[var(--votum-dark)] text-white' : 'bg-gray-50' }}">
                            {{ $day }}
                        </div>
                    @endfor
                </div>

                <a href="{{ route('calendar.ical', ['title'=>'VOTUM Events','date'=>$events[0]['date'] ?? date('Y-m-d')]) }}"
                   class="inline-block px-4 py-2 border rounded focus-ring mt-2">
                    {{ $t['add_to_calendar'] }}
                </a>
            </div>

            <div class="bg-white rounded-lg p-6 shadow-sm">
                <h3 class="font-semibold text-xl mb-3">{{ $t['events'] }}</h3>

                <ul class="space-y-4">
                    @foreach($events as $ev)
                        <li class="flex flex-col sm:flex-row sm:items-center justify-between border rounded p-3 gap-3">
                            <div>
                                <time datetime="{{ $ev['date'] }}" class="block font-medium">{{ \Carbon\Carbon::parse($ev['date'])->format('j.n.Y') }}</time>
                                <div class="text-lg">{{ $ev['title'] }}</div>
                            </div>

                            <div class="flex flex-wrap gap-2 sm:flex-nowrap sm:flex-col sm:items-end">
                                <a href="{{ route('calendar.ical', ['title'=>$ev['title'],'date'=>$ev['date']]) }}"
                                   class="px-3 py-1 border rounded text-sm focus-ring">
                                    {{ $t['add_to_calendar'] }}
                                </a>
                                <div class="flex gap-2">
                                    <button class="px-3 py-1 border rounded focus-ring" aria-label="Copy link">🔗</button>
                                    <button class="px-3 py-1 border rounded focus-ring" aria-label="Share on Facebook">f</button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        <!-- FEATURED ACTIVITIES -->
        <section aria-labelledby="featured" class="bg-white rounded-lg p-6 shadow-sm">
            <h3 id="featured" class="font-semibold text-xl mb-4">{{ $t['featured'] }}</h3>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach([['title'=>'Tábor 2024','img'=>'/images/activity1.jpg'], ['title'=>'Koncert 2023','img'=>'/images/activity2.jpg']] as $card)
                    <article class="border rounded overflow-hidden bg-white flex flex-col" role="article">
                        <img src="{{ asset($card['img']) }}" alt="{{ $card['title'] }} image" class="w-full aspect-[4/3] object-cover" />
                        <div class="p-4 flex flex-col flex-1">
                            <h4 class="font-semibold text-lg">{{ $card['title'] }}</h4>
                            <p class="mt-2 text-sm flex-1">Short description about the activity that is friendly and inclusive.</p>
                            <a href="#events" class="inline-block mt-4 px-3 py-2 border rounded focus-ring self-start">{{ $t['see_more'] }}</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <!-- TEAM -->
        <section aria-labelledby="team" class="bg-white rounded-lg p-6 shadow-sm">
            <h3 id="team" class="font-semibold text-xl mb-4">{{ $t['team'] }}</h3>

            <div class="flex flex-col md:flex-row items-center gap-6">
                <img src="{{ asset('images/team.jpg') }}"
                     alt="Our team photo"
                     class="w-full md:w-1/2 aspect-[4/3] object-cover rounded-lg" />
                <div class="md:flex-1">
                    <p class="mb-4 text-gray-700">
                        We are a small, passionate team of volunteers and professionals working to make our community more inclusive.
                    </p>
                    <a href="#about" class="inline-block px-4 py-2 bg-[var(--votum-dark)] text-white rounded focus-ring">
                        {{ $t['learn_team'] }}
                    </a>
                </div>
            </div>
        </section>

    </div>
@endsection
