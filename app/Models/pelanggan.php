<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan'; // Sesuaikan dengan nama tabel di database
    public $timestamps = false; // Jika tabel tidak memiliki kolom `created_at` dan `updated_at`
    
    protected $fillable = [
        'nama',
        'alamat',
        'jenis_kelamin',
        'tlp',
    ];
}
