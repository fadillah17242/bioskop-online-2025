<?php

// database/migrations/2025_07_26_105645_create_films_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id(); // <-- HARUS ADA
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('poster')->nullable();
            $table->date('tanggal_tayang')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
