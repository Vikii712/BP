@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <div class="max-w-4xl mx-auto mb-12 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-votum-blue mb-4 pt-16">
            Ako venovať 2% z daní?
        </h1>

        <div class="flex justify-center gap-3">
            <button onclick="shareEvent()" class="bg-green-600 text-white px-3 sm:px-6 py-4 rounded-lg hover-scale font-semibold flex items-center gap-2 text-xl">
                <i class="fas fa-share-alt text-lg"></i>
                <span>Zdieľať</span>
            </button>
        </div>
    </div>

    <x-wave />

    <div class="bg-blue-100">
        <div class="max-w-5xl mx-auto py-5">
            <div class="p-5  rounded-lg">
                <h2 class="text-2xl font-bold justify-center text-votum-blue mb-4 flex items-center gap-3">
                    <i class="fas fa-lightbulb "></i>
                    Prečo venovať 2%?
                </h2>
                <div class="space-y-4 text-gray-800 text-lg">
                    <p>
                        Venovaním 2% z vašej dane na príjem môžete podporiť našu činnosť a pomôcť nám zlepšovať životy ľudí so zdravotným znevýhodnením. Tento spôsob pomoci vás nič nestojí – ide o časť dane, ktorú už platíte štátu, a môžete ju presmerovať na dobrú vec.
                    </p>
                    <div class="grid md:grid-cols-2 gap-4 mt-6">
                        <div class="bg-white p-4 rounded-lg text-center border-3 border-votum1">
                            <i class="fas fa-heart text-red-600 text-3xl mb-2"></i>
                            <p class="font-bold">Nestojí vás to nič</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg text-center border-3 border-votum1">
                            <i class="fas fa-hands-helping text-votum-blue text-3xl mb-2"></i>
                            <p class="font-bold">Pomáha ľuďom</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-wave :inverted="true" />

    <main class="container mx-auto px-4 py-12 mt-16">

        <section class="max-w-5xl mx-auto mb-12 p-6 rounded-xl border-4 border-votum3 bg-votum3">
                <h2 class="text-3xl text-center font-bold text-votum-blue mb-6 flex items-center gap-3">
                    Potrebné údaje
                </h2>
                <div class="space-y-3 grid lg:grid-cols-2 gap-x-5">
                    <x-contacts.input name="Názov" value="Združenie VOTUM" :color="3"/>
                    <x-contacts.input name="Sídlo" value="Hlavná 123, 811 01 Bratislava" :color="3"/>
                    <x-contacts.input name="Právna forma" value="Občianske združenie" :color="3"/>
                    <x-contacts.input name="IČO" value="12345678" :color="3"/>
                </div>
        </section>

        <x-support.help />


        <!-- Documents Section -->
        <section class="rounded-xl max-w-5xl mx-auto mb-12 bg-blue-100 border-4 border-votum1">
            <div class="rounded-2xl  p-8">
                <h2 class="text-3xl font-bold text-votum-blue mb-6 flex items-center gap-3">
                    <i class="fas fa-download"></i>
                    Dokumenty na stiahnutie
                </h2>

                <div class="grid lg:grid-cols-2 gap-6  ">
                    <x-documents.document :color="false"/>
                    <x-documents.document :color="false"/>
                    <x-documents.document :color="false"/>

                </div>
            </div>
        </section>
    </main>

    <x-wave />
    <div class="bg-blue-100">
        <!-- Thank You -->
        <section class="max-w-4xl mx-auto mb-12 text-center py-5">
            <div class="">
                <i class="fas fa-heart text-6xl mb-4 text-red-600"></i>
                <h3 class="text-3xl font-bold mb-4">Ďakujeme za vašu podporu!</h3>
                <p class="text-lg">Vďaka vašim 2% môžeme pokračovať v pomoci ľuďom, ktorí to potrebujú.</p>
            </div>
        </section>

        <!-- Navigation -->
        <div class="max-w-4xl mx-auto">
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
