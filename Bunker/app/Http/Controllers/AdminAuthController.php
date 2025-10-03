<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    // Toon admin login pagina
    public function showLoginForm()
    {
        return view('auth.adminlogin'); // resources/views/adminlogin.blade.php
    }

    // Verwerk admin login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Login met default guard (web)
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
                
            // Controleer of de gebruiker admin is
            if ($user->is_admin) {
                $request->session()->regenerate();
                // Redirect naar admindashboard
                return redirect()->intended(route('admin.admindashboard'));
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Je hebt geen admin rechten.',
                ]);
            }
        }

        // Foutmelding bij verkeerde login
        return back()->withErrors([
            'email' => 'Deze gegevens zijn onjuist.',
        ]);
    }

    // Admin logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.loginform'); // terug naar admin login
    }
}
