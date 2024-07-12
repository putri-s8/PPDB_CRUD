<!-- resources/views/sekolahs/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Daftar Sekolah</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('sekolahs.create') }}"> Tambah Sekolah</a>
            
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($sekolahs as $sekolah)
    <tr>
        <td>{{ ($sekolahs->currentPage() - 1) * $sekolahs->perPage() + $loop->iteration }}</td> 
        <td>{{ $sekolah->nama }}</td>
        <td>{{ $sekolah->alamat }}</td>
        <td>
            <form action="{{ route('sekolahs.destroy',$sekolah->id) }}" method="POST">
                <a class="btn btn-primary" href="{{ route('sekolahs.edit',$sekolah->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<div class="d-flex justify-content-center">
        {{ $sekolahs->links(('pagination::bootstrap-5')) }}
    </div>
@endsection
