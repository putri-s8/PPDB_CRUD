@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Hasil Pencarian untuk "{{ $query }}"</h2>

    @if($siswas->isEmpty() && $sekolahs->isEmpty())
        <p class="text-center">Tidak ada hasil ditemukan.</p>
    @else
        @if(!$siswas->isEmpty())
            <h3 class="text-center">Siswa</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Umur</th>
                        <th>Sekolah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswas as $siswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->umur }}</td>
                            <td>{{ $siswa->sekolah->nama }}</td>
                            <td>
                                <a href="{{ route('siswas.show', $siswa->id) }}" class="btn btn-primary btn-sm">Show</a>
                                <a href="{{ route('siswas.edit', $siswa->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{ route('siswas.destroy', $siswa->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if(!$sekolahs->isEmpty())
            <h3 class="text-center">Sekolah</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Sekolah</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sekolahs as $sekolah)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sekolah->nama }}</td>
                            <td>{{ $sekolah->alamat }}</td>
                            <td>
                                <a href="{{ route('sekolahs.show', $sekolah->id) }}" class="btn btn-primary btn-sm">Show</a>
                                <a href="{{ route('sekolahs.edit', $sekolah->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{ route('sekolahs.destroy', $sekolah->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endif
</div>
@endsection
