@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] bg-gray-100 px-4 py-10 flex flex-col items-center">

        <div class="w-full max-w-4xl">

            <h1 class="text-3xl font-bold text-blue-950 mb-6 text-center">Správa adminov</h1>

            {{-- Flash správa --}}
            @if(session('status'))
                <div class="mb-4 px-4 py-2 bg-green-100 text-green-900 rounded-md text-center">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Formulár pridania admina --}}
            <form method="POST" action="{{ route('admin.add') }}" class="mb-6 flex flex-col gap-3">
                @csrf

                <div class="flex gap-3 items-center">
                    <span class="font-semibold text-blue-950">Pridať admina:</span>
                    <input type="email" name="email" placeholder="Email" required
                           class="px-3 py-2 border-2 border-gray-300 rounded-md flex-1">
                    <input type="password" name="password" placeholder="Heslo" required
                           class="px-3 py-2 border-2 border-gray-300 rounded-md flex-1">
                </div>

                {{-- Heslo prihláseného admina --}}
                <div class="flex gap-3 items-center mt-2">
                    <span class="font-semibold text-blue-950">Heslo prihláseného admina:</span>
                    <input type="password" name="current_password" placeholder="Heslo" required
                           class="px-3 py-2 border-2 border-gray-300 rounded-md flex-1">
                    @error('current_password')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="bg-green-200 border-2 border-green-900 text-green-900 px-4 py-2 rounded-md font-semibold hover:bg-green-300">
                        Pridať
                    </button>
                </div>
            </form>

            {{-- Tabuľka adminov --}}
            <div class="bg-white shadow-md border border-gray-200 rounded-none overflow-hidden">
                <table class="min-w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 font-medium text-blue-950">Email</th>
                        <th class="px-6 py-3 font-medium text-blue-950 text-right">Akcie</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $admin)
                        <tr @class([
        'bg-gray-50' => $admin->id == Auth::id(),
        'border-t border-gray-200' => $admin->id != Auth::id()
    ])>
                            <td class="px-6 py-4">{{ $admin->email }}</td>
                            <td class="px-6 py-4 text-right">
                                @if($admin->id == Auth::id())
                                    <span class="text-gray-400 font-medium">Aktuálny</span>
                                @else
                                    {{-- tlačidlo koša --}}
                                    <form method="POST" action="{{ route('admin.delete', $admin->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-950 hover:text-red-600 text-2xl">
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
