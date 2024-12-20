<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil model fakultas
        $result = Fakultas::all();
        //dd($result); untuk menampilkan data db

        // kirim data $result ke view fakultas/index.blade.php
        return view('fakultas.index')->with('fakultas', $result);

    }

    /**
     * Show the form for creating a new resource.
     * 
     */
    public function create()
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);

        //validasi input nama imput disamakan dengan tabel kolom
        $input = $request->validate([
            "nama"      =>"required|unique:fakultas",
            "dekan"     => "required",
            "singkatan" => "required"
        ]);

        //simpan
        Fakultas::create($input);

        //redirect beserta pesan sukses
        return redirect()->route('fakultas.index')->with('success', $request->nama.' Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        // edit data
        $fakultas = Fakultas::find($id);
        //dd($fakultas);
        return view('fakultas.edit')->with('fakultas', $fakultas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $fakultas = Fakultas::find($id);
        //dd(vars: $fakultas);

        //validasi input nama imput disamakan dengan tabel kolom
        $input = $request->validate([
            "nama"      =>"required",
            "dekan"     =>"required",
            "singkatan" =>"required"
        ]);

        //update data
        $fakultas->update($input);

        //redirect beserta pesan sukses
        return redirect()->route('fakultas.index')->with('success', $request->nama.' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // cari data di table fakultas berdasarkan "id" fakultas
        $fakultas = Fakultas::find($id);
        //dd($fakultas);
        $fakultas->delete();
        return redirect()->route('fakultas.index')->with('succes','Data Fakultas Berhasil di Hapus');
    }

    public function getFakultas(){
        $response['data'] = Fakultas::all();
        $response['message'] = 'List data fakultas';
        $response['success'] = true;

        return response()->json($response, 200);
    }
    public function storeFakultas(Request $request){
        $input = $request->validate([
            "nama"      =>"required|unique:fakultas",
            "dekan"     => "required",
            "singkatan" => "required"
        ]);

        //simpan
        $hasil = Fakultas::create($input);
        if($hasil){// jika berhasil disimpan
            $response['success'] = true;
            $response['message'] = $request->nama. " Berhasil Disimpan";
            return response()->json($response, 201); // 201 create atau sudah berhasil disimpan
        }else{
            $response['success'] = false;
            $response['message'] = $request->nama. " Gagal Disimpan";
            return response()->json($response, 400); //400 bad request
        }
    }

    public function destroyFakultas($id)
    {
        // cari data di table fakultas berdasarkan "id" fakultas
        $fakultas = Fakultas::find($id);
        //dd($fakultas);
        $hasil = $fakultas->delete();
        if($hasil){// jika berhasil disimpan
            $response['success'] = true;
            $response['message'] =" Fakultas Berhasil Dihapus";
            return response()->json($response, 201); // 201 create atau sudah berhasil disimpan
        }else{
            $response['success'] = false;
            $response['message'] =  "Fakultas gagal dihapus";
            return response()->json($response, 400); //400 bad request
        }
    }

    public function updateFakultas(Request $request,$id)
    {
        $fakultas = Fakultas::find($id);
        //validasi input nama imput disamakan dengan tabel kolom
        $input = $request->validate([
            "nama"      =>"required",
            "dekan"     =>"required",
            "singkatan" =>"required"
        ]);

        //update data
        $hasil = $fakultas->update($input);

        if($hasil){// jika berhasil disimpan
            $response['success'] = true;
            $response['message'] =" Fakultas Berhasil Diubah";
            return response()->json($response, 201); // 201 create atau sudah berhasil disimpan
        }else{
            $response['success'] = false;
            $response['message'] =  "Fakultas gagal diubah";
            return response()->json($response, 400); //400 bad request
        }
    }

}
