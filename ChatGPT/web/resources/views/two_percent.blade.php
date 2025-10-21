@extends('layouts.app')

@section('content')
    <main class="bg-[#f1ebe3] text-[#051647] min-h-screen py-12">
        <div class="max-w-5xl mx-auto px-6">

            {{-- Title and top buttons --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Ako venovať 2% z dane?</h1>

                <div class="flex justify-center gap-4">
                    <button class="flex items-center gap-2 bg-[#051647] text-white px-4 py-2 rounded-xl hover:bg-blue-900 transition">
                        🔊 Vypočuť si
                    </button>
                    <button class="flex items-center gap-2 bg-[#051647] text-white px-4 py-2 rounded-xl hover:bg-blue-900 transition">
                        🔗 Zdieľať
                    </button>
                </div>
            </div>

            {{-- Intro section --}}
            <section class="bg-white rounded-2xl shadow-lg p-8 mb-10">
                <p class="leading-relaxed text-lg">
                    Vaše 2% z dane môžu pomôcť podporiť naše aktivity, organizovať podujatia a pomáhať komunite.
                    Postup je jednoduchý – vyplňte príslušné tlačivá, použite naše údaje a odovzdajte ich daňovému úradu.
                </p>
            </section>

            {{-- Documents section --}}
            <section class="mb-12">
                <h2 class="text-2xl font-semibold mb-6">Potrebné dokumenty na stiahnutie</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white p-6 rounded-2xl shadow-md text-center">
                        <h3 class="font-bold text-xl mb-4">Dokument 2%</h3>
                        <p class="text-gray-700 mb-4">(PDF, 1200 kB)</p>
                        <a href="#" class="inline-flex items-center gap-2 bg-[#051647] text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition">
                            ⬇️ Stiahnuť
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-md text-center">
                        <h3 class="font-bold text-xl mb-4">Dokument 2</h3>
                        <p class="text-gray-700 mb-4">(DOCX, 950 kB)</p>
                        <a href="#" class="inline-flex items-center gap-2 bg-[#051647] text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition">
                            ⬇️ Stiahnuť
                        </a>
                    </div>
                </div>
            </section>

            {{-- Organizational information --}}
            <section class="bg-white rounded-2xl shadow-lg p-8 mb-10">
                <h2 class="text-2xl font-semibold mb-6">Potrebné údaje</h2>
                <div class="space-y-2 text-lg">
                    <p><strong>Názov:</strong> Združenie VOTUM</p>
                    <p><strong>Právna forma:</strong> Občianske združenie</p>
                    <p><strong>IČO:</strong> 51234567</p>
                    <p><strong>Sídlo:</strong> Námestie Slobody 12, 811 06 Bratislava</p>
                </div>
            </section>

            {{-- Steps for individuals and companies --}}
            <section class="space-y-10">
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-2xl font-semibold mb-4">Postup pre fyzické osoby</h2>
                    <ol class="list-decimal list-inside space-y-2 text-lg">
                        <li>Vyplňte vyhlásenie o poukázaní 2% dane (tlačivo je hore).</li>
                        <li>Do vyhlásenia doplňte naše údaje.</li>
                        <li>Podajte tlačivo spolu s daňovým priznaním alebo ho doručte osobne.</li>
                    </ol>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-2xl font-semibold mb-4">Postup pre právnické osoby</h2>
                    <ol class="list-decimal list-inside space-y-2 text-lg">
                        <li>V daňovom priznaní pre právnické osoby vyznačte, že chcete venovať 2% dane.</li>
                        <li>Uveďte naše identifikačné údaje (názov, IČO, sídlo).</li>
                        <li>Daňové priznanie podajte do príslušného termínu (zvyčajne do 31. marca).</li>
                    </ol>
                </div>
            </section>

            {{-- Navigation buttons --}}
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
