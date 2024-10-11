<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class biodata extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto',
        'ktp',
        'user_id',
        'nama_lengkap',
        'nama_depan',
        'nama_belakang',
        'nik',
        'email',
        'telp',
        'jenis_kelamin',
        'alamat',
        'tanggal_lahir',
        'ttl'
];  
}
