<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasis';

    protected $fillable = [
        'penghuni_id',
        'kamar_id',
        'tanggal_masuk',
        'tanggal_keluar',
        'status',
    ];

    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}