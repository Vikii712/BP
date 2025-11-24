@extends('layouts.app')

@section('content')
    <main class="container mx-auto px-4 py-12">

        <!-- Event Header -->
        <div class="max-w-5xl mx-auto mb-8">

            <h1 class="text-center md:text-start h1 font-bold text-votum-blue mb-4">
                Turistika Slavín
            </h1>


            <!-- Date and Action Buttons -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
                <div class="h3 font-bold text-votum-blue">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    28. 6. 2024
                </div>
                <x-share />
            </div>

            <span class="w-full text-votum-blue font-semibold txt">Sponzori:</span>
            <div class="flex items-center gap-4 flex-wrap p-4">
                @for($i = 0; $i < 2; $i++)
                    <div class="p-3 flex items-center gap-4 border-3 border-votum1 bg-votum1 rounded-lg">
                        <span class="text-votum-blue font-bold text-lg">Bratislavský samosprávny kraj</span>
                        <div class="h-16  rounded flex items-center justify-center">
                            <img src="{{asset('images/logo_bk.png')}}" alt="Partner logo" class="max-w-full max-h-full object-contain">
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <!-- Event Description Section -->
        <section class="max-w-5xl mx-auto mb-12">
            <div class="relative">
                <h2 class="h2 font-bold text-votum-blue mb-6">O udalosti</h2>
                <x-listen />
                <div class=" txt prose max-w-none  space-y-4">
                    <p>
                        V júni 2024 sme sa vydali na nezabudnuteľnú turistiku k pamätníku Slavín v Bratislave. Táto akcia bola skvelou príležitosťou na spoločné trávenie času v prírode a spoznávanie historických pamiatok nášho hlavného města.
                    </p>
                    <p>
                        Na Slavíne sme strávili príjemné chvíle, fotili sa, oddychovali a vychutnávali si výhľad na celú Bratislavu. Niektorí účastníci navštívili aj samotný pamätník a dozvedeli sa viac o jeho histórii a význame. Po spoločnom obede sme sa vydali späť do centra, unavení, ale šťastní zo spoločne stráveného dňa.
                    </p>
                    <p>
                        Táto aktivita ukázala, že spoločné zážitky v prírode sú skvelým spôsobom, ako posilniť priateľstvá a vytvoriť si nové spomienky. Ďakujeme všetkým účastníkom za ich účasť a pozitívnu energiu!
                    </p>
                </div>
            </div>
        </section>

        <a href="https://photos.app.goo.gl/zEXLTiG11oPoTrN69" class="block group mx-4" target="_blank" >
            <section
                class="flex flex-col items-center justify-center text-center
                   mx-auto p-10 border-6 border-votum2 bg-votum2 max-w-4xl mb-8
                   rounded-2xl transition-all duration-300 txt-btn-block">
                <div class="p-6  mb-6">
                    <img src="{{ asset('images/fotky.svg') }}" alt="fotky" width="100" class="mx-auto">
                </div>
                <h2 class="h2 font-bold text-votum2 group-hover:text-votum-dark transition-colors duration-200">
                    Fotky
                </h2>
            </section>
        </a>


        <!-- Videos Section -->
        <section class="max-w-5xl mx-auto mb-12">
            <div class="">
                <h2 class="h2 font-bold text-votum-blue mb-6">Pozrite si video</h2>

                <div class="aspect-video bg-gray-900 rounded-lg overflow-hidden">
                    <iframe class="w-full h-full" width="560" height="315"
                            src="https://www.youtube.com/embed/sJHrJ1NKnZs?si=sBaLbHQunQUw5MJo"
                            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </section>
    </main>

    <x-wave />
    <div class="bg-blue-100">
        <!-- Documents Section -->
        <section class=" max-w-5xl mx-auto pb-12">
            <div class=" p-8 rounded-lg">
                <h2 class="h2 font-bold text-votum-blue mb-6">Dokumenty na stiahnutie</h2>

                <div class="space-y-5">
                    <x-documents.document :color="false"/>
                    <x-documents.document :color="false"/>
                    <x-documents.document :color="false"/>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex flex-col md:flex-row justify-between px-10">
                <div class="text-center mt-16 mb-3">
                    <a href="{{route('events')}}" class="txt-btn inline-flex items-center gap-3 bg-gray-600 text-white px-10 py-8 rounded-lg font-semibold text-xl shadow-lg">
                        <i class="fas fa-calendar-days"></i>
                        <span>Udalosti</span>
                    </a>
                </div>

                <x-home />
            </div>
        </section>
    </div>
@endsection
