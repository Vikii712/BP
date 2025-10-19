<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTUM - O nás</title>
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

        .listening {
            animation: pulse 1.5s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
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
                    <a href="about.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition opacity-100 bg-white bg-opacity-10 px-4 py-2 rounded-lg" role="menuitem">
                        <i class="fas fa-users text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">O nás</span>
                    </a>
                </li>
                <li role="none">
                    <a href="#events" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
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
                        <a href="about.html" class="flex items-center gap-4 py-3 px-4 bg-white bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-users text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">O nás</span>
                        </a>
                    </li>
                    <li>
                        <a href="#events" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
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
    <!-- Page Title and Action Buttons -->
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-votum-blue mb-6">O nás</h1>
        <div class="flex justify-center gap-4 flex-wrap">
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

    <!-- Organization Information Section -->
    <div class="max-w-6xl mx-auto mb-16">
        <h2 class="text-3xl font-bold text-votum-blue mb-8 text-center">Naša Organizácia</h2>

        <!-- Vision Section -->
        <div class="bg-white rounded-lg shadow-lg mb-8 overflow-hidden">
            <div class="grid md:grid-cols-2 gap-0">
                <div class="p-8 order-2 md:order-1">
                    <h3 class="text-2xl font-bold text-votum-blue mb-4">Naša Vízia</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Vytvárame spoločnosť, kde každý človek, bez ohľadu na zdravotné znevýhodnenie, má možnosť žiť plnohodnotný, nezávislý a zmysluplný život. Veríme v svet, kde sú všetky bariéry odstránené a inklúzia je prirodzenou súčasťou každodenného života. Naša vízia zahŕňa spoločnosť, ktorá oceňuje rozmanitosť a poskytuje rovnaké príležitosti všetkým svojim členom.
                    </p>
                </div>
                <div class="bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center p-8 order-1 md:order-2">
                    <img src="{{asset('images/vision.jpg')}}" alt="Naša vízia" class="w-full h-full object-cover rounded-lg">
                </div>
            </div>
        </div>

        <!-- Mission Section -->
        <div class="bg-white rounded-lg shadow-lg mb-8 overflow-hidden">
            <div class="grid md:grid-cols-2 gap-0">
                <div class="bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center p-8">
                    <i class="fas fa-bullseye text-9xl text-votum-blue opacity-20"></i>
                </div>
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-votum-blue mb-4">Naše Hodnoty a Ciele</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Naším hlavným cieľom je poskytovať komplexnú podporu ľuďom so zdravotným znevýhodnením a ich rodinám. Organizujeme vzdelávacie programy, kultúrne aktivity, pracovné tréningy a komunitné podujatia.
                    </p>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-green-600 mt-1"></i>
                            <span>Podpora pri integrácii do spoločnosti</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-green-600 mt-1"></i>
                            <span>Rozvoj pracovných a sociálnych zručností</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-green-600 mt-1"></i>
                            <span>Budovanie silnej a podpornej komunity</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Activities Section -->
        <div class="bg-white rounded-lg shadow-lg mb-8 overflow-hidden">
            <div class="grid md:grid-cols-2 gap-0">
                <div class="p-8 order-2 md:order-1">
                    <h3 class="text-2xl font-bold text-votum-blue mb-4">Naše Aktivity</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Organizujeme širokú škálu aktivít, ktoré pomáhajú našim členom rozvíjať sa osobne, profesionálne a sociálne. Od letných táborov a kultúrnych festivalov až po pracovné tréningy a vzdelávacie workshopy.
                    </p>
                    <div class="space-y-3">
                        <div class="bg-votum-cream p-3 rounded">
                            <i class="fas fa-campground text-votum-blue mr-2"></i>
                            <span class="font-semibold">Letné tábory a výlety</span>
                        </div>
                        <div class="bg-votum-cream p-3 rounded">
                            <i class="fas fa-music text-votum-blue mr-2"></i>
                            <span class="font-semibold">Kultúrne podujatia a festivaly</span>
                        </div>
                        <div class="bg-votum-cream p-3 rounded">
                            <i class="fas fa-briefcase text-votum-blue mr-2"></i>
                            <span class="font-semibold">Pracovné tréningy a mentoring</span>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-purple-100 to-purple-200 flex items-center justify-center p-8 order-1 md:order-2">
                    <img src="{{asset('images/activities.jpg')}}" alt="Naše aktivity" class="w-full h-full object-cover rounded-lg">
                </div>
            </div>
        </div>

    </div>

    <!-- Team Section -->
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-votum-blue mb-8 text-center">Náš Tím</h2>

        <div class="grid md:grid-cols-2 gap-8 mb-8">

            <!-- Team Member 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6 flex gap-4">
                    <div class="w-24 h-24 rounded-full overflow-hidden flex-shrink-0 bg-gray-200">
                        <img src="{{asset('images/team1.jpg')}}" alt="Mária Nováková" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-votum-blue mb-2">Mária Nováková</h3>
                        <p class="text-sm text-gray-600 mb-2 font-semibold">Riaditeľka združenia</p>
                        <p class="text-gray-700 text-sm">
                            Zakladajúca členka VOTUM s viac ako 15-ročnými zkúsenosťami v oblasti sociálnej práce a podpory ľudí so zdravotným znevýhodnením.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6 flex gap-4">
                    <div class="w-24 h-24 rounded-full overflow-hidden flex-shrink-0 bg-gray-200">
                        <img src="{{asset('images/team2.jpg')}}" alt="Peter Kovács" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-votum-blue mb-2">Peter Kovács</h3>
                        <p class="text-sm text-gray-600 mb-2 font-semibold">Koordinátor programov</p>
                        <p class="text-gray-700 text-sm">
                            Zodpovedný za organizáciu všetkých aktivít a podujatí. Peter má skúsenosti s projektovým manažmentom a rád pracuje s ľuďmi.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6 flex gap-4">
                    <div class="w-24 h-24 rounded-full overflow-hidden flex-shrink-0 bg-gray-200">
                        <img src="{{asset('images/team3.jpg')}}" alt="Jana Horváthová" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-votum-blue mb-2">Jana Horváthová</h3>
                        <p class="text-sm text-gray-600 mb-2 font-semibold">Sociálna pracovníčka</p>
                        <p class="text-gray-700 text-sm">
                            Poskytuje individuálnu podporu a poradenstvo našim členom. Jana sa špecializuje na pracovnú integráciu a rozvoj zručností.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Team Member 4 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6 flex gap-4">
                    <div class="w-24 h-24 rounded-full overflow-hidden flex-shrink-0 bg-gray-200">
                        <img src="{{asset('images/team4.jpg')}}" alt="Tomáš Varga" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-votum-blue mb-2">Tomáš Varga</h3>
                        <p class="text-sm text-gray-600 mb-2 font-semibold">Vedúci dobrovoľníkov</p>
                        <p class="text-gray-700 text-sm">
                            Koordinuje prácu dobrovoľníkov a stará sa o vzdelávanie nových členov tímu. Tomáš je plný energie a optimizmu.
                        </p>
                    </div>
                </div>
            </div>

        </div>
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
                        <a href="#events" class="block hover:opacity-80 transition">
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
