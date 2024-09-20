<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prodi extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['nama', 'kaprodi', 'singkatan', 'fakultas_id'];

    // untuk memanggil query dari tabel lain menggunakan BelongsTo
    public function fakultas(): BelongsTo
    {
        return $this->belongsTo(Fakultas::class,'fakultas_id','id');
    }
}
