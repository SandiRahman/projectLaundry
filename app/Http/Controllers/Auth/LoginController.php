<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->role == 'admin') {
                return redirect()->intended('/admindashboard'); // Redirect ke dashboard admin
            }
            
            elseif (auth()->user()->role == 'kasir') {
                return redirect()->intended('/register');
            }

            else{
        
                    // Jika bukan admin, redirect ke halaman lain (misalnya home)
                    return redirect()->intended('/dashboard');
            }
  
        }

        return back()->withErrors([
            'username' => 'Username atau password salah',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
