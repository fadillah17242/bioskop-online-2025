<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PemesananController; // ← Penting

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

// ✅ Route untuk pemesanan
Route::resource('pemesanans', PemesananController::class);

// Tambahan route untuk struktur data
Route::get('/array-film', [FilmController::class, 'arrayFilm']);
Route::get('/stack', [FilmController::class, 'stackContoh']);
Route::get('/queue', [FilmController::class, 'queueContoh']);
Route::get('/graph', [FilmController::class, 'graphContoh']);
Route::get('/search', [FilmController::class, 'searchFilm']);
Route::get('/tree', [FilmController::class, 'treeContoh']);
