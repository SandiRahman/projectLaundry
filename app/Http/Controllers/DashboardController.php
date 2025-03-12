<?php

namespace App\Http\Controllers;

use App\Models\Outlet; // Pastikan model Outlet diimpor
use App\Models\Paket;  // Impor model Paket
use App\Models\User;   // Impor model User
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Method untuk menampilkan dashboard umum
    public function showDashboardForm()
    {
        return view('dashboard');
    }

    // Method untuk menampilkan admin dashboard
    public function adminDashboard()
    {
        // Ambil semua data dari database
        $outlet = Outlet::all(); // Ambil semua data outlet
        $paket = Paket::all();   // Ambil semua data paket
        $user = User::all();     // Ambil semua data user

        // Kirim data ke view admindashboard
        return view('admindashboard', [
            'outlet' => $outlet,
            'paket' => $paket,
            'user' => $user,
        ]);
    }

    // Method untuk menampilkan user dashboard
    public function userDashboard()
    {
        // Logika untuk menampilkan dashboard user
        return view('dashboard');
    }
}