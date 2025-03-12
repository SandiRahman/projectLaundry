<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Pastikan model User di-import

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Coba autentikasi
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Simpan id_user ke session
            $request->session()->put('id_user', Auth::user()->id);

            // Redirect berdasarkan role
            if (auth()->user()->role == 'admin') {
                return redirect()->intended('/admindashboard'); // Redirect ke dashboard admin
            } elseif (auth()->user()->role == 'kasir') {
                return redirect()->intended('/paket');
            } else {
                // Jika bukan admin, redirect ke halaman lain (misalnya home)
                return redirect()->intended('/dashboard');
            }
        }

        // Jika autentikasi gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}