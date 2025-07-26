<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
    'judul',
    'deskripsi',
    'poster',           // tambahkan ini kalau ada field poster
    'tanggal_tayang',   // ini yang BENAR dan sesuai dengan form + DB
    'sutradara',
    'durasi',
    ];
}
