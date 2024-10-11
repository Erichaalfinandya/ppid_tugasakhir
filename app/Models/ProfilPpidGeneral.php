<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPpidGeneral extends Model
{
    use HasFactory;

    protected $table = 'profil_ppid_generals';

    protected $fillable = [
        'latar_belakang',
        'tugas',
        'motto',
        'gambar_visi',
        'gambar_misi',
        'gambar_profil'
    ];
}