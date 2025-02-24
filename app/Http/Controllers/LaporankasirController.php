<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class LaporanKasirController extends Controller
{
    public function index()
    {
        $transaksi = session('transaksi');
        if (!$transaksi) {
            return view('laporankasir')->with('message', 'Belum ada data transaksi.');
        }

        return view('laporankasir', compact('transaksi'));
    }

}