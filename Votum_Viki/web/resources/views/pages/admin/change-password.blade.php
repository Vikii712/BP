@extends('layouts.admin')

@section('adminContent')
    <div class="flex pt-20 flex-col items-center justify-start bg-gray-100 px-4 py-10 min-h-[calc(100vh-5.5rem)]">
        <div class="w-full max-w-md">

            {{-- Nadpis --}}
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-blue-950">Zmena hesla</h1>
            </div>

            <div class="backdrop-blur-md bg-white/95 shadow-2xl rounded-2xl px-8 py-10 border border-gray-200">

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('PUT')

                    {{-- Staré heslo --}}
                    <div class="mb-5">
                        <label for="current_password" class="block text-lg font-semibold text-blue-950 mb-2">
                            Staré heslo
                        </label>
                        <input id="current_password" type="password" name="current_password" required
                               class="mt-1 block w-full rounded-lg border-2 border-gray-300
                                  focus:border-indigo-600 focus:ring-2 focus:ring-indigo-300
                                  px-4 py-3 text-base text-blue-950 transition-colors duration-200"
                               placeholder="••••••••">
                        @error('current_password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Nové heslo --}}
                    <div class="mb-5">
                        <label for="password" class="block text-lg font-semibold text-blue-950 mb-2">
                            Nové heslo
                        </label>
                        <input id="password" type="password" name="password" required
                               class="mt-1 block w-full rounded-lg border-2 border-gray-300
                                  focus:border-indigo-600 focus:ring-2 focus:ring-indigo-300
                                  px-4 py-3 text-base text-blue-950"
                               placeholder="••••••••">
                        @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Potvrdenie nového hesla --}}
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-lg font-semibold text-blue-950 mb-2">
                            Potvrďte nové heslo
                        </label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                               class="mt-1 block w-full rounded-lg border-2 border-gray-300
                                  focus:border-indigo-600 focus:ring-2 focus:ring-indigo-300
                                  px-4 py-3 text-base text-blue-950"
                               placeholder="••••••••">
                    </div>

                    <button type="submit"
                            class="w-full text-indigo-100 bg-blue-950 py-3.5 rounded-xl font-semibold tracking-wide text-lg
                               transition-all duration-300 shadow-lg hover:scale-[1.02] active:scale-[0.98]">
                        Zmeniť heslo
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection
