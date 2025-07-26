<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'film_id',
        'nama',
        'jumlah_tiket',
        'kursi',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
