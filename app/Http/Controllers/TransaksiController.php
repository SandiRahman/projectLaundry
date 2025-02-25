<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Outlet;
use App\Models\Pelanggan;
use App\Models\Paket;
use App\Models\User;

class TransaksiController extends Controller
{
    public function index()
    {
        $outlet = Outlet::all();
        $pelanggan = Pelanggan::all();
        $paket = Paket::all();
        $user = User::all();

        return view('transaksi', compact('outlet', 'pelanggan', 'paket', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_outlet' => 'required|exists:outlet,id',
            'id_pelanggan' => 'required|exists:pelanggan,id',
            'id_paket' => 'required|exists:paket,id',
            'tgl' => 'required|date',
            'batas_waktu' => 'required|date',
            'harga' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0',
            'pajak' => 'nullable|numeric|min:0',
            'status' => 'required|in:baru,proses,diantar,selesai',
            'pembayaran' => 'required|in:sudah_dibayar,belum_dibayar',
            'id_user' => 'required|exists:user,id',
        ]);

        // Ambil harga dari tabel paket
        $paket = Paket::findOrFail($request->id_paket);

        $kode_invoice = 'INV-' . strtoupper(uniqid());

        Transaksi::create([
            'id_outlet' => $request->id_outlet,
            'id_pelanggan' => $request->id_pelanggan,
            'id_paket' => $request->id_paket,
            'tgl' => $request->tgl,
            'batas_waktu' => $request->batas_waktu,
            'harga' => $request->harga, // Harga diambil dari tabel paket
            'diskon' => $request->diskon,
            'pajak' => $request->pajak,
            'status' => $request->status,
            'pembayaran' => $request->pembayaran,
            'id_user' => $request->id_user,
            'kode_invoice' => $kode_invoice,
        ]);

        session(['transaksi_data' => $request->all()]);

        return redirect()->route('laporankasir.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $outlet = Outlet::all();
        $pelanggan = Pelanggan::all();
        $paket = Paket::all();
        $user = User::all();

        session([ 'transaksi_data' => $transaksi->toArray() ]);

        return view('transaksi.edit', compact('transaksi', 'outlet', 'pelanggan', 'paket', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_outlet' => 'required|exists:outlet,id',
            'id_pelanggan' => 'required|exists:pelanggan,id',
            'id_paket' => 'required|exists:paket,id',
            'tgl' => 'required|date',
            'batas_waktu' => 'required|date',
            'harga' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0',
            'pajak' => 'nullable|numeric|min:0',
            'status' => 'required|in:baru,proses,diantar,selesai',
            'pembayaran' => 'required|in:sudah_dibayar,belum_dibayar',
            'id_user' => 'required|exists:user,id',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());

        session([ 'transaksi_data' => $request->all() ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Transaksi::findOrFail($id)->delete();
        session()->forget('transaksi_data');

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}