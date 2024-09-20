@extends('layouts.main')

@section('content')
    <h4>{{ $mahasiswa['nama']}}</h4>
{{-- <form action="{{ route('mahasiswa.store')}}" method="post">
    @csrf
    NPM
    <input type="text" name="nama" id="" class="form-control mb-2">
    Nama
    <input type="text" name="dekan" id="" class="form-control mb-2">
    Tanggal Lahir
    <input type="text" name="singkatan" id="" class="form-control mb-2">

    Tanggal Lahir
    <input type="text" name="singkatan" id="" class="form-control mb-2">


    <button type="submit" class="btn btn-primary">SIMPAN</button>
    </form> --}}

<table class="table table-striped">
    <tr>
        <td>Program Studi</td>
        <td>{{ $mahasiswa['prodi']['nama']}}</td>
    </tr>
    <tr>
        <td>NPM</td>
        <td>{{ $mahasiswa['npm']}}</td>
    </tr>
    <tr>
        <td>Tempat Lahir</td>
        <td>{{ $mahasiswa['tempat_lahir']}}</td>
    </tr>
    <tr>
        <td>Tanggal Lahir</td>
        <td>{{ $mahasiswa['tanggal_lahir']}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{ $mahasiswa['email']}}</td>
    </tr>
    <tr>
        <td>No HP</td>
        <td>{{ $mahasiswa['hp']}}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>{{ $mahasiswa['alamat']}}</td>
    </tr>
</table>
@endsection