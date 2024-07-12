@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header text-center">
                <h3>Edit Sekolah</h3>
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

                <form action="{{ route('sekolahs.update', $sekolah->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Sekolah:</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $sekolah->nama }}" placeholder="Masukkan Nama Sekolah">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat">{{ $sekolah->alamat }}</textarea>
                    </div>
                   
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-secondary" href="{{ route('sekolahs.index') }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
