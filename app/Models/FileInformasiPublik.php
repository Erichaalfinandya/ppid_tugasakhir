<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileInformasiPublik extends Model
{
    use HasFactory;

    protected $table = 'file_informasi_publiks';

    protected $fillable = [
        'informasi_publik_id',
        'deskripsi',
        'tahun',
        'file',
    ];
}