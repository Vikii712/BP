<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;

class AuthenticatedSessionController extends Controller
{
    /**
     * GET /votumaci
     * Zobraz login alebo redirect ak uz prihlaseny
     */
    public function check()
    {
        if (Auth::check()) {
            return redirect()->route('admin');
        }

        return view('auth.login');
    }

    /**
     * POST /votumaci
     * Spracuje login
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        return redirect()->route('admin');
    }

    /**
     * Logout
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
