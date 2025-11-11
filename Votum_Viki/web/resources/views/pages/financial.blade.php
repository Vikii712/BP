@extends('layouts.app')

@section('content')
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
@endsection
