<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Outlet;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    // Method untuk menampilkan form tambah paket
    public function create()
    {
        $outlets = Outlet::all(); // Ambil semua data outlet
        return view('paket.create', compact('outlets'));
    }

    // Method untuk menyimpan paket baru
    public function store(Request $request)
    {
        $request->validate([
            'id_outlet' => 'required|exists:outlets,id',
            'jenis' => 'required|string',
            'nama_paket' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
        ]);

        Paket::create($request->all());

        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan!');
    }
}