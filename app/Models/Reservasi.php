<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = [
        'penghuni_id',
        'kamar_id',
        'tanggal_masuk',
        'tanggal_keluar',
        'lama_tinggal',
    ];

    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}