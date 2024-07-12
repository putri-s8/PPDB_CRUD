@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header text-center">
                <h3>Tambah Siswa</h3>
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

                <form action="{{ route('siswas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Siswa:</label>
                        <input type="text" name="nama" class="form-control @error('name') is-invalid @enderror"  id="nama" placeholder="Masukkan Nama Siswa"  value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur:</label>
                        <input type="number" name="umur" class="form-control" id="umur" placeholder="Masukkan Umur">
                        <input type="number" name="umur" class="form-control @error('umur') is-invalid @enderror"  id="umur" placeholder="Masukkan Umur"  value="{{ old('umur') }}">
                        @error('umur')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="sekolah_id">Sekolah:</label>
                        <select name="sekolah_id" class="form-control" id="sekolah_id">
                            @foreach($sekolahs as $sekolah)
                                <option value="{{ $sekolah->id }}">{{ $sekolah->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <input type="file" name="foto" class="form-control-file" id="foto">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('siswas.index') }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
