<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTUM - Ako venovať 2% z daní</title>
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

        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-in-out;
        }
        .mobile-menu.active {
            max-height: 600px;
        }

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

        .percent-badge {
            background: linear-gradient(135deg, #051647, #0a2558);
            font-size: 4rem;
            font-weight: bold;
            color: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(5, 22, 71, 0.3);
        }

        .step-card {
            transition: all 0.3s;
            cursor: pointer;
        }
        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body class="bg-votum-cream">
<!-- Header (same as other pages) -->
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

    <!-- Page Header -->
    <div class="max-w-4xl mx-auto mb-12 text-center">
        <div class="percent-badge inline-block mb-6">2%</div>
        <h1 class="text-4xl md:text-5xl font-bold text-votum-blue mb-4">
            Ako venovať 2% z daní?
        </h1>
        <p class="text-xl text-gray-700 mb-6">
            Jednoduchý spôsob, ako nás podporiť bez dodatočných nákladov
        </p>
        <div class="flex justify-center gap-3">
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

    <!-- Introduction -->
    <div class="max-w-5xl mx-auto mb-12">
        <div class="bg-gradient-to-r from-blue-50 to-purple-50 p-8 rounded-xl border-l-4 border-votum-blue">
            <h2 class="text-2xl font-bold text-votum-blue mb-4 flex items-center gap-3">
                <i class="fas fa-lightbulb text-yellow-500"></i>
                Prečo venovať 2%?
            </h2>
            <div class="space-y-4 text-gray-800 text-lg">
                <p>
                    <strong>Venovaním 2% z vašej dane na príjem</strong> môžete podporiť našu činnosť a pomôcť nám zlepšovať životy ľudí so zdravotným znevýhodnením. Tento spôsob pomoci vás nič nestojí – ide o časť dane, ktorú už platíte štátu, a môžete ju presmerovať na dobrú vec.
                </p>
                <div class="grid md:grid-cols-3 gap-4 mt-6">
                    <div class="bg-white p-4 rounded-lg text-center">
                        <i class="fas fa-heart text-red-500 text-3xl mb-2"></i>
                        <p class="font-bold">Nestojí vás to nič</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg text-center">
                        <i class="fas fa-file-alt text-blue-500 text-3xl mb-2"></i>
                        <p class="font-bold">Jednoduché vyplnenie</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg text-center">
                        <i class="fas fa-hands-helping text-green-500 text-3xl mb-2"></i>
                        <p class="font-bold">Pomáha ľuďom</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Documents Section -->
    <section class="max-w-5xl mx-auto mb-12">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-3xl font-bold text-votum-blue mb-6 flex items-center gap-3">
                <i class="fas fa-download text-green-600"></i>
                Dokumenty na stiahnutie
            </h2>
            <p class="text-gray-700 mb-6">
                Stiahnite si potrebné dokumenty, ktoré použijete pri vyplňovaní daňového priznania alebo pri zadávaní údajov cez finančnú správu online.
            </p>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Document 1 -->
                <div class="bg-votum-cream p-6 rounded-lg border-2 border-votum-blue hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-votum-blue p-4 rounded-lg">
                            <i class="fas fa-file-pdf text-white text-3xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Dokument 2%</h3>
                            <p class="text-sm text-gray-600 mb-3">Tlačivo pre venovaní 2% dane</p>
                            <a href="#" download class="inline-flex items-center gap-2 bg-votum-blue text-white px-4 py-2 rounded-lg hover-scale font-semibold">
                                <i class="fas fa-download"></i>
                                <span>Stiahnuť</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Document 2 -->
                <div class="bg-votum-cream p-6 rounded-lg border-2 border-votum-blue hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-votum-blue p-4 rounded-lg">
                            <i class="fas fa-file-pdf text-white text-3xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Dokument 2.</h3>
                            <p class="text-sm text-gray-600 mb-3">Návod na vyplnenie</p>
                            <a href="#" download class="inline-flex items-center gap-2 bg-votum-blue text-white px-4 py-2 rounded-lg hover-scale font-semibold">
                                <i class="fas fa-download"></i>
                                <span>Stiahnuť</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Important Details Section -->
    <section class="max-w-5xl mx-auto mb-12">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-3xl font-bold text-votum-blue mb-6 flex items-center gap-3">
                <i class="fas fa-info-circle text-blue-600"></i>
                Potrebné údaje
            </h2>
            <p class="text-gray-700 mb-6">
                Pri vyplňovaní tlačiva alebo online formulára budete potrebovať tieto údaje nášho združenia:
            </p>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Detail Card 1 -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl">
                    <h3 class="text-lg font-bold text-votum-blue mb-4">Základné údaje</h3>
                    <div class="space-y-3">
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Názov:</p>
                            <div class="bg-white p-3 rounded flex justify-between items-center">
                                <p class="font-bold text-votum-blue">Združenie VOTUM</p>
                                <button onclick="copyToClipboard('Združenie VOTUM', 'Názov')" class="text-votum-blue hover:text-blue-700">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Právna forma:</p>
                            <div class="bg-white p-3 rounded flex justify-between items-center">
                                <p class="font-bold text-votum-blue">Občianske združenie</p>
                                <button onclick="copyToClipboard('Občianske združenie', 'Právna forma')" class="text-votum-blue hover:text-blue-700">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">IČO:</p>
                            <div class="bg-white p-3 rounded flex justify-between items-center">
                                <p class="font-bold text-votum-blue">12 345 678</p>
                                <button onclick="copyToClipboard('12345678', 'IČO')" class="text-votum-blue hover:text-blue-700">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Card 2 -->
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl">
                    <h3 class="text-lg font-bold text-votum-blue mb-4">Adresa a kontakt</h3>
                    <div class="space-y-3">
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Sídlo:</p>
                            <div class="bg-white p-3 rounded">
                                <p class="font-bold text-votum-blue text-sm">Hlavná 123, 811 01 Bratislava</p>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Email:</p>
                            <div class="bg-white p-3 rounded">
                                <p class="font-bold text-votum-blue text-sm">zdruzenie.votum@gmail.com</p>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Telefón:</p>
                            <div class="bg-white p-3 rounded">
                                <p class="font-bold text-votum-blue text-sm">0827 654 329</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instructions for Individuals -->
    <section class="max-w-5xl mx-auto mb-12">
        <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-2xl shadow-xl p-8 text-white">
            <h2 class="text-3xl font-bold mb-6 flex items-center gap-3">
                <i class="fas fa-user text-4xl"></i>
                Postup pre fyzické osoby
            </h2>
            <p class="text-lg mb-8">
                Ak ste zamestnanec alebo podnikateľ a podávate daňové priznanie, postupujte nasledovne:
            </p>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Step 1 -->
                <div class="step-card bg-white text-gray-800 p-6 rounded-xl">
                    <div class="flex items-start gap-4">
                        <div class="bg-green-500 text-white w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold flex-shrink-0">1</div>
                        <div>
                            <h3 class="font-bold text-xl text-votum-blue mb-2">Stiahnite si tlačivo</h3>
                            <p class="text-gray-700">Stiahnite si tlačivo "Vyhlásenie o poukázaní podielu zaplatenej dane" zo sekcie dokumentov vyššie.</p>
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="step-card bg-white text-gray-800 p-6 rounded-xl">
                    <div class="flex items-start gap-4">
                        <div class="bg-green-500 text-white w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold flex-shrink-0">2</div>
                        <div>
                            <h3 class="font-bold text-xl text-votum-blue mb-2">Vyplňte údaje</h3>
                            <p class="text-gray-700">Do tlačiva vypíšte naše údaje (IČO, názov, sídlo) - použite kopírovacie tlačidlá vyššie.</p>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="step-card bg-white text-gray-800 p-6 rounded-xl">
                    <div class="flex items-start gap-4">
                        <div class="bg-green-500 text-white w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold flex-shrink-0">3</div>
                        <div>
                            <h3 class="font-bold text-xl text-votum-blue mb-2">Podpíšte a doručte</h3>
                            <p class="text-gray-700">Podpíšte tlačivo a doručte ho na daňový úrad spolu s daňovým priznaním (alebo elektronicky cez finančnú správu).</p>
                        </div>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="step-card bg-white text-gray-800 p-6 rounded-xl">
                    <div class="flex items-start gap-4">
                        <div class="bg-green-500 text-white w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold flex-shrink-0">4</div>
                        <div>
                            <h3 class="font-bold text-xl text-votum-blue mb-2">Hotovo!</h3>
                            <p class="text-gray-700">Po spracovaní vášho daňového priznania prídu 2% automaticky na náš účet. Ďakujeme!</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-white bg-opacity-20 p-4 rounded-lg">
                <p class="flex items-start gap-2">
                    <i class="fas fa-clock text-2xl"></i>
                    <span><strong>Termín:</strong> Tlačivo musíte podať spolu s daňovým priznaním do 31. marca (pre daň za predchádzajúci rok).</span>
                </p>
            </div>
        </div>
    </section>

    <!-- Instructions for Companies -->
    <section class="max-w-5xl mx-auto mb-12">
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl shadow-xl p-8 text-white">
            <h2 class="text-3xl font-bold mb-6 flex items-center gap-3">
                <i class="fas fa-building text-4xl"></i>
                Postup pre právnické osoby
            </h2>
            <p class="text-lg mb-8">
                Ak ste firma alebo organizácia a chcete podporiť naše združenie, postup je podobný ako pre fyzické osoby:
            </p>

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Step 1 -->
                <div class="step-card bg-white text-gray-800 p-6 rounded-xl text-center">
                    <div class="bg-blue-500 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">1</div>
                    <h3 class="font-bold text-lg text-votum-blue mb-2">Stiahnite tlačivo</h3>
                    <p class="text-gray-700 text-sm">Použite rovnaké tlačivo ako fyzické osoby</p>
                </div>

                <!-- Step 2 -->
                <div class="step-card bg-white text-gray-800 p-6 rounded-xl text-center">
                    <div class="bg-blue-500 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">2</div>
                    <h3 class="font-bold text-lg text-votum-blue mb-2">Vyplňte a pečiatkujte</h3>
                    <p class="text-gray-700 text-sm">Doplňte údaje firmy a našej organizácie</p>
                </div>

                <!-- Step 3 -->
                <div class="step-card bg-white text-gray-800 p-6 rounded-xl text-center">
                    <div class="bg-blue-500 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">3</div>
                    <h3 class="font-bold text-lg text-votum-blue mb-2">Podajte na FÚ</h3>
                    <p class="text-gray-700 text-sm">Doručte spolu s daňovým priznaním</p>
                </div>
            </div>

            <div class="mt-8 space-y-4">
                <div class="bg-white bg-opacity-20 p-4 rounded-lg flex items-start gap-3">
                    <i class="fas fa-info-circle text-2xl flex-shrink-0"></i>
                    <p><strong>Dôležité:</strong> Právnické osoby môžu venovať 1%, 2% alebo dokonca 3% z dane (ak finančne podporili verejnoprospešný účel).</p>
                </div>
                <div class="bg-white bg-opacity-20 p-4 rounded-lg flex items-start gap-3">
                    <i class="fas fa-calendar-alt text-2xl flex-shrink-0"></i>
                    <p><strong>Termín:</strong> Právnické osoby podávajú daňové priznanie do 31. marca alebo 30. júna (podľa účtovného obdobia).</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="max-w-5xl mx-auto mb-12">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-3xl font-bold text-votum-blue mb-8 text-center">
                <i class="fas fa-question-circle mr-2"></i>
                Často kladené otázky
            </h2>

            <div class="space-y-4">
                <details class="bg-votum-cream p-4 rounded-lg">
                    <summary class="font-bold text-votum-blue cursor-pointer text-lg">Koľko ma to bude stáť?</summary>
                    <p class="mt-3 text-gray-700">Vôbec nič! Ide o časť dane, ktorú platíte štátu. Vy len rozhodujete, komu tieto peniaze pôjdu.</p>
                </details>

                <details class="bg-votum-cream p-4 rounded-lg">
                    <summary class="font-bold text-votum-blue cursor-pointer text-lg">Môžem venovať 2% aj keď som zamestnanec?</summary>
                    <p class="mt-3 text-gray-700">Áno! Aj ako zamestnanec môžete požiadať zamestnávateľa o ročné zúčtovanie a podať vyhlásenie o poukázaní 2%.</p>
                </details>

                <details class="bg-votum-cream p-4 rounded-lg">
                    <summary class="font-bold text-votum-blue cursor-pointer text-lg">Dostanete presne 2% z mojej dane?</summary>
                    <p class="mt-3 text-gray-700">Áno, finančná správa nám pošle presnú čiastku zodpovedajúcu 2% z vašej zaplatenej dane na príjem.</p>
                </details>

                <details class="bg-votum-cream p-4 rounded-lg">
                    <summary class="font-bold text-votum-blue cursor-pointer text-lg">Môžem venovať 2% každý rok?</summary>
                    <p class="mt-3 text-gray-700">Áno! Každý rok pri podaní daňového priznania môžete znova venovať 2% z dane našej organizácii.</p>
                </details>
            </div>
        </div>
    </section>

    <!-- Thank You -->
    <section class="max-w-4xl mx-auto mb-12 text-center">
        <div class="bg-gradient-to-r from-pink-500 to-red-500 rounded-2xl p-8 text-white">
            <i class="fas fa-heart text-6xl mb-4"></i>
            <h3 class="text-3xl font-bold mb-4">Ďakujeme za vašu podporu!</h3>
            <p class="text-lg">Vďaka vašim 2% môžeme pokračovať v pomoci ľuďom, ktorí to potrebujú.</p>
        </div>
    </section>

    <!-- Navigation -->
    <div class="max-w-4xl mx-auto">
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="support.html" class="inline-flex items-center justify-center gap-3 bg-gray-600 text-white px-8 py-4 rounded-lg hover-scale font-semibold text-lg shadow-lg">
                <i class="fas fa-arrow-left text-2xl"></i>
                <span>Iné formy pomoci</span>
            </a>
            <a href="index.html" class="inline-flex items-center justify-center gap-3 bg-votum-blue text-white px-8 py-4 rounded-lg hover-scale font-semibold text-lg shadow-lg">
                <i class="fas fa-home text-2xl"></i>
                <span>Domov</span>
            </a>
        </div>
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
                        <a href="support.html" class="block hover:opacity-80 transition">
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
