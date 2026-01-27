<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $fillable = [
        'nama_lokasi',
        'alamat',
        'kota',
        'provinsi',
        'negara',
        'kode_pos',
        'koordinat',
        'deskripsi',
        'foto',
        'status',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
