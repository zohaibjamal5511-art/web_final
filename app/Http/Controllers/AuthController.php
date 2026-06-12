<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the login form view.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Show the registration form view.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        UserLog::create([
            'user_id' => $user->id,
            'action' => 'Registered a new account and opened workspace.',
            'seconds_spent' => 60
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Handle an incoming authentication/login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            UserLog::create([
                'user_id' => Auth::id(),
                'action' => 'Logged into the platform.',
                'seconds_spent' => 30
            ]);

            return redirect()->intended('/work');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    /**
     * Log the user out of the application session.
     */
    public function logout(Request $request)
    {
        if (Auth::check()) {
            UserLog::create([
                'user_id' => Auth::id(),
                'action' => 'Logged out of the session.',
                'seconds_spent' => 15
            ]);

            Auth::logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing');
    }
}