<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Outlet;
use App\Models\Pelanggan;
use App\Models\Paket;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with(['outlet', 'pelanggan', 'paket'])->get();
        return view('transaksi', compact('transaksi'));
    }

    public function create()
    {
        $outlet = Outlet::all();
        $pelanggan = Pelanggan::all();
        $paket = Paket::all();
        return view('transaksi.create', compact('outlet', 'pelanggan', 'paket'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_outlet' => 'required|exists:outlet,id',
            'id_pelanggan' => 'required|exists:pelanggan,id',
            'id_paket' => 'required|exists:paket,id',
            'tgl' => 'required|date',
            'batas_waktu' => 'required|date',
            'diskon' => 'nullable|numeric',
            'pajak' => 'nullable|numeric',
            'status' => 'required|in:baru,proses,diantar,selesai',
            'pembayaran' => 'required|in:sudah_dibayar,belum_dibayar',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $outlets = Outlet::all();
        $pelanggans = Pelanggan::all();
        $pakets = Paket::all();
        return view('transaksi.edit', compact('transaksi', 'outlets', 'pelanggans', 'pakets'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_outlet' => 'required|exists:outlets,id',
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'id_paket' => 'required|exists:pakets,id',
            'tgl' => 'required|date',
            'batas_waktu' => 'required|date',
            'diskon' => 'nullable|numeric',
            'pajak' => 'nullable|numeric',
            'status' => 'required|in:baru,proses,diantar,selesai',
            'pembayaran' => 'required|in:sudah_dibayar,belum_dibayar',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Transaksi::findOrFail($id)->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
