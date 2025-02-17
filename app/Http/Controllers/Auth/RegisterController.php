<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $redirectTo = '/entry';

    /**
     * Validasi input pendaftaran.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'tlp' => 'required|string|max:15|',
        ]);
    }

    protected function create(array $data)
    {
        return Pelanggan::create([
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tlp' => $data['tlp'],
        ]);
    }

    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle the registration request.
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $this->create($request->all());

        return redirect($this->redirectTo);
    }
}
