<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTUM - Udalosti</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --font-size-base: 16px;
        }
        body {
            font-size: var(--font-size-base);
        }
        .bg-votum-blue { background-color: #051647; }
        .bg-votum-blue-light { background-color: #0a2558; }
        .text-votum-blue { color: #051647; }
        .bg-votum-cream { background-color: #f1ebe3; }
        .hover-scale { transition: transform 0.2s; }
        .hover-scale:hover { transform: scale(1.05); }

        /* Mobile Menu Styles */
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-in-out;
        }
        .mobile-menu.active {
            max-height: 600px;
        }

        /* Modern Button Styles */
        .font-control-btn {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.2s;
        }
        .font-control-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }
        .lang-btn {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.2s;
        }
        .lang-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        .lang-btn.active {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .year-filter-btn {
            transition: all 0.3s;
        }
        .year-filter-btn.active {
            background-color: #051647;
            color: white;
            transform: scale(1.1);
        }
    </style>
</head>
<body class="bg-votum-cream">
<!-- Header -->
<header class="bg-votum-blue text-white">
    <!-- Top Bar -->
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo and Name -->
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center">
                    <i class="fas fa-hands-helping text-votum-blue text-2xl"></i>
                </div>
                <h1 class="text-2xl font-bold">VOTUM</h1>
            </div>

            <!-- Desktop: Accessibility Controls -->
            <div class="hidden md:flex items-center gap-4">
                <div class="flex items-center gap-2" role="group" aria-label="Veľkosť písma">
                    <span class="text-sm font-medium">Písmo</span>
                    <button onclick="decreaseFontSize()" class="font-control-btn text-white px-3 py-2 rounded-lg" aria-label="Zmenšiť písmo">
                        <i class="fas fa-minus text-sm"></i>
                    </button>
                    <button onclick="increaseFontSize()" class="font-control-btn text-white px-3 py-2 rounded-lg" aria-label="Zväčšiť písmo">
                        <i class="fas fa-plus text-sm"></i>
                    </button>
                </div>
                <div class="flex gap-2">
                    <button onclick="changeLanguage('sk')" class="lang-btn active text-white px-4 py-2 rounded-lg font-medium" aria-label="Slovenčina">
                        🇸🇰 SK
                    </button>
                    <button onclick="changeLanguage('en')" class="lang-btn text-white px-4 py-2 rounded-lg font-medium" aria-label="English">
                        🇬🇧 EN
                    </button>
                </div>
            </div>

            <!-- Mobile: Hamburger Menu Button -->
            <button onclick="toggleMobileMenu()" class="md:hidden text-white p-2" aria-label="Menu" aria-expanded="false" id="menuButton">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>

    <!-- Desktop Navigation -->
    <nav class="bg-votum-blue-light border-t border-blue-400 hidden md:block">
        <div class="container mx-auto px-4">
            <ul class="flex justify-around py-4" role="menubar">
                <li role="none">
                    <a href="index.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-home text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Domov</span>
                    </a>
                </li>
                <li role="none">
                    <a href="about.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-users text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">O nás</span>
                    </a>
                </li>
                <li role="none">
                    <a href="events.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition opacity-100 bg-white bg-opacity-10 px-4 py-2 rounded-lg" role="menuitem">
                        <i class="fas fa-calendar-alt text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Udalosti</span>
                    </a>
                </li>
                <li role="none">
                    <a href="history.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-clock text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">História</span>
                    </a>
                </li>
                <li role="none">
                    <a href="#support" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-hand-holding-heart text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Podpora</span>
                    </a>
                </li>
                <li role="none">
                    <a href="contact.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-envelope text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Kontakty</span>
                    </a>
                </li>
                <li role="none">
                    <a href="#documents" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-file-alt text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Dokumenty</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="mobile-menu bg-votum-blue-light md:hidden">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center mb-6 pb-4 border-b border-blue-400">
                <div class="flex items-center gap-2">
                    <span class="text-sm font-medium">Písmo</span>
                    <button onclick="decreaseFontSize()" class="font-control-btn text-white px-3 py-2 rounded-lg" aria-label="Zmenšiť písmo">
                        <i class="fas fa-minus text-sm"></i>
                    </button>
                    <button onclick="increaseFontSize()" class="font-control-btn text-white px-3 py-2 rounded-lg" aria-label="Zväčšiť písmo">
                        <i class="fas fa-plus text-sm"></i>
                    </button>
                </div>
                <div class="flex gap-2">
                    <button onclick="changeLanguage('sk')" class="lang-btn active text-white px-4 py-2 rounded-lg font-medium text-sm" aria-label="Slovenčina">
                        🇸🇰 SK
                    </button>
                    <button onclick="changeLanguage('en')" class="lang-btn text-white px-4 py-2 rounded-lg font-medium text-sm" aria-label="English">
                        🇬🇧 EN
                    </button>
                </div>
            </div>
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="index.html" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-home text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Domov</span>
                        </a>
                    </li>
                    <li>
                        <a href="about.html" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-users text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">O nás</span>
                        </a>
                    </li>
                    <li>
                        <a href="events.html" class="flex items-center gap-4 py-3 px-4 bg-white bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-calendar-alt text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Udalosti</span>
                        </a>
                    </li>
                    <li>
                        <a href="history.html" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-clock text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">História</span>
                        </a>
                    </li>
                    <li>
                        <a href="#support" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-hand-holding-heart text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Podpora</span>
                        </a>
                    </li>
                    <li>
                        <a href="contact.html" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-envelope text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Kontakty</span>
                        </a>
                    </li>
                    <li>
                        <a href="#documents" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-file-alt text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Dokumenty</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

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
                        <button class="mt-2 text-votum-blue font-semibold hover:underline text-sm">
                            Viac <i class="fas fa-arrow-right ml-1"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Future Event 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-scale">
                <div class="flex gap-4 p-4">
                    <div class="w-32 h-32 flex-shrink-0 rounded overflow-hidden">
                        <img src="{{asset('images/event-camp.jpg')}}" alt="Tábor 2026" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-votum-blue mb-2">Letný tábor 2026</h3>
                        <p class="text-sm text-gray-600 mb-2">
                            <i class="fas fa-calendar mr-2"></i>Júl 2026
                        </p>
                        <p class="text-gray-700 text-sm">Tradičný letný tábor plný zábavy, hier a nových priateľstiev v horách.</p>
                        <button class="mt-2 text-votum-blue font-semibold hover:underline text-sm">
                            Viac <i class="fas fa-arrow-right ml-1"></i>
                        </button>
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

                <!-- Event 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-scale">
                    <div class="flex gap-4 p-4">
                        <div class="w-32 h-32 flex-shrink-0 rounded overflow-hidden">
                            <img src="{{asset('images/event-tabor2024.jpg')}}" alt="Letný tábor 2024" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Letný tábor 2024</h3>
                            <p class="text-sm text-gray-600 mb-2">
                                <i class="fas fa-calendar mr-2"></i>Júl 2024
                            </p>
                            <p class="text-gray-700 text-sm">Týždeň plný dobrodružstiev v Nízkych Tatrách s 45 účastníkmi.</p>
                            <button class="mt-2 text-votum-blue font-semibold hover:underline text-sm">
                                Viac <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-scale">
                    <div class="flex gap-4 p-4">
                        <div class="w-32 h-32 flex-shrink-0 rounded overflow-hidden">
                            <img src="{{asset('images/event-workshop2024.jpg')}}" alt="Workshop zručností" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Workshop pracovných zručností</h3>
                            <p class="text-sm text-gray-600 mb-2">
                                <i class="fas fa-calendar mr-2"></i>Máj 2024
                            </p>
                            <p class="text-gray-700 text-sm">Tréning komunikačných a profesionálnych zručností pre lepšie uplatnenie.</p>
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

                <!-- Event 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-scale">
                    <div class="flex gap-4 p-4">
                        <div class="w-32 h-32 flex-shrink-0 rounded overflow-hidden">
                            <img src="{{asset('images/event-koncert2023.jpg')}}" alt="Jarný koncert" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Jarný koncert</h3>
                            <p class="text-sm text-gray-600 mb-2">
                                <i class="fas fa-calendar mr-2"></i>Apríl 2023
                            </p>
                            <p class="text-gray-700 text-sm">Hudobné vystúpenia našich talentovaných členov v mestskom divadle.</p>
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

                <!-- Event 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-scale">
                    <div class="flex gap-4 p-4">
                        <div class="w-32 h-32 flex-shrink-0 rounded overflow-hidden">
                            <img src="{{asset('images/event-vystup2022.jpg')}}" alt="Výstup na Rysy" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Výstup na Rysy</h3>
                            <p class="text-sm text-gray-600 mb-2">
                                <i class="fas fa-calendar mr-2"></i>Jún 2022
                            </p>
                            <p class="text-gray-700 text-sm">Náročný, ale úspešný výstup na najvyšší vrchol Tatier.</p>
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

<!-- Footer -->
<footer class="bg-votum-blue text-white py-10">
    <div class="container mx-auto px-4">
        <div class="text-center mb-8 pb-8 border-b border-blue-400">
            <h3 class="text-3xl font-bold mb-4">VOTUM</h3>
            <div class="flex justify-center gap-6">
                <a href="#" class="flex items-center gap-2 hover:opacity-80 transition" aria-label="Facebook">
                    <i class="fab fa-facebook text-3xl"></i>
                    <span class="text-lg">Facebook</span>
                </a>
                <a href="#" class="flex items-center gap-2 hover:opacity-80 transition" aria-label="YouTube">
                    <i class="fab fa-youtube text-3xl"></i>
                    <span class="text-lg">YouTube</span>
                </a>
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-8 mb-8">
            <div>
                <h4 class="text-xl font-bold mb-4">Navigácia</h4>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <a href="index.html" class="block hover:opacity-80 transition">
                            <i class="fas fa-home mr-2"></i>Domov
                        </a>
                        <a href="about.html" class="block hover:opacity-80 transition">
                            <i class="fas fa-users mr-2"></i>O nás
                        </a>
                        <a href="events.html" class="block hover:opacity-80 transition">
                            <i class="fas fa-calendar-alt mr-2"></i>Udalosti
                        </a>
                        <a href="history.html" class="block hover:opacity-80 transition">
                            <i class="fas fa-clock mr-2"></i>História
                        </a>
                    </div>
                    <div class="space-y-2">
                        <a href="#support" class="block hover:opacity-80 transition">
                            <i class="fas fa-hand-holding-heart mr-2"></i>Podpora
                        </a>
                        <a href="contact.html" class="block hover:opacity-80 transition">
                            <i class="fas fa-envelope mr-2"></i>Kontakty
                        </a>
                        <a href="#documents" class="block hover:opacity-80 transition">
                            <i class="fas fa-file-alt mr-2"></i>Dokumenty
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <h4 class="text-xl font-bold mb-4">Našli ste chybu?</h4>
                <div class="space-y-3">
                    <p class="text-sm">
                        <i class="fas fa-envelope mr-2"></i>
                        <a href="mailto:admin@zdravieznevyhodnenie.sk" class="hover:opacity-80 transition underline">
                            admin@zdravieznevyhodnenie.sk
                        </a>
                    </p>
                    <div class="mt-4">
                        <a href="#" class="inline-block hover:opacity-80 transition underline text-sm">
                            <i class="fas fa-universal-access mr-2"></i>
                            Vyhlásenie o prístupnosti
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-blue-400 pt-6 text-center text-sm">
            <p>&copy; 2025 VOTUM. Všetky práva vyhradené.</p>
        </div>
    </div>
</footer>

<script>
    // Mobile Menu Toggle
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        const button = document.getElementById('menuButton');
        const icon = button.querySelector('i');

        menu.classList.toggle('active');
        const isExpanded = menu.classList.contains('active');
        button.setAttribute('aria-expanded', isExpanded);

        if (isExpanded) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
        } else {
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    }

    // Font Size Control
    let fontSize = 16;
    function increaseFontSize() {
        if (fontSize < 24) {
            fontSize += 2;
            document.documentElement.style.setProperty('--font-size-base', fontSize + 'px');
        }
    }
    function decreaseFontSize() {
        if (fontSize > 12) {
            fontSize -= 2;
            document.documentElement.style.setProperty('--font-size-base', fontSize + 'px');
        }
    }

    // Language Toggle
    function changeLanguage(lang) {
        document.querySelectorAll('.lang-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        event.target.closest('.lang-btn').classList.add('active');
        console.log('Language changed to:', lang);
    }

    // Year Filter Function
    function filterByYear(year) {
        // Update active button
        document.querySelectorAll('.year-filter-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        event.target.classList.add('active');

        // Filter events
        const eventSections = document.querySelectorAll('[data-year]');

        if (year === 'all') {
            eventSections.forEach(section => {
                section.style.display = 'block';
            });
        } else {
            eventSections.forEach(section => {
                if (section.getAttribute('data-year') === year) {
                    section.style.display = 'block';
                    // Smooth scroll to the year section
                    section.scrollIntoView({ behavior: 'smooth', block: 'start' });
                } else {
                    section.style.display = 'none';
                }
            });
        }
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const menu = document.getElementById('mobileMenu');
        const button = document.getElementById('menuButton');

        if (menu.classList.contains('active') &&
            !menu.contains(event.target) &&
            !button.contains(event.target)) {
            toggleMobileMenu();
        }
    });
</script>
</body>
</html>
