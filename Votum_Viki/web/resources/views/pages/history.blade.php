@extends('layouts.app')

@php
    $timeline = [
        [
            'year' => 1993,
            'name' => 'Vznik združenia Veselá škôlka',
            'text' => 'Iniciatíva ľudí s cieľom vytvoriť alternatívnu predškolskú výchovu – vznik združenia Veselá škôlka, služba druhému ako základný princíp našej činnosti.'
        ],
        [
            'year' => 1994,
            'name' => 'Rozšírenie aktivít',
            'text' => 'Nové podnety rodičov a priateľov: práca s mládežou, spoločné rodinné dovolenky, plesy.'
        ],
        [
            'year' => 1995,
            'name' => 'Vzdelávanie a kultúrne podujatia',
            'text' => 'Rozšírenie činnosti o vzdelávanie – prednášky, jazykové kurzy, výstavy, koncerty. Združenie získava nový názov: VOTUM.'
        ],
        [
            'year' => 2000,
            'name' => 'Transformácia združenia',
            'text' => 'Transformácia združenia – zameranie na deti a mladých ľudí s postihnutím. Snaha vnímať a reagovať na meniace sa potreby ľudí so zdravotným znevýhodnením.'
        ],
        [
            'year' => 2016,
            'name' => 'Nové priestory',
            'text' => 'Sťahovanie do nových priestorov v Dome RAFAEL v Petržalke – nové zázemie pre naše aktivity a komunitné stretnutia.'
        ]
    ];
@endphp

@section('content')
    <div class="container mx-auto px-4 py-12">
        <!-- Nadpis + tlačidlá -->
        <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left gap-6 mb-10">
            <h1 class="text-4xl md:text-6xl font-extrabold text-votum-blue">História</h1>

            <div class="flex justify-center md:justify-end gap-4 flex-wrap">
                <button onclick="toggleListen()" id="listenBtn"
                        class="bg-votum-blue text-white px-6 py-3 rounded-lg hover:scale-105 transition transform font-semibold flex items-center gap-2">
                    <i class="fas fa-volume-up text-xl"></i>
                    <span>Vypočuť si</span>
                </button>

                <button onclick="shareButton()"
                        class="bg-green-600 text-white px-6 py-3 rounded-lg hover:scale-105 transition transform font-semibold flex items-center gap-2">
                    <i class="fas fa-share-alt text-xl"></i>
                    <span>Zdieľať</span>
                </button>
            </div>
        </div>

        <!-- Timeline -->
        <div class="relative max-w-4xl mx-auto md:pl-20">            <!-- Vertikálna čiara -->
            <div class="absolute md:ml-20 left-2 top-3 bottom-0 w-[2px] bg-votum-blue"></div>

            @foreach($timeline as $entry)
                <div class="relative mb-12 last:mb-0">
                    <!-- Bodka -->
                    <div class="absolute left-[1px] top-3 w-4 h-4 rounded-full bg-white border-4 border-votum-blue shadow"></div>

                    <!-- Rok -->
                    <div
                        class="ml-8 inline-block bg-votum-blue text-white px-4 py-1.5 rounded-full text-lg sm:text-xl font-semibold
                                md:absolute md:right-[calc(100%+1rem)] md:ml-0">
                        {{ $entry['year'] }}
                    </div>

                    <!-- Obsah -->
                    <div class="ml-8  p-5 md:p-6">
                        <h3 class="text-3xl font-bold text-votum-blue mb-2">{{ $entry['name'] }}</h3>
                        <p class="text-gray-700 leading-relaxed text-xl">{{ $entry['text'] }}</p>
                    </div>

                    @if($loop->index % 3 == 0)
                        <div class="ml-8 mt-6 flex justify-center">
                            <img src="{{ asset('images/team.jpg') }}"
                                 alt="Votum"
                                 class="w-full max-w-sm  sm:max-w-md md:max-w-xl" />
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <x-home />
    </div>
@endsection
