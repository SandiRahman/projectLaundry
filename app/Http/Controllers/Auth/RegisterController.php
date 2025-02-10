<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'NamaLengkap' => 'required|string|max:255',
            'Username' => 'required|string|max:255|unique:users',
            'Email' => 'required|string|email|max:255|unique:users',
            'Password' => 'required|string|min:6|confirmed',
            'Alamat' => 'required|string',
            'Role' => 'required|in:user,admin',
        ]);

        // Simpan ke database
        $user = User::create([
            'NamaLengkap' => $request->NamaLengkap,
            'Username' => $request->Username,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
            'Alamat' => $request->Alamat,
            'Role' => $request->Role,
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registrasi berhasil!');
    }
}
