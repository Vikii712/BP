@extends('layouts.app')

@php
$text = "
            Vďaka vašej finančnej, materiálnej či inej pomoci dokážeme robiť viac

            Vybrali sme si cestu nekomerčnej organizácie, ktorá sa snaží čo najmenej zaťažovať rozpočet rodín našich detí.
            Preto si každú formu podpory nesmierne vážime.\n

            Máme srdce, nadšenie a chuť pomáhať, ale vašou podporou sa naše sny menia na skutočnosť.\n
            Ak  cítite,  že naša práca má zmysel, podporte nás spôsobom, ktorý je vám najbližší.\n"
@endphp

@section('content')

<!--
    <div class=" py-16">
        <h2 class="h2 font-bold text-votum-blue pb-16 text-center">
            Prečo je vaša podpora dôležitá?
        </h2>
        <div class="grid md:grid-cols-3 gap-4 mt-6 max-w-6xl mx-auto px-3  sm:px-10">
            <div class="bg-white p-6 rounded-lg text-center border-4 border-votum1">
                <div class="flex items-center justify-center gap-3 mb-3">
                    <i class="fa fa-music text-emerald-900 text-3xl"></i>
                    <h3 class="font-bold text-votum-blue h3">Muzikoterapia</h3>
                </div>
                <p class="text-gray-900 txt">Organizujeme pravidelné hudobné kurzy pre každého</p>
            </div>

            <div class="bg-white p-6 rounded-lg text-center border-4 border-votum1">
                <div class="flex items-center justify-center gap-3 mb-3">
                    <i class="fa-solid fa-icons text-blue-900 text-3xl"></i>
                    <h3 class="font-bold text-votum-blue h3">Aktivity</h3>
                </div>
                <p class="text-gray-900 txt">Umožňujeme tábory, výlety a kultúrne podujatia</p>
            </div>

            <div class="bg-white p-6 rounded-lg text-center border-4 border-votum1">
                <div class="flex items-center justify-center gap-3 mb-3">
                    <i class="fas fa-heart text-red-800 text-3xl"></i>
                    <h3 class="font-bold text-votum-blue h3">Integrácia</h3>
                </div>
                <p class="text-gray-900 txt">Pomáhame pri hľadaní práce a začlenení do spoločnosti</p>
            </div>
        </div>
-->

    <main class="container mx-auto px-4 pt-16">
        <h1 class="h1 mb-16 md:text-5xl font-bold text-votum-blue text-center">
            Prečo je vaša podpora dôležitá?
        </h1>
        <p class="txt m-10 text-center">
            Vďaka vašej finančnej, materiálnej či inej pomoci dokážeme robiť viac. <br>

            Vybrali sme si cestu nekomerčnej organizácie, ktorá sa snaží čo najmenej zaťažovať rozpočet rodín našich detí.
            Preto si každú formu podpory nesmierne vážime.<br>

            Máme srdce, nadšenie a chuť pomáhať, ale vašou podporou sa naše sny menia na skutočnosť.<br>
            Ak  cítite,  že naša práca má zmysel, podporte nás spôsobom, ktorý je vám najbližší.<br>
        </p>

        <h1 class="h1 mb-16 md:text-5xl font-bold text-votum-blue text-center">
            Ako nás podporiť?
        </h1>

        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8 mb-16">

            <x-support.support_type type="p"/>
            <x-support.support_type type="f"/>
            <x-support.support_type type="o"/>


        </div>
    </main>



        <x-home />

@endsection
