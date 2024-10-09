@extends('layouts.main')

@section('content')
<h4>Mahasiswa</h4>
<form action="{{ route('mahasiswa.update', $mahasiswa['id']) }}" method="post">
    @csrf
    Npm 
    @error('npm')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="npm" id="" class="form-control mb-2" value="{{ $mahasiswa['npm']}}">
    
    Nama 
    @error('nama')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="nama" id="" class="form-control mb-2" value="{{ $mahasiswa['nama']}}">
    
    Tanggal Lahir
    @error('tanggal_lahir')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="date" name="tanggal_lahir" id="" class="form-control mb-2" value="{{ $mahasiswa['tanggal_lahir']}}">

    Tempat Lahir
    @error('tempat_lahir')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="text" name="tempat_lahir" id="" class="form-control mb-2" value="{{ $mahasiswa['tempat_lahir']}}">

    Email
    @error('email')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="text" name="email" id="" class="form-control mb-2" value="{{ $mahasiswa['email']}}">

    No HP
    @error('hp')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="text" name="hp" id="" class="form-control mb-2" value="{{ $mahasiswa['hp']}}">

    Alamat
    @error('alamat')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="text" name="alamat" id="" class="form-control mb-2" value="{{ $mahasiswa['alamat']}}">

    Prodi
    @error('prodi_id ')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <select name="prodi_id" class="form-control" value="{{ $mahasiswa['prodi_id']}}">
        @foreach ($prodi as $item)
            <option value="{{ $item['id'] }}" {{$item['id'] == $prodi['prodi_id'] ? "selected":null}} > {{ $item['nama'] }} </option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection