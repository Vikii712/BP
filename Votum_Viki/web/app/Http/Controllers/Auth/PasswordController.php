<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('pages.admin.change-password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = Auth::user();

        // overenie starého hesla
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Staré heslo je nesprávne.']);
        }

        // uloženie nového hesla
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin')->with('status', 'Heslo bolo úspešne zmenené!');
    }
}
