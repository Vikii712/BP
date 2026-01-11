@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] bg-gray-100 px-4 p-10 flex justify-center">
        <div class="w-full max-w-5xl space-y-10">

            <h1 class="text-3xl font-bold text-blue-950 text-center">
                Úprava stránky – Domov
            </h1>

            <form action="{{ route('home.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="w-full space-y-10">

                    <div class="bg-white border border-gray-200 shadow-md rounded-md p-6 pt-0  space-y-6">

                        <div class="bg-blue-950 text-lg -mx-6 px-6 py-4 text-white font-bold rounded-t-md ">
                            Texty úvodnej sekcie
                        </div>

                        <div class="bg-gray-100 -mx-6 -mt-6 px-6 py-2 font-medium text-blue-950">
                            Motto
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <span class="w-10 font-semibold text-blue-950">SK –</span>
                                <input type="text"
                                       name="sk[motto]"
                                       value="{{ old('sk.motto', $data['sk']['motto']) }}"
                                       class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                            </div>

                            <div class="flex items-center gap-3">
                                <span class="w-10 font-semibold text-blue-950">EN –</span>
                                <input type="text"
                                       name="en[motto]"
                                       value="{{ old('en.motto', $data['en']['motto']) }}"
                                       class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                            </div>
                        </div>

                        {{-- ÚVODNÝ TEXT --}}
                        <div class="bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Úvodný text
                        </div>

                        <div class="space-y-3">
                            <div class="flex gap-3">
                                <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
                                <textarea name="sk[intro]" rows="4"
                                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ old('sk.intro', $data['sk']['intro']) }}</textarea>
                            </div>

                            <div class="flex gap-3">
                                <span class="w-10 font-semibold pt-2">EN –</span>
                                <textarea name="en[intro]" rows="4"
                                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ old('en.intro', $data['en']['intro']) }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- ================= HERO IMAGE ================= --}}
                    <div class="bg-white border border-gray-200 shadow-md rounded-md p-6 pt-0 space-y-6">
                        <div class="bg-blue-950 text-lg -mx-6 px-6 py-4 text-white font-bold rounded-t-md">
                            Úvodná fotka
                        </div>

                        <div class="flex gap-3">
                            <input id="heroFilename"
                                   type="text"
                                   readonly
                                   value="{{ basename($data['sk']['hero_image']) }}"
                                   class="border-2 border-gray-300 rounded-md px-3 py-2 bg-gray-100 w-1/3">

                            <label class="px-4 py-2 border-2 border-blue-950 rounded-md cursor-pointer">
                                Nahradiť
                                <input type="file"
                                       name="hero_image"
                                       accept="image/*"
                                       class="hidden"
                                       onchange="updateFilename(this, 'heroFilename')">
                            </label>
                        </div>

                        {{-- ALT --}}
                        <div class="bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Alternatívny text obrázka
                        </div>

                        <div class="space-y-3">
                            <div class="flex gap-3">
                                <span class="w-10 font-semibold pt-2">SK –</span>
                                <textarea name="sk[hero_alt]" rows="3"
                                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ old('sk.hero_alt', $data['sk']['hero_alt']) }}</textarea>
                            </div>
                            <div class="flex gap-3">
                                <span class="w-10 font-semibold pt-2">EN –</span>
                                <textarea name="en[hero_alt]" rows="3"
                                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ old('en.hero_alt', $data['en']['hero_alt']) }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- ================= TEAM IMAGE ================= --}}
                    <div class="bg-white border border-gray-200 shadow-md rounded-md p-6 pt-0 space-y-6">
                        <div class="bg-blue-950 text-lg -mx-6 px-6 py-4 text-white font-bold rounded-t-md">
                            Fotografia nášho tímu
                        </div>

                        <div class="flex gap-3">
                            <input id="teamFilename"
                                   type="text"
                                   readonly
                                   value="{{ basename($data['sk']['team_image']) }}"
                                   class="border-2 border-gray-300 rounded-md px-3 py-2 bg-gray-100 w-1/3">

                            <label class="px-4 py-2 border-2 border-blue-950 rounded-md cursor-pointer">
                                Nahradiť
                                <input type="file"
                                       name="team_image"
                                       accept="image/*"
                                       class="hidden"
                                       onchange="updateFilename(this, 'teamFilename')">
                            </label>
                        </div>

                        {{-- ALT --}}
                        <div class="bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                            Alternatívny text obrázka
                        </div>

                        <div class="space-y-3">
                            <div class="flex gap-3">
                                <span class="w-10 font-semibold pt-2">SK –</span>
                                <textarea name="sk[team_alt]" rows="3"
                                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ old('sk.team_alt', $data['sk']['team_alt']) }}</textarea>
                            </div>
                            <div class="flex gap-3">
                                <span class="w-10 font-semibold pt-2">EN –</span>
                                <textarea name="en[team_alt]" rows="3"
                                          class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ old('en.team_alt', $data['en']['team_alt']) }}</textarea>
                            </div>
                        </div>

                    </div>

                    {{-- BUTTONS --}}
                    <div class="flex justify-between gap-4">
                        <a href="{{route('admin')}}"
                                class="px-6 py-3 bg-blue-950 text-white font-semibold rounded-md hover:bg-blue-800 shadow-md">
                            Späť
                        </a>
                        <a href="{{route('home.edit')}}"
                                class="px-6 py-3 bg-red-950 text-white font-semibold rounded-md hover:bg-red-800 shadow-md">
                            vymazať zmeny
                        </a>
                        <button type="submit"
                                class="px-6 py-3 bg-green-900 text-white rounded-md">
                            Uložiť zmeny
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <script>
        function updateFilename(input, targetId) {
            if (input.files.length > 0) {
                document.getElementById(targetId).value = input.files[0].name;
            }
        }
    </script>
@endsection
