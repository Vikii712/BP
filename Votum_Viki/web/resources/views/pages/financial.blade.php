@extends('layouts.app')

@section('content')

        <!-- Page Header -->
        <div class="max-w-4xl mx-auto text-center py-12">
            <h1 class="h1 md:text-5xl font-bold text-votum-blue mb-4">
                {{ __('nav.financialHow') }}
            </h1>

           <x-share />
        </div>

        <x-wave />

        <div class="bg-blue-100">
            <div class="max-w-5xl mx-auto py-5">
                <div class="p-5 rounded-lg text-center">

                    <h2 class="h2 font-bold text-votum-blue mb-4 flex items-center justify-center gap-3">
                        <i class="fas fa-lightbulb"></i>
                        {{ $why['title'] }}
                    </h2>

                    <div class="txt text-gray-800 space-y-4">
                        {!! $why['content'] !!}
                    </div>

                </div>
            </div>
        </div>

        <x-wave :inverted="true" />

    <main class="container mx-auto px-4 py-12">


        <!-- Obsah -->
        <div class="mt-16 flex flex-col items-center gap-12">

            <!-- QR sekcia -->
            <div class="border-4 border-votum1 bg-blue-100 p-6 rounded-lg shadow-lg w-full max-w-4xl">
                <div class="flex flex-col lg:flex-row items-start gap-6 text-lg text-gray-800 leading-relaxed">

                    <!-- Text -->
                    <div class="flex-1 txt">
                        <div class="flex items-center gap-4 pb-3">
                            <div class="bg-votum-blue text-white p-4 rounded-full flex items-center justify-center">
                                <i class="fas fa-qrcode text-2xl"></i>
                            </div>
                            <h2 class="h3 font-bold text-votum-blue">{{ $qrHow['title'] }}</h2>
                        </div>
                        {!! $qrHow['content']  !!}
                    </div>

                    <!-- QR obrázok -->
                    <div class="flex justify-center self-center lg:justify-end w-full lg:w-auto">
                        <div class="bg-white p-3 rounded-lg border-4 border-votum2 shadow-md">
                            <img
                                src="{{ asset('images/qr.jpg') }}"
                                alt="QR kód na podporu"
                                class="w-56 h-56 sm:w-72 sm:h-72 object-contain"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bankové údaje -->
            <div class="border-4 border-votum1 bg-blue-100 p-6 rounded-lg shadow-lg self-center">
                <div class="flex flex-col gap-6">
                    <!-- Nadpis s ikonou -->
                    <div class="flex items-center gap-4">
                        <div class="bg-votum-blue text-white p-4 rounded-full flex items-center justify-center">
                            <i class="fas fa-envelope text-2xl"></i>
                        </div>
                        <h2 class="h3 font-bold text-votum-blue">{{ __('nav.bank') }}</h2>
                    </div>

                    <!-- Údaje -->
                    <div class="space-y-3 break-all sm:break-normal">
                        @foreach($bank as $banka)
                            <x-contacts.input name="{{$banka['title']}}" value="{{$banka['content']}}" color="1"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-wave />

        <div class="bg-blue-100">
            <section class="max-w-4xl mx-auto mb-12 text-center py-5">

                <i class="fas fa-heart text-6xl mb-4 text-red-600"></i>

                <h2 class="h3 font-bold mb-4">{{ $thanks['title'] }}</h2>

                <p class="text-lg">{{ $thanks['content'] }}</p>

            </section>

            <div class="max-w-4xl mx-auto">
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <div class="text-center mt-16">
                        <a href="{{ route('support') }}"
                           class="txt-btn inline-flex items-center gap-3 bg-gray-600 text-white px-10 py-8 rounded-lg font-semibold text-xl shadow-lg">
                            <img src="{{ asset('images/podpora.svg') }}" width="30" alt="">
                            <span>{{ __('nav.other') }}</span>
                        </a>
                    </div>

                    <x-home />
                </div>
            </div>

        </div>
@endsection
