<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil model prodi
        $result = Prodi::all();
        //dd($result); untuk menampilkan data db

        // kirim data $result ke view prodi/index.blade.php
        return view('prodi.index')->with('Prodi', $result);
        //key itu nama pada controller pada prodi Prodi
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('prodi.create')->with('fakultas', $fakultas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);

        //validasi input nama imput disamakan dengan tabel kolom
        $input = $request->validate([
            "nama"        =>"required|unique:prodis",
            "kaprodi"     =>"required",
            "singkatan"   =>"required",
            "fakultas_id" =>"required"
        ]);

        //simpan
        Prodi::create($input);

        //redirect beserta pesan sukses
        return redirect()->route('prodi.index')->with('success', $request->nama.' Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // edit data
        $prodi = Prodi::find($id);
        $fakultas = Fakultas::all(); //ditambah ini
        return view('prodi.edit')->with('prodi', $prodi)->with('fakultas', $fakultas); //ditambah ini
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $prodi = Prodi::find($id);
        //dd(vars: $fakultas);

        //validasi input nama imput disamakan dengan tabel kolom
        $input = $request->validate([
            "nama"        =>"required",
            "kaprodi"     =>"required",
            "singkatan"   =>"required",
            "fakultas_id" =>"required"
        ]);

        //update data
        $prodi->update($input);

        //redirect beserta pesan sukses
        return redirect()->route('prodi.index')->with('success', $request->nama.' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // cari data di table mahasiswa berdasarkan "id" mahasiswa
        $prodi = Prodi::find($id);
        $prodi->delete();
        return redirect()->route('prodi.index')->with('succes','Data Prodi Berhasil di Hapus');
    }
}
