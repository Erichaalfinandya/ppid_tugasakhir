<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianJenisInformasi extends Model
{
    use HasFactory;

    protected $table = 'rincian_jenis_informasi';
    protected $guarded = ['id'];

    public function jenisinformasi()
    {
        return $this->belongsTo(JenisInformasi::class, 'jenis_info_id');
    }

    public function Informasi()
    {
        return $this->hasMany(DaftarInformasi::class, 'rincian_jenis_info_id');
    }
}

