<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksisController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with(['outlet', 'pelanggan', 'user'])->get();
        return view('transaksiskasir', compact('transaksi'));
    }

}
