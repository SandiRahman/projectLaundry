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
    // Show the registration form
    public function showRegisterForm()
    {
        $outlet = Outlet::all();
        return view('auth.registerkhusus', compact('outlet'));
    }

    // Handle the registration logic
    public function Register(Request $request)
    {
        // Validate the registration data
        $validator = Validator::make($request->all(), [
            'id_outlet' => 'required|exists:outlet,id',
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:user'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:owner,admin,kasir'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        // Create the user
        $user = User::create([
            'id_outlet' => $request->id_outlet,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Log in the user
        Auth::login($user);

        // Redirect to the desired route after successful registration
        return redirect()->route('login'); // Update this route as needed
    }
}
