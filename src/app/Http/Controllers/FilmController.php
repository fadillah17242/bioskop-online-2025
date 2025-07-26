<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    // 🔢 1. Implementasi Array
    public function arrayFilm()
    {
        $filmList = [
            ['judul' => 'Superman', 'genre' => 'Action'],
            ['judul' => 'Barbie', 'genre' => 'Drama'],
            ['judul' => 'Fast & Furious', 'genre' => 'Action'],
        ];

        return response()->json($filmList);
    }

    // 📚 2. Implementasi Stack
    public function stackContoh()
    {
        $stack = [];
        array_push($stack, 'User A');
        array_push($stack, 'User B');
        array_push($stack, 'User C');

        $pop = array_pop($stack); // ambil user terakhir

        return response()->json([
            'stack_akhir' => $stack,
            'yang_keluar' => $pop,
        ]);
    }

    // 🚶‍♂️ 3. Implementasi Queue
    public function queueContoh()
    {
        $queue = [];
        array_push($queue, 'User A');
        array_push($queue, 'User B');
        array_push($queue, 'User C');

        $dequeue = array_shift($queue); // ambil user pertama

        return response()->json([
            'queue_akhir' => $queue,
            'yang_keluar' => $dequeue,
        ]);
    }

    // 🌐 4. Implementasi Graph (relasi antar bioskop)
    public function graphContoh()
    {
        $graph = [
            'Bioskop A' => ['Bioskop B', 'Bioskop C'],
            'Bioskop B' => ['Bioskop A', 'Bioskop D'],
            'Bioskop C' => ['Bioskop A'],
            'Bioskop D' => ['Bioskop B'],
        ];

        return response()->json($graph);
    }

    // 🔍 5. Implementasi Searching
    public function searchFilm(Request $request)
    {
        $keyword = $request->input('keyword');

        $filmList = [
            'Superman',
            'Barbie',
            'Spiderman',
            'Batman',
        ];

        $result = array_filter($filmList, function ($film) use ($keyword) {
            return stripos($film, $keyword) !== false;
        });

        return response()->json(array_values($result));
    }

    // 🌳 6. Implementasi Tree (kategori film)
    public function treeContoh()
    {
        $tree = [
            'Film' => [
                'Action' => [
                    'Superman',
                    'Spiderman',
                ],
                'Drama' => [
                    'Barbie',
                    'Titanic',
                ],
            ],
        ];

        return response()->json($tree);
    }
}
