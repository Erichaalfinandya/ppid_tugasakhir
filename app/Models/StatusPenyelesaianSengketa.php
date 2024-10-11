<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPenyelesaianSengketa extends Model
{
    use HasFactory;

    protected $table = 'status_penyelesaian_sengketa';

    protected $fillable = [
        'permohonan_id', // Pastikan ini sama dengan yang ada di migration
        'status',
        'created_at',
        'updated_at',
    ];

    public function permohonanSengketa()
    {
        return $this->belongsTo(PermohonanSengketa::class, 'permohonan_id');
    }

    protected static function boot()
    {
        parent::boot();

        // Ketika menghapus status layanan informasi, hapus juga permohonan terkait
        static::deleting(function ($statusPenyelesaianSengketa) {
            $statusPenyelesaianSengketa->permohonan()->delete();
        });
    }
}
