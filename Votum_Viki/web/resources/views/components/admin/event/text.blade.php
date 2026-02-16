@props(['event'])


{{-- TEXT --}}
<div id="textSection" class="{{ old('inGallery', $event->inGallery ?? false) ? '' : 'hidden' }}">
    <div class="flex items-center bg-gray-100 -mx-6 mb-6 px-6 py-2 font-medium text-blue-950">
        Text udalosti
    </div>

    <div class="space-y-4">
        <div class="flex gap-3">
            <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
            <div class="flex-1">
                <div class="quill-wrapper">
                    <div id="editor-new-sk"></div>
                </div>
                <textarea name="content_sk" id="content-new-sk" class="hidden">{{ old('content_sk', $event->content_sk ?? '') }}</textarea>
            </div>
        </div>

        <div class="flex gap-3">
            <span class="w-10 font-semibold text-blue-950 pt-2">EN –</span>
            <div class="flex-1">
                <div class="quill-wrapper">
                    <div id="editor-new-en"></div>
                </div>
                <textarea name="content_en" id="content-new-en" class="hidden">{{ old('content_en', $event->content_en ?? '') }}</textarea>
            </div>
        </div>
    </div>
</div>
