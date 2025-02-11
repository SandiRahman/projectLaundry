<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $table = 'user'; // Pastikan menggunakan tabel 'user'

    protected $fillable = ['nama', 'username', 'password', 'id_outlet', 'role'];

    protected $hidden = ['password']; // Sembunyikan password saat data dikembalikan sebagai JSON
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'user';
    protected $fillable = [
        'nama',
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];
>>>>>>> 8c42fa646bf0975d96341bac4bb4df6934bc6e80
}
