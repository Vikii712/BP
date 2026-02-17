@extends('layouts.app')

@section('content')
    <main class="container mx-auto px-4 py-12">

        <!-- Event Header -->
        <div class="max-w-5xl mx-auto mb-8">

            <h1 class="h1 text-center font-bold text-votum-blue mb-4">
                {{ $title }}
            </h1>
                <div class="w-full flex gap-3 justify-center">
                    <x-listen :text="$title . $description" :event="true"/>
                    <x-share />
                </div>

            <div class="h3 font-bold text-votum-blue pt-5">
                <i class="fas fa-calendar-alt mr-2"></i>
                {{$dateLabel}}
            </div>

            @if($sponsors->isNotEmpty())
                <span class="w-full text-votum-blue font-semibold txt">Sponzori:</span>

                <div class="flex items-center gap-4 flex-wrap p-4">
                    @foreach($sponsors as $sponsor)
                        <div class="p-3 flex items-center gap-4 border-3 border-votum1 bg-votum1 rounded-lg">
                <span class="text-votum-blue font-bold text-lg">
                    {{ $sponsor->name }}
                </span>

                            @if($sponsor->file)
                                <div class="h-16 rounded flex items-center justify-center">
                                    <img
                                        src="{{ asset('storage/' . $sponsor->file->url) }}"
                                        alt="{{ $sponsor->name }}"
                                        class="max-w-full max-h-full object-contain"
                                    >
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

        </div>

        <!-- Event Description Section -->
        <section class="max-w-5xl mx-auto mb-12">
            <div class="relative">
                <div class="txt text-black prose max-w-none space-y-4">
                    {!! $description !!}
                </div>
            </div>
        </section>

        @if($photoLink)
            <a href="{{ $photoLink->url }}" class="block group mx-4" target="_blank">
                <section
                    class="flex flex-col items-center justify-center text-center
                   mx-auto p-10 border-6 border-votum2 bg-votum2 max-w-4xl mb-8
                   rounded-2xl transition-all duration-300 txt-btn-block">

                    <div class="p-6 mb-6">
                        <img src="{{ asset('images/fotky.svg') }}" alt="fotky" width="100" class="mx-auto">
                    </div>

                    <h2 class="h2 font-bold text-votum2 group-hover:text-votum-dark transition-colors">
                        Fotky
                    </h2>
                </section>
            </a>
        @endif



        <!-- Videos Section -->
        @if($videos->isNotEmpty())
            <section class="max-w-5xl mx-auto mb-12">
                <h2 class="h2 font-bold text-votum-blue mb-6">Pozrite si video</h2>

                <div class="space-y-6">
                    @foreach($videos as $video)
                        <div class="aspect-video bg-gray-900 rounded-lg overflow-hidden">
                            <iframe
                                class="w-full h-full"
                                src="{{ $video->url }}"
                                title="{{ $video->title_sk }}"
                                frameborder="0"
                                allowfullscreen>
                            </iframe>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

    </main>

    <x-wave />
    <div class="bg-blue-100">
        @if($documents->isNotEmpty())
            <section class="max-w-5xl mx-auto pb-12 px-4 md:px-12 lg:px-0">
                <h2 class="h2 font-bold text-votum-blue mb-6">Dokumenty na stiahnutie</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    @foreach($documents as $doc)
                        <x-documents.document
                            :text="session('locale') === 'sk' ? $doc->title_sk : $doc->title_en"
                            :url="$doc->url"
                            :color="false"
                            :size="$doc->size_kb"
                            :type="$doc->file_type"
                        />
                    @endforeach
                </div>
            </section>
        @endif

            <!-- Navigation Buttons -->
            <div class="flex flex-col md:flex-row justify-between px-10 max-w-5xl mx-auto">
                <div class="text-center mt-16 mb-3">
                    <a href="{{route('events')}}" class="txt-btn inline-flex items-center gap-3 bg-gray-600 text-white px-10 py-8 rounded-lg font-semibold text-xl shadow-lg">
                        <i class="fas fa-calendar-days"></i>
                        <span>Udalosti</span>
                    </a>
                </div>

                <x-home />
            </div>

    </div>
@endsection
