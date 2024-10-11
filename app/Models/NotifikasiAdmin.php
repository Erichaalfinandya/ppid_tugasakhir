<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifikasiAdmin extends Model
{
    use HasFactory;
    protected $table = 'notifikasiadmin'; // Sesuaikan dengan nama tabel Anda jika berbeda

    protected $fillable = [
        'permohonan_id',
        'status',
        'tahapan',
        'jawaban',
    ];
}