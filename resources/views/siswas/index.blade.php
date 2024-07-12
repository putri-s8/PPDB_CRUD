<!-- resources/views/siswas/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Daftar Siswa</h2>
        </div>
        <br>
        <div class="pull-right">
            
            <a class="btn btn-success" href="{{ route('siswas.create') }}"> Tambah Siswa</a>
            
        </div>
        <br>
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
        <th>Umur</th>
        <th>Asal Sekolah</th>
        <th>Foto Siswa</th>
        <th width="280px">Action</th>
    </tr>
    @php
        $i = 0;
    @endphp
    @foreach ($siswas as $siswa)
    <tr>
            <td>{{ ($siswas->currentPage() - 1) * $siswas->perPage() + $loop->iteration }}</td>           
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->umur }}</td>
            <td>{{ $siswa->sekolah->nama }}</td>
            <td>
            @if($siswa->foto)
                <img src="/uploads/fotos/{{ $siswa->foto }}" width="100px">
            @else
                No Image
            @endif
        </td>
        <td>
            <form action="{{ route('siswas.destroy', $siswa->id) }}" method="POST">
                <a class="btn btn-primary" href="{{ route('siswas.show', $siswa->id) }}">Show</a>
                <a class="btn btn-warning" href="{{ route('siswas.edit', $siswa->id) }}">Edit</a>

                @csrf
                @method('DELETE')

               
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            
        </td>
    </tr>
    @endforeach
</table>
<div class="d-flex justify-content-center">
        {{ $siswas->links(('pagination::bootstrap-5')) }}
    </div>
@endsection
