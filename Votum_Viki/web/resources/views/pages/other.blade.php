@extends('layouts.app')

@section('content')
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

@endsection
