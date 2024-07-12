<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Sekolah;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Pencarian di tabel siswa dan sekolah
        $siswas = Siswa::where('nama', 'LIKE', "%$query%")->get();
        $sekolahs = Sekolah::where('nama', 'LIKE', "%$query%")->get();

        return view('search.results', compact('siswas', 'sekolahs', 'query'));
    }
}
