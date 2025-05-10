<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;

class DashboardOwnerController extends Controller
{
    public function index()
    {
        return view('owner.dashboardowner');
    }
}
