@props([
    'items',
    'title',
    'showYear' => false,
])

@php
    $category = request()->route('category');
    $isHistory = $showYear;
@endphp

<h2 class="text-xl font-bold text-center text-blue-950">{{ $title }}</h2>

<div class="bg-white shadow-md rounded-md overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-blue-950 text-blue-50">
        <tr>
            <th class="px-6 py-3 text-start">Poradie</th>
            <th class="px-6 py-3 text-start">Názov</th>
            <th class="px-6 py-3 text-right">Akcia</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr class="border-t hover:bg-blue-50">
                <td class="px-6 py-4 flex gap-1">
                    <form method="POST" action="{{ route('section.up', ['category' => $category, 'id' => $item->id]) }}">
                        @csrf
                        <button type="submit" class="text-blue-950 hover:text-gray-700 text-lg"><i class="fas fa-arrow-up"></i></button>
                    </form>
                    <form method="POST" action="{{ route('section.down', ['category' => $category, 'id' => $item->id]) }}">
                        @csrf
                        <button type="submit" class="text-blue-950 hover:text-gray-700 text-lg"><i class="fas fa-arrow-down"></i></button>
                    </form>
                </td>
                <td class="px-6 py-4 font-medium">{{ $item->title_sk }}</td>
                <td class="px-6 py-4 text-right flex justify-end gap-3">
                    <button class="toggle-edit" data-id="{{ $item->id }}"><i class="fas fa-pen"></i></button>
                    <button
                        onclick="openSectionDeleteModal({{ $item->id }}, '{{ addslashes($item->title_sk) }}')"
                        class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>

            {{-- Edit Form --}}
            <tr id="edit-row-{{ $item->id }}" class="hidden bg-gray-50">
                <td colspan="3" class="px-6 py-6">
                    <form method="POST"
                          action="{{ route('section.update', ['category' => $category, 'id' => $item->id]) }}"
                          enctype="multipart/form-data"
                          class="bg-white border rounded-md p-6 space-y-6"
                          id="editForm-{{ $item->id }}">
                        @csrf @method('PUT')


                        @if($showYear)
                            <div class="flex items-center rounded-t-md bg-gray-100 -mt-6 -mx-6 px-6 py-2 font-medium text-blue-950">
                                Rok udalosti
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <span class="w-10 font-semibold text-blue-950">Rok –</span>
                                    <input type="number" name="year" value="{{ $item->year }}"
                                           class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                                </div>
                            </div>
                        @endif

                        {{-- Nadpis --}}
                        <div class="flex items-center rounded-t-md bg-gray-100 -mx-6 -mt-6 px-6 py-2 font-medium text-blue-950">
                            Nadpis sekcie
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <span class="w-10 font-semibold text-blue-950">SK –</span>
                                <input name="title_sk" required value="{{ $item->title_sk }}"
                                       class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="w-10 font-semibold text-blue-950">EN –</span>
                                <input name="title_en" required value="{{ $item->title_en }}"
                                       class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                            </div>
                        </div>

                        {{-- TEXT --}}
                        <div class="bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Text sekcie
                        </div>

                        <div class="space-y-4">
                            @if($isHistory)
                                {{-- History: jednoduché textarea --}}
                                <div class="flex items-center gap-3">
                                    <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
                                    <textarea name="content_sk" rows="4" required
                                              class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ $item->content_sk }}</textarea>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="w-10 font-semibold text-blue-950 pt-2">EN –</span>
                                    <textarea name="content_en" rows="4" required
                                              class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ $item->content_en }}</textarea>
                                </div>
                            @else
                                {{-- About/Team: Quill editor --}}
                                <div class="flex gap-3">
                                    <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
                                    <div class="flex-1">
                                        <div class="quill-wrapper">
                                            <div id="editor-edit-{{ $item->id }}-sk"></div>
                                        </div>
                                        <textarea name="content_sk" id="content-edit-{{ $item->id }}-sk" required class="hidden">{{ $item->content_sk }}</textarea>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <span class="w-10 font-semibold text-blue-950 pt-2">EN –</span>
                                    <div class="flex-1">
                                        <div class="quill-wrapper">
                                            <div id="editor-edit-{{ $item->id }}-en"></div>
                                        </div>
                                        <textarea name="content_en" id="content-edit-{{ $item->id }}-en" required class="hidden">{{ $item->content_en }}</textarea>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- IMAGE --}}
                        <div class="flex bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Obrázok sekcie
                        </div>

                        <div class="flex gap-3 px-6">
                            <input id="aboutFilename-{{ $item->id }}"
                                   readonly
                                   value="{{ $item->image ? basename($item->image->url) : '— žiadny obrázok —' }}"
                                   class="border-2 border-gray-300 bg-gray-100 px-3 py-2 w-1/3 rounded-md">

                            <label class="px-4 py-2 border-2 border-blue-950 rounded-md cursor-pointer hover:bg-blue-50">
                                Nahrať
                                <input type="file"
                                       name="image"
                                       accept="image/*"
                                       class="hidden"
                                       onchange="onEditImage(this, {{ $item->id }})">
                            </label>

                            <button type="button"
                                    onclick="removeEditImage({{ $item->id }})"
                                    class="px-4 py-2 border-2 border-red-600 text-red-600 rounded-md hover:bg-red-50 {{ $item->image ? '' : 'hidden' }}"
                                    id="removeBtn-{{ $item->id }}">
                                Odstrániť
                            </button>
                        </div>

                        <input type="hidden" name="remove_image" id="removeFlag-{{ $item->id }}" value="0">

                        {{-- ALT --}}
                        <div id="altWrapper-{{ $item->id }}" class="{{ $item->image ? '' : 'hidden' }}">
                            <div class="flex items-center bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                                Alternatívny text obrázka <x-InfoTooltip typ="alt"/>
                            </div>

                            <div class="space-y-3 mt-6">
                                <div class="flex gap-3">
                                    <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
                                    <textarea name="image_alt_sk" rows="3"
                                              required
                                              class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ old('image_alt_sk', $item->image?->alt_sk) }}</textarea>
                                </div>

                                <div class="flex gap-3">
                                    <span class="w-10 font-semibold text-blue-950 pt-2">EN –</span>
                                    <textarea name="image_alt_en" rows="3"
                                              required
                                              class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ old('image_alt_en', $item->image?->alt_en) }}</textarea>
                                </div>
                            </div>
                        </div>

                        {{-- TLAČIDLÁ --}}
                        <div class="flex justify-end gap-3">
                            <button type="submit" class="bg-blue-200 border-2 border-blue-900 px-6 py-2 rounded-md font-semibold hover:bg-blue-300">
                                Uložiť
                            </button>
                            <button type="button" class="close-edit border-2 border-gray-400 px-6 py-2 rounded-md hover:bg-gray-100" data-id="{{ $item->id }}">
                                Zrušiť
                            </button>
                        </div>

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

