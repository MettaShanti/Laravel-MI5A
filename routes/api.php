<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// fakultas
Route::get("fakultas", [FakultasController::class, 'getFakultas']);
Route::post("fakultas", [FakultasController::class, 'storeFakultas']);

//prodi
Route::get("prodi", [ProdiController::class, 'getProdi']);
Route::post("prodi", [ProdiController::class, 'storeProdi']);

//mahasiswa
Route::get("mahasiswa", [MahasiswaController::class, 'getMahasiswa']);
Route::post("mahasiswa", [ProdiController::class, 'storeMahasiswa']);