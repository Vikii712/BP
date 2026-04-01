@extends('admin.layouts.admin')

@section('adminContent')
    <div class="min-h-screen pt-20 bg-gradient-to-br from-gray-50 to-gray-100 py-10 px-4">
        <div class="container mx-auto max-w-7xl">

            {{-- Flash správy --}}
            @if(session('status'))
                <div
                    class="mb-4 text-sm text-green-900 text-center bg-green-100 border-2 border-b-green-900 rounded-md px-4 py-2">
                    {{ session('status') }}
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($showWarning)
                <div class="bg-red-100 text-red-700 p-3 rounded mb-2">
                    Databáza nebola zálohovaná viac ako 6 mesiacov!
                </div>
            @endif

            @if($showPassWarning)
                <div class="bg-red-100 text-red-700 p-3 rounded mb-2">
                    Heslo nebolo zmenené viac ako 6 mesiacov!
                </div>
            @endif

            {{-- Administrátorský panel header --}}
            <div class="mb-12 text-center flex items-center flex-col">
                <h2 class="text-3xl font-bold text-blue-950 mb-4">
                    Administrátorský panel
                </h2>

                {{-- Email prihláseného admina --}}
                <div class="inline-block px-6 py-3 border-2 border-blue-950 rounded-xl
                        bg-blue-50 text-blue-950 font-semibold tracking-wide shadow-sm mb-4">
                    {{ Auth::user()->email }}
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">

                <x-admin::.card name="Domov" :route="route('home.edit')" icon="home"/>
                <x-admin::.card name="O nás" :route="route('admin.about')" icon="about"/>
                <x-admin::.card name="Udalosti" :route="route('events.index')" icon="event"/>
                <x-admin::.card name="História" :route="route('section.index', 'history')" icon="history"/>
                <x-admin::.card name="Podpora" :route="route('admin.support')" icon="support"/>
                <x-admin::.card name="Kontakty" :route="route('contacts.edit')" icon="contact"/>
                <x-admin::.card name="Dokumenty" :route="route('section.index', 'documentSection')" icon="document"/>

                <x-admin::.card name="Zmena hesla" :route="route('password.change')" icon="fa-lock" inverted/>
                <x-admin::.card name="Správa adminov" :route="route('admin.manage')" icon="fa-user-cog" inverted/>
            </div>

            <div class="my-12 text-center flex items-center flex-col">
                {{-- Záloha databázy --}}
                <div class="p-4 my-4 mx-8 max-w-fit bg-yellow-100 flex flex-col border-2 border-yellow-600 rounded-lg">
                    @if($lastBackup && !$showWarning)
                        <p class="text-gray-700 mb-2">
                            Posledná záloha: <span
                                class="font-medium">{{ \Carbon\Carbon::parse($lastBackup->created_at)->format('d.m.Y H:i') }}</span>
                        </p>
                    @endif

                    <form method="POST" action="{{ route('backup.create') }}" class="inline-block">
                        @csrf
                        <button type="submit"
                                class="bg-yellow-700 hover:bg-yellow-800 text-white px-4 py-2 rounded shadow">
                            Vytvoriť zálohu
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
