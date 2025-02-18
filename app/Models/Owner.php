<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Owner extends Authenticatable
{
    protected $fillable = ['username', 'password'];
}
