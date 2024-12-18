<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect berdasarkan role pengguna
            if (Auth::check() && auth()->user()->is_admin == 1) {
                // Jika admin, arahkan ke dashboard admin
                return redirect()->intended('/admin/completed-orders');
            } else {
                // Jika pembeli, arahkan ke dashboard pembeli
                return redirect()->intended('/user');
            }
        }
        // Jika gagal login
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }
    
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Invalidasi sesi
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman utama
        return redirect('/');
    }

}
