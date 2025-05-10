<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Outlet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterKhususController extends Controller
{
    // Menampilkan form registrasi khusus
    public function showRegistrationKhususForm()
    {
        $outlet = Outlet::all(); // Ambil semua data outlet
        return view('auth.registerkhusus', compact('outlet')); // Kirim data outlet ke view
    }

    // Menangani proses registrasi khusus
    public function registerkhusus(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id_outlet' => 'required|exists:outlet,id',
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:user'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:owner,admin,kasir'],
        ]);

        // Jika validasi gagal, kembalikan ke halaman registrasi dengan pesan error
        if ($validator->fails()) {
            return redirect()->route('registerkhusus')
                ->withErrors($validator)
                ->withInput();
        }

        // Buat pengguna baru
        $user = User::create([
            'id_outlet' => $request->id_outlet,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Hash password dengan Bcrypt
            'role' => $request->role,
        ]);

        // Login pengguna setelah registrasi
        Auth::login($user);

        // Redirect ke halaman yang diinginkan setelah registrasi berhasil
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}