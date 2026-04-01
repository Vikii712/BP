@php
    $messages = [
        'alt' => 'Alternatívny text čitajú čítačky pre ľudí so zrakovým znevýhodnením, alebo je vypísaný keď sa obrázok nezobrazí. Mal by stručne popísať obsah obrázka.',
        'hero' => 'Úvodný text je prvým viditeľným textom pri načítaní hlavnej stránky. Mal by mať rozsah asi 1-2 vety.',
        'motto' => 'Motto je prvá zvýraznená veta, ktorú uvidí používateľ pri navštívení hlavnej stránky.',
        'video' => '<ol class="list-decimal list-inside space-y-1">
                        <li>Otvorte video na YouTube.</li>
                        <li>Kliknite na tlačidlo <strong>Zdieľať</strong>.</li>
                        <li>Vyberte možnosť <strong>&lt;&gt; Vložiť</strong> (nie „Skopírovať“).</li>
                        <li>Skopírujte kód, ktorý sa zobrazí v spodnej časti okna.</li>
                    </ol>',

        'photo' => '<ol class="list-decimal list-inside space-y-1">
                        <li>Otvorte Google Fotky.</li>
                        <li>Prejdite do sekcie <strong>Albumy</strong>.</li>
                        <li>Otvorte konkrétny album.</li>
                        <li>Kliknite v pravom hornom rohu <strong>Zdieľať</strong>.</li>
                        <li>Zvoľte možnosť <strong>Vytvoriť odkaz</strong>.</li>
                        <li>Kliknite na <strong>Kopírovať odkaz</strong>.</li>
                    </ol>',
        'uvodna_fotka' => 'Prvá fotografia, ktorú uvidí používateľ po načítaní stránky domov',
        'team_fotka' => 'Fotografia na spodku domovskej stránky, pod ktorou je tlačidlo s presmerovaním na členov tímu',
    ];
@endphp

@props(['typ', 'white' => false])

<div class="relative flex items-center gap-2 text-lg">
    <span class="{{$white ? 'text-white' :'text-blue-950'}} text-2xl font-bold cursor-pointer info-icon px-2">
        <i class="fas fa-question-circle"></i>
    </span>
    <div class="absolute z-10 w-64 bg-blue-50 border border-blue-300 text-blue-950 px-4 py-3 rounded-md shadow-lg hidden info-message"
         style="left: 2rem; top: 50%; transform: translateY(-50%);">
        {!! $messages[$typ] !!}
    </div>
</div>

