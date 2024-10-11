<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormKeberatan extends Model
{
    use HasFactory;
    // Tentukan nama tabel jika tidak menggunakan konvensi penamaan default
    protected $table = 'form_keberatans';

    // Tentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'kode_permohonan',
        'nik',
        'alasan_keberatan',
        'nama_lengkap',
        'nomor_telepon',
        'alamat',
        'kasus_posisi',
        'file',
        'user_id',
    ];
}
