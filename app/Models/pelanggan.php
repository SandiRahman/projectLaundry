<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory; // Wajib ditambahkan

    protected $table = 'pelanggans'; // Pastikan sesuai dengan nama tabel di database

    protected $fillable = [
        'nama',
        'alamat',
        'tlp',
    ];
}
