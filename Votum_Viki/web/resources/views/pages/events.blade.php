@extends('layouts.app')

@section('content')
    <main class="py-12">

        <h1 class="text-4xl md:text-5xl font-bold text-votum-blue text-center mb-12">Udalosti</h1>

        <x-wave />
        <section class="w-full bg-blue-100 py-12">
            <div class="container max-w-6xl mx-auto sm:px-6">
                <h2 class="text-3xl font-bold text-votum-blue mb-8 text-center flex items-center justify-center gap-3">
                    <img src="{{asset('images/stars.svg')}}" alt="stars" width="30"/>
                    Čo nás čaká?
                    <img src="{{asset('images/stars.svg')}}" alt="stars" width="30"/>
                </h2>
                <div class="grid md:grid-cols-2 gap-y-8">
                    <x-event.event_card :color="false"/>
                    <x-event.event_card :color="false"/>
                </div>
            </div>
        </section>

        <x-wave :inverted="true" />

        <section class="w-full mt-16">
            <div class="container max-w-6xl mx-auto sm:px-6">
                <h2 class="text-4xl md:text-5xl font-bold text-votum-blue text-center mb-8">Naše spomienky</h2>

                @foreach([2025, 2024, 2023, 2022] as $year)
                    <div class="mb-12">
                        <!-- Rok -->
                        <div class="flex items-center mb-6">
                            <div class="h-[2px] bg-votum-blue flex-grow mr-4"></div>
                            <h3 class="text-2xl font-extrabold text-votum-blue">{{ $year }}</h3>
                            <div class="h-[2px] bg-votum-blue flex-grow ml-4"></div>
                        </div>


                        <div class="grid md:grid-cols-2 gap-y-8">
                            <x-event.event_card/>
                            <x-event.event_card/>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <x-home />

    </main>
@endsection
