<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->timestamps(); // Menambahkan created_at & updated_at
        });
    }

    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
};
