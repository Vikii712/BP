@extends('layouts.app')

@section('content')
    <main class="bg-[#f1ebe3] text-[#051647] min-h-screen py-12">
        <div class="max-w-5xl mx-auto px-6">

            {{-- Page title --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Ako finančne podporiť naše združenie</h1>

                {{-- Buttons: Listen & Share --}}
                <div class="flex justify-center gap-4">
                    <button class="flex items-center gap-2 bg-[#051647] text-white px-4 py-2 rounded-xl hover:bg-blue-900 transition">
                        🔊 Vypočuť si
                    </button>
                    <button class="flex items-center gap-2 bg-[#051647] text-white px-4 py-2 rounded-xl hover:bg-blue-900 transition">
                        🔗 Zdieľať
                    </button>
                </div>
            </div>

            {{-- Section 1: QR Payment --}}
            <section class="bg-white rounded-2xl shadow-lg p-8 mb-10">
                <h2 class="text-2xl font-semibold mb-4">1. Jednoducho pomocou QR</h2>
                <p class="text-base mb-6 leading-relaxed">
                    Najrýchlejší spôsob, ako nás podporiť, je naskenovať QR kód vo vašej mobilnej bankovej aplikácii.
                    Po naskenovaní sa automaticky vyplnia všetky platobné údaje – stačí potvrdiť platbu.
                </p>

                {{-- QR code placeholder --}}
                <div class="flex justify-center">
                    <div class="border-4 border-[#051647] rounded-2xl p-4 bg-[#f9f7f3]">
                        <img src="https://via.placeholder.com/250x250.png?text=QR+Code" alt="QR code" class="rounded-xl shadow-md">
                    </div>
                </div>
            </section>

            {{-- Section 2: Bank Transfer --}}
            <section class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-2xl font-semibold mb-4">2. Bankovým prevodom</h2>
                <p class="text-base mb-6 leading-relaxed">
                    Ak preferujete klasický prevod, použite nasledujúce údaje:
                </p>

                <div class="bg-[#f9f7f3] rounded-xl p-6 space-y-3 text-lg font-medium">
                    <div><span class="font-semibold">IBAN:</span> SK12 3456 7890 1234 5678 9012</div>
                    <div><span class="font-semibold">Číslo účtu:</span> 1234567890 / 0200</div>
                    <div><span class="font-semibold">SWIFT:</span> SUBASKBX</div>
                    <div><span class="font-semibold">Variabilný symbol:</span> 2025</div>
                    <div><span class="font-semibold">Správa pre prijímateľa:</span> Podpora Združenia Votum</div>
                </div>
            </section>

            {{-- Bottom navigation --}}
            <div class="flex justify-center gap-6 mt-12">
                <a href="{{ route('support') }}"
                   class="flex items-center gap-2 bg-[#051647] text-white px-6 py-3 rounded-xl hover:bg-blue-900 transition">
                    🤝 Iná pomoc
                </a>

                <a href="{{ route('home') }}"
                   class="flex items-center gap-2 bg-[#051647] text-white px-6 py-3 rounded-xl hover:bg-blue-900 transition">
                    🏠 Domov
                </a>
            </div>
        </div>
    </main>
@endsection
