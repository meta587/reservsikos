<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_kamar',
        'tipe_kamar',
        'harga',
        'fasilitas',
        'status',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
    ];

    public function penghunis()
    {
        return $this->hasMany(Penghuni::class);
    }

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
};