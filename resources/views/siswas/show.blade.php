<!-- resources/views/siswas/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2>Siswa</h2>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header text-center">
                <strong>Detail Siswa</strong>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $siswa->nama }}</td>
                    </tr>
                    <tr>
                        <th>Umur</th>
                        <td>{{ $siswa->umur }}</td>
                    </tr>
                    <tr>
                        <th>Asal Sekolah</th>
                        <td>{{ $siswa->sekolah->nama }}</td>
                    </tr>
                    <tr>
                        <th>Foto</th>
                        <td>
                            @if($siswa->foto)
                                <img src="/uploads/fotos/{{ $siswa->foto }}" class="img-thumbnail" style="max-width: 150px;" alt="Foto Siswa">
                            @else
                                No Image
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-success" href="{{ route('siswas.index') }}">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
