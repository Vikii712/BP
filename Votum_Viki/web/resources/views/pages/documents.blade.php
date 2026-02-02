@extends('layouts.app')

@section('content')
    <main class="container mx-auto px-4 py-12">

        <h1 class="h1 md:text-5xl font-bold text-votum-blue text-center mb-4">
            {{ __('nav.docDown') }}
        </h1>

        <p class="txt text-center text-black mb-12 max-w-2xl mx-auto">
            {{ __('nav.docDownText') }}
        </p>

        <div class="max-w-5xl mx-auto space-y-12">

            @foreach ($sections as $section)
                <section>
                    <div class="mb-6">
                        <h2 class="text-3xl font-bold text-votum-blue mb-2">
                            {{ app()->getLocale() === 'sk' ? $section->title_sk : $section->title_en }}
                        </h2>
                        <div class="h-1 w-24 bg-votum-blue rounded"></div>
                    </div>

                    <div class="grid lg:grid-cols-2 gap-6">
                        @foreach ($section->documents as $document)
                            <x-documents.document
                                :text="$document->title"
                                :url="$document->download_url"
                                :size="$document->size_kb"
                            />
                        @endforeach
                    </div>
                </section>
            @endforeach

        </div>

        <x-home />
    </main>
@endsection
