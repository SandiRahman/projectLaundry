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

    public function edit($id)
{
    $outlet = Outlet::findOrFail($id);
    return view('outletedit', compact('outlet'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string',
        'tlp' => 'required|string|max:15'
    ]);

    $outlet = Outlet::findOrFail($id);
    $outlet->update([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'tlp' => $request->tlp
    ]);

    return redirect()->route('admindashboard')->with('success', 'Outlet berhasil diperbarui.');
}


    public function destroy($id)
    {
        // Menghapus outlet
        Outlet::destroy($id);  // Correct capitalization

        // Kembali ke halaman daftar outlet
        return redirect()->route('admindashboard')->with('success', 'Outlet berhasil dihapus!');
    }
}
