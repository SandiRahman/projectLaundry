<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index()
    {
        // Mengambil semua outlet
        $outlet = outlet::all();

        // Mengirim data outlet ke view
        return view('adminDashboard', compact('outlet'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
        ]);

        // Menyimpan outlet baru
        outlet::create($request->all());

        // Kembali ke halaman daftar outlet
        return redirect()->route('outlet.index')->with('success', 'Outlet berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
        ]);

        // Mencari outlet dan update
        $outlet = outlet::findOrFail($id);
        $outlet->update($request->all());

        // Kembali ke halaman daftar outlet
        return redirect()->route('outlet.index')->with('success', 'Outlet berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Menghapus outlet
        outlet::destroy($id);

        // Kembali ke halaman daftar outlet
        return redirect()->route('outlet.index')->with('success', 'Outlet berhasil dihapus!');
    }
}
