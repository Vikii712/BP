@extends('layouts.app')

@section('content')
    <main class="container mx-auto px-4 py-12">

        <!-- Event Header -->
        <div class="max-w-5xl mx-auto mb-8">
            <!-- Date and Action Buttons -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
                <div class="text-2xl font-bold text-votum-blue">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    28. 6. 2024
                </div>
                <div class="flex gap-3">
                    <button onclick="toggleListen()" id="listenBtn" class="bg-votum-blue text-white px-5 py-2 rounded-lg hover-scale font-semibold flex items-center gap-2">
                        <i class="fas fa-volume-up text-lg"></i>
                        <span>Vypočuť si</span>
                    </button>
                    <button onclick="shareEvent()" class="bg-green-600 text-white px-5 py-2 rounded-lg hover-scale font-semibold flex items-center gap-2">
                        <i class="fas fa-share-alt text-lg"></i>
                        <span>Zdieľať</span>
                    </button>
                </div>
            </div>

            <!-- Event Title -->
            <h1 class="text-4xl md:text-5xl font-bold text-votum-blue mb-4">
                Turistika Slavín
            </h1>

            <!-- Sponsors/Partners -->
            <div class="bg-white p-4 rounded-lg shadow-md mb-8">
                <div class="flex items-center gap-4 flex-wrap">
                    <span class="text-gray-600 font-semibold">Sponzori:</span>
                    <div class="flex items-center gap-4">
                        <span class="text-votum-blue font-bold text-lg">SPP</span>
                        <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                            <img src="{{asset('images/logo-partner.png')}}" alt="Partner logo" class="max-w-full max-h-full object-contain">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Description Section -->
        <section class="max-w-5xl mx-auto mb-12">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-votum-blue mb-6">O udalosti</h2>
                <div class="prose max-w-none text-gray-700 leading-relaxed space-y-4">
                    <p>
                        V júni 2024 sme sa vydali na nezabudnuteľnú turistiku k pamätníku Slavín v Bratislave. Táto akcia bola skvelou príležitosťou na spoločné trávenie času v prírode a spoznávanie historických pamiatok nášho hlavného města.
                    </p>
                    <p>
                        Začali sme ráno stretnutím pri Prezidentskom paláci, odkiaľ sme sa pomaly vybrali cestou cez Horský park smerom k pamätníku. Počasie nám prialo a atmosféra bola plná optimizmu a dobrej nálady. Počas cesty sme sa zastavovali na viacerých miestach, kde sme obdivovali výhľady na mesto a vzájomne sa podporovali pri stúpaní.
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
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-votum-blue mb-6">Fotky z udalosti</h2>

                <!-- Image Gallery with Navigation -->
                <div class="relative">
                    <div class="overflow-hidden rounded-lg mb-4">
                        <img id="mainImage" src="{{asset('images/event-slavin1.jpg')}}" alt="Turistika Slavín - Hlavná fotka" class="w-full h-96 object-cover">
                    </div>

                    <!-- Navigation Arrows -->
                    <button onclick="previousImage()" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 text-votum-blue p-3 rounded-full shadow-lg hover-scale">
                        <i class="fas fa-chevron-left text-xl"></i>
                    </button>
                    <button onclick="nextImage()" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 text-votum-blue p-3 rounded-full shadow-lg hover-scale">
                        <i class="fas fa-chevron-right text-xl"></i>
                    </button>

                    <!-- Thumbnail Gallery -->
                    <div class="grid grid-cols-4 gap-3 mt-4 image-gallery">
                        <img onclick="changeImage(0)" src="{{asset('images/event-slavin1.jpg')}}" alt="Foto 1" class="w-full h-24 object-cover rounded border-2 border-votum-blue cursor-pointer">
                        <img onclick="changeImage(1)" src="{{asset('images/event-slavin2.jpg')}}" alt="Foto 2" class="w-full h-24 object-cover rounded border-2 border-transparent cursor-pointer">
                        <img onclick="changeImage(2)" src="{{asset('images/event-slavin3.jpg')}}" alt="Foto 3" class="w-full h-24 object-cover rounded border-2 border-transparent cursor-pointer">
                        <img onclick="changeImage(3)" src="{{asset('images/event-slavin4.jpg')}}" alt="Foto 4" class="w-full h-24 object-cover rounded border-2 border-transparent cursor-pointer">
                    </div>
                </div>
            </div>
        </section>

        <!-- Videos Section -->
        <section class="max-w-5xl mx-auto mb-12">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-votum-blue mb-6">Pozrite si video</h2>

                <div class="aspect-video bg-gray-900 rounded-lg overflow-hidden flex items-center justify-center">
                    <!-- Video Player Placeholder -->
                    <div class="text-center">
                        <button class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white rounded-full p-6 hover-scale">
                            <i class="fas fa-play text-4xl"></i>
                        </button>
                        <p class="text-white mt-4">Video z turistiky na Slavín</p>
                    </div>
                    <!-- In real implementation, you would use:
                <video controls class="w-full h-full">
                    <source src="{{asset('videos/event-slavin.mp4')}}" type="video/mp4">
                </video>
                -->
                </div>
            </div>
        </section>

        <!-- Documents Section -->
        <section class="max-w-5xl mx-auto mb-12">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-votum-blue mb-6">Dokumenty na stiahnutie</h2>

                <div class="space-y-3">
                    <!-- Document 1 -->
                    <div class="flex items-center justify-between bg-votum-cream p-4 rounded-lg hover:shadow-md transition">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-file-pdf text-red-600 text-2xl"></i>
                            <span class="font-semibold text-votum-blue">Program turistiky - Slavín 2024.pdf</span>
                        </div>
                        <a href="#" download class="bg-votum-blue text-white px-4 py-2 rounded hover-scale flex items-center gap-2">
                            <i class="fas fa-download"></i>
                            <span>Stiahnuť</span>
                        </a>
                    </div>

                    <!-- Document 2 -->
                    <div class="flex items-center justify-between bg-votum-cream p-4 rounded-lg hover:shadow-md transition">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-file-pdf text-red-600 text-2xl"></i>
                            <span class="font-semibold text-votum-blue">Zoznam účastníkov.pdf</span>
                        </div>
                        <a href="#" download class="bg-votum-blue text-white px-4 py-2 rounded hover-scale flex items-center gap-2">
                            <i class="fas fa-download"></i>
                            <span>Stiahnuť</span>
                        </a>
                    </div>

                    <!-- Document 3 -->
                    <div class="flex items-center justify-between bg-votum-cream p-4 rounded-lg hover:shadow-md transition">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-file-image text-blue-600 text-2xl"></i>
                            <span class="font-semibold text-votum-blue">Fotogaléria - všetky fotky.zip</span>
                        </div>
                        <a href="#" download class="bg-votum-blue text-white px-4 py-2 rounded hover-scale flex items-center gap-2">
                            <i class="fas fa-download"></i>
                            <span>Stiahnuť</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Navigation Buttons -->
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="events.html" class="inline-flex items-center justify-center gap-3 bg-gray-600 text-white px-8 py-4 rounded-lg hover-scale font-semibold text-lg shadow-lg">
                    <i class="fas fa-calendar-alt text-2xl"></i>
                    <span>Udalosti</span>
                </a>
                <a href="index.html" class="inline-flex items-center justify-center gap-3 bg-votum-blue text-white px-8 py-4 rounded-lg hover-scale font-semibold text-lg shadow-lg">
                    <i class="fas fa-home text-2xl"></i>
                    <span>Domov</span>
                </a>
            </div>

            <!-- Scroll to Top Button -->
            <div class="text-center mt-8">
                <button onclick="scrollToTop()" class="bg-white text-votum-blue p-4 rounded-full shadow-lg hover-scale">
                    <i class="fas fa-arrow-up text-2xl"></i>
                </button>
            </div>
        </div>

    </main>
@endsection
