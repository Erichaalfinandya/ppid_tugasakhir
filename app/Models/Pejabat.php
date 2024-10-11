<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{
    use HasFactory;

    protected $table = 'pejabat'; // Sesuaikan dengan nama tabel Anda
    protected $guarded = ['id'];

    public function daftarInformasiPublik()
    {
        return $this->hasMany(DaftarInformasiPublik::class, 'pejabat_id');
    }
}
