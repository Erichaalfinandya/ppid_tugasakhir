<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusLayananKeberatanInformasi extends Model
{
    protected $table = 'status_keberatan'; // Pastikan nama tabel benar

    protected $fillable = [
        'permohonan_keberatan_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function permohonanKeberatan()
    {
        return $this->belongsTo(PermohonanKeberatan::class, 'permohonan_id');
    }
}
