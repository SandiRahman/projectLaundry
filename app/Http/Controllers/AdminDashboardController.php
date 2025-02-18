<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan; // Import model Pelanggan

class AdminDashboardController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all(); // Ambil semua data pelanggan
        return view('admindashboard', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'tlp' => 'required|string|max:15',
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tlp' => $request->tlp,
        ]);

        return redirect()->route('admindashboard')->with('success', 'Pelanggan berhasil ditambahkan!');
    }
}

