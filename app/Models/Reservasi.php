<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasis';

    protected $fillable = [
        'nama_penghuni',
        'nik',
        'nomor_telepon',
        'email',
        'alamat',
        'kamar_id',
        'tanggal_masuk',
        'tanggal_keluar',
        'status',
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}