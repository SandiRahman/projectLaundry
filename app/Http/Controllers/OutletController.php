<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index()
    {
        // Mengambil semua outlet
        $outlet = outlet::all();  // Correct capitalization

        return $outlet; 

        // Mengirim data outlet ke view
        return view('adminDashboard', [
            'outlet' => $outlet
        ]);
        
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
        Outlet::create($request->all());  // Correct capitalization

        // Kembali ke halaman daftar outlet
        return redirect()->route('admindashboard')->with('success', 'Outlet berhasil ditambahkan!');
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
        $outlet = Outlet::findOrFail($id);  // Correct capitalization
        $outlet->update($request->all());        

        // Kembali ke halaman daftar outlet
        return redirect()->route('admindashboard')->with('success', 'Outlet berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Menghapus outlet
        Outlet::destroy($id);  // Correct capitalization

        // Kembali ke halaman daftar outlet
        return redirect()->route('admindashboard')->with('success', 'Outlet berhasil dihapus!');
    }
}
