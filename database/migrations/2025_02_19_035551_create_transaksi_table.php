<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->foreignId('id_outlet')->constrained('outlet')->onDelete('cascade');
            $table->string('kode_invoice', 255);
            $table->foreignId('id_pelanggan')->constrained('pelanggan')->onDelete('cascade');
            $table->foreignId('id_paket')->nullable()->constrained('paket')->onDelete('set null');
            $table->dateTime('tgl');
            $table->dateTime('batas_waktu');
            $table->dateTime('tgl_bayar')->nullable();
            $table->double('diskon')->default(0);
            $table->integer('pajak')->default(0);
            $table->enum('status', ['baru', 'proses', 'diantar', 'selesai'])->default('baru');
            $table->enum('pembayaran', ['sudah_dibayar', 'belum_dibayar'])->default('belum_dibayar');
            $table->foreignId('id_user')->constrained('user')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
