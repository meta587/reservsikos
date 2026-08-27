<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
     protected $table = 'penghunis';

    protected $fillable = [
        'nama',
        'nik',
        'nomor_telepon',
        'email',
        'alamat',
    ];

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}