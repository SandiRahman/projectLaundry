<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket'; // Sesuaikan dengan tabel di database

    protected $fillable = [
        'id_outlet',
        'jenis',
        'nama_paket',
        'jumlah',
        'harga',
    ];

    // Relasi dengan Outlet
    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }
}
