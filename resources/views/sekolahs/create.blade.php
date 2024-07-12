@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Sekolah</h3>
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

                <form action="{{ route('sekolahs.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Sekolah:</label>
                        <input type="text" name="nama" class="form-control @error('name') is-invalid @enderror"  id="nama" placeholder="Masukkan Nama Sekolah"  value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}"></textarea>
                        @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('sekolahs.index') }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
