<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penghunis', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 128);
            $table->string('nik', 20);
            $table->string('nomor_telepon', 16);
            $table->string('email', 128);
            $table->text('alamat');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penghunis');
    }
};