<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Paket; // Assuming you have a Paket model
use App\Http\Controllers\Controller;
use App\Models\Outlet;

class PaketController extends Controller
{
    public function showForm()
    {
        $outlet = Outlet::all(); // Ambil semua outlet
        return view('/paket', compact('outlet'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_outlet' => 'required|exists:outlet,id', // Pastikan id_outlet ada di tabel outlets
            'jenis' => 'required|string',
            'nama_paket' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        Paket::create([
            'id_outlet' => $request->id_outlet,
            'jenis' => $request->jenis,
            'nama_paket' => $request->nama_paket,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);

        return redirect()->route('paket')->with('success', 'Paket berhasil ditambahkan');
    }
}