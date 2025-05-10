<?php

namespace App\Http\Controllers;
use App\Models\outlet;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboardForm()
    {
        return view('dashboard');
    }

    public function adminDashboard()
    {
        $outlet = outlet::all(); 
        return view('/admindashboard', [
            'outlet' => $outlet
        ]); // Pastikan file ini ada di `resources/views/admin/dashboard.blade.php`
    }

    public function userDashboard()
    {
        // Logika untuk menampilkan dashboard user
        return view('dashboard');
    }
}
