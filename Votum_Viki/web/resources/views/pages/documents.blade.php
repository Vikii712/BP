@extends('layouts.app')

@section('content')
    <main class="container mx-auto px-4 py-12">
        <!-- Page Title -->
        <h1 class="text-4xl md:text-5xl font-bold text-votum-blue text-center mb-4">
            Dokumenty na stiahnutie
        </h1>
        <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">
            Tu nájdete všetky dôležité dokumenty súvisiace s naším združením - stanovy, výročné zprávy, GDPR dokumentáciu a ďalšie materiály.
        </p>

        <div class="max-w-5xl mx-auto space-y-12">
            @foreach (['GDPR','2%', 'Stanovy a výročné správy','Registračné dokumenty'] as $section)
                <section>
                    <div class="mb-6">
                        <h2 class="text-3xl font-bold text-votum-blue mb-2">{{$section}}</h2>
                        <div class="h-1 w-24 bg-votum-blue rounded"></div>
                    </div>

                    <div class="grid lg:grid-cols-2 gap-6">
                            <x-documents.document/>
                            <x-documents.document/>
                            <x-documents.document/>
                    </div>
                </section>
            @endforeach
        </div>

        <x-home />
    </main>
@endsection
