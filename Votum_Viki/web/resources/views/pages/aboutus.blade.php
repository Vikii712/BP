@extends('layouts.app')

@section('content')
    <div class="container mx-auto mb-12 pt-10 px-6">

        <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left gap-6 mb-10">
            <h1 class="text-5xl md:text-6xl font-extrabold text-votum-blue">
                O nás
            </h1>

            <div class="flex justify-center md:justify-end gap-4 flex-wrap">
                <button onclick="toggleListen()" id="listenBtn" class="bg-votum-blue text-white px-6 py-3 rounded-lg hover-scale font-semibold flex items-center gap-2">
                    <i class="fas fa-volume-up text-xl"></i>
                    <span>Vypočuť si</span>
                </button>
                <button onclick="shareButton()" class="bg-green-600 text-white px-6 py-3 rounded-lg hover-scale font-semibold flex items-center gap-2">
                    <i class="fas fa-share-alt text-xl"></i>
                    <span>Zdieľať</span>
                </button>
            </div>
        </div>

        <x-about.section />
        <x-about.team />

        <div class="text-center mt-16 pb-8">
            <a href="{{ route('main') }}" class="inline-flex items-center gap-3 bg-votum-blue text-white px-8 py-4 rounded-lg hover-scale font-semibold text-lg shadow-lg">
                <i class="fas fa-home text-2xl"></i>
                <span>Domov</span>
            </a>
        </div>
    </div>
@endsection
