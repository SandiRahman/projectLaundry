<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $table = 'outlet'; // Sesuaikan dengan nama tabel

    protected $fillable = ['nama', 'alamat', 'tlp'];

    public function paket()
    {
        return $this->hasMany(Paket::class, 'id_outlet');
    }
}
