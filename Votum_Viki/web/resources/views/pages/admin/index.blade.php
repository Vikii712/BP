@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-10 px-4">
        <div class="container mx-auto max-w-7xl">
            @if(session('status'))
                <div class="mb-4 text-sm text-green-900 text-center bg-green-100 border-2 border-b-green-900 rounded-md px-4 py-2">
                    {{ session('status') }}
                </div>
            @endif

            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-blue-950 mb-4">
                    Administrátorský panel
                </h2>

                <div class="inline-block px-6 py-3 border-2 border-blue-950 rounded-xl
                        bg-blue-50 text-blue-950 font-semibold tracking-wide shadow-sm">
                    {{ Auth::user()->email }}
                </div>

                <p class="text-gray-600 mt-4">
                    Vyberte sekciu, ktorú chcete upraviť
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">

                <x-admin.card name="Domov" :route="route('home.edit')" icon="fa-home" image="domov.svg" />
                <x-admin.card name="O nás" :route="route('admin.about')" icon="fa-users" image="Onas.svg" />
                <x-admin.card name="Udalosti" :route="route('admin.events')" icon="fa-star" image="udalosti.svg" />
                <x-admin.card name="História" :route="route('section.index', 'history')" icon="fa-clock" image="historia.svg" />                <x-admin.card name="Podpora" route="admin" icon="fa-hand-holding-heart" image="podpora.svg" />
                <x-admin.card name="Kontakty" :route="route('admin')" icon="fa-address-book" image="kontakty.svg" />
                <x-admin.card name="Dokumenty" :route="route('admin')" icon="fa-file-alt" image="dokumenty.svg" />

                <x-admin.card name="Zmena hesla" :route="route('password.change')" icon="fa-lock" inverted />
                <x-admin.card name="Správa adminov" :route="route('admin.manage')" icon="fa-user-cog" inverted />
            </div>
        </div>
    </div>
@endsection
