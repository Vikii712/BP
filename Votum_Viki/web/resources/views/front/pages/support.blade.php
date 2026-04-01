@extends('front.layouts.app')

@section('content')

    <main class="container mx-auto px-4 pt-16">
        <h1 class="h1 sentence md:text-5xl mb-5 font-bold text-votum-blue text-center">
            {{$why['title']}}
        </h1>
        <div class="w-full flex flex-wrap gap-3 justify-center">
            <x-front::listen
                :text="
                        $why['title'] . '. ' .
                        $why['content'] . '. ' .
                        __('nav.supportHow') . ' ' .
                        __('nav.2percent') . '. ' .
                        __('nav.financial') . '. ' .
                        __('nav.otherSupport') . '. '
                    "
                :event="true"
            />
            <x-front::share/>
        </div>
        <p class="txt divide-highlight my-5 sm:m-5 md:m-10 text-center mb-10">
            {{$why['content']}}
        </p>

        <h1 class="h1 mb-16 md:text-5xl sentence font-bold text-votum-blue text-center">
            {{ __('nav.supportHow') }}
        </h1>

        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-2 lg:gap-8 mb-16">

            <x-front::support.support_type type="p"/>
            <x-front::support.support_type type="f"/>
            <x-front::support.support_type type="o"/>


        </div>
        <x-front::home/>
    </main>

@endsection
