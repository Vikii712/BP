@extends('front.layouts.app')
@php
$locale = app()->getLocale()
@endphp
@section('content')
    <section class="max-w-4xl mx-auto py-12 px-6 txt divide-highlight">

        <h1 class="h2 font-bold text-votum-blue mb-4">Vyhlásenie o prístupnosti</h1>

        <p class="mb-4">
            V <strong>Združení VOTUM</strong> sa snažíme, aby bola táto webová stránka prístupná a použiteľná pre čo
            najširšie spektrum ľudí — vrátane osôb so zrakovým, sluchovým, motorickým alebo kognitívnym znevýhodnením.
            Prístupnosť vnímame ako dlhodobý záväzok, nie jednorazové riešenie.
        </p>

        <h2 class="h3 font-semibold mt-6 mb-2">Štandardy prístupnosti</h2>
        <p class="mb-4">
            Web je navrhnutý v súlade s odporúčaniami <strong>WCAG 2.1 (Web Content Accessibility Guidelines)</strong>
            na úrovni <strong>AA</strong>, pričom sa snažíme niektoré prvky implementovať aj na úrovni
            <strong>AAA</strong>, ak je to technicky a obsahovo možné.
        </p>

        <h2 class="h3 font-semibold mt-6 mb-2">Použité prístupnostné riešenia</h2>
        <ul class="list-disc pl-6 mb-4 space-y-1">
            <li>Semantická HTML štruktúra (správne použitie nadpisov, zoznamov, tlačidiel a formulárov).</li>
            <li>Plná podpora ovládania pomocou klávesnice (Tab, Shift+Tab, Enter, Escape).</li>
            <li>Viditeľné focus stavy pre interaktívne prvky.</li>
            <li>Dostatočný farebný kontrast pre text aj ovládacie prvky.</li>
            <li>Responzívny dizajn a možnosť zväčšenia textu bez straty funkcionality.</li>
            <li>Alternatívne texty pre obrázky tam, kde je to relevantné.</li>
            <li>Interaktívne prvky (napr. modálne okná alebo dialógy) sú ovládateľné aj bez myši.</li>
            <li>Minimalizácia rušivých prvkov a dôraz na jednoduché a prehľadné rozhranie.</li>
        </ul>

        <h2 class="h3 font-semibold mt-6 mb-2">Ochrana súkromia a externý obsah</h2>
        <p class="mb-4">
            Stránka nepoužíva cookies na sledovanie používateľov.
            Externý obsah (napr. videá alebo mapy) sa načítava až po interakcii používateľa, aby sa predišlo nečakanému
            správaniu alebo zníženiu prístupnosti.
        </p>

        <h2 class="h3 font-semibold mt-6 mb-2">Známe obmedzenia</h2>
        <p class="mb-4">
            Napriek našej snahe môžu niektoré časti stránky ešte nespĺňať všetky požiadavky štandardu WCAG 2.1. Aktuálne
            evidujeme najmä:
        </p>
        <ul class="list-disc pl-6 mb-4">
            <li>Niektoré obrázky v galérii nemusia obsahovať plnohodnotný alternatívny popis.</li>
            <li>Dokumenty na stiahnutie nemusia byť plne prístupné.</li>
        </ul>

        <h2 class="h3 font-semibold mt-6 mb-2">Spätná väzba a pomoc</h2>
        <p class="mb-4">
            Ak narazíte na problém s prístupnosťou alebo potrebujete obsah v alternatívnej forme (napr. jednoduchší
            text, väčšie písmo alebo prepis), radi vám pomôžeme.
        </p>

        <ul class="list-disc pl-6 mb-4">
            <li><strong>E-mail:</strong> <em>zdruzenie.votum@gmail.com</em></li>
            <li><a href="{{ route('contacts', ['locale' => $locale]) }}" class="text-votum-blue underline">Kontakty</a></li>
        </ul>

        <h2 class="h3 font-semibold mt-6 mb-2">Ako nahlásiť problém</h2>
        <p class="mb-4">
            Pri nahlasovaní problému prosím uveďte čo najviac informácií — konkrétnu stránku, popis problému a ideálne
            aj zariadenie alebo prehliadač, ktorý používate.
        </p>

        <h2 class="h3 font-semibold mt-6 mb-2">Priebežné zlepšovanie</h2>
        <p class="mb-4">
            Prístupnosť priebežne testujeme a zlepšujeme na základe spätnej väzby používateľov aj technických auditov.
            Cieľom je vytvoriť prostredie, ktoré je jednoduché, zrozumiteľné a dostupné pre každého.
        </p>

        <p class="text-gray-600 mt-6">
            Tento dokument bol naposledy aktualizovaný: <strong>2026-03-26</strong>.
        </p>

    </section>
@endsection
