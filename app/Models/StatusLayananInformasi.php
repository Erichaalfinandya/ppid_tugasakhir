<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusLayananInformasi extends Model
{
    protected $table = 'status_layanan_informasi';

    protected $fillable = [
        'permohonan_id',
        'status',
        'jawaban',
    ];

    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class, 'permohonan_id');
    }

    // Boot method untuk menambahkan event deleting
    protected static function boot()
    {
        parent::boot();

        // Ketika menghapus status layanan informasi, hapus juga permohonan terkait
        static::deleting(function ($statusLayananInformasi) {
            $statusLayananInformasi->permohonan()->delete();
        });
    }
}