@extends('front.layouts.app')

@section('content')
    <div class="container mx-auto pb-6 pt-10 px-2 sm:px-6">

        <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left mb-10">
            <h1 class="h1 md:text-6xl font-extrabold text-votum-blue sentence">
                {{ __('nav.about')}}
            </h1>

            <x-front::share/>
        </div>

        @foreach($sections as $i => $section)
            <div class="full-width">
                <div class="mb-4">
                    <div class="grid lg:grid-cols-2">
                        <div class="relative {{ $i % 2 == 1 ? 'lg:order-2' : 'lg:order-1' }}">
                            <x-front::listen text="{{ strip_tags($section['title'] . '. ' . $section['content']) }}"
                                      id="{{200 + $i }}"/>

                            <h2 class="sentence h2 font-extrabold text-votum-blue mb-4 pe-12 lg:pe-16">{{ $section['title'] }}</h2>
                            <div class="divide-highlight text-gray-700 txt prose max-w-none">
                                {!! $section['content'] !!}
                            </div>
                        </div>

                        <div
                            class="bg-gradient-to-br flex items-center justify-center p-8 {{ $i % 2 == 1 ? 'md:order-1' : 'md:order-2' }}">
                            @if($section['image'])
                                <img src="{{ asset('storage/' .$section['image']['url']) }}"
                                     alt="{{ $section['image']['alt'] }}"
                                     class="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <x-front::wave/>

    <x-front::about.team :team="$team"/>
@endsection
