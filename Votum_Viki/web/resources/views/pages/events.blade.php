@extends('layouts.app')

@section('content')
    <main class="py-12">

        <h1 class="h1 md:text-5xl font-bold text-votum-blue sentence text-center mb-5">{{ __('nav.events') }}</h1>

        @if($currentPage === 1)
            <x-home.calendar
                :calendarEvents="$calendarEvents"
                :upcomingEvents="$upcomingEvents"
            />
        @endif

        <section class="w-full mt-16">
            <div class="container max-w-6xl mx-auto sm:px-6">
                <h2 class=" h2 md:text-5xl font-bold sentence text-votum-blue text-center mb-8">{{ __('nav.mem') }}</h2>

                @forelse($pastEventsByYear as $year => $events)
                    <div class="mb-12">
                        <!-- Rok -->
                        <div class="flex items-center mb-6">
                            <div class="h-[2px] bg-votum-blue flex-grow mr-4"></div>
                            <h3 class=" h3 sentence font-extrabold text-votum-blue">{{ $year }}</h3>
                            <div class="h-[2px] bg-votum-blue flex-grow ml-4"></div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-y-8">
                            @foreach($events as $event)
                                <x-event.event_card :event="$event" />
                            @endforeach
                        </div>
                    </div>
                @empty
                    <p class="text-center sentence txt text-gray-500">{{ __('nav.noEvents') }}</p>
                @endforelse
            </div>

            @if($totalPages > 1)
                <div class="flex items-center flex-wrap justify-center gap-3 mt-10">
                    @if($currentPage > 1)
                        <a href="{{ request()->fullUrlWithQuery(['page' => $currentPage - 1]) }}"
                           class="txt-btn-block px-10 py-4 bg-blue-950 text-white rounded-md border border-votum-blue text-votum-blue hover:bg-votum-blue hover:text-white transition">
                            <i class="fa fa-arrow-left text-white"> </i>
                        </a>
                    @endif

                    <span class="text-votum-blue font-semibold text-xl">
                        {{ $currentPage }} / {{ $totalPages }}
                    </span>

                    @if($currentPage < $totalPages)
                        <a href="{{ request()->fullUrlWithQuery(['page' => $currentPage + 1]) }}"
                           class="txt-btn-block px-10 py-4 bg-blue-950 text-white rounded-md border border-votum-blue text-votum-blue hover:bg-votum-blue hover:text-white transition">
                            <i class="fa fa-arrow-right text-white"> </i>
                        </a>
                    @endif
                </div>
            @endif
        </section>

        <x-home />

    </main>
@endsection
