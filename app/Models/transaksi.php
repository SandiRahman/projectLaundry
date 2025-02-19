<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi'; // Sesuaikan dengan nama tabel
    protected $fillable = [
        'id_outlet',
        'id_pelanggan',
        'id_paket',
        'tgl',
        'batas_waktu',
        'tgl_bayar',
        'diskon',
        'pajak',
        'status',
        'pembayaran',
        'id_user'
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }
}
