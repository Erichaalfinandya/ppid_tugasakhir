<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPpidDasarHukum extends Model
{
    use HasFactory;

    protected $table = 'profil_ppid_dasar_hukums';

    protected $fillable = [
        'gambar',
        'judul',
        'deskripsi',
    ];
}