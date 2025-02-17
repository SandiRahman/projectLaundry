<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboardForm()
    {
        return view('dashboard');
    }

    public function adminDashboard()
    {
        return view('/admindashboard'); // Pastikan file ini ada di `resources/views/admin/dashboard.blade.php`
    }
}
