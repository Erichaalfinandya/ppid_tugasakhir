<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisInformasi extends Model
{
    use HasFactory;

    protected $table = 'jenis_informasi';
    protected $guarded = ['id'];

    public function rincian()
    {
        return $this->hasMany(RincianJenisInformasi::class, 'jenis_info_id');
    }

    public function Informasi()
    {
        return $this->hasMany(DaftarInformasi::class, 'jenis_info_id');
    }
}
