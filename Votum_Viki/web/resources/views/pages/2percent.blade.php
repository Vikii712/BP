@extends('layouts.app')

@section('content')

    <div class="max-w-4xl mx-auto mb-12 text-center">
        <h1 class="h1 md:text-5xl font-bold text-votum-blue mb-4 pt-16">
            {{ __('nav.percent') }}
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

                <div class="grid md:grid-cols-2 gap-4 mt-6">
                    <div class="bg-white p-4 rounded-lg text-center border-3 border-votum1">
                        <i class="fas fa-heart text-red-600 text-3xl mb-2"></i>
                        <p class="font-bold txt">{{ __('nav.nothing') }}</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg text-center border-3 border-votum1">
                        <i class="fas fa-hands-helping text-votum-blue text-3xl mb-2"></i>
                        <p class="font-bold txt">{{ __('nav.helpPeople') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <x-wave :inverted="true" />

    <main class="container mx-auto px-4 py-12 mt-16">

        <section class="max-w-5xl mx-auto mb-12 p-6 rounded-xl border-4 border-votum3 bg-votum3">

            <h2 class="h3 text-center font-bold text-votum-blue mb-6">
                {{ __('nav.importantInfo') }}
            </h2>

            <div class="grid lg:grid-cols-2 gap-x-5 gap-y-3">
                @foreach($info as $item)
                    <x-contacts.input :name="$item['name']" :value="$item['value']" :color="3"/>
                @endforeach
            </div>

        </section>

        <x-support.help :how="$how"/>

        <section class="rounded-xl max-w-5xl mx-auto mb-12 bg-blue-100 border-4 border-votum1">
            <div class="rounded-2xl p-4">

                <h2 class="h3 p-4 font-bold text-votum-blue mb-6 flex items-center gap-3">
                    <i class="fas fa-download"></i>
                    {{ __('nav.doc') }}
                </h2>

                <div class="grid lg:grid-cols-2 gap-6">
                    @foreach($documents as $doc)
                        <x-documents.document
                            :text="$doc->title"
                            :url="$doc->download_url"
                            :size="$doc->size_kb"
                            :type="$doc->file_type"
                            :color="false"
                        />
                    @endforeach
                </div>

            </div>
        </section>

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
