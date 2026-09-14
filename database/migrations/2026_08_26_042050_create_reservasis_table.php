<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();

            // DATA CALON PENGHUNI
            $table->string('nama_penghuni', 128);
            $table->string('nik', 20);
            $table->string('nomor_telepon', 16);
            $table->string('email', 128);
            $table->text('alamat');

            // DATA KAMAR
            $table->foreignId('kamar_id')
                ->constrained('kamars')
                ->cascadeOnDelete();

            // TANGGAL
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar')->nullable();

            // STATUS RESERVASI
            $table->enum('status', [
                'Pending',
                'Aktif',
                'Selesai',
                'Dibatalkan'
            ])->default('Pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};