@extends('layouts.app')

@section('content')
    <div class="container mx-auto pb-6 pt-10 px-6">

        <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left gap-6 mb-10">
            <h1 class="h1 md:text-6xl font-extrabold text-votum-blue">
                {{ __('nav.about')}}
            </h1>

            <x-share/>
        </div>

        @foreach($sections as $i => $section)
            <div class="full-width mb-16">
                <div class="mb-8">
                    <div class="grid lg:grid-cols-2">
                        <div class="relative {{ $i % 2 == 1 ? 'lg:order-2' : 'lg:order-1' }}">
                            <x-listen text="{{ strip_tags($section['title'] . '. ' . $section['content']) }}" id="{{200 + $i }}" />

                            <h2 class="h2 font-extrabold text-votum-blue mb-4 pe-12 lg:pe-16">{{ $section['title'] }}</h2>
                            <div class="text-gray-700 txt prose  max-w-none">
                                {!! $section['content'] !!}
                            </div>
                        </div>

                        <div class="bg-gradient-to-br flex items-center justify-center p-8 {{ $i % 2 == 1 ? 'md:order-1' : 'md:order-2' }}">
                            <img src="{{ asset('images/us.svg') }}" alt="Naša vízia" class="">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <x-wave />

    <x-about.team :team="$team"/>
@endsection
