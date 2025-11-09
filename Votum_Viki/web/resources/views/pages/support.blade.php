@extends('layouts.app')

@section('content')

    <main class="container mx-auto px-4 py-16">

        <h1 class="text-4xl md:text-5xl font-bold text-votum-blue text-center mb-6">
            Ako nás podporiť?
        </h1>

        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8 mb-16">

            <x-support.support_type type="p"/>
            <x-support.support_type type="f"/>
            <x-support.support_type type="o"/>


        </div>

        <!-- Additional Info Section -->
        <div class="max-w-4xl mx-auto bg-other-cream rounded-2xl shadow-xl p-8 mb-16">
            <h3 class="text-2xl font-bold text-votum-blue mb-4 text-center">
                Prečo je vaša podpora dôležitá?
            </h3>
            <div class="grid md:grid-cols-3 gap-6 text-center">
                <div class="p-4">
                    <i class="fa fa-music"></i>
                    <h4 class="font-bold text-votum-blue mb-2">Muzikoterapia</h4>
                    <p class="text-gray-600 text-sm">Organizujeme pravidelné hudobné kurzy pre každého</p>
                </div>
                <div class="p-4">
                    <h4 class="font-bold text-votum-blue mb-2">Aktivity</h4>
                    <p class="text-gray-600 text-sm">Umožňujeme tábory, výlety a kultúrne podujatia</p>
                </div>
                <div class="p-4">
                    <h4 class="font-bold text-votum-blue mb-2">Integrácia</h4>
                    <p class="text-gray-600 text-sm">Pomáhame pri hľadaní práce a začlenení do spoločnosti</p>
                </div>
            </div>
        </div>

        <x-home />

    </main>
@endsection
