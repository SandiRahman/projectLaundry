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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('username', 30)->unique();
<<<<<<< HEAD
            $table->string('password'); // Gunakan string, bukan text
            $table->foreignId('id_outlet')->constrained('outlet')->onDelete('cascade');
            $table->enum('role', ['admin', 'kasir', 'owner']); // Perbaikan dari 'fanum' ke 'enum'
            $table->timestamps(); // Tambahkan timestamps untuk created_at & updated_at
=======
            $table->text('password');
            $table->enum('role', ['admin', 'kasir', 'owner']);
>>>>>>> 8c42fa646bf0975d96341bac4bb4df6934bc6e80
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
