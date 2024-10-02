<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil model fakultas
        $result = Mahasiswa::all();
        //dd($result); untuk menampilkan data db

        // kirim data $result ke view fakultas/index.blade.php
        return view('mahasiswa.index')->with('mahasiswa', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create')->with('prodi', $prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);

        //validasi input nama imput disamakan dengan tabel kolom
        $input = $request->validate([
            "npm"           =>"required|unique:mahasiswas",
            "nama"          =>"required",
            "tanggal_lahir" =>"required",
            "tempat_lahir"  =>"required",
            "email"         =>"required",
            "hp"            =>"required",
            "alamat"        =>"required",
            "prodi_id"      =>"required",
        ]);

        //simpan
        Mahasiswa::create($input);

        //redirect beserta pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', $request->nama.' Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //dd($mahasiswa);
        return view('mahasiswa.show')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $id)
    {
        // edit data
        $mahasiswa = Mahasiswa::find($id);
        //dd($mahasiswa);
        return view('mahasiswa.edit')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $mahasiswa = Mahasiswa::find($id);
        //validasi input nama imput disamakan dengan tabel kolom
        $input = $request->validate([
            "npm"           =>"required",
            "nama"          =>"required",
            "tanggal_lahir" =>"required",
            "tempat_lahir"  =>"required",
            "email"         =>"required",
            "hp"            =>"required",
            "alamat"        =>"required",
            "prodi_id"      =>"required",
        ]);

        //simpan
        Mahasiswa::update($input);

        //redirect beserta pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', $request->nama.' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // cari data di table mahasiswa berdasarkan "id" mahasiswa
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('succes','Data Mahasiswa Berhasil di Hapus');
    }
}
