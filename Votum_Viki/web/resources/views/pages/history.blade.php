@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <!-- Nadpis + tlačidlá -->
        <div class="flex flex-col sm:flex-row  justify-between items-center text-center md:text-left gap-6 mb-10">
            <h1 class="h1 md:text-6xl font-extrabold text-votum-blue">{{ __('nav.history')}}</h1>

            <div class="flex justify-center md:justify-end gap-4 flex-wrap">
                <x-share />
            </div>
        </div>

        <!-- Timeline -->
        <div class="relative max-w-4xl mx-auto md:pl-20">            <!-- Vertikálna čiara -->
            <div class="absolute md:ml-20 left-2 top-3 bottom-0 w-[2px] bg-votum-blue"></div>

            @foreach($timeline as $i =>  $entry)
                <div class="relative mb-12 last:mb-0">
                    <!-- Bodka -->
                    <div class="absolute left-[1px] top-3 w-4 h-4 rounded-full bg-white border-4 border-votum-blue shadow"></div>

                    <!-- Rok -->
                    <div
                        class="ml-8 inline-block bg-votum-blue text-white px-4 py-1.5 rounded-full text-lg sm:text-xl font-semibold
                                md:absolute md:right-[calc(100%+1rem)] md:ml-0">
                        {{ $entry['year'] }}
                    </div>

                    <!-- Obsah -->
                    <div class="ml-8 pt-5 md:p-6 relative">

                        @if($entry['image'])
                            <div class="mb-4">
                                <img
                                    src="{{ $entry['image']['url'] }}"
                                    alt="{{ $entry['image']['alt'] }}"
                                    loading="lazy"
                                    width="800"
                                    height="450"
                                    class="w-full rounded-xl shadow-md object-cover aspect-[16/9]">
                            </div>
                        @endif

                        <x-listen :text="$entry['name'] . '. ' . $entry['text']" id="{{100 + $i}}" />

                        <h2 class="h3 font-bold text-votum-blue mb-2 pe-12">
                            {{ $entry['name'] }}
                        </h2>

                        <p class="text-gray-700 leading-relaxed txt">
                            {{ $entry['text'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <x-home />
    </div>
@endsection
