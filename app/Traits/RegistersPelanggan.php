<?php

namespace App\Traits;

trait RegistersPelanggan
{
    public function registerPelanggan($data)
    {
        // Logika registrasi pelanggan, misalnya menyimpan ke database
        return \App\Models\Member::create($data);
    }
}