@extends('layouts.app')

@section('content')

    <!-- Page Header -->
    <div class="max-w-5xl mx-auto mb-12 text-center pt-16">
        <h1 class="h1 md:text-5xl font-bold text-votum-blue mb-4">
            {{ __('nav.other') }}
        </h1>
        <x-share />
    </div>

    <x-wave />

    <div class="bg-blue-100 py-6">
        <div class="p-4 max-w-5xl text-center mx-auto space-y-4 text-gray-800 txt">
            <h2 class="h2 font-bold text-votum-blue mb-4 flex items-center justify-center gap-3">
                <i class="fas fa-heart"></i>
                {{ $why['title'] }}
            </h2>

            <div class="txt text-gray-800 space-y-4">
                {!! $why['content'] !!}
            </div>
        </div>
    </div>

    <x-wave :inverted="true" />

    <main class="container mx-auto px-4 py-12">

        <!-- Support Options Grid -->
        <div class="max-w-6xl mx-auto space-y-12">
            @php
                $colors = ['votum3', 'votum2', 'votum1'];
                $darkColors = ['dark-votum3', 'dark-votum2', 'dark-votum1'];
            @endphp

            @foreach($types as $index => $type)
                @php
                    $color = $colors[$index % count($colors)];
                    $darkColor = $darkColors[$index % count($darkColors)];
                @endphp

                <div class="support-option-card border-4 border-{{ $color }} bg-{{ $color }} rounded-3xl shadow-xl overflow-hidden">
                    <div class=" gap-0">

                        <div class="bg-{{ $darkColor }} p-5 flex justify-center items-center text-white">
                            <div class="icon-float">
                                <i class="fas {{ $type['image'] }} text-6xl px-5"></i>
                            </div>
                            <h2 class=" text-center h2 font-bold">{{ $type['title'] }}</h2>
                        </div>

                        <div class="p-8 txt">
                            <div class="text-gray-700 leading-relaxed">
                                {!! $type['content'] !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="max-w-4xl mx-auto mt-16 mb-12 text-center">
            <div class="bg-votum3 border-votum3 border-4 rounded-2xl shadow-xl p-8">
                <h2 class="h3 font-bold text-votum-blue mb-4">
                    <i class="fas fa-question-circle mr-2"></i>
                    {{ $idea['title'] }}
                </h2>
                <div class="txt text-gray-700 mb-6">
                    {!! $idea['content'] !!}
                </div>
                <div class="text-center mt-16">
                    <a href="{{ route('contacts') }}" class="inline-flex items-center gap-3 bg-votum-blue text-white px-10 py-8 rounded-lg font-semibold txt-btn shadow-lg">
                        <img alt="" src="{{ asset('images/nav/kontakty.svg') }}" width="30">
                        <span>{{ __('nav.contacts') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <x-wave />

    <div class="bg-blue-100 px-4">
        <section class="max-w-4xl mx-auto mb-12 text-center py-5">
            <i class="fas fa-heart text-6xl mb-4 text-red-600"></i>
            <h2 class="h3 font-bold mb-4">{{ $thanks['title'] }}</h2>
            <p class="text-lg">{{ $thanks['content'] }}</p>
        </section>

        <div class="max-w-4xl mx-auto">
            <div class="flex flex-col sm:flex-row justify-between gap-4">
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
