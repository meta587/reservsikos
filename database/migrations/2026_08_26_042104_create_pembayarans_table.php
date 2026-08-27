<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reservasi_id')
                ->constrained('reservasis')
                ->cascadeOnDelete();

            $table->date('tanggal_pembayaran');
            $table->decimal('jumlah_pembayaran', 12, 2);
            $table->string('metode_pembayaran', 50);
            $table->string('status_pembayaran', 50);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};    