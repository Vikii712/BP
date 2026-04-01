@props(['isEdit', 'event', 'allSponsors'])


{{--SPONZOR--}}
<div id="sponsorSection" class="space-y-3 {{ old('inGallery', $event->inGallery ?? false) ? '' : 'hidden' }}">
    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
        Pridať sponzora
    </div>

    <div class="space-y-3 px-6">

        {{-- Pridať existujúceho alebo nový --}}
        <div class="flex items-center gap-3">
            <button type="button"
                    id="addEmptySponsor"
                    class="h-10 w-10 flex items-center justify-center border-2 border-blue-950 rounded-md hover:bg-blue-50">
                <i class="fa-solid fa-plus"></i>
            </button>

            <select id="existingSponsorSelect"
                    class="flex-1 h-10 border-2 border-gray-300 rounded-md px-3">
                <option value="">Pridať existujúceho sponzora</option>
                @foreach($allSponsors as $sponsor)
                    <option value="{{ $sponsor->id }}">{{ $sponsor->name }}</option>
                @endforeach
            </select>
        </div>


        {{-- Zoznam pridaných sponzorov --}}
        <div id="sponsorsList" class="space-y-5">
            @if($isEdit && $event->sponsors->isNotEmpty())
                {{-- Sponzori sa načítajú cez JS --}}
            @endif
        </div>

    </div>
</div>
