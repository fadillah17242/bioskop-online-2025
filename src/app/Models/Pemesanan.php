<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'film_id',
        'nama_pemesan',
        'jumlah_tiket',
        'jadwal_tayang',
        'kursi',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
