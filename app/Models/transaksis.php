<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksis extends Model
{
    use HasFactory;

    protected $table = 'transaksis'; // Nama tabel di database

    protected $fillable = [
        'id_outlet', 'kode_invoice', 'id_pelanggan', 'id_paket',
        'tgl', 'batas_waktu', 'tgl_bayar', 'diskon', 'pajak',
        'status', 'pembayaran', 'id_user'
    ];

    // Relasi ke Outlet
    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }

    // Relasi ke Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
