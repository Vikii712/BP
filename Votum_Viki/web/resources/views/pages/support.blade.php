@extends('layouts.app')

@section('content')

    <main class="container mx-auto px-4 pt-16">

        <h1 class="h1 md:text-5xl font-bold text-votum-blue text-center mb-6">
            Ako nás podporiť?
        </h1>

        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8 mb-16">

            <x-support.support_type type="p"/>
            <x-support.support_type type="f"/>
            <x-support.support_type type="o"/>


        </div>
    </main>

    <x-wave />
    <div class="bg-blue-100 py-16">
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

        <x-home />
    </div>
@endsection
