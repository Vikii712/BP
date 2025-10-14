@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto px-4 py-12 space-y-12">

        <!-- Page title -->
        <header class="text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4 text-[var(--votum-dark)]">
                História Združenia VOTUM
            </h1>
            <p class="text-gray-700 text-base md:text-lg max-w-2xl mx-auto">
                Pozrite sa na našu cestu – ako sme rástli, pomáhali a spoločne tvorili komunitu otvorenú pre všetkých.
            </p>
        </header>

        <!-- Timeline -->
        <section class="relative">
            <!-- vertical line -->
            <div class="absolute left-1/2 transform -translate-x-1/2 h-full border-l-4 border-[var(--votum-dark)]" aria-hidden="true"></div>

            <div class="space-y-16">
                <!-- Event item -->
                @foreach ([
                    ['year' => 2010, 'text' => 'Založenie združenia VOTUM skupinou mladých dobrovoľníkov.'],
                    ['year' => 2011, 'text' => 'Prvé komunitné stretnutie a diskusia o potrebách mladých ľudí so zdravotným znevýhodnením.'],
                    ['year' => 2012, 'text' => 'Spustenie programu osobnej asistencie a mentorských aktivít.'],
                    ['year' => 2013, 'text' => 'Začiatok spolupráce so školami a lokálnymi organizáciami.'],
                    ['year' => 2014, 'text' => 'Organizácia prvého letného tábora pre mladých so špeciálnymi potrebami.', 'img' => 'images/timeline1.jpg'],
                    ['year' => 2015, 'text' => 'Rozšírenie tímu o odborníkov na inklúziu a sociálnu prácu.'],
                    ['year' => 2016, 'text' => 'Získanie ocenenia za prínos k rozvoju komunitného života v regióne.'],
                    ['year' => 2018, 'text' => 'Spustenie online podpory počas pandémie a nárast počtu dobrovoľníkov.'],
                    ['year' => 2019, 'text' => 'Otvorenie nového komunitného centra v Bratislave.', 'img' => 'images/timeline2.jpg'],
                    ['year' => 2021, 'text' => 'Rozšírenie našich aktivít na celonárodnú úroveň.'],
                    ['year' => 2023, 'text' => 'Organizácia prvého medzinárodného inkluzívneho festivalu.'],
                    ['year' => 2025, 'text' => 'Plánujeme nové partnerstvá a programy zamerané na mladých lídrov.', 'img' => 'images/timeline3.jpg']
                ] as $i => $event)
                    @php $isLeft = $i % 2 === 0; @endphp
                    <article class="relative flex flex-col md:flex-row items-center {{ $isLeft ? 'md:justify-start' : 'md:justify-end' }}">

                        <div class="md:w-1/2 {{ $isLeft ? 'md:pr-10' : 'md:pl-10' }}">
                            <div class="bg-white rounded-lg shadow p-5">
                                <h2 class="text-xl font-semibold text-[var(--votum-dark)]">{{ $event['year'] }}</h2>
                                <p class="mt-2 text-gray-700">{{ $event['text'] }}</p>
                                @if(isset($event['img']))
                                    <img src="{{ asset($event['img']) }}" alt="Event image from {{ $event['year'] }}" class="mt-3 rounded-lg w-full h-48 object-cover" />
                                @endif
                            </div>
                        </div>

                        <!-- timeline dot -->
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-5 h-5 bg-[var(--votum-dark)] rounded-full border-4 border-[var(--votum-cream,#f1ebe3)]"></div>
                    </article>
                @endforeach
            </div>
        </section>

        <!-- Back home button -->
        <div class="text-center pt-10">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-5 py-3 bg-[var(--votum-dark)] text-white rounded hover:bg-blue-900 focus-ring transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.75L12 4l9 5.75V20a1 1 0 01-1 1h-6v-6H10v6H4a1 1 0 01-1-1V9.75z" />
                </svg>
                Domov
            </a>
        </div>
    </div>
@endsection
