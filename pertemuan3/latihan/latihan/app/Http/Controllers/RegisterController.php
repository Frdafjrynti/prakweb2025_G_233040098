<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register'); // [cite: 234]
    }

    public function register(Request $request)
    {
        // Validasi input [cite: 239]
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' butuh input name="password_confirmation" di view
        ]);

        // Create User baru [cite: 246]
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirect ke login dengan pesan sukses [cite: 251]
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}