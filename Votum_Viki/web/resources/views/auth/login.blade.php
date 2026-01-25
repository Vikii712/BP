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

                <h1 class="text-4xl font-bold tracking-wide text-white">
                    <span class="text-indigo-200">VOTUM admin</span>                </h1>

            </div>

            {{-- Login karta --}}
            <div class="backdrop-blur-md bg-white/90
                    shadow-2xl rounded-2xl px-8 py-10">


                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-6">
                        <label for="email"
                               class="block text-lg font-semibold text-blue-950 mb-2">
                            Email
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="mt-1 block w-full rounded-lg border-2 border-gray-300
                               focus:border-indigo-600 focus:ring-2 focus:ring-indigo-600
                               px-4 py-3 text-base text-gray-900
                               transition-colors duration-200
                               placeholder:text-gray-400"
                            placeholder="vas@email.sk"
                        >

                        @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Heslo --}}
                    <div class="mb-6">
                        <label for="password"
                               class="block text-lg font-semibold text-blue-950 mb-2">
                            Heslo
                        </label>

                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            class="mt-1 block w-full rounded-lg border-2 border-gray-300
                               focus:border-indigo-600 focus:ring-2 focus:ring-indigo-600
                               px-4 py-3 text-base text-gray-900
                               transition-colors duration-200
                               placeholder:text-gray-400"
                            placeholder="••••••••"
                        >

                        @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="w-full bg-blue-950 text-white py-3.5
                           rounded-xl font-semibold tracking-wide text-lg
                           hover:bg-indigo-900
                           focus:outline-none focus:ring-4 focus:ring-indigo-300
                           transition-all duration-300
                           shadow-lg hover:shadow-xl hover:scale-[1.02]
                           active:scale-[0.98]"
                    >
                        Prihlásiť sa
                    </button>
                </form>
            </div>


        </div>
    </div>

@endsection
