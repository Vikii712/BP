<!-- Main Content -->
<main class="container mx-auto px-4 py-12">
    <!-- Page Title -->
    <h1 class="text-4xl md:text-5xl font-bold text-votum-blue text-center mb-8">Udalosti</h1>

    <!-- Year Filter -->
    <div class="mb-8">
        <p class="text-center text-gray-600 mb-4">Skočiť na rok:</p>
        <div class="flex justify-center gap-3 flex-wrap">
            <button onclick="filterByYear('all')" class="year-filter-btn active bg-white text-votum-blue px-6 py-2 rounded-full font-semibold shadow hover-scale">
                Všetky
            </button>
            <button onclick="filterByYear('2025')" class="year-filter-btn bg-white text-votum-blue px-6 py-2 rounded-full font-semibold shadow hover-scale">
                2025
            </button>
            <button onclick="filterByYear('2024')" class="year-filter-btn bg-white text-votum-blue px-6 py-2 rounded-full font-semibold shadow hover-scale">
                2024
            </button>
            <button onclick="filterByYear('2023')" class="year-filter-btn bg-white text-votum-blue px-6 py-2 rounded-full font-semibold shadow hover-scale">
                2023
            </button>
            <button onclick="filterByYear('2022')" class="year-filter-btn bg-white text-votum-blue px-6 py-2 rounded-full font-semibold shadow hover-scale">
                2022
            </button>
        </div>
    </div>

    <!-- Future Events Section -->
    <div class="mb-12 bg-gradient-to-r from-yellow-50 to-orange-50 p-6 rounded-lg border-4 border-yellow-400">
        <h2 class="text-3xl font-bold text-votum-blue mb-6 text-center flex items-center justify-center gap-3">
            <i class="fas fa-star text-yellow-500"></i>
            Čo nás čaká?
            <i class="fas fa-star text-yellow-500"></i>
        </h2>
        <div class="grid md:grid-cols-2 gap-6">

            <!-- Future Event 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-scale">
                <div class="flex gap-4 p-4">
                    <div class="w-32 h-32 flex-shrink-0 rounded overflow-hidden">
                        <img src="{{asset('images/event-concert.jpg')}}" alt="Koncert na námestí" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-votum-blue mb-2">Koncert na námestí</h3>
                        <p class="text-sm text-gray-600 mb-2">
                            <i class="fas fa-calendar mr-2"></i>15. december 2025
                        </p>
                        <p class="text-gray-700 text-sm">Vianočný koncert s našimi talentovanými členmi na hlavnom námestí.</p>
                        <a href="{{ url('/event') }}">
                            <button class="mt-2 text-votum-blue font-semibold hover:underline text-sm">
                                Viac <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            

        </div>
    </div>

    <!-- Past Events Section -->
    <div class="mb-12">
        <h2 class="text-3xl font-bold text-votum-blue mb-6 text-center">Naše udalosti</h2>

        <!-- 2025 Events -->
        <div class="mb-8" data-year="2025">
            <h3 class="text-2xl font-bold text-votum-blue mb-4 pl-4 border-l-4 border-votum-blue">2025</h3>
            <div class="grid md:grid-cols-2 gap-6">

                <!-- Event -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-scale">
                    <div class="flex gap-4 p-4">
                        <div class="w-32 h-32 flex-shrink-0 rounded overflow-hidden">
                            <img src="{{asset('images/event-tabor2025.jpg')}}" alt="Tábor 2025" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Tábor 2025</h3>
                            <p class="text-sm text-gray-600 mb-2">
                                <i class="fas fa-calendar mr-2"></i>August 2025
                            </p>
                            <p class="text-gray-700 text-sm">Úžasný týždeň v prírode plný aktivít, hier a nových kamarátov.</p>
                            <button class="mt-2 text-votum-blue font-semibold hover:underline text-sm">
                                Viac <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- 2024 Events -->
        <div class="mb-8" data-year="2024">
            <h3 class="text-2xl font-bold text-votum-blue mb-4 pl-4 border-l-4 border-votum-blue">2024</h3>
            <div class="grid md:grid-cols-2 gap-6">

                <!-- Event 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-scale">
                    <div class="flex gap-4 p-4">
                        <div class="w-32 h-32 flex-shrink-0 rounded overflow-hidden">
                            <img src="{{asset('images/event-festival2024.jpg')}}" alt="Kultúrny festival 2024" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Kultúrny festival 2024</h3>
                            <p class="text-sm text-gray-600 mb-2">
                                <i class="fas fa-calendar mr-2"></i>September 2024
                            </p>
                            <p class="text-gray-700 text-sm">Celodenný festival plný hudby, tanca, umenia a dobrej nálady.</p>
                            <button class="mt-2 text-votum-blue font-semibold hover:underline text-sm">
                                Viac <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- 2023 Events -->
        <div class="mb-8" data-year="2023">
            <h3 class="text-2xl font-bold text-votum-blue mb-4 pl-4 border-l-4 border-votum-blue">2023</h3>
            <div class="grid md:grid-cols-2 gap-6">

                <!-- Event 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-scale">
                    <div class="flex gap-4 p-4">
                        <div class="w-32 h-32 flex-shrink-0 rounded overflow-hidden">
                            <img src="{{asset('images/event-vylet2023.jpg')}}" alt="Výlet do Vysokých Tatier" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Výlet do Vysokých Tatier</h3>
                            <p class="text-sm text-gray-600 mb-2">
                                <i class="fas fa-calendar mr-2"></i>Oktober 2023
                            </p>
                            <p class="text-gray-700 text-sm">Jesenný výlet plný krásnych výhľadov a spoločných zážitkov.</p>
                            <button class="mt-2 text-votum-blue font-semibold hover:underline text-sm">
                                Viac <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- 2022 Events -->
        <div class="mb-8" data-year="2022">
            <h3 class="text-2xl font-bold text-votum-blue mb-4 pl-4 border-l-4 border-votum-blue">2022</h3>
            <div class="grid md:grid-cols-2 gap-6">

                <!-- Event 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-scale">
                    <div class="flex gap-4 p-4">
                        <div class="w-32 h-32 flex-shrink-0 rounded overflow-hidden">
                            <img src="{{asset('images/event-vystavba2022.jpg')}}" alt="Otvorenie nového centra" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Otvorenie nového centra</h3>
                            <p class="text-sm text-gray-600 mb-2">
                                <i class="fas fa-calendar mr-2"></i>November 2022
                            </p>
                            <p class="text-gray-700 text-sm">Slávnostné otvorenie nášho moderného tréningového a komunitného centra.</p>
                            <button class="mt-2 text-votum-blue font-semibold hover:underline text-sm">
                                Viac <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

    <!-- Pagination -->
    <div class="flex justify-center items-center gap-2 mb-12">
        <button class="px-4 py-2 bg-gray-300 text-gray-600 rounded hover-scale cursor-not-allowed" disabled>
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="px-4 py-2 bg-votum-blue text-white rounded font-semibold">1</button>
        <button class="px-4 py-2 bg-white text-votum-blue rounded hover-scale">2</button>
        <button class="px-4 py-2 bg-white text-votum-blue rounded hover-scale">3</button>
        <button class="px-4 py-2 bg-white text-votum-blue rounded hover-scale">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>

    <!-- Home Button -->
    <div class="text-center mt-16 mb-8">
        <a href="index.html" class="inline-flex items-center gap-3 bg-votum-blue text-white px-8 py-4 rounded-lg hover-scale font-semibold text-lg shadow-lg">
            <i class="fas fa-home text-2xl"></i>
            <span>Späť na hlavnú stránku</span>
        </a>
    </div>
</main>
