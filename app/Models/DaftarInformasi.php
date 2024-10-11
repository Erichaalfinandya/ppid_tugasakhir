<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarInformasi extends Model
{
    use HasFactory;

    protected $table = 'daftar_informasi';
    protected $guarded = ['id'];

    public function kategoriJudul()
    {
        return $this->belongsTo(Judul::class, 'judul_id');
    }
}
