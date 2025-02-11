<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'user'; // Pastikan Laravel tahu bahwa tabelnya bernama 'user'

    protected $fillable = [
        'nama', // Sesuaikan dengan kolom di tabel
        'username',
        'password',
        'id_outlet', // Tambahkan id_outlet karena ada di tabel
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = false; // Karena di struktur tabel tidak ada created_at dan updated_at
}