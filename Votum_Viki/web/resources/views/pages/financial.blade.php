@extends('layouts.app')

@section('content')
    <main class="container mx-auto px-4 py-12">

        <!-- Page Header -->
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-votum-blue mb-4">
                Ako finančne podporiť?
            </h1>

           <x-share />
        </div>

        <!-- Obsah -->
        <div class="grid lg:grid-cols-2 gap-6 mt-16 items-start">

            <!-- QR kód -->
            <div class="border-4 border-votum1 bg-blue-100 p-6 rounded-lg shadow-lg pb-8">
                <div class="flex flex-col gap-6 text-lg text-gray-800 leading-relaxed">
                    <!-- Nadpis s ikonou -->
                    <div class="flex items-center gap-4 mb-2">
                        <div class="bg-votum-blue text-white p-4 rounded-full flex items-center justify-center">
                            <i class="fas fa-qrcode text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-votum-blue">QR kód:</h3>
                    </div>

                    <!-- Text -->
                    <p><strong>Najjednoduchší a najrýchlejší spôsob</strong>, ako nás podporiť.</p>
                    <p>Zaslať môžete <strong>ľubovoľnú sumu</strong>.</p>

                    <!-- Postup -->
                    <h4 class="text-xl font-semibold text-votum-blue mt-4">Postup:</h4>
                    <ol class="list-decimal pl-6 space-y-2">
                        <li>Otvorte aplikáciu svojej banky a v časti "zaplatiť" zvoľte možnosť platba pomocou QR kódu.</li>
                        <li>Sumu, ktorou chcete prispieť, môžete upraviť podľa vlastnej vôle. QR je prednastavený na sumu 20 €.</li>
                        <li>Už stačí len platbu odoslať. Ďakujeme!</li>
                    </ol>
                </div>

                <!-- QR obrázok -->
                <div class="flex justify-center mt-8">
                    <div class="bg-white p-3 rounded-lg border-4 border-votum2 shadow-md">
                        <img
                            src="{{ asset('images/qr.svg') }}"
                            alt="QR kód na podporu"
                            class="w-56 h-56 sm:w-72 sm:h-72 object-contain"
                        >
                    </div>
                </div>
            </div>

            <!-- Bankové údaje -->
            <div class="border-4 border-votum1 bg-blue-100 p-6 rounded-lg shadow-lg self-start">
                <div class="flex flex-col gap-6">
                    <!-- Nadpis s ikonou -->
                    <div class="flex items-center gap-4">
                        <div class="bg-votum-blue text-white p-4 rounded-full flex items-center justify-center">
                            <i class="fas fa-envelope text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-votum-blue">Bankové údaje:</h3>
                    </div>

                    <!-- Údaje -->
                    <div class="space-y-3 break-all sm:break-normal">
                        <x-contacts.input name="Číslo účtu" value="SK3112000000198765432100" :color="1"/>
                        <x-contacts.input name="IBAN" value="SK3112000000198765432100" :color="1"/>
                        <x-contacts.input name="SWIFT" value="SUBASKBXXXX" :color="1"/>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-wave />

    <!-- Ďakovná sekcia -->
    <div class="bg-blue-100">
        <section class="max-w-4xl mx-auto mb-12 text-center py-10 px-4">
            <i class="fas fa-heart text-6xl mb-4 text-red-600"></i>
            <h3 class="text-3xl font-bold mb-4 text-votum-blue">Ďakujeme za vašu podporu!</h3>
            <p class="text-lg text-gray-800">Každý príspevok, bez ohľadu na výšku, nám pomáha zlepšovať životy ľudí, ktorí to potrebujú.</p>
        </section>

        <!-- Navigácia -->
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
