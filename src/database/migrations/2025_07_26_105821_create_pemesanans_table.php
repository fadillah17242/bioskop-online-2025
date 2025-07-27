<?php

// database/migrations/2025_07_26_105700_create_pemesanans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('film_id')->constrained()->onDelete('cascade');
            $table->string('nama_pemesan');
            $table->integer('jumlah_tiket');
            $table->dateTime('jadwal_tayang');
            $table->string('kursi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
