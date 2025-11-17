@extends('layouts.app')

@section('content')
    <div class="container mx-auto pb-6 pt-10 px-6">

        <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left gap-6 mb-10">
            <h1 class="h1 md:text-6xl font-extrabold text-votum-blue">
                O nás
            </h1>

            <x-share />
        </div>

        <x-about.section />
    </div>

    <x-wave />

    <x-about.team />
@endsection
