<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'tanggal_waktu',
        'lokasi',
        'kategori_id',
        'gambar',
    ];

    protected $casts = [
        'tanggal_waktu' => 'datetime',
    ];

    public function tikets()
    {
        return $this->hasMany(Tiket::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the minimum ticket price for this event.
     */
    public function getMinPriceAttribute()
    {
        return $this->tikets()->min('harga');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}