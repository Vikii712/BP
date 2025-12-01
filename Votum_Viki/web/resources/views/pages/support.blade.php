@extends('layouts.app')

@section('content')

    <main class="container mx-auto px-4 pt-16">
        <h1 class="h1 mb-16 md:text-5xl font-bold text-votum-blue text-center">
            {{$why['title']}}
        </h1>
        <p class="txt m-10 text-center">
            {{$why['content']}}
        </p>

        <h1 class="h1 mb-16 md:text-5xl font-bold text-votum-blue text-center">
            {{ __('nav.supportHow') }}
        </h1>

        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8 mb-16">

            <x-support.support_type type="p"/>
            <x-support.support_type type="f"/>
            <x-support.support_type type="o"/>


        </div>
    </main>



        <x-home />

@endsection
