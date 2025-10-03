<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
public function showLoginForm()
{
   return view('auth.adminlogin');

}


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Gewone login met default guard
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check of de user admin is
            if ($user->is_admin) {
                $request->session()->regenerate();
                return redirect()->intended('/adminpanel');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Je hebt geen admin rechten.',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'Deze gegevens zijn onjuist.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/adminlogin');
    }
}


