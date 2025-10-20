@extends('layouts.app')

@section('content')
    <main class="bg-[#f1ebe3] text-[#051647] min-h-screen py-12">
        <div class="max-w-6xl mx-auto px-6">

            {{-- Page title --}}
            <h1 class="text-3xl md:text-4xl font-bold text-center mb-12">Dokumenty na stiahnutie</h1>

            {{-- Section: GDPR --}}
            <section class="mb-12">
                <h2 class="text-2xl font-semibold mb-6 border-b-2 border-[#051647] inline-block pb-1">GDPR</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Example document cards --}}
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
                        <h3 class="text-xl font-semibold mb-2">Dokument GDPR</h3>
                        <p class="text-sm opacity-80 mb-4">(pdf, 1200 kB)</p>
                        <a href="#" download
                           class="inline-flex items-center justify-center gap-2 bg-[#051647] text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition">
                            Stiahnuť ⬇️
                        </a>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
                        <h3 class="text-xl font-semibold mb-2">Dokument 2</h3>
                        <p class="text-sm opacity-80 mb-4">(pdf, 2500 kB)</p>
                        <a href="#" download
                           class="inline-flex items-center justify-center gap-2 bg-[#051647] text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition">
                            Stiahnuť ⬇️
                        </a>
                    </div>
                </div>
            </section>

            {{-- Section: 2% --}}
            <section class="mb-12">
                <h2 class="text-2xl font-semibold mb-6 border-b-2 border-[#051647] inline-block pb-1">2 %</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
                        <h3 class="text-xl font-semibold mb-2">Dokument 3</h3>
                        <p class="text-sm opacity-80 mb-4">(docx, 5024 kB)</p>
                        <a href="#" download
                           class="inline-flex items-center justify-center gap-2 bg-[#051647] text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition">
                            Stiahnuť ⬇️
                        </a>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
                        <h3 class="text-xl font-semibold mb-2">Dokument 4-5</h3>
                        <p class="text-sm opacity-80 mb-4">(pdf, 1024 kB)</p>
                        <a href="#" download
                           class="inline-flex items-center justify-center gap-2 bg-[#051647] text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition">
                            Stiahnuť ⬇️
                        </a>
                    </div>
                </div>
            </section>

            {{-- Home and back-to-top buttons --}}
            <div class="flex justify-center mt-16 gap-6">
                <a href="{{ route('home') }}"
                   class="flex items-center gap-2 bg-[#051647] text-white px-6 py-3 rounded-xl hover:bg-blue-900 transition">
                    🏠 Domov
                </a>

                <a href="#"
                   class="flex items-center gap-2 bg-[#051647] text-white px-6 py-3 rounded-xl hover:bg-blue-900 transition">
                    ⬆️ Hore
                </a>
            </div>
        </div>
    </main>
@endsection
