@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] bg-gray-100 px-4 p-10 flex justify-center">
        <div class="w-full max-w-5xl space-y-10">

            <h1 class="text-3xl font-bold text-blue-950 text-center">
                Úprava stránky – Domov
            </h1>

            {{-- TEXTY ÚVODNEJ SEKcie --}}
            <div class="bg-white border border-gray-200 shadow-md rounded-md p-6 pt-0  space-y-6">

                <div class="bg-blue-950 text-lg -mx-6 px-6 py-4 text-white font-bold rounded-t-md ">
                    Texty úvodnej sekcie
                </div>

                {{-- MOTTO --}}
                <div class="bg-gray-100 -mx-6 -mt-6 px-6 py-2 font-medium text-blue-950">
                    Motto
                </div>

                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <span class="w-10 font-semibold text-blue-950">SK –</span>
                        <input type="text"
                               value="{{ $data['sk']['motto'] }}"
                               class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="w-10 font-semibold text-blue-950">EN –</span>
                        <input type="text"
                               value="{{ $data['en']['motto'] }}"
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
                        <textarea rows="4"
                                  class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ $data['sk']['intro'] }}</textarea>
                    </div>

                    <div class="flex gap-3">
                        <span class="w-10 font-semibold text-blue-950 pt-2">EN –</span>
                        <textarea rows="4"
                                  class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ $data['en']['intro'] }}</textarea>
                    </div>
                </div>

            </div>

            {{-- ÚVODNÁ FOTKA --}}
            <div class="bg-white border border-gray-200 shadow-md rounded-md p-6 pt-0  space-y-6">

                <div class="bg-blue-950 text-lg -mx-6 px-6 py-4 text-white font-bold rounded-t-md ">
                    Úvodná fotka
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    <input type="text"
                           disabled
                           value="{{ $data['sk']['hero_image'] }}"
                           class="border-2 border-gray-300 rounded-md px-3 py-2 bg-gray-100 w-full sm:w-1/3">

                    <button type="button"
                            class="px-4 py-2 border-2 border-blue-950 text-blue-950 font-semibold rounded-md hover:bg-blue-50">
                        Nahradiť
                    </button>
                </div>

                {{-- ALT TEXT --}}
                <div class="bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                    Alternatívny text obrázka
                </div>

                <div class="space-y-3">
                    <div class="flex gap-3">
                        <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
                        <textarea rows="3"
                                  class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ $data['sk']['hero_alt'] }}</textarea>
                    </div>

                    <div class="flex gap-3">
                        <span class="w-10 font-semibold text-blue-950 pt-2">EN –</span>
                        <textarea rows="3"
                                  class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ $data['en']['hero_alt'] }}</textarea>
                    </div>
                </div>

            </div>

            {{-- TÍMOVÁ FOTKA --}}
            <div class="bg-white border border-gray-200 shadow-md rounded-md p-6 pt-0  space-y-6">

                <div class="bg-blue-950 text-lg -mx-6 px-6 py-4 text-white font-bold rounded-t-md ">
                    Fotografia nášho tímu
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    <input type="text"
                           disabled
                           value="{{ $data['sk']['team_image'] }}"
                           class="border-2 border-gray-300 rounded-md px-3 py-2 bg-gray-100 w-full sm:w-1/3">

                    <button type="button"
                            class="px-4 py-2 border-2 border-blue-950 text-blue-950 font-semibold rounded-md hover:bg-blue-50">
                        Nahradiť
                    </button>
                </div>

                <div class="bg-gray-100 -mx-6 px-6 py-2 font-medium text-blue-950">
                    Alternatívny text obrázka
                </div>

                <div class="space-y-3">
                    <div class="flex gap-3">
                        <span class="w-10 font-semibold text-blue-950 pt-2">SK –</span>
                        <textarea rows="3"
                                  class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ $data['sk']['team_alt'] }}</textarea>
                    </div>

                    <div class="flex gap-3">
                        <span class="w-10 font-semibold text-blue-950 pt-2">EN –</span>
                        <textarea rows="3"
                                  class="flex-1 border-2 border-gray-300 rounded-md px-3 py-2">{{ $data['en']['team_alt'] }}</textarea>
                    </div>
                </div>

            </div>

            {{-- ULOŽENIE --}}
            <div class="flex justify-between">
                <button type="button"
                        class="px-6 py-3 bg-blue-950 text-white font-semibold rounded-md hover:bg-blue-800 shadow-md">
                    Späť
                </button>
                <button type="button"
                        class="px-6 py-3 bg-red-950 text-white font-semibold rounded-md hover:bg-red-800 shadow-md">
                    vymazať zmeny
                </button>
                <button type="button"
                        class="px-6 py-3 bg-green-950 text-white font-semibold rounded-md hover:bg-green-800 shadow-md">
                    Uložiť zmeny
                </button>
            </div>

        </div>
    </div>
@endsection
