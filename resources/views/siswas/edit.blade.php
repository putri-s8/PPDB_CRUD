@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header text-center">
                <h3>Edit Siswa</h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('siswas.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Siswa:</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $siswa->nama }}" placeholder="Masukkan Nama Siswa">
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur:</label>
                        <input type="number" name="umur" class="form-control" id="umur" value="{{ $siswa->umur }}" placeholder="Masukkan Umur">
                    </div>
                    <div class="form-group">
                        <label for="sekolah_id">Sekolah:</label>
                        <select name="sekolah_id" class="form-control" id="sekolah_id">
                            @foreach($sekolahs as $sekolah)
                                <option value="{{ $sekolah->id }}" {{ $siswa->sekolah_id == $sekolah->id ? 'selected' : '' }}>{{ $sekolah->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <input type="file" name="foto" class="form-control-file" id="foto">
                        @if($siswa->foto)
                            <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto Siswa" style="max-width: 100px; margin-top: 10px;">
                        @endif
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-secondary" href="{{ route('siswas.index') }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
