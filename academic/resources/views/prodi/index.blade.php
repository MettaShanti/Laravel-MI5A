@extends('layouts.main')

@section('content')
    @foreach ($Prodi as $row)
    {{ $row['nama']}}
    @endforeach
@endsection