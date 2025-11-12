@extends('layouts.app')

@section('content')

        <!-- Page Header -->
        <div class="max-w-5xl mx-auto mb-12 text-center pt-16">
            <h1 class="text-4xl md:text-5xl font-bold text-votum-blue mb-4">
                Iné formy podpory
            </h1>
            <x-share />

        </div>

        <x-wave />

        <div class="bg-blue-100  py-6">
            <div class="max-w-5xl text-center mx-auto space-y-4 text-gray-800 text-lg">
                <h2 class="text-2xl  font-bold justify-center text-votum-blue mb-4 flex items-center gap-3">
                    <i class="fas fa-heart "></i>
                    Ako inak pomôcť?
                </h2>
                <p>
                    Nielen finančný príspevok dokáže urobiť rozdiel. Vaše schopnosti, čas, alebo organizovanie podujatia môžu byť pre nás rovnako cenné. Pozrite si možnosti nižšie a kontaktujte nás, ak vás niektorá z nich zaujala!
                </p>
            </div>
        </div>

        <x-wave :inverted="true" />

        <main class="container mx-auto px-4 py-12">

        <!-- Support Options Grid -->
        <div class="max-w-6xl mx-auto space-y-12">

            <!-- Material Donations -->
            <div class="support-option-card border-4 border-votum3 bg-votum3 rounded-3xl shadow-xl overflow-hidden">
                <div class="md:grid md:grid-cols-2 gap-0">

                    <div class="bg-dark-votum3 p-12 flex flex-col justify-center items-center text-white">
                        <div class="icon-float mb-6">
                            <i class="fas fa-gift text-8xl"></i>
                        </div>
                        <h2 class="text-center text-3xl font-bold mb-2">Materiálne dary</h2>
                        <p class="text-center text-lg">Venujte to, čo nepotrebujete</p>
                    </div>

                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-votum-blue mb-4">Čo potrebujeme</h3>
                        <p class="text-gray-700 mb-6 leading-relaxed">
                            Okrem finančných príspevkov radi prijmeme aj materiálne dary, ktoré použijeme pri našich aktivitách alebo v našich priestoroch. Kontaktujte nás pred darovaním, aby sme overili, či daný predmet potrebujeme.
                        </p>

                    </div>
                </div>
            </div>

            <div class="support-option-card border-4 border-votum2 bg-votum2 rounded-3xl shadow-xl overflow-hidden">
                <div class="md:grid md:grid-cols-2 gap-0">

                    <div class="bg-dark-votum2 p-12 flex flex-col justify-center items-center text-white">
                        <div class="icon-float mb-6">
                            <i class="fas fa-gift text-8xl"></i>
                        </div>
                        <h2 class="text-center text-3xl font-bold mb-2">Hudobné vystúpenia</h2>
                        <p class="text-center text-lg">Pozvite nás na vašu udalosť!</p>
                    </div>

                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-votum-blue mb-4">Naša hudobná skupina</h3>
                        <p class="text-gray-700 mb-6 leading-relaxed">
                            Máme vlastnú hudobnú skupinu zloženú z našich talentovaných členov! Muzikoterapia je súčasťou našich aktivít a naši muzikanti majú skúsenosti s vystupovaním na rôznych podujatiach. Radi zahráme na vašej akcii, firemnom evenте, alebo charitativnom podujatí.
                        </p>
                    </div>
                </div>
            </div>

            <div class="support-option-card border-4 border-votum1 bg-blue-100 rounded-3xl shadow-xl overflow-hidden">
                <div class="md:grid md:grid-cols-2 gap-0">

                    <div class="bg-dark-votum1 p-12 flex flex-col justify-center items-center text-white">
                        <div class="icon-float mb-6">
                            <i class="fas fa-gift text-8xl"></i>
                        </div>
                        <h2 class="text-center text-3xl font-bold mb-2">Verejná zbierka</h2>
                        <p class="text-center text-lg">Vaša kreativita + naša pomoc</p>
                    </div>

                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-votum-blue mb-4">Zorganizujte zbierku</h3>
                        <p class="text-gray-700 mb-6 leading-relaxed">
                            Chcete pomôcť, ale neviete ako? Zorganizujte charitatívne podujatie, zbierku, bazár alebo aukciu! Môže to byť súčasť firemného eventu, rodinnej oslavy, alebo samostatnej akcie. My vám radi pomôžeme s propagáciou a zabezpečíme potrebné materiály.
                        </p>
                    </div>
                </div>
            </div>

        </div>



        <!-- Call to Action -->
        <div class="max-w-4xl mx-auto mt-16 mb-12 text-center">
            <div class="bg-votum3 border-votum3 border-4 rounded-2xl shadow-xl p-8">
                <h3 class="text-3xl font-bold text-votum-blue mb-4">
                    <i class="fas fa-question-circle mr-2"></i>
                    Máte inú myšlienku?
                </h3>
                <p class="text-lg text-gray-700 mb-6">
                    Každá forma podpory je vítaná! Ak máte nápad, ako by ste nám mohli pomôcť inak, neváhajte nás kontaktovať. Spoločne nájdeme najlepšie riešenie.
                </p>
                <div class="text-center mt-16">
                    <a href="{{route('contacts')}}" class="inline-flex items-center gap-3 bg-votum-blue text-white px-10 py-8 rounded-lg hover-scale font-semibold text-xl shadow-lg">
                        <img alt="" src="{{asset('images/kontakty.svg')}}" width="30">
                        <span>Kontakty</span>
                    </a>
                </div>
            </div>
        </div>
    </main>



    <x-wave />
    <div class="bg-blue-100">
        <!-- Thank You -->
        <section class="max-w-4xl mx-auto mb-12 text-center py-5">
            <div class="">
                <i class="fas fa-heart text-6xl mb-4 text-red-600"></i>
                <h3 class="text-3xl font-bold mb-4">Ďakujeme za vašu podporu!</h3>
                <p class="text-lg">Vďaka vašej podpore môžeme pokračovať v našej činnosti, v tom, čo nás baví a pomáha iným.</p>
            </div>
        </section>

        <!-- Navigation -->
        <div class="max-w-4xl mx-auto pb-16">
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <div class="text-center mt-16">
                    <a href="{{route('support')}}" class="inline-flex items-center gap-3 bg-gray-600 text-white px-10 py-8 rounded-lg hover-scale font-semibold text-xl shadow-lg">
                        <img alt="" src="{{asset('images/podpora.svg')}}" width="30">
                        <span>Iné formy pomoci</span>
                    </a>
                </div>
                <x-home />
            </div>
        </div>
    </div>

@endsection
