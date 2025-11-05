@extends('layouts.app')

@section('content')
    <main class="container max-w-6xl mx-auto px-6 py-12">
        <!-- Nadpis -->
        <h1 class="text-4xl md:text-5xl font-bold text-votum-blue text-center mb-12">Udalosti</h1>

        <!-- Budúce udalosti -->
        <section class="mb-16 p-8 rounded-2xl bg-votum-blue">
            <h2 class="text-3xl font-bold text-other-cream mb-8 text-center flex items-center justify-center gap-3">
                <img src="{{asset('images/stars.svg')}}" alt="stars" width="30"/>
                Čo nás čaká?
                <img src="{{asset('images/stars.svg')}}" alt="stars" width="30"/>
            </h2>
            <div class="grid md:grid-cols-2 gap-y-8">
                <x-event.event_card/>
                <x-event.event_card/>
            </div>
        </section>

        <!-- Minulé udalosti -->
        <section>
            <h2 class="text-4xl md:text-5xl font-bold text-votum-blue text-center mb-8">Naše spomienky</h2>

            @foreach([2025, 2024, 2023, 2022] as $year)
                <div class="mb-12">
                    <!-- Rok -->
                    <div class="flex items-center mb-6">
                        <div class="h-[2px] bg-votum-blue flex-grow mr-4"></div>
                        <h3 class="text-2xl font-extrabold text-votum-blue">{{ $year }}</h3>
                        <div class="h-[2px] bg-votum-blue flex-grow ml-4"></div>
                    </div>

                    <!-- Karty -->
                    <div class="grid md:grid-cols-2 gap-y-8">
                        <x-event.event_card/>
                        <x-event.event_card/>
                    </div>
                </div>
            @endforeach
        </section>

        <!-- Domov -->
        <div class="text-center mt-20">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-3 bg-votum-blue text-white px-8 py-4 rounded-lg font-semibold text-lg hover:opacity-90 transition">
                <i class="fas fa-home text-2xl"></i>
                <span>Domov</span>
            </a>
        </div>
    </main>
@endsection
