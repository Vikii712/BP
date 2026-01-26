@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] pt-20 bg-gray-100 px-4 py-10 flex flex-col items-center">

        <div class="w-full max-w-4xl">

            <h1 class="text-3xl font-bold text-blue-950 mb-6 text-center">Správa adminov</h1>

            {{-- Flash správa --}}
            @if(session('status'))
                <div class="mb-4 px-4 py-2 bg-green-100 text-green-900 rounded-md text-center">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Formulár pridania admina --}}
            <div class="bg-white shadow-md rounded-md p-6 mb-8 border border-gray-200 w-full">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-5 h-9 flex items-center justify-center rounded-md text-blue-950">
                        <i class="fas fa-plus"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-blue-950">
                        Pridať nového admina
                    </h2>
                </div>

                <form method="POST" action="{{ route('admin.add') }}" class="flex flex-col gap-3 w-full">
                    @csrf
                    <div class="flex flex-col sm:flex-row gap-3 w-full">
                        <input type="email" name="email" placeholder="Email" required
                               class="px-3 py-2 border-2 border-gray-300 rounded-md flex-1 w-full">
                        <input type="password" name="password" placeholder="Heslo" required
                               class="px-3 py-2 border-2 border-gray-300 rounded-md flex-1 w-full">
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 items-center mt-2 w-full">
                        <input type="password" name="current_password" placeholder="Heslo prihláseného admina" required
                               class="px-3 py-2 border-2 border-gray-300 rounded-md flex-1 w-full">
                        <button type="submit" class="bg-green-200 border-2 border-green-900 text-green-900 px-4 py-2 rounded-md font-semibold hover:bg-green-300 w-full sm:w-auto">
                            Pridať
                        </button>
                    </div>

                    @error('current_password')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </form>
            </div>

            {{-- Menší nadpis nad tabuľku --}}
            <h2 class="text-xl font-bold text-center text-blue-950 mb-3">Zoznam adminov</h2>

            {{-- Tabuľka adminov --}}
            <div class="bg-white shadow-md  rounded-md overflow-hidden w-full">
                <table class="min-w-full text-left border-collapse">
                    <thead class="bg-blue-950">
                    <tr>
                        <th class="px-6 py-3 font-medium text-blue-50">Email</th>
                        <th class="px-6 py-3 font-medium text-blue-50 text-right">Akcia</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $admin)
                        <tr @class([
                'bg-gray-50 border-t border-blue-950/20' => $admin->id == Auth::id(),
                'border-t border-blue-950/20 hover:bg-blue-50' => $admin->id != Auth::id()
            ])>
                            <td class="px-6 py-4 font-medium {{ $admin->id == Auth::id() ? 'text-blue-950' : 'text-gray-900' }}">
                                {{ $admin->email }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                @if($admin->id == Auth::id())
                                    <span class="text-gray-400 font-medium">Aktuálny</span>
                                @else
                                    <form method="POST" action="{{ route('admin.delete', $admin->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-950 hover:text-red-600 text-3xl">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection
