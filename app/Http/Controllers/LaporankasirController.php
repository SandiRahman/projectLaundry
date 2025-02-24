<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use PDF;

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

    public function downloadPDF()
    {
        $transaksi = session('transaksi');

        if (!$transaksi) {
            return redirect()->route('laporankasir.index')->with('error', 'Tidak ada data transaksi');
        }

        $pdf = PDF::loadView('laporankasir.pdf', compact('transaksi'));
        return $pdf->download('laporan_kasir.pdf');
    }

}