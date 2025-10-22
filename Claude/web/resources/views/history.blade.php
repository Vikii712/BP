<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTUM - História</title>
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
            writing-mode: horizontal-tb;
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
    <!-- Desktop Navigation -->
    <nav class="bg-votum-blue-light border-t border-blue-400 hidden md:block">
        <div class="container mx-auto px-4">
            <ul class="flex justify-around py-4" role="menubar">
                <li role="none">
                    <a href="{{ url('/') }}" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-home text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Domov</span>
                    </a>
                </li>
                <li role="none">
                    <a href="{{ url('/about') }}" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-users text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">O nás</span>
                    </a>
                </li>
                <li role="none">
                    <a href="{{ url('/events') }}" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-calendar-alt text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Udalosti</span>
                    </a>
                </li>
                <li role="none">
                    <a href="{{ url('/history') }}" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-clock text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">História</span>
                    </a>
                </li>
                <li role="none">
                    <a href="{{ url('/support') }}" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-hand-holding-heart text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Podpora</span>
                    </a>
                </li>
                <li role="none">
                    <a href="{{ url('/contacts') }}" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-envelope text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Kontakty</span>
                    </a>
                </li>
                <li role="none">
                    <a href="{{ url('/documents') }}" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
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
                        <a href="{{ url('/') }}" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-home text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Domov</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/about') }}" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-users text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">O nás</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/events') }}" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-calendar-alt text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Udalosti</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/history') }}" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-clock text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">História</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/support') }}" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-hand-holding-heart text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Podpora</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/contacts') }}" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-envelope text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Kontakty</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/documents') }}" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
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
    <h1 class="text-4xl md:text-5xl font-bold text-votum-blue text-center mb-16">
        História Združenia VOTUM
    </h1>

    <!-- Timeline -->
    <div class="max-w-4xl mx-auto ml-16 md:ml-32">

        <!-- Timeline Item 1 -->
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-year">2008</div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-votum-blue mb-3">Založenie združenia</h3>
                <p class="text-gray-700">
                    Združenie VOTUM bolo oficiálne zaregistrované skupinou nadšencov a dobrovoľníkov, ktorí mali spoločný cieľ - podporovať ľudí so zdravotným znevýhodnením a pomáhať im žiť plnohodnotný život v spoločnosti.
                </p>
            </div>
        </div>

        <!-- Timeline Item 2 -->
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-year">2009</div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-votum-blue mb-3">Prvé komunitné centrum</h3>
                <p class="text-gray-700 mb-4">
                    Otvorili sme naše prvé komunitné centrum v Bratislave, kde mohli naši členovia stretávať sa, organizovať aktivity a budovať priateľstvá. Centrum sa stalo bezpečným priestorom pre všetkých.
                </p>
                <div class="rounded-lg overflow-hidden">
                    <img src="{{asset('images/history1.jpg')}}" alt="Prvé komunitné centrum 2009" class="w-full h-64 object-cover">
                </div>
            </div>
        </div>

        <!-- Timeline Item 3 -->
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-year">2011</div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-votum-blue mb-3">Prvý letný tábor</h3>
                <p class="text-gray-700">
                    Zorganizovali sme náš prvý letný tábor v Nízkych Tatrách pre 25 účastníkov. Tábor bol plný hier, výletov, tvorivých workshopov a nezabudnuteľných zážitkov, ktoré posilnili priateľstvá medzi účastníkmi.
                </p>
            </div>
        </div>

        <!-- Timeline Item 4 -->
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-year">2013</div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-votum-blue mb-3">Rozšírenie do regiónov</h3>
                <p class="text-gray-700">
                    Naše aktivity sa rozšírili aj do ďalších miest Slovenska. Otvorili sme pobočky v Košiciach a Žiline, čím sme sprístupnili naše služby väčšiemu počtu ľudí v rôznych častiach krajiny.
                </p>
            </div>
        </div>

        <!-- Timeline Item 5 -->
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-year">2015</div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-votum-blue mb-3">Program pracovnej integrácie</h3>
                <p class="text-gray-700 mb-4">
                    Spustili sme program pracovnej integrácie, ktorý pomohol viac ako 50 ľuďom so zdravotným znevýhodnením nájsť zmysluplné zamestnanie. Program zahŕňal tréning, mentoring a podporu pri hľadaní práce.
                </p>
                <div class="rounded-lg overflow-hidden">
                    <img src="{{asset('images/history2.jpg')}}" alt="Program pracovnej integrácie 2015" class="w-full h-64 object-cover">
                </div>
            </div>
        </div>

        <!-- Timeline Item 6 -->
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-year">2016</div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-votum-blue mb-3">Cena za inklúziu</h3>
                <p class="text-gray-700">
                    Získali sme národnú cenu "Inkluzia roka" za našu prácu v oblasti začleňovania ľudí so zdravotným znevýhodnením do spoločnosti. Toto ocenenie nás motivovalo pokračovať v našej misii s ešte väčším odhodlaním.
                </p>
            </div>
        </div>

        <!-- Timeline Item 7 -->
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-year">2017</div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-votum-blue mb-3">Kultúrny festival VOTUM</h3>
                <p class="text-gray-700">
                    Usporiadali sme prvý ročník kultúrneho festivalu VOTUM, kde naši členovia prezentovali svoje umelecké talent - od hudby a tanca až po výtvarné umenie. Festival navštívilo viac ako 500 návštevníkov.
                </p>
            </div>
        </div>

        <!-- Timeline Item 8 -->
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-year">2018</div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-votum-blue mb-3">Online poradenská služba</h3>
                <p class="text-gray-700 mb-4">
                    Spustili sme online poradenskú platformu, ktorá poskytuje podporu a rady ľuďom so zdravotným znevýhodnením a ich rodinám 24/7. Služba je dostupná cez web, email aj telefón.
                </p>
                <div class="rounded-lg overflow-hidden">
                    <img src="{{asset('images/history3.jpg')}}" alt="Online poradenská služba 2018" class="w-full h-64 object-cover">
                </div>
            </div>
        </div>

        <!-- Timeline Item 9 -->
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-year">2019</div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-votum-blue mb-3">Partnerstvo s univerzitami</h3>
                <p class="text-gray-700">
                    Nadviazali sme spoluprácu s viacerými slovenskými univerzitami na výskumných projektoch zameraných na zlepšenie kvality života ľudí so zdravotným znevýhodnením a na rozvoj inkluzívnych prístupov vo vzdelávaní.
                </p>
            </div>
        </div>

        <!-- Timeline Item 10 -->
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-year">2020</div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-votum-blue mb-3">Adaptácia počas pandémie</h3>
                <p class="text-gray-700">
                    Počas pandémie COVID-19 sme rýchlo presunuli všetky naše aktivity do online priestoru. Organizovali sme virtuálne stretnutia, workshopy a kultúrne podujatia, aby naši členovia zostali v kontakte a aktívni.
                </p>
            </div>
        </div>

        <!-- Timeline Item 11 -->
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-year">2022</div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-votum-blue mb-3">Nové tréningové centrum</h3>
                <p class="text-gray-700 mb-4">
                    Otvorili sme moderné tréningové centrum vybavené najnovšími technológiami, kde poskytujeme kurzy digitálnych zručností, komunikácie a profesionálneho rozvoja pre našich členov.
                </p>
                <div class="rounded-lg overflow-hidden">
                    <img src="{{asset('images/history4.jpg')}}" alt="Tréningové centrum 2022" class="w-full h-64 object-cover">
                </div>
            </div>
        </div>

        <!-- Timeline Item 12 -->
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-year">2024</div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-votum-blue mb-3">Medzinárodná spolupráca</h3>
                <p class="text-gray-700">
                    Vstúpili sme do medzinárodnej siete organizácií pre ľudí so zdravotným znevýhodnením. Táto spolupráca nám umožňuje vymieňať si osvedčené postupy, organizovať medzinárodné výmeny a učiť sa od skúseností partnerov z celej Európy.
                </p>
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
        <!-- Top Section: Organization Name and Social Media -->
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

        <!-- Bottom Section: Navigation Links and Contact Info -->
        <div class="grid md:grid-cols-2 gap-8 mb-8">
            <!-- Left Half: Navigation Links in Two Columns -->
            <div>
                <h4 class="text-xl font-bold mb-4">Navigácia</h4>
                <div class="grid grid-cols-2 gap-4">
                    <!-- Left Column -->
                    <div class="space-y-2">
                        <a href="index.html" class="block hover:opacity-80 transition">
                            <i class="fas fa-home mr-2"></i>Domov
                        </a>
                        <a href="#about" class="block hover:opacity-80 transition">
                            <i class="fas fa-users mr-2"></i>O nás
                        </a>
                        <a href="#events" class="block hover:opacity-80 transition">
                            <i class="fas fa-calendar-alt mr-2"></i>Udalosti
                        </a>
                        <a href="history.html" class="block hover:opacity-80 transition">
                            <i class="fas fa-clock mr-2"></i>História
                        </a>
                    </div>
                    <!-- Right Column -->
                    <div class="space-y-2">
                        <a href="#support" class="block hover:opacity-80 transition">
                            <i class="fas fa-hand-holding-heart mr-2"></i>Podpora
                        </a>
                        <a href="#contact" class="block hover:opacity-80 transition">
                            <i class="fas fa-envelope mr-2"></i>Kontakty
                        </a>
                        <a href="#documents" class="block hover:opacity-80 transition">
                            <i class="fas fa-file-alt mr-2"></i>Dokumenty
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Half: Contact and Accessibility -->
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

        <!-- Copyright -->
        <div class="border-t border-blue-400 pt-6 text-center text-sm">
            <p>&copy; 2025 VOTUM. Všetky práva vyhradené.</p>
        </div>
    </div>
</footer>
