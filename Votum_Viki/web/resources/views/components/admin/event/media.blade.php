@props(['isEdit', 'event'])

{{-- FOTKY --}}
<div id="gallerySection" class="space-y-3 {{ old('inGallery', $event->inGallery ?? false) ? '' : 'hidden' }}">
    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
        Odkaz na fotogalériu
        <x-InfoTooltip typ="photo"/>
    </div>
    <div class="px-6">
        <input type="url"
               name="gallery_url"
               value="{{ old('gallery_url', $event->gallery_url ?? '') }}"
               placeholder="https://photos.google.com/..."
               class="w-full border-2 border-gray-300 rounded-md px-3 py-2">
    </div>
</div>

{{-- VIDEO --}}
<div id="videoSection" class="space-y-3 {{ old('inGallery', $event->inGallery ?? false) ? '' : 'hidden' }}">
    <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
        Odkaz na youtube video
        <x-InfoTooltip typ="video"/>
    </div>

    <!-- + tlačidlo naľavo -->
    <div class="px-6 flex gap-3 mb-2">
        <button type="button"
                id="addVideoLink"
                class="h-10 w-10 flex items-center justify-center border-2 border-blue-950 rounded-md hover:bg-blue-50">
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>

    <!-- Wrapper pre všetky inputy -->
    <div id="videoLinksWrapper" class="px-6 space-y-4">
        @if($isEdit && $event->video_url)
            @php
                $videoUrls = is_array($event->video_url) ? $event->video_url : json_decode($event->video_url, true) ?? [];
            @endphp
            @foreach($videoUrls as $url)
                {{-- Videa sa načítajú cez JS --}}
            @endforeach
        @endif
    </div>
</div>
