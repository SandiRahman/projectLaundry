<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login';

    /**
     * Validasi input pendaftaran.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'], // Sesuai dengan kolom di tabel user
            'username' => ['required', 'string', 'max:255', 'unique:user'], // Sesuaikan dengan kolom username
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', Rule::in(['owner', 'admin', 'kasir'])], // Sesuaikan dengan pilihan role
        ]);
    }

    /**
     * Membuat user baru setelah pendaftaran berhasil.
     */
    protected function create(array $data)
    {
        return User::create([
            'nama' => $data['nama'], // Sesuaikan dengan kolom di tabel user
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
    }
}
