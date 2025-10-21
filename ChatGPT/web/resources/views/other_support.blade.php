@extends('layouts.app')

@section('content')
    <main class="bg-[#f1ebe3] text-[#051647] min-h-screen py-12">
        <div class="max-w-6xl mx-auto px-6">

            {{-- Title --}}
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Iné formy pomoci</h1>
                <p class="text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                    Okrem finančnej podpory nás môžete podporiť aj inými spôsobmi – ponúknutím svojho talentu,
                    času, či zorganizovaním zbierky. Každá pomoc sa počíta.
                </p>
            </div>

            {{-- Three main options --}}
            <section class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-16">

                {{-- Music / Performances --}}
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:-translate-y-1 transition">
                    <div class="text-6xl mb-4">🎵</div>
                    <h2 class="text-2xl font-semibold mb-4">Hudobné vystúpenia a muzikoterapia</h2>
                    <p class="leading-relaxed text-lg mb-6">
                        Máte záujem o vystúpenie našej hudobnej skupiny, alebo by ste chceli ponúknuť svoje
                        hudobné schopnosti? Naša kapela prináša radosť a terapiu hudbou na rôzne podujatia,
                        komunitné centrá či školy.
                    </p>
                    <a href="#" class="inline-flex items-center gap-2 bg-[#051647] text-white px-5 py-2 rounded-lg hover:bg-blue-900 transition">
                        ✉️ Kontaktovať nás
                    </a>
                </div>

                {{-- Fundraiser / Zbierka --}}
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:-translate-y-1 transition">
                    <div class="text-6xl mb-4">🎁</div>
                    <h2 class="text-2xl font-semibold mb-4">Zorganizujte zbierku</h2>
                    <p class="leading-relaxed text-lg mb-6">
                        Môžete pre nás usporiadať menšiu zbierku vo vašej komunite, škole, práci alebo online.
                        Pomôžete tak šíriť povedomie o našej činnosti a získať prostriedky pre ďalšie projekty.
                    </p>
                    <a href="#" class="inline-flex items-center gap-2 bg-[#051647] text-white px-5 py-2 rounded-lg hover:bg-blue-900 transition">
                        📣 Viac o zbierkach
                    </a>
                </div>

                {{-- Material donations / gifts --}}
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:-translate-y-1 transition">
                    <div class="text-6xl mb-4">🎀</div>
                    <h2 class="text-2xl font-semibold mb-4">Darovanie materiálu alebo darčekov</h2>
                    <p class="leading-relaxed text-lg mb-6">
                        Radi prijmeme aj materiálne dary – hudobné nástroje, knihy, tvorivé pomôcky,
                        oblečenie alebo drobné darčeky pre klientov našich programov.
                    </p>
                    <a href="#" class="inline-flex items-center gap-2 bg-[#051647] text-white px-5 py-2 rounded-lg hover:bg-blue-900 transition">
                        📦 Dohodnúť darovanie
                    </a>
                </div>
            </section>

            {{-- Additional encouragement --}}
            <section class="bg-white rounded-2xl shadow-lg p-10 text-center mb-12">
                <h2 class="text-2xl font-semibold mb-4">Máte iný nápad, ako pomôcť?</h2>
                <p class="text-lg mb-6">
                    Budeme radi, ak sa nám ozvete s akoukoľvek formou podpory alebo spolupráce.
                    Spoločne môžeme vytvárať veľké veci.
                </p>
                <a href="#" class="inline-flex items-center gap-2 bg-[#051647] text-white px-6 py-3 rounded-xl hover:bg-blue-900 transition">
                    💌 Napíšte nám
                </a>
            </section>

            {{-- Navigation buttons --}}
            <div class="flex justify-center gap-6">
                <a href="{{ route('support') }}"
                   class="flex items-center gap-2 bg-[#051647] text-white px-6 py-3 rounded-xl hover:bg-blue-900 transition">
                    🔙 Späť na podporu
                </a>

                <a href="{{ route('home') }}"
                   class="flex items-center gap-2 bg-[#051647] text-white px-6 py-3 rounded-xl hover:bg-blue-900 transition">
                    🏠 Domov
                </a>
            </div>

        </div>
    </main>
@endsection
