<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTUM - Iné formy podpory</title>
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

        .support-option-card {
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        .support-option-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        .support-option-card:hover::before {
            left: 100%;
        }
        .support-option-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .icon-float {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body class="bg-votum-cream">
<!-- Header -->
<header class="bg-votum-blue text-white">
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center">
                    <i class="fas fa-hands-helping text-votum-blue text-2xl"></i>
                </div>
                <h1 class="text-2xl font-bold">VOTUM</h1>
            </div>
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
                    <button onclick="changeLanguage('sk')" class="lang-btn active text-white px-4 py-2 rounded-lg font-medium">🇸🇰 SK</button>
                    <button onclick="changeLanguage('en')" class="lang-btn text-white px-4 py-2 rounded-lg font-medium">🇬🇧 EN</button>
                </div>
            </div>
            <button onclick="toggleMobileMenu()" class="md:hidden text-white p-2" id="menuButton">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>
    <nav class="bg-votum-blue-light border-t border-blue-400 hidden md:block">
        <div class="container mx-auto px-4">
            <ul class="flex justify-around py-4">
                <li><a href="index.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition"><i class="fas fa-home text-2xl"></i><span class="text-sm">Domov</span></a></li>
                <li><a href="about.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition"><i class="fas fa-users text-2xl"></i><span class="text-sm">O nás</span></a></li>
                <li><a href="events.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition"><i class="fas fa-calendar-alt text-2xl"></i><span class="text-sm">Udalosti</span></a></li>
                <li><a href="history.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition"><i class="fas fa-clock text-2xl"></i><span class="text-sm">História</span></a></li>
                <li><a href="support.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition opacity-100 bg-white bg-opacity-10 px-4 py-2 rounded-lg"><i class="fas fa-hand-holding-heart text-2xl"></i><span class="text-sm">Podpora</span></a></li>
                <li><a href="contact.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition"><i class="fas fa-envelope text-2xl"></i><span class="text-sm">Kontakty</span></a></li>
                <li><a href="documents.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition"><i class="fas fa-file-alt text-2xl"></i><span class="text-sm">Dokumenty</span></a></li>
            </ul>
        </div>
    </nav>
</header>

<!-- Main Content -->
<main class="container mx-auto px-4 py-12">

    <!-- Page Header -->
    <div class="max-w-5xl mx-auto mb-12 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-votum-blue mb-4">
            Iné formy podpory
        </h1>
        <p class="text-xl text-gray-700 mb-6">
            Existuje mnoho spôsobov, ako nám môžete pomôcť. Vyberte si ten, ktorý vám vyhovuje.
        </p>
    </div>

    <!-- Introduction -->
    <div class="max-w-4xl mx-auto mb-16">
        <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-8 rounded-xl border-l-4 border-purple-500">
            <p class="text-lg text-gray-800 leading-relaxed">
                <i class="fas fa-lightbulb text-yellow-500 text-2xl mr-3"></i>
                Nielen finančný príspevok dokáže urobiť rozdiel. Vaše schopnosti, čas, alebo organizovanie podujatia môžu byť pre nás rovnako cenné. Pozrite si možnosti nižšie a kontaktujte nás, ak vás niektorá z nich zaujala!
            </p>
        </div>
    </div>

    <!-- Support Options Grid -->
    <div class="max-w-6xl mx-auto space-y-12">

        <!-- Option 1: Musical Performances -->
        <div class="support-option-card bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="md:grid md:grid-cols-2 gap-0">
                <!-- Image Side -->
                <div class="bg-gradient-to-br from-purple-400 to-pink-500 p-12 flex flex-col justify-center items-center text-white">
                    <div class="icon-float mb-6">
                        <i class="fas fa-music text-8xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold mb-2">Hudobné vystúpenia</h2>
                    <p class="text-center text-lg">Pozvite nás na váš event!</p>
                </div>

                <!-- Content Side -->
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-votum-blue mb-4">Náš hudobný band</h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Máme vlastnú hudobnú skupinu zloženú z našich talentovaných členov! Muzikoterapia je súčasťou našich aktivít a naši muzikanti majú skúsenosti s vystupovaním na rôznych podujatiach. Radi zahráme na vašej akcii, firemnom evenте, alebo charitativnom podujatí.
                    </p>

                    <div class="bg-purple-50 p-6 rounded-xl mb-6">
                        <h4 class="font-bold text-votum-blue mb-3 flex items-center gap-2">
                            <i class="fas fa-star text-yellow-500"></i>
                            Čo ponúkame:
                        </h4>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start gap-3">
                                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                <span>Živé hudobné vystúpenia rôznych žánrov</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                <span>Muzikoterapeutické workshopy</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                <span>Interaktívne hudobné programy pre deti</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                <span>Flexibility a prispôsobenie vašim potrebám</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                        <p class="text-sm text-gray-700">
                            <i class="fas fa-info-circle text-yellow-600 mr-2"></i>
                            <strong>Tip:</strong> Výťažok z nášho vystúpenia môže ísť späť do združenia na podporu našich aktivít!
                        </p>
                    </div>

                    <a href="contact.html" class="inline-flex items-center gap-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-xl hover-scale font-bold text-lg shadow-lg">
                        <i class="fas fa-envelope text-2xl"></i>
                        <span>Objednať vystúpenie</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Option 2: Fundraising Events -->
        <div class="support-option-card bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="md:grid md:grid-cols-2 gap-0">
                <!-- Content Side (Left on Desktop) -->
                <div class="p-8 order-2 md:order-1">
                    <h3 class="text-2xl font-bold text-votum-blue mb-4">Zorganizujte zbierku</h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Chcete pomôcť, ale neviete ako? Zorganizujte charitatívne podujatie, zbierku, bazár alebo aukciu! Môže to byť súčasť firemného eventu, rodinnej oslavy, alebo samostatnej akcie. My vám radi pomôžeme s propagáciou a zabezpečíme potrebné materiály.
                    </p>

                    <div class="space-y-4 mb-6">
                        <div class="flex items-start gap-4 bg-blue-50 p-4 rounded-lg">
                            <i class="fas fa-birthday-cake text-blue-600 text-3xl"></i>
                            <div>
                                <h4 class="font-bold text-votum-blue mb-1">Narozeninová zbierka</h4>
                                <p class="text-sm text-gray-700">Namiesto darčekov požiadajte hostí o príspevok pre naše združenie</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 bg-green-50 p-4 rounded-lg">
                            <i class="fas fa-running text-green-600 text-3xl"></i>
                            <div>
                                <h4 class="font-bold text-votum-blue mb-1">Športový event</h4>
                                <p class="text-sm text-gray-700">Beh, cyklistika, futbalový turnaj - výťažok pre dobrú vec</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 bg-orange-50 p-4 rounded-lg">
                            <i class="fas fa-store text-orange-600 text-3xl"></i>
                            <div>
                                <h4 class="font-bold text-votum-blue mb-1">Charitatívny bazár</h4>
                                <p class="text-sm text-gray-700">Predaj vecí, ktoré už nepotrebujete, pre dobrú vec</p>
                            </div>
                        </div>
                    </div>

                    <a href="contact.html" class="inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 to-green-600 text-white px-8 py-4 rounded-xl hover-scale font-bold text-lg shadow-lg">
                        <i class="fas fa-hands-helping text-2xl"></i>
                        <span>Napíšte nám</span>
                    </a>
                </div>

                <!-- Image Side (Right on Desktop) -->
                <div class="bg-gradient-to-br from-blue-400 to-green-500 p-12 flex flex-col justify-center items-center text-white order-1 md:order-2">
                    <div class="icon-float mb-6">
                        <i class="fas fa-hand-holding-heart text-8xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold mb-2">Fundraising</h2>
                    <p class="text-center text-lg">Vaša kreativita + naša pomoc</p>
                </div>
            </div>
        </div>

        <!-- Option 3: Material Donations -->
        <div class="support-option-card bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="md:grid md:grid-cols-2 gap-0">
                <!-- Image Side -->
                <div class="bg-gradient-to-br from-green-400 to-blue-500 p-12 flex flex-col justify-center items-center text-white">
                    <div class="icon-float mb-6">
                        <i class="fas fa-gift text-8xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold mb-2">Materiálne dary</h2>
                    <p class="text-center text-lg">Venujte to, čo nepotrebujete</p>
                </div>

                <!-- Content Side -->
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-votum-blue mb-4">Čo potrebujeme</h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Okrem finančných príspevkov radi prijmeme aj materiálne dary, ktoré použijeme pri našich aktivitách alebo v našich priestoroch. Kontaktujte nás pred darovaním, aby sme overili, či daný predmet potrebujeme.
                    </p>

                    <div class="grid md:grid-cols-2 gap-4 mb-6">
                        <div class="bg-green-50 p-4 rounded-lg">
                            <h4 class="font-bold text-votum-blue mb-3 flex items-center gap-2">
                                <i class="fas fa-laptop text-green-600"></i>
                                Elektronika
                            </h4>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>• Počítače a notebooky</li>
                                <li>• Projektory</li>
                                <li>• Tablety</li>
                                <li>• Tlačiarne</li>
                            </ul>
                        </div>

                        <div class="bg-blue-50 p-4 rounded-lg">
                            <h4 class="font-bold text-votum-blue mb-3 flex items-center gap-2">
                                <i class="fas fa-chair text-blue-600"></i>
                                Nábytok
                            </h4>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>• Stoličky a stoly</li>
                                <li>• Skrine</li>
                                <li>• Pohovky</li>
                                <li>• Police a regály</li>
                            </ul>
                        </div>

                        <div class="bg-yellow-50 p-4 rounded-lg">
                            <h4 class="font-bold text-votum-blue mb-3 flex items-center gap-2">
                                <i class="fas fa-palette text-yellow-600"></i>
                                Pomôcky
                            </h4>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>• Hudobné nástroje</li>
                                <li>• Výtvarné potreby</li>
                                <li>• Knihy a hry</li>
                                <li>• Športové potreby</li>
                            </ul>
                        </div>

                        <div class="bg-purple-50 p-4 rounded-lg">
                            <h4 class="font-bold text-votum-blue mb-3 flex items-center gap-2">
                                <i class="fas fa-box text-purple-600"></i>
                                Iné
                            </h4>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>• Kancelárske potreby</li>
                                <li>• Čistiace prostriedky</li>
                                <li>• Jedlo a nápoje</li>
                                <li>• Textil a dekorácie</li>
                            </ul>
                        </div>
                    </div>

                    <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
                        <p class="text-sm text-gray-700">
                            <i class="fas fa-truck text-blue-600 mr-2"></i>
                            <strong>Doprava:</strong> Pri väčších daroch vám môžeme pomôcť s odvozom alebo dopravou.
                        </p>
                    </div>

                    <a href="contact.html" class="inline-flex items-center gap-3 bg-gradient-to-r from-green-600 to-blue-600 text-white px-8 py-4 rounded-xl hover-scale font-bold text-lg shadow-lg">
                        <i class="fas fa-phone text-2xl"></i>
                        <span>Kontaktujte nás</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Option 4: Volunteering -->
        <div class="support-option-card bg-gradient-to-r from-orange-500 to-red-500 rounded-3xl shadow-xl p-8 text-white">
            <div class="max-w-4xl mx-auto text-center">
                <div class="icon-float mb-6">
                    <i class="fas fa-users text-8xl"></i>
                </div>
                <h2 class="text-4xl font-bold mb-4">Staňte sa dobrovoľníkom</h2>
                <p class="text-xl mb-8 leading-relaxed">
                    Váš čas môže byť tým najcennejším darom. Pomôžte nám pri organizácii podujatí, vedení workshopov, alebo jednoducho strávte čas s našimi členmi. Nemusíte mať žiadne špeciálne vzdelanie - stačí ochota pomáhať!
                </p>

                <div class="grid md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white bg-opacity-20 backdrop-blur p-6 rounded-xl">
                        <i class="fas fa-calendar-check text-4xl mb-3"></i>
                        <h3 class="font-bold text-xl mb-2">Pravidelne</h3>
                        <p class="text-sm">Staňte sa súčasťou tímu</p>
                    </div>
                    <div class="bg-white bg-opacity-20 backdrop-blur p-6 rounded-xl">
                        <i class="fas fa-clock text-4xl mb-3"></i>
                        <h3 class="font-bold text-xl mb-2">Príležitostne</h3>
                        <p class="text-sm">Pomôžte na podujatiach</p>
                    </div>
                    <div class="bg-white bg-opacity-20 backdrop-blur p-6 rounded-xl">
                        <i class="fas fa-briefcase text-4xl mb-3"></i>
                        <h3 class="font-bold text-xl mb-2">Pro bono</h3>
                        <p class="text-sm">Ponúknite svoju expertízu</p>
                    </div>
                </div>

                <a href="contact.html" class="inline-flex items-center gap-3 bg-white text-orange-600 px-10 py-5 rounded-xl hover-scale font-bold text-xl shadow-xl">
                    <i class="fas fa-heart text-2xl"></i>
                    <span>Chcem sa zapojiť</span>
                </a>
            </div>
        </div>

    </div>

    <!-- Call to Action -->
    <div class="max-w-4xl mx-auto mt-16 mb-12 text-center">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h3 class="text-3xl font-bold text-votum-blue mb-4">
                <i class="fas fa-question-circle mr-2"></i>
                Máte inú myšlienku?
            </h3>
            <p class="text-lg text-gray-700 mb-6">
                Každá forma podpory je vítaná! Ak máte nápad, ako by ste nám mohli pomôcť inak, neváhajte nás kontaktovať. Spoločne nájdeme najlepšie riešenie.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="contact.html" class="inline-flex items-center gap-2 bg-votum-blue text-white px-6 py-3 rounded-lg hover-scale font-semibold">
                    <i class="fas fa-envelope"></i>
                    <span>Kontakt</span>
                </a>
                <a href="tel:0827654329" class="inline-flex items-center gap-2 bg-green-600 text-white px-6 py-3 rounded-lg hover-scale font-semibold">
                    <i class="fas fa-phone"></i>
                    <span>0827 654 329</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <div class="max-w-4xl mx-auto">
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="support.html" class="inline-flex items-center justify-center gap-3 bg-gray-600 text-white px-8 py-4 rounded-lg hover-scale font-semibold text-lg shadow-lg">
                <i class="fas fa-arrow-left text-2xl"></i>
                <span>Späť na podpora</span>
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
