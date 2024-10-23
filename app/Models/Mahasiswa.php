<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ["npm","nama","tanggal_lahir","tempat_lahir","email","hp","alamat","prodi_id"];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'prodi_id','id');
    }
}