<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi input [cite: 197]
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Proses Login [cite: 202]
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/posts'); // Redirect ke halaman posts setelah login
        }

        // Jika login gagal [cite: 207]
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // [cite: 212]
        $request->session()->invalidate(); // [cite: 213]
        $request->session()->regenerateToken(); // [cite: 214]
        return redirect('/'); // [cite: 215]
    }
}