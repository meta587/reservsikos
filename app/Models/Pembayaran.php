<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'reservasi_id',
        'tanggal_pembayaran',
        'jumlah_pembayaran',
        'metode_pembayaran',
        'status_pembayaran',
    ];

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }
}