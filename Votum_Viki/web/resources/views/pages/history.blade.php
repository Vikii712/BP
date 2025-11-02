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

<style>
    /* Timeline Styles */
    .timeline-item {
        position: relative;
        padding-left: 60px;
        padding-bottom: 60px;
    }
    .timeline-item:last-child {
        padding-bottom: 0;
    }
    .timeline-item::before {
        content: '';
        position: absolute;
        left: 20px;
        top: 0;
        bottom: -60px;
        width: 3px;
        background: linear-gradient(to bottom, #051647, #0a2558);
    }
    .timeline-item:last-child::before {
        bottom: 0;
    }
    .timeline-dot {
        position: absolute;
        left: 10px;
        top: 5px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: #051647;
        border: 4px solid #f1ebe3;
        z-index: 1;
    }
    .timeline-year {
        position: absolute;
        left: -50px;
        top: 0;
        font-size: 1.25rem;
        font-weight: bold;
        color: #051647;
    }

    /* --- RESPONSIVE ÚPRAVA PRE MOBIL --- */
    @media (max-width: 640px) {
        .timeline-item {
            padding-left: 0;
            padding-top: 2.5rem;
            margin-left: 1.5rem;
        }

        .timeline-item::before {
            left: 12px;
            top: 1.5rem;
            bottom: 0;
        }

        .timeline-dot {
            left: 0;
            top: 1.5rem;
        }

        /* Rok napravo od bodky */
        .timeline-year {
            position: absolute;
            left: 40px; /* posunie rok doprava od bodky */
            top: 1.25rem;
            font-size: 1.125rem;
            font-weight: 700;
            color: #051647;
            background: #f1ebe3;
            padding: 0.1rem 0.6rem;
            border-radius: 0.4rem;
            display: inline-block;
        }

        .timeline-item .p-6 {
            padding: 0;
            margin-left: 1.75rem; /* text zarovnaný pod rokom */
            margin-top: 1.5rem;
        }

        .timeline-item h3 {
            margin-top: 0.25rem;
        }
    }
</style>
