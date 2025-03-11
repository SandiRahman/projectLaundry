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
        $transaksi = session('transaksi_data');

        if (!$transaksi) {
            return redirect()->back()->with('error', 'Tidak ada data transaksi.');
        }

        $harga = $transaksi['harga'] ?? 0;
        $diskon = $transaksi['diskon'] ?? 0;
        $pajak = $transaksi['pajak'] ?? 0;
        $totalHarga = ($harga - ($harga * $diskon / 100)) + $pajak;

        $data = [
            'transaksi' => $transaksi,
            'totalHarga' => number_format($totalHarga, 0, ',', '.'),
        ];

        $pdf = PDF::loadView('laporan.struk', $data);

        return $pdf->download('struk_transaksi.pdf');
    }
}