@extends('layouts.main')

@section('content')
    <h4>Prodi</h4>
    <a href="{{route('prodi.create')}}" class="btn btn-primary">TAMBAH</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Prodi</th>
                <th>Nama Kaprodi</th>
                <th>Singkatan</th>
                <th>Fakultas</th>
                <th>Ubah Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Prodi as $row)
            <tr>
                <td>{{ $row['nama']}}</td>
                <td>{{ $row['kaprodi']}}</td>
                <td>{{ $row['singkatan']}}</td>
                <td>{{ $row['fakultas']['nama']}}</td>
                <td><a href="{{ route('prodi.edit', $row['id'] )}}" class="btn btn-xs btn-warning">UBAH</a>
                {{-- untuk membuat btn hapus --}}
                    <form action="{{ route('prodi.destroy', $row['id'])}}" method="post" style="display:inline"> 
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

