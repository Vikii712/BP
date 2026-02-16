@props(['isEdit', 'event'])

{{-- DÁTUMY UDALOSTI --}}
<div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
    Dátumy udalosti
</div>

{{-- RADIO BUTTONY pre výber dátumu --}}
<div class="flex gap-6 px-6 py-3">
    <label class="flex items-center gap-2">
        <input type="radio"
               name="dateOption"
               value="none"
            {{ ($isEdit && $event->dates->isEmpty()) || !$isEdit ? 'checked' : '' }}>
        Bez dátumu
    </label>
    <label class="flex items-center gap-2">
        <input type="radio"
               name="dateOption"
               value="add"
            {{ ($isEdit && $event->dates->isNotEmpty()) ? 'checked' : '' }}>
        Pridať dátum
    </label>
</div>

<div id="datesWrapper" class="flex flex-col sm:flex-row gap-6">

    {{-- KALENDÁR vľavo --}}
    <div class="sm:w-1/2 flex justify-center">
        <div id="multiDatePicker"></div>
    </div>

    {{-- ZOZNAM vybraných dátumov vpravo --}}
    <div class="sm:w-1/2 flex flex-col">
        <div class="flex items-start gap-2">
            <label class="font-semibold text-gray-700 ms-2 mt-3 w-32">Vybrané dátumy:</label>
            <div id="datesList" class="text-gray-700 rounded-md py-3 max-h-[280px] overflow-y-auto flex-1">
                @if($isEdit && $event->dates->isNotEmpty())
                    @foreach($event->dates->sortBy('date') as $date)
                        <p>-> {{ $date->date->format('d.m.Y') }}</p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

<input type="hidden"
       name="dates"
       id="datesInput"
       value="{{ $isEdit ? json_encode($event->dates->pluck('date')->map(fn($d) => $d->format('d.m.Y'))->toArray()) : '' }}">


{{-- FARBA + VOĽBY --}}
<div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
    Nastavenia udalosti
</div>

<div class="space-y-3 px-6">
    <label class="flex items-center gap-2">
        <input type="checkbox"
               id="inCalendar"
               name="inCalendar"
               class="rounded"
            {{ old('inCalendar', $event->inCalendar ?? false) ? 'checked' : '' }}>
        <span>Zobraziť v kalendári</span>
    </label>

    <!-- Radio buttony pre farbu, na začiatku skryté -->
    <div id="calendarColorWrapper" class="flex gap-3 flex-wrap mt-2 {{ old('inCalendar', $event->inCalendar ?? false) ? '' : 'hidden' }}">
        <!-- Radio buttons sa doplnia JS -->
    </div>

    <label class="flex items-center gap-2">
        <input type="checkbox"
               id="inHome"
               name="inHome"
               class="rounded"
            {{ old('inHome', $event->inHome ?? false) ? 'checked' : '' }}>
        <span>Pridať medzi vybrané udalosti na domovskej stránke</span>
    </label>
    <label class="flex items-center gap-2">
        <input type="checkbox"
               id="inGallery"
               name="inGallery"
               class="rounded"
            {{ old('inGallery', $event->inGallery ?? false) ? 'checked' : '' }}>
        <span>Vytvoriť vlastnú stránku v časti udalosti s textom, fotkami alebo videom</span>
    </label>

    @if($isEdit)
        <label class="flex items-center gap-2">
            <input type="checkbox"
                   id="archived"
                   name="archived"
                   class="rounded"
                {{ old('archived', $event->archived ?? false) ? 'checked' : '' }}>
            <span>Archivovaná udalosť</span>
        </label>
    @endif
</div>
