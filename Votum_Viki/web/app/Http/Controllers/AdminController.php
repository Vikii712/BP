<?php

namespace App\Http\Controllers;

use App\Models\Backup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController
{
    public function index(){
        $lastBackup = Backup::latest('created_at')->first();
        $showWarning = false;
        $showPassWarning = false;

        if ($lastBackup &&
            \Carbon\Carbon::parse($lastBackup->created_at)->lt(now()->subMonths(6))) {
            $showWarning = true;
        }
        if (!$lastBackup) {
            $showWarning = true;
        }

        $user = User::find(auth()->id());

        $lastPasswordChange = $user->updated_at ?? $user->created_at;
        if (\Carbon\Carbon::parse($lastPasswordChange)->lt(now()->subMonths(6))) {
            $showPassWarning = true;
        }

        return view('pages.admin.index', compact('showWarning', 'lastBackup', 'showPassWarning'));
    }
    public function manageAdmins()
    {
        $admins = User::all()->sortByDesc(function($user) {
            return $user->id == Auth::id();
        });

        return view('pages.admin.manage-admins', compact('admins', ));
    }

    public function add(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
            'current_password' => ['required'],
        ]);

        $currentUser = Auth::user();

        if (!Hash::check($request->current_password, $currentUser->password)) {
            return back()->withErrors(['current_password' => 'Heslo prihláseného admina je nesprávne.']);
        }

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => 'Admin',
        ]);

        return redirect()->route('admin.manage')->with('status', 'Admin bol úspešne pridaný!');
    }

    public function delete($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return back()->with('status', 'Admin bol úspešne odstránený!');
    }


}
