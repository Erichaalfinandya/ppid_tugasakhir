<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailDaftarInformasi extends Model
{
    use HasFactory;

    protected $table = 'detail_daftar_informasis';

    protected $fillable = [
        'ringkasan_informasi',
        'pejabat',
        'penanggung_jawab',
        'waktu',
        'bentuk',
        'jangka_waktu',
        'jenis_media',
        'id_kategori',
    ];
}