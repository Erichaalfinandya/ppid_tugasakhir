<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SekretarisPemerintah extends Model
{
    use HasFactory;

    protected $table = 'sekretaris_pemerintah';

    protected $fillable = [
        'nama',
        'deskripsi',
        'alamat',
        'kota_lahir',
        'tanggal_lahir',
        'sampul',
    ];
}
