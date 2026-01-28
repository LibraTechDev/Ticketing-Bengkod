<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $fillable = [
        'nama_lokasi',
    ];

    public function events()
    {
        return $this->hasOne(Event::class);
    }
}