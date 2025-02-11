<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Cek apakah username ada di database
        $user = User::where('username', $credentials['username'])->first();

        if (!$user) {
            return back()->withErrors([
                'username' => 'Username tidak ditemukan.',
            ])->withInput();
        }

        // Cek apakah password cocok menggunakan Hash::check()
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'Password salah.',
            ])->withInput($request->only('username'));
        }

        // Jika valid, lakukan login dengan Auth::attempt()
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Hindari session fixation attack
            return redirect()->intended('/dashboard'); // Redirect ke halaman yang diinginkan
        }

        return back()->withErrors([
            'login' => 'Terjadi kesalahan, silakan coba lagi.',
        ]);
    }
}
