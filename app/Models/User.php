<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $table = 'user'; // Pastikan menggunakan tabel 'user'

    protected $fillable = ['nama', 'username', 'password', 'id_outlet', 'role'];

    protected $hidden = ['password']; // Sembunyikan password saat data dikembalikan sebagai JSON
}
