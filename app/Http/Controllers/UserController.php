<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Menggunakan model User

class UserController extends Controller
{
    public function index()
    {
        $users = user::all(); // Ambil semua data dari tabel users
        return view('admindashboard', compact('user')); // Kirim data ke view
    }

}
