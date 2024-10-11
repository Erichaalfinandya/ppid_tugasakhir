<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPenyelenggaraan extends Model
{
    use HasFactory;

    protected $table = 'laporan_penyelenggaraan';

    protected $fillable = [
        'keterangan',
        'tahun',
        'penerbit',
        'file',
    ];
}
