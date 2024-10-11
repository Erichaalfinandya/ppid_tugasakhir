<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarInformasiPublik extends Model
{
    use HasFactory;

    protected $table = 'daftar_informasi_publiks';
    protected $guarded = ['id'];

    public function jenisInfo()
    {
        return $this->belongsTo(JenisInformasi::class, 'jenis_info_id');
    }

    public function rincianJenisInfo()
    {
        return $this->belongsTo(RincianJenisInformasi::class, 'rincian_jenis_info_id');
    }

    public function pejabat()
    {
        return $this->belongsTo(Pejabat::class, 'pejabat_id');
    }
}
