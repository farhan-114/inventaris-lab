<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
<<<<<<< HEAD
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
=======
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
<<<<<<< HEAD
    public function create(): View
=======
    public function create()
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
<<<<<<< HEAD
    public function store(Request $request): RedirectResponse
=======
    public function store(Request $request)
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
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
    }

    /**
     * Destroy an authenticated session.
     */
<<<<<<< HEAD
    public function destroy(Request $request): RedirectResponse
=======
    public function destroy(Request $request)
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
