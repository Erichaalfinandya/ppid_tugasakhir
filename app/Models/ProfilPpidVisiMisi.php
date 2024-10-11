<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPpidVisiMisi extends Model
{
    use HasFactory;

    protected $table = 'profil_ppid_visi_misis';

    protected $fillable = [
        'deskripsi',
        'jenis',
        'urutan',
    ];
}