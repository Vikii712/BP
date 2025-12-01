@extends('layouts.app')

@section('content')
    <section class="max-w-4xl mx-auto py-12 px-6 txt" >
        <h1 class="h2 font-bold text-votum-blue mb-4">Vyhlásenie o prístupnosti</h1>

        <p class="mb-4">
            Naším cieľom v <strong>Združení VOTUM</strong> je, aby táto webová stránka bola dostupná a použiteľná pre čo najviac ľudí — vrátane osôb so zrakovým, sluchovým, motorickým alebo kognitívnym obmedzením. Prístupnosť berieme vážne a snažíme sa o zlepšovanie v každodennej praxi.
        </p>

        <h2 class="h3 font-semibold mt-6 mb-2">Štandardy</h2>
        <p class="mb-4">
            Snažíme sa dodržiavať usmernenia <strong>WCAG 2.1 úroveň AAA</strong> tam, kde to technicky a obsahovo dáva zmysel.
        </p>

        <h2 class="h3 font-semibold mt-6 mb-2">Čo sme už spravili</h2>
        <ul class="list-disc pl-6 mb-4">
            <li>Semantické HTML (nadpisy, zoznamy, tlačidlá) pre lepšiu orientáciu pomocou čítačiek obrazovky.</li>
            <li>Podpora klávesnicovej navigácie (tab, enter, esc) vo všetkých hlavných častiach stránky.</li>
            <li>Alternatívne texty k obrázkom tam, kde sú k dispozícii (galéria, tím, články).</li>
            <li>Prehľadné a kontrastné farebné schémy pre lepšiu čitateľnosť.</li>
            <li>Dokumenty na stiahnutie sú označené</li>
        </ul>

        <h2 class="h3 font-semibold mt-6 mb-2">Známe obmedzenia</h2>
        <p class="mb-4">
            Aj napriek snahám sa môžu vyskytnúť časti stránky, ktoré momentálne nespĺňajú všetky požiadavky WCAG 2.1 AA. Patria sem napríklad:
        </p>
        <ul class="list-disc pl-6 mb-4">
            <li>Galéria fotografií môže obsahovať obrázky bez úplného alternatívneho popisu.</li>
        </ul>

        <h2 class="h3 font-semibold mt-6 mb-2">Ak potrebujete pomoc alebo máte pripomienky</h2>
        <p class="mb-4">
            Dajte nám vedieť — radi pomôžeme a v prípade potreby poskytneme obsah v alternatívnom formáte (veľký text, čitateľný textový súbor, prepis zvukového záznamu). Prosím, kontaktujte nás:
        </p>
        <ul class="list-disc pl-6 mb-4">
            <li> <a href="{{ route('contacts') }}" class="text-votum-blue underline">Kontakty</a></li>
            <li><strong>E-mail:</strong> <em>zdruzenie.votum@gmail.com</em></li>
            <li><strong>Telefón:</strong> <em>+421 XXX XXX XXX</em> </li>
        </ul>

        <h2 class="h3 font-semibold mt-6 mb-2">Ako nahlásiť problém</h2>
        <p class="mb-4">
            Ak narazíte na bariéru, popíšte prosím stránku a miesto, kde sa problém vyskytol, preferovaný spôsob kontaktu a ak je to možné, pošlite screenshot alebo odkaz. Vaše podnety preveríme prioritne a odpovieme vám do 5 pracovných dní.
        </p>

        <h2 class="h3 font-semibold mt-6 mb-2">Priebežné zlepšovanie</h2>
        <p class="mb-4">
            Prístupnosť je pre nás kontinuálny proces. Pravidelne posudzujeme obsah, aktualizujeme dokumenty a zdokonaľujeme web podľa spätnej väzby používateľov a technických auditov.
        </p>

        <p class=" text-gray-600 mt-6">
            Tento dokument bol naposledy aktualizovaný: <strong>2025-12-01</strong>.
        </p>
    </section>

@endsection
