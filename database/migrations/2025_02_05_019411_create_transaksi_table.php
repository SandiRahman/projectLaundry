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
    Schema::create('transaksi', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_outlet')
              ->constrained('outlet')
              ->onDelete('cascade')
              ->after('id'); // Pastikan dibuat setelah id
        $table->string('kode_invoice', 100)->unique();
        $table->foreignId('id_pelanggan')->constrained('pelanggan')->onDelete('cascade');
        $table->dateTime('tgl');
        $table->dateTime('batas_waktu');
        $table->dateTime('tgl_bayar')->nullable();
        $table->integer('biaya_tambahan')->default(0);
        $table->double('diskon')->default(0);
        $table->integer('pajak')->default(0);
        $table->enum('status', ['baru', 'proses', 'selesai', 'diambil']);
        $table->enum('dibayar', ['dibayar', 'belum_dibayar']);
        $table->foreignId('id_user')->constrained('user')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
