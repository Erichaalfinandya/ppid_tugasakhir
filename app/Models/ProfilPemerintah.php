<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPemerintah extends Model
{
    use HasFactory;

    protected $table = 'profil_pemerintah';

    protected $fillable = [
        'judul',
        'deskripsi_visi',
        'gambar_visi',
        'deskripsi_misi',
        'gambar_misi',
    ];

    public function getGambarVisiUrlAttribute()
    {
        return url('upload/' . $this->gambar_visi);
    }

}
