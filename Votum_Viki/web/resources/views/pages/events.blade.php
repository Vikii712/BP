@extends('layouts.app')

@section('content')
    <main class="py-12">

        <h1 class="h1 md:text-5xl font-bold text-votum-blue text-center mb-12">{{ __('nav.events') }}</h1>

        @if($upcomingEvents->isNotEmpty())
            <x-wave />
            <section class="w-full bg-blue-100 py-12">
                <div class="container max-w-6xl mx-auto sm:px-6">
                    <h2 class=" h2 font-bold text-votum-blue mb-8 text-center flex items-center justify-center gap-3">
                        <img src="{{asset('images/stars.svg')}}" alt="stars" width="30"/>
                        {{__('nav.nextUp')}}
                        <img src="{{asset('images/stars.svg')}}" alt="stars" width="30"/>
                    </h2>
                    <div class="grid md:grid-cols-2 gap-y-8">
                        @foreach($upcomingEvents as $event)
                            <x-event.event_card :color="false" :event="$event"/>
                        @endforeach
                    </div>
                </div>
            </section>
            <x-wave :inverted="true" />
        @endif

        <section class="w-full mt-16">
            <div class="container max-w-6xl mx-auto sm:px-6">
                <h2 class=" h2 md:text-5xl font-bold text-votum-blue text-center mb-8">{{ __('nav.mem') }}</h2>

                @forelse($pastEventsByYear as $year => $events)
                    <div class="mb-12">
                        <!-- Rok -->
                        <div class="flex items-center mb-6">
                            <div class="h-[2px] bg-votum-blue flex-grow mr-4"></div>
                            <h3 class=" h3 font-extrabold text-votum-blue">{{ $year }}</h3>
                            <div class="h-[2px] bg-votum-blue flex-grow ml-4"></div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-y-8">
                            @foreach($events as $event)
                                <x-event.event_card :event="$event" />
                            @endforeach
                        </div>
                    </div>
                @empty
                    <p class="text-center txt text-gray-500">{{ __('nav.noEvents') }}</p>
                @endforelse
            </div>
        </section>

        <x-home />

    </main>
@endsection
