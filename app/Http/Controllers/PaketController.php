<?php

namespace App\Http\Controllers; // Pastikan namespace ini benar

use Illuminate\Http\Request;
use App\Models\Paket; // Pastikan model Paket diimpor
use App\Models\Outlet; // Pastikan model Outlet diimpor

class PaketController extends Controller
{
    // Method untuk menampilkan daftar paket
    public function index()
    {
        $pakets = Paket::all();
        return view('paket.index', compact('pakets'));
    }

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
            'id_outlet' => 'required|exists:outlet,id', // Perbaiki nama field
            'jenis' => 'required|string',
            'nama_paket' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
        ]);

        Paket::create($request->all());

        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    // Method untuk mengupdate paket
    public function update(Request $request, Paket $paket)
    {
        $request->validate([
            'id_outlet' => 'required|exists:outlet,id', // Perbaiki nama field
            'jenis' => 'required|string',
            'nama_paket' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
        ]);

        $paket->update($request->all());

        return redirect()->route('paket.index')->with('success', 'Paket berhasil diperbarui!');
    }

    // Method untuk menampilkan form edit paket
    public function edit(Paket $paket)
    {
        $outlets = Outlet::all(); // Ambil semua data outlet
        return view('paket.edit', compact('paket', 'outlets'));
    }

    // Method untuk menghapus paket
    public function destroy(Paket $paket)
    {
        $paket->delete();
        return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus!');
    }
}