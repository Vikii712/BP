@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] pt-20 bg-gray-100 px-4 p-10 flex justify-center">
        <div class="w-full max-w-4xl space-y-10 text-center">

            <h1 class="text-3xl font-bold text-blue-950">
                Úprava častí - Podpora
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">

                {{-- 2% --}}
                <a href="{{ route('support.edit', ['type' => 'percent']) }}"
                   class="group flex flex-col items-center justify-center border-2 border-blue-950 rounded-md p-8 hover:bg-blue-50 transition">
                    <img src="{{ asset('images/percent.svg') }}" alt="" width="80" height="80" class="my-5">
                    <h2 class="text-xl font-bold text-blue-950 mb-2 mt-4">
                        Venujte 2%
                    </h2>
                </a>

                {{-- Finančná pomoc --}}
                <a href="{{ route('support.edit', ['type' => 'financial']) }}"
                   class="group flex flex-col items-center justify-center text-center border-2 border-blue-950 rounded-md p-8 hover:bg-blue-50 transition">
                    <img src="{{ asset('images/money.svg') }}" alt="" width="80" height="80">
                    <h2 class="text-xl font-bold text-blue-950 mb-2 mt-4">
                        Finančná podpora
                    </h2>
                </a>

                {{-- Iná podpora --}}
                <a href="{{ route('support.edit', ['type' => 'other']) }}"
                   class="group flex flex-col items-center justify-center text-center border-2 border-blue-950 rounded-md p-8 hover:bg-blue-50 transition">
                    <img src="{{ asset('images/other.svg') }}" alt="" width="80" height="80">
                    <h2 class="text-xl font-bold text-blue-950 mb-2 mt-4">
                        Iné formy podpory
                    </h2>
                </a>


            </div>
        </div>
    </div>
@endsection
