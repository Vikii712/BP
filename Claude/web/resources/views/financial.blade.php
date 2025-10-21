<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTUM - Ako finančne podporiť</title>
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

        .step-number {
            background: linear-gradient(135deg, #051647, #0a2558);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            box-shadow: 0 4px 10px rgba(5, 22, 71, 0.3);
        }

        .qr-placeholder {
            background: linear-gradient(135deg, #f1ebe3, #e5ddd0);
            border: 3px dashed #051647;
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
                    <a href="events.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
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
                    <a href="support.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition opacity-100 bg-white bg-opacity-10 px-4 py-2 rounded-lg" role="menuitem">
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
                    <a href="documents.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
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
                    <li><a href="index.html" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()"><i class="fas fa-home text-xl w-6"></i><span>Domov</span></a></li>
                    <li><a href="about.html" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()"><i class="fas fa-users text-xl w-6"></i><span>O nás</span></a></li>
                    <li><a href="events.html" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()"><i class="fas fa-calendar-alt text-xl w-6"></i><span>Udalosti</span></a></li>
                    <li><a href="history.html" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()"><i class="fas fa-clock text-xl w-6"></i><span>História</span></a></li>
                    <li><a href="support.html" class="flex items-center gap-4 py-3 px-4 bg-white bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()"><i class="fas fa-hand-holding-heart text-xl w-6"></i><span>Podpora</span></a></li>
                    <li><a href="contact.html" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()"><i class="fas fa-envelope text-xl w-6"></i><span>Kontakty</span></a></li>
                    <li><a href="documents.html" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()"><i class="fas fa-file-alt text-xl w-6"></i><span>Dokumenty</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="container mx-auto px-4 py-12">

    <!-- Page Header -->
    <div class="max-w-4xl mx-auto mb-12 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-votum-blue mb-4">
            Ako finančne podporiť?
        </h1>
        <p class="text-xl text-gray-700 mb-6">
            Naše združenie? Zdôraznenie
        </p>
        <div class="flex justify-center gap-3 mb-8">
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
    <div class="max-w-4xl mx-auto mb-12">
        <div class="bg-gradient-to-r from-blue-50 to-green-50 p-6 rounded-xl border-l-4 border-votum-blue">
            <p class="text-lg text-gray-800 leading-relaxed">
                <i class="fas fa-heart text-red-500 mr-2"></i>
                Ďakujeme, že ste sa rozhodli podporiť naše združenie! Vaša finančná pomoc nám umožňuje organizovať aktivity, vzdelávacie programy a poskytovať podporu ľuďom so zdravotným znevýhodnením. Nižšie nájdete dva jednoduché spôsoby, ako nám môžete prispieť.
            </p>
        </div>
    </div>

    <!-- Support Options -->
    <div class="max-w-6xl mx-auto space-y-12">

        <!-- Option 1: One-time Payment via QR Code -->
        <section class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-green-600 to-green-700 p-6 text-white">
                <h2 class="text-3xl font-bold flex items-center gap-3">
                    <i class="fas fa-qrcode text-4xl"></i>
                    1. Jednorazová pomoc cez QR kód
                </h2>
            </div>

            <div class="p-8">
                <p class="text-lg text-gray-700 mb-8">
                    Najrýchlejší a najjednoduchší spôsob, ako nám prispieť. Stačí naskenovať QR kód svojou bankovou aplikáciou a zadať sumu.
                </p>

                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <!-- QR Code -->
                    <div class="text-center">
                        <div class="qr-placeholder w-64 h-64 mx-auto rounded-xl flex items-center justify-center mb-4">
                            <div class="text-center">
                                <i class="fas fa-qrcode text-8xl text-votum-blue opacity-30 mb-3"></i>
                                <p class="text-votum-blue font-bold">(QR kód)</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 italic">Naskenujte tento QR kód vo vašej bankovej aplikácii</p>
                    </div>

                    <!-- Steps -->
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="step-number">1</div>
                            <div>
                                <h3 class="font-bold text-votum-blue text-lg mb-2">Otvorte bankovú aplikáciu</h3>
                                <p class="text-gray-700">Spustite svoju mobilnú bankovú aplikáciu a nájdite funkciu platby cez QR kód.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="step-number">2</div>
                            <div>
                                <h3 class="font-bold text-votum-blue text-lg mb-2">Naskenujte QR kód</h3>
                                <p class="text-gray-700">Naskenujte QR kód zobrazený vyššie. Údaje príjemcu sa automaticky vyplnia.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="step-number">3</div>
                            <div>
                                <h3 class="font-bold text-votum-blue text-lg mb-2">Zadajte sumu a potvrďte</h3>
                                <p class="text-gray-700">Vyberte alebo zadajte čiastku, ktorú chcete darovať, a potvrďte platbu.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 bg-green-50 p-6 rounded-xl">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-600 text-2xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-votum-blue mb-2">Výhody QR platby:</h4>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-bolt text-yellow-500"></i>
                                    <span>Rýchle a jednoduché</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-shield-alt text-blue-500"></i>
                                    <span>Bezpečné - bez potreby zadávať číslo účtu</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-mobile-alt text-purple-500"></i>
                                    <span>Funguje vo všetkých moderných bankových aplikáciách</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Option 2: Bank Transfer -->
        <section class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-6 text-white">
                <h2 class="text-3xl font-bold flex items-center gap-3">
                    <i class="fas fa-university text-4xl"></i>
                    2. Bankovým prevodom
                </h2>
            </div>

            <div class="p-8">
                <p class="text-lg text-gray-700 mb-8">
                    Tradičný spôsob príspevku cez bankovú aplikáciu alebo internet banking. Všetky potrebné údaje nájdete nižšie.
                </p>

                <!-- Bank Details -->
                <div class="bg-gradient-to-br from-blue-50 to-purple-50 p-8 rounded-xl mb-8">
                    <h3 class="text-2xl font-bold text-votum-blue mb-6 text-center">Bankové údaje</h3>

                    <div class="space-y-4 max-w-2xl mx-auto">
                        <!-- IBAN -->
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex justify-between items-center">
                                <div class="flex-1">
                                    <p class="text-sm text-gray-600 mb-1 font-semibold">IBAN:</p>
                                    <p class="text-xl font-bold text-votum-blue">SK31 1200 0000 1987 6543 2100</p>
                                </div>
                                <button onclick="copyToClipboard('SK3112000000198765432100', 'IBAN')" class="ml-4 bg-votum-blue text-white px-4 py-2 rounded-lg hover-scale">
                                    <i class="fas fa-copy mr-2"></i>Kopírovať
                                </button>
                            </div>
                        </div>

                        <!-- Account Number -->
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex justify-between items-center">
                                <div class="flex-1">
                                    <p class="text-sm text-gray-600 mb-1 font-semibold">Číslo účtu:</p>
                                    <p class="text-xl font-bold text-votum-blue">1987654321/1200</p>
                                </div>
                                <button onclick="copyToClipboard('1987654321/1200', 'Číslo účtu')" class="ml-4 bg-votum-blue text-white px-4 py-2 rounded-lg hover-scale">
                                    <i class="fas fa-copy mr-2"></i>Kopírovať
                                </button>
                            </div>
                        </div>

                        <!-- SWIFT -->
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex justify-between items-center">
                                <div class="flex-1">
                                    <p class="text-sm text-gray-600 mb-1 font-semibold">SWIFT:</p>
                                    <p class="text-xl font-bold text-votum-blue">SUBASKBXXXX</p>
                                </div>
                                <button onclick="copyToClipboard('SUBASKBXXXX', 'SWIFT')" class="ml-4 bg-votum-blue text-white px-4 py-2 rounded-lg hover-scale">
                                    <i class="fas fa-copy mr-2"></i>Kopírovať
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Steps for Bank Transfer -->
                <div class="space-y-6 mb-8">
                    <h3 class="text-2xl font-bold text-votum-blue mb-4">Ako postupovať:</h3>

                    <div class="flex gap-4">
                        <div class="step-number">1</div>
                        <div>
                            <h4 class="font-bold text-votum-blue text-lg mb-2">Prihláste sa do internet bankingu</h4>
                            <p class="text-gray-700">Otvorte svoju bankovú aplikáciu alebo internet banking a zvoľte možnosť "Nová platba" alebo "Prevod".</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="step-number">2</div>
                        <div>
                            <h4 class="font-bold text-votum-blue text-lg mb-2">Vyplňte údaje príjemcu</h4>
                            <p class="text-gray-700 mb-3">Zadajte naše bankové údaje. Môžete použiť tlačidlo "Kopírovať" pre rýchle skopírovanie.</p>
                            <div class="bg-gray-50 p-3 rounded text-sm space-y-1">
                                <p><span class="font-semibold">Príjemca:</span> Združenie VOTUM</p>
                                <p><span class="font-semibold">IBAN:</span> SK31 1200 0000 1987 6543 2100</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="step-number">3</div>
                        <div>
                            <h4 class="font-bold text-votum-blue text-lg mb-2">Zadajte sumu a správu pre príjemcu</h4>
                            <p class="text-gray-700 mb-2">Vyberte čiastku, ktorú chcete darovať. Do správy pre príjemcu môžete napísať:</p>
                            <div class="bg-yellow-50 p-3 rounded border-l-4 border-yellow-400">
                                <p class="italic">"Príspevok na podporu činnosti"</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="step-number">4</div>
                        <div>
                            <h4 class="font-bold text-votum-blue text-lg mb-2">Potvrďte platbu</h4>
                            <p class="text-gray-700">Skontrolujte všetky údaje a potvrďte platbu. Platba by mala byť spracovaná do 1-2 pracovných dní.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-blue-50 p-6 rounded-xl">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-info-circle text-blue-600 text-2xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-votum-blue mb-2">Dôležité informácie:</h4>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-check text-green-600 mt-1"></i>
                                    <span>Platba je možná zo slovenských aj zahraničných účtov</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-check text-green-600 mt-1"></i>
                                    <span>Pre pravidelné príspevky môžete nastaviť trvalý príkaz</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-check text-green-600 mt-1"></i>
                                    <span>Po prijatí platby vám môžeme vystaviť potvrdenie na požiadanie</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Thank You Section -->
        <section class="bg-gradient-to-r from-green-500 to-blue-500 rounded-2xl shadow-xl p-8 text-white text-center">
            <i class="fas fa-heart text-6xl mb-4 animate-pulse"></i>
            <h3 class="text-3xl font-bold mb-4">Ďakujeme za vašu podporu!</h3>
            <p class="text-xl mb-6 max-w-2xl mx-auto">
                Každý príspevok, bez ohľadu na výšku, nám pomáha zlepšovať životy ľudí so zdravotným znevýhodnením a organizovať zmysluplné aktivity.
            </p>
            <div class="flex justify-center gap-4 flex-wrap">
                <div class="bg-white bg-opacity-20 px-6 py-3 rounded-full">
                    <p class="text-sm">Priemerný príspevok</p>
                    <p class="text-2xl font-bold">€25</p>
                </div>
                <div class="bg-white bg-opacity-20 px-6 py-3 rounded-full">
                    <p class="text-sm">Podporili nás</p>
                    <p class="text-2xl font-bold">450+ ľudí</p>
                </div>
            </div>
        </section>

    </div>

    <!-- Navigation Buttons -->
    <div class="max-w-4xl mx-auto mt-16">
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
