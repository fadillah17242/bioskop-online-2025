<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    public function run()
    {
        DB::table('films')->insert([
            ['judul' => 'Superman', 'deskripsi' => 'Film superhero Superman', 'poster' => '', 'tanggal_tayang' => '2025-08-01'],
            ['judul' => 'Fantastic Four', 'deskripsi' => 'Film superhero Fantastic Four', 'poster' => '', 'tanggal_tayang' => '2025-08-05'],
            ['judul' => 'Minecraft Movie', 'deskripsi' => 'Film berdasarkan game Minecraft', 'poster' => '', 'tanggal_tayang' => '2025-08-10'],
        ]);
    }
}
