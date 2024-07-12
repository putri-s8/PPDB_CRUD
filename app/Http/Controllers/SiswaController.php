<?php

// app/Http/Controllers/SiswaController.php
namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::paginate(5);
        return view('siswas.index', compact('siswas'));
    }

    public function create()
    {
        $sekolahs = Sekolah::all();
        return view('siswas.create', compact('sekolahs'));
    }

   // app/Http/Controllers/SiswaController.php

public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'umur' => 'required|integer',
        'sekolah_id' => 'required|integer',
        'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $input = $request->all();

    if ($foto = $request->file('foto')) {
        $destinationPath = 'uploads/fotos/';
        $profileImage = date('YmdHis') . "." . $foto->getClientOriginalExtension();
        $foto->move($destinationPath, $profileImage);
        $input['foto'] = "$profileImage";
    }

    Siswa::create($input);

    return redirect()->route('siswas.index')
                    ->with('success', 'Siswa created successfully.');
}


    public function edit(Siswa $siswa)
    {
        $sekolahs = Sekolah::all();
        return view('siswas.edit', compact('siswa', 'sekolahs'));
    }

    // app/Http/Controllers/SiswaController.php

public function update(Request $request, Siswa $siswa)
{
    $request->validate([
        'nama' => 'required',
        'umur' => 'required|integer',
        'sekolah_id' => 'required|integer',
        'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $input = $request->all();

    if ($foto = $request->file('foto')) {
        $destinationPath = 'uploads/fotos/';
        $profileImage = date('YmdHis') . "." . $foto->getClientOriginalExtension();
        $foto->move($destinationPath, $profileImage);
        $input['foto'] = "$profileImage";
    } else {
        unset($input['foto']);
    }

    $siswa->update($input);

    return redirect()->route('siswas.index')
                    ->with('success', 'Siswa updated successfully');
}

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswas.index')->with('success', 'Siswa berhasil dihapus.');
    }
    // app/Http/Controllers/SiswaController.php

public function show($id)
{
    $siswa = Siswa::find($id);
    return view('siswas.show', compact('siswa'));
}



}

