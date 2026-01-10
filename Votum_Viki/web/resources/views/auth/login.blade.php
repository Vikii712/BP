@extends('layouts.login')

@section('loginContent')

    <div class="min-h-screen flex items-center justify-center
            bg-blue-950 px-4">

        <div class="w-full max-w-md">

            {{-- Logo + názov --}}
            <div class="text-center mb-8">
                <img src="{{ asset('images/logo.svg') }}"
                     alt="VOTUM logo"
                     class="mx-auto mb-4 w-20">

                <h1 class="text-3xl font-bold tracking-wide text-white">
                    VOTUM<span class="text-indigo-300">-admin</span>
                </h1>

            </div>

            {{-- Login karta --}}
            <div class="backdrop-blur-md bg-white/90
                    shadow-2xl rounded-2xl px-8 py-8">

                {{-- Globálna chyba --}}
                @if ($errors->any())
                    <div class="mb-4 text-sm text-red-700 bg-red-100
                            rounded-md px-4 py-2">
                        Nesprávne prihlasovacie údaje.
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-5">
                        <label for="email"
                               class="block text-sm font-semibold text-blue-950">
                            Email
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="mt-1 block w-full rounded-lg border-2 border-gray-700
                               focus:border-indigo-600 focus:ring-indigo-600"
                        >

                        @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Heslo --}}
                    <div class="mb-5">
                        <label for="password"
                               class="block text-sm font-semibold text-blue-950">
                            Heslo
                        </label>

                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            class="mt-1 block w-full rounded-lg border-2 border-gray-700
                               focus:border-indigo-600 focus:ring-indigo-600"
                        >

                        @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="w-full bg-blue-950 text-white py-3
                           rounded-xl font-semibold tracking-wide
                           hover:bg-indigo-900
                           transition-all duration-300
                           shadow-lg hover:shadow-xl"
                    >
                        Prihlásiť sa
                    </button>
                </form>
            </div>


        </div>
    </div>

@endsection
