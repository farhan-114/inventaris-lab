<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
=======
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
<<<<<<< HEAD
    public function create()
=======
    public function create(): View
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
<<<<<<< HEAD
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (! Auth::attempt($request->only('username', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'username' => __('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/dashboard');
=======
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
    }

    /**
     * Destroy an authenticated session.
     */
<<<<<<< HEAD
    public function destroy(Request $request)
=======
    public function destroy(Request $request): RedirectResponse
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
<<<<<<< HEAD
=======

>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
        $request->session()->regenerateToken();

        return redirect('/');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
