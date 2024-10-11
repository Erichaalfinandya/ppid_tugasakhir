<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPpidStrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'profil_ppid_struktur_organisasis';

    protected $fillable = [
        'gambar',
        'deskripsi',
    ];
}