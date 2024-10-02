@extends('layouts.main')

@section('content')
    <h4>Mahasiswa</h4>
    <a href="{{route('mahasiswa.create')}}" class="btn btn-primary">TAMBAH</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Prodi</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $row)
            <tr>
                <td>{{ $row['npm']}}</td>
                <td>{{ $row['nama']}}</td>
                <td>{{ $row['tanggal_lahir']}}</td>
                <td>{{ $row['tempat_lahir']}}</td>
                <td>{{ $row['prodi']['nama']}}</td>
                <td><a href="{{ route('mahasiswa.show', $row['id'])}}" class="btn btn-primary btn-xs">SHOW</a></td>
                <td><a href="{{ route('mahasiswa.edit', $row ['id'] )}}" class="btn btn-xs btn-warning">UBAH</a>
                {{-- untuk membuat btn hapus --}}
                    <form action="{{ route('mahasiswa.destroy', $row['id'])}}" method="post" style="display:inline"> 
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-xs btn-danger">HAPUS</button>
                    </form>
                    {{-- style="display:inline" untuk memindahkan btn ke samping --}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection