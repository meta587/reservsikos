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

            $table->foreignId('penghuni_id')
                ->constrained('penghunis')
                ->cascadeOnDelete();

            $table->foreignId('kamar_id')
                ->constrained('kamars')
                ->cascadeOnDelete();

            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar')->nullable();

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