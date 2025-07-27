<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PemesananController;
use App\DataStructures\Stack; // ✅ Import Stack class

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});
/*
/ END
*/

// Default route
Route::get('/', function () {
    return view('welcome');
});

// ✅ Resource untuk pemesanan
Route::resource('pemesanans', PemesananController::class);

// ✅ Route struktur data via controller (jika sudah dibuat)
Route::get('/array-film', [FilmController::class, 'arrayFilm']);
Route::get('/stack', [FilmController::class, 'stackContoh']);
Route::get('/queue', [FilmController::class, 'queueContoh']);
Route::get('/graph', [FilmController::class, 'graphContoh']);
Route::get('/search', [FilmController::class, 'searchFilm']);
Route::get('/tree', [FilmController::class, 'treeContoh']);

// ✅ Tambahan langsung untuk test stack (mandiri, tanpa controller)
Route::get('/test-stack', function () {
    $stack = new Stack();
    $stack->push('Pemesanan 1');
    $stack->push('Pemesanan 2');
    $stack->push('Pemesanan 3');
    $stack->pop(); // Menghapus Pemesanan 3
    return $stack->all(); // Harusnya sisa 2
});
