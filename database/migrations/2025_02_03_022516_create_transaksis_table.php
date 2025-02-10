<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_outlet');
            $table->string('kode_invoice');
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_paket');
            $table->dateTime('tgl');
            $table->dateTime('batas_waktu');
            $table->dateTime('tgl_bayar')->nullable();
            $table->double('diskon')->default(0);
            $table->integer('pajak')->default(0);
            $table->enum('status', ['baru', 'proses', 'diantar', 'selesai']);
            $table->enum('pembayaran', ['sudah_dibayar', 'belum_dibayar']);
            $table->BigInteger('id_user');
            
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('transaksis');
    }
};

