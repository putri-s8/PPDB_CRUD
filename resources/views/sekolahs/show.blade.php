<!-- resources/views/sekolahs/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2>Sekolah</h2>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header text-center">
                <strong>Detail Sekolah</strong>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $sekolah->nama }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $sekolah->alamat }}</td>
                    </tr>
                </table>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-success" href="{{ route('sekolahs.index') }}">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
