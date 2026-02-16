@props(['isEdit', 'event'])

{{-- HLAVNÁ FOTKA --}}
<div id="mainImageSection" class="{{ (old('inHome', $event->inHome ?? false) || old('inGallery', $event->inGallery ?? false)) ? '' : 'hidden' }}">
    <div class="flex bg-gray-100 -mx-6 px-6 mb-6 py-2 font-medium text-blue-950">
        Hlavná fotka udalosti
    </div>

    @if($isEdit && $event->main_pic)
        <div class="px-6 mb-4">
            <img src="{{ asset('storage/' . $event->main_pic) }}"
                 alt="{{ $event->image_alt_sk }}"
                 class="max-w-xs rounded-md border-2 border-gray-300">
        </div>
    @endif

    <div class="flex gap-3 px-6">
        <input id="newImageFilename"
               readonly
               value="{{ $isEdit && $event->main_pic ? basename($event->main_pic) : '— žiadny obrázok —' }}"
               class="border-2 border-gray-300 bg-gray-100 px-3 py-2 w-1/3 rounded-md">

        <label class="px-4 py-2 border-2 border-blue-950 rounded-md cursor-pointer hover:bg-blue-50">
            {{ $isEdit && $event->main_pic ? 'Zmeniť' : 'Nahrať' }}
            <input type="file"
                   name="main_pic"
                   accept="image/*"
                   class="hidden"
                   onchange="onNewImage(this)">
        </label>

        <button type="button"
                id="removeNewBtn"
                onclick="removeNewImage()"
                class="{{ $isEdit && $event->main_pic ? '' : 'hidden' }} px-4 py-2 border-2 border-red-600 text-red-600 rounded-md hover:bg-red-50">
            Odstrániť
        </button>
    </div>

    <input type="hidden" name="remove_image" id="removeNewFlag" value="0">

    {{-- ALT TEXT --}}
    <div id="newAltWrapper" class="{{ $isEdit && $event->main_pic ? '' : 'hidden' }} mt-6">
        <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
            Alternatívny text obrázka <x-InfoTooltip typ="alt"/>
        </div>

        <div class="space-y-3 mt-6">
            <div class="flex gap-3">
                <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
                <textarea name="image_alt_sk"
                          rows="3"
                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ old('image_alt_sk', $event->image_alt_sk ?? '') }}</textarea>
            </div>

            <div class="flex gap-3">
                <span class="w-10 font-semibold text-blue-950 pt-2">EN –</span>
                <textarea name="image_alt_en"
                          rows="3"
                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ old('image_alt_en', $event->image_alt_en ?? '') }}</textarea>
            </div>
        </div>
    </div>
</div>
