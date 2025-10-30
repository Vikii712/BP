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
<!-- Main Content -->
<div class="container mx-auto px-4 py-12">
    <!-- Page Title -->
    <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left gap-6 mb-10">
        <h1 class="text-4xl md:text-6xl font-extrabold text-votum-blue">
            História
        </h1>

        <div class="flex justify-center md:justify-end gap-4 flex-wrap">
            <button onclick="toggleListen()" id="listenBtn" class="bg-votum-blue text-white px-6 py-3 rounded-lg hover-scale font-semibold flex items-center gap-2">
                <i class="fas fa-volume-up text-xl"></i>
                <span>Vypočuť si</span>
            </button>
            <button onclick="shareButton()" class="bg-green-600 text-white px-6 py-3 rounded-lg hover-scale font-semibold flex items-center gap-2">
                <i class="fas fa-share-alt text-xl"></i>
                <span>Zdieľať</span>
            </button>
        </div>
    </div>

    <div class="max-w-4xl mx-auto  md:ml-32">

        @foreach($timeline as $entry)

        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-year">{{$entry['year']}}</div>
            <div class="p-6 pt-0 ">
                <h3 class="text-2xl font-bold text-votum-blue mb-3">{{$entry['name']}}</h3>
                <p class="text-gray-700">
                    {{$entry['text']}}
                </p>
            </div>
        </div>
        @endforeach

    </div>

    <!-- Home Button -->
    <div class="text-center mt-16 mb-8">
        <a href="index.html" class="inline-flex items-center gap-3 bg-votum-blue text-white px-8 py-4 rounded-lg hover-scale font-semibold text-lg shadow-lg">
            <i class="fas fa-home text-2xl"></i>
            <span>Späť na hlavnú stránku</span>
        </a>
    </div>
</div>
@endsection

