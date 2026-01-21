@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] bg-gray-100 px-4 p-10 flex justify-center">
        <div class="w-full max-w-4xl space-y-10 text-center">

            <h1 class="text-3xl font-bold text-blue-950">
                O nás – administrácia
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">

                {{-- SEKCIe O NÁS --}}
                <a href="{{ route('section.index', ['category' => 'about']) }}"
                   class="group bg-white border-2 border-blue-950 rounded-md p-8 shadow hover:bg-blue-50 transition">
                    <i class="fas fa-align-left text-4xl text-blue-950 mb-4"></i>
                    <h2 class="text-xl font-bold text-blue-950 mb-2">
                        Úprava sekcií O nás
                    </h2>
                    <p class="text-gray-600">
                        Texty, obrázky a alternatívne texty
                    </p>
                </a>

                {{-- TÍM --}}
                <a href="{{ route('section.index', ['category' => 'team']) }}"
                   class="group bg-white border-2 border-blue-950 rounded-md p-8 shadow hover:bg-blue-50 transition">
                    <i class="fas fa-users text-4xl text-blue-950 mb-4"></i>
                    <h2 class="text-xl font-bold text-blue-950 mb-2">
                        Úprava členov tímu
                    </h2>
                    <p class="text-gray-600">
                        Fotky, mená, role a popisy
                    </p>
                </a>

            </div>
        </div>
    </div>
@endsection
