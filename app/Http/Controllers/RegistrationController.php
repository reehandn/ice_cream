<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    public function showRegistrationForm()
    {
        return view('register_page');
    }

    public function register(Request $request)
    {
      // Validasi input dari form
      $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:3|confirmed', // pastikan password dan password_confirmation ada di form
    ]);
    
    // Simpan data ke database
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password, // Jangan hash di sini, biarkan model yang menangani
        'is_admin' => 0, // Default bukan admin
    ]);

    // Redirect ke halaman lain atau tampilkan pesan sukses
    return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }
}
