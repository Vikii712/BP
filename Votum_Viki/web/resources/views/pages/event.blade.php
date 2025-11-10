@extends('layouts.app')

@section('content')
    <main class="container mx-auto px-4 py-12">

        <!-- Event Header -->
        <div class="max-w-5xl mx-auto mb-8">

            <h1 class="text-center md:text-start text-5xl font-bold text-votum-blue mb-4">
                Turistika Slavín
            </h1>


            <!-- Date and Action Buttons -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
                <div class="text-2xl font-bold text-votum-blue">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    28. 6. 2024
                </div>
                <x-listen-share />
            </div>
            <!-- Sponsors/Partners -->
            <div class="p-4">
                <div class="flex items-center gap-4 flex-wrap">
                    <span class="w-full text-gray-600 font-semibold">Sponzori:</span>
                    @for($i = 0; $i < 2; $i++)
                        <div class="p-3 flex items-center gap-4 bg-other-cream rounded-lg">
                            <span class="text-votum-blue font-bold text-lg">Bratislavský samosprávny kraj</span>
                            <div class="h-16 bg-gray-200 rounded flex items-center justify-center">
                                <img src="{{asset('images/logo_bk.png')}}" alt="Partner logo" class="max-w-full max-h-full object-contain">
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Event Description Section -->
        <section class="max-w-5xl mx-auto mb-12">
            <div class="">
                <h2 class="text-3xl font-bold text-votum-blue mb-6">O udalosti</h2>
                <div class=" text-xl prose max-w-none  space-y-4">
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

        <!-- Photos Section -->
        <section class="max-w-5xl mx-auto mb-12">
            <div class="">
                <h2 class="text-3xl font-bold text-votum-blue mb-6">Fotky</h2>

                <script src="https://cdn.jsdelivr.net/npm/publicalbum@latest/embed-ui.min.js" async></script>
                <div class="pa-gallery-player-widget" style="width:100%; height:480px; display:none;"
                     data-link="https://photos.app.goo.gl/zEXLTiG11oPoTrN69"
                     data-title="Votum · Tuesday, Oct 7 📸"
                     data-description="Shared album · Tap to view!">
                    <object data="https://lh3.googleusercontent.com/pw/AP1GczOXe6bGUE9Fhit9J9CagvvVbw8AFO3F6c6dq4BGIdIWsYTYG27ygo97ddfeRhcdx5CbKYGJ0zuuo-lnoPkP1JBTxwZqGEya3IXCzFHKwmwFN84ytg=w1920-h1080"></object>
                    <object data="https://lh3.googleusercontent.com/pw/AP1GczOdZn9_h_nWz8KpQ-RyK_0Ky_XVslbmjQ4NWapPCsQJiKzFKJ6l7lmh4wHq41wYQL_DMbuJlWjTQHOq_SCGkLrYQlqraDCYhAF1z39zctn2TjaWCw=w1920-h1080"></object>
                    <object data="https://lh3.googleusercontent.com/pw/AP1GczN--tXqKuQwDXJMZOo14y9WIEPCko7GYEN94jxeb16GtU9ghOOT0SF9ArVQO_fIc1QmdOUeCraq8EdqU82Auj1NcsIZrwxCor3pPPeo43ktINoyCw=w1920-h1080"></object>
                </div>

            </div>
        </section>

        <!-- Videos Section -->
        <section class="max-w-5xl mx-auto mb-12">
            <div class="">
                <h2 class="text-3xl font-bold text-votum-blue mb-6">Pozrite si video</h2>

                <div class="aspect-video bg-gray-900 rounded-lg overflow-hidden">
                    <iframe class="w-full h-full" width="560" height="315"
                            src="https://www.youtube.com/embed/sJHrJ1NKnZs?si=sBaLbHQunQUw5MJo"
                            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </section>

        <!-- Documents Section -->
        <section class="max-w-5xl mx-auto mb-12">
            <div class=" p-8 bg-other-cream rounded-lg">
                <h2 class="text-2xl font-bold text-votum-blue mb-6">Dokumenty na stiahnutie</h2>

                <div class="space-y-5">
                    <x-documents.document color="true"/>
                    <x-documents.document color="true"/>
                    <x-documents.document color="true"/>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex flex-col md:flex-row justify-between px-10">
                <div class="text-center mt-16 mb-3">
                    <a href="{{route('events')}}" class="inline-flex items-center gap-3 bg-gray-600 text-white px-10 py-8 rounded-lg hover-scale font-semibold text-xl shadow-lg">
                        <i class="fas fa-calendar-days text-2xl"></i>
                        <span>Udalosti</span>
                    </a>
                </div>

                <x-home />
            </div>
        </section>


    </main>
@endsection
