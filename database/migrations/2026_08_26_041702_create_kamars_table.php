<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kamar', 20);
            $table->string('tipe_kamar', 50);
            $table->decimal('harga', 12, 2);
            $table->text('fasilitas');
            $table->string('status_kamar', 30);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};