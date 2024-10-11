<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPpidTugasTanggungJawab extends Model
{
    use HasFactory;

    protected $table = 'profil_ppid_tugas_tanggungjawabs';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
    ];
}