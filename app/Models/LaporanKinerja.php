<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKinerja extends Model
{
    use HasFactory;

    protected $table = 'laporan_kinerja';

    protected $fillable = [
        'keterangan',
        'tahun',
        'penerbit',
        'file',
    ];
}
