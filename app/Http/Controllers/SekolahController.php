<?php

// app/Http/Controllers/SekolahController.php
namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolahs = Sekolah::paginate(5);
        return view('sekolahs.index', compact('sekolahs'));
    }

    public function create()
    {
        return view('sekolahs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        Sekolah::create($request->all());

        return redirect()->route('sekolahs.index')->with('success', 'Sekolah berhasil ditambahkan.');
    }

    public function edit(Sekolah $sekolah)
    {
        return view('sekolahs.edit', compact('sekolah'));
    }

    public function update(Request $request, Sekolah $sekolah)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $sekolah->update($request->all());

        return redirect()->route('sekolahs.index')->with('success', 'Sekolah berhasil diupdate.');
    }

    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();
        return redirect()->route('sekolahs.index')->with('success', 'Sekolah berhasil dihapus.');
    }
    // app/Http/Controllers/SekolahController.php

public function show($id)
{
    $sekolah = Sekolah::find($id);
    return view('sekolahs.show', compact('sekolah'));
}

}
