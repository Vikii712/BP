@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8 px-4">
        <div class="container mx-auto max-w-7xl">
            <!-- Úvodný text -->
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-bold text-indigo-900 mb-2">Administrátorský panel</h2>
                <p class="text-gray-600">Vyberte sekciu, ktorú chcete upraviť</p>
            </div>

            <!-- Grid s tlačidlami -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">

                <!-- Úvodný text -->
                <a href="#" class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-8 flex flex-col items-center justify-center space-y-4 hover:-translate-y-1 border-2 border-transparent hover:border-indigo-500">
                    <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center group-hover:bg-indigo-500 transition-colors duration-300">
                        <i class="fas fa-home text-3xl text-indigo-600 group-hover:text-white transition-colors duration-300"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-600 transition-colors duration-300">Úvodný text</h3>
                </a>

                <!-- O nás -->
                <a href="#" class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-8 flex flex-col items-center justify-center space-y-4 hover:-translate-y-1 border-2 border-transparent hover:border-indigo-500">
                    <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center group-hover:bg-indigo-500 transition-colors duration-300">
                        <i class="fas fa-users text-3xl text-indigo-600 group-hover:text-white transition-colors duration-300"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-600 transition-colors duration-300">O nás</h3>
                    <p class="text-sm text-gray-500 text-center">Informácie</p>
                </a>

                <!-- Udalosti -->
                <a href="#" class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-8 flex flex-col items-center justify-center space-y-4 hover:-translate-y-1 border-2 border-transparent hover:border-indigo-500">
                    <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center group-hover:bg-indigo-500 transition-colors duration-300">
                        <i class="fas fa-star text-3xl text-indigo-600 group-hover:text-white transition-colors duration-300"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-600 transition-colors duration-300">Udalosti</h3>
                </a>

                <!-- História -->
                <a href="#" class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-8 flex flex-col items-center justify-center space-y-4 hover:-translate-y-1 border-2 border-transparent hover:border-indigo-500">
                    <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center group-hover:bg-indigo-500 transition-colors duration-300">
                        <i class="fas fa-clock text-3xl text-indigo-600 group-hover:text-white transition-colors duration-300"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-600 transition-colors duration-300">História</h3>
                </a>

                <!-- Podpora -->
                <a href="#" class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-8 flex flex-col items-center justify-center space-y-4 hover:-translate-y-1 border-2 border-transparent hover:border-indigo-500">
                    <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center group-hover:bg-indigo-500 transition-colors duration-300">
                        <i class="fas fa-hand-holding-heart text-3xl text-indigo-600 group-hover:text-white transition-colors duration-300"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-600 transition-colors duration-300">Podpora</h3>
                </a>

                <!-- Kontaktné údaje -->
                <a href="#" class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-8 flex flex-col items-center justify-center space-y-4 hover:-translate-y-1 border-2 border-transparent hover:border-indigo-500">
                    <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center group-hover:bg-indigo-500 transition-colors duration-300">
                        <i class="fas fa-address-book text-3xl text-indigo-600 group-hover:text-white transition-colors duration-300"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-600 transition-colors duration-300">Kontaktné údaje</h3>
                </a>

                <!-- Dokumenty -->
                <a href="#" class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-8 flex flex-col items-center justify-center space-y-4 hover:-translate-y-1 border-2 border-transparent hover:border-indigo-500">
                    <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center group-hover:bg-indigo-500 transition-colors duration-300">
                        <i class="fas fa-file-alt text-3xl text-indigo-600 group-hover:text-white transition-colors duration-300"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-600 transition-colors duration-300">Dokumenty</h3>
                </a>

                <!-- Zmena hesla -->
                <a href="#" class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-8 flex flex-col items-center justify-center space-y-4 hover:-translate-y-1 border-2 border-transparent hover:border-indigo-500">
                    <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center group-hover:bg-indigo-500 transition-colors duration-300">
                        <i class="fas fa-lock text-3xl text-indigo-600 group-hover:text-white transition-colors duration-300"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-600 transition-colors duration-300">Zmena hesla</h3>
                </a>

                <!-- Správa adminov -->
                <a href="#" class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-8 flex flex-col items-center justify-center space-y-4 hover:-translate-y-1 border-2 border-transparent hover:border-indigo-500">
                    <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center group-hover:bg-indigo-500 transition-colors duration-300">
                        <i class="fas fa-user-cog text-3xl text-indigo-600 group-hover:text-white transition-colors duration-300"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-600 transition-colors duration-300">Správa adminov</h3>
                </a>

            </div>
        </div>
    </div>
@endsection
