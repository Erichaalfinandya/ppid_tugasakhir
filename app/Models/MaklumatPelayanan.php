<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaklumatPelayanan extends Model
{
    use HasFactory;

    protected $table = 'maklumat_pelayanans';

    protected $fillable = [
        'gambar',
        'judul',
        'deskripsi',
        'link',
    ];
}