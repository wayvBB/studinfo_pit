<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // In Admin\Auth\LoginController
    public function store(LoginRequest $request): RedirectResponse
    {
        // This will try both guards and return which one succeeded
        $guard = $request->authenticate();

        $request->session()->regenerate();

        // Redirect based on the guard that authenticated successfully
        if ($guard === 'admin') {
            return redirect()->intended(route('admin.dashboard'));
        } else {
            return redirect()->intended(route('dashboard'));
        }
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();                 

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        //return redirect('/');
        return redirect()->route('login');
    }
}
