@props([
  'calendar' => [],   // array of 42 cells: ['day'=>int|null, 'date'=>string|null, 'event'=>bool]
  'monthLabel' => ''
])

<div class="bg-white p-4 rounded shadow-sm" role="region" aria-label="Month calendar">
    <div class="flex justify-between items-center mb-3">
        <strong class="text-slate-700">{{ $monthLabel }}</strong>
        <span class="text-sm text-slate-500 sr-only">Days of week: Monday to Sunday</span>
    </div>

    <div class="grid grid-cols-7 gap-1 text-center text-sm" aria-hidden="false">
        @foreach($calendar as $cell)
            @if($cell && $cell['day'])
                <div
                    class="p-2 rounded {{ $cell['event'] ? 'bg-[var(--accent-2)]' : 'bg-white' }}"
                    aria-current="{{ $cell['event'] ? 'date' : 'false' }}"
                    role="button"
                    tabindex="0"
                    aria-label="{{ $cell['date'] . ($cell['event'] ? ' — event' : '') }}">
                    <span class="block font-medium">{{ $cell['day'] }}</span>
                </div>
            @else
                <div class="p-2 bg-transparent"></div>
            @endif
        @endforeach
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('calendar.ics') }}" class="inline-block px-4 py-2 border rounded" aria-label="Add to your calendar">Uložiť do môjho kalendára / Add to your calendar</a>
    </div>
</div>
