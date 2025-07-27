<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Film;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::with('film')->get();
        return view('pemesanans.index', compact('pemesanans'));
    }

    public function create()
    {
        $films = Film::all();
        return view('pemesanans.create', compact('films'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'film_id' => 'required|exists:films,id',
            'jumlah_tiket' => 'required|integer|min:1',
            'jadwal_tayang' => 'required|date',
            'kursi' => 'nullable|string',
        ]);

        Pemesanan::create($request->all());

        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan berhasil dibuat.');
    }
}
