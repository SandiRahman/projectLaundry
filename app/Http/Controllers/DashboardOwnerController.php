<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardOwnerController extends Controller
{
    public function index()
    {
        return view('dashboardowner');
    }
}
