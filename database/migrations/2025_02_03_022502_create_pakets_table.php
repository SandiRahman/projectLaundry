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
        Schema::create('pakets', function (Blueprint $table) {
            $table->id('id_paket');
            $table->integer('id_outlet');
            $table->enum('jenis', ['kiloan', 'selimut', 'bed_cover', 'karpet']);
            $table->enum('pengambilan', ['antar', 'jemput']);
            $table->string('nama_paket', 100);
            $table->integer('harga_paket');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};
