<?php

namespace App\Http\Controllers; // Pastikan namespace ini benar

use Illuminate\Http\Request;
use App\Models\Paket; // Pastikan model Paket diimpor

class PaketController extends Controller
{
    // Method untuk menampilkan semua paket
    public function index()
    {
        $paket = Paket::all();
        return view('paket.index', compact('paket'));
    }

    // Method untuk menampilkan form tambah paket
    public function create()
    {
        return view('paket.create');
    }

    // Method untuk menyimpan paket baru
    public function store(Request $request)
    {
        $request->validate([
            'id_outlet' => 'required|exists:outlets,id',
            'jenis' => 'required|string',
            'nama_paket' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        Paket::create($request->all());

        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    // Method untuk menampilkan form edit paket
    public function edit(Paket $paket)
    {
        return view('paket.edit', compact('paket'));
    }

    // Method untuk mengupdate paket
    public function update(Request $request, Paket $paket)
    {
        $request->validate([
            'id_outlet' => 'required|exists:outlets,id',
            'jenis' => 'required|string',
            'nama_paket' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $paket->update($request->all());

        return redirect()->route('paket.index')->with('success', 'Paket berhasil diperbarui!');
    }

    // Method untuk menghapus paket
    public function destroy(Paket $paket)
    {
        $paket->delete();
        return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus!');
    }
}