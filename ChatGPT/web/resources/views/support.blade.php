@extends('layouts.app')

@section('content')
    <main class="bg-[#f1ebe3] text-[#051647] min-h-screen py-12">
        <div class="max-w-5xl mx-auto px-6 text-center">

            {{-- Title --}}
            <h1 class="text-3xl md:text-4xl font-bold mb-12">Ako nás podporiť?</h1>

            {{-- Support options grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 justify-items-center">

                {{-- Option 1: Venovať 2% --}}
                <a href="#"
                   class="group w-64 h-64 bg-white rounded-2xl shadow-lg flex flex-col items-center justify-center p-6 hover:bg-[#051647] hover:text-white transition duration-300">
                    <div class="text-6xl mb-4">💰</div>
                    <h2 class="text-2xl font-semibold mb-2 group-hover:text-[#f1ebe3]">Venovať 2 %</h2>
                    <p class="text-sm opacity-80 group-hover:opacity-100">
                        Podporte nás darovaním 2 % z dane.
                    </p>
                </a>

                {{-- Option 2: Finančná podpora --}}
                <a href="#"
                   class="group w-64 h-64 bg-white rounded-2xl shadow-lg flex flex-col items-center justify-center p-6 hover:bg-[#051647] hover:text-white transition duration-300">
                    <div class="text-6xl mb-4">💵</div>
                    <h2 class="text-2xl font-semibold mb-2 group-hover:text-[#f1ebe3]">Finančná podpora</h2>
                    <p class="text-sm opacity-80 group-hover:opacity-100">
                        Prispejte priamo finančne a pomôžte nám rastu.
                    </p>
                </a>

                {{-- Option 3: Iné formy pomoci --}}
                <a href="#"
                   class="group w-64 h-64 bg-white rounded-2xl shadow-lg flex flex-col items-center justify-center p-6 md:col-span-2 hover:bg-[#051647] hover:text-white transition duration-300">
                    <div class="text-6xl mb-4">🎁</div>
                    <h2 class="text-2xl font-semibold mb-2 group-hover:text-[#f1ebe3]">Iné formy pomoci</h2>
                    <p class="text-sm opacity-80 group-hover:opacity-100">
                        Pomôžte nám svojím časom, zručnosťami alebo darom.
                    </p>
                </a>
            </div>

            {{-- Home button --}}
            <div class="flex justify-center mt-12">
                <a href="{{ route('home') }}"
                   class="flex items-center gap-2 bg-[#051647] text-white px-6 py-3 rounded-xl hover:bg-blue-900 transition">
                    🏠 Domov
                </a>
            </div>
        </div>
    </main>
@endsection
