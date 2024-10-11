<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Builder;

class Permohonan extends Model
{
    use HasFactory;

    protected $table = 'permohonan';

    protected $fillable = [
        'user_id',
        'kategoripermohonan',
        'nik',
        'nama',
        'ktp',
        'alamat',
        'email',
        'nomortelepon',
        'pekerjaan',
        'uploadsurat',
        'rincianinformasi',
        'tujuaninformasi',
        'mendapatkansalinan',
        'caramendapatkansalinan',
        'status',
        'kodepermohonan', // tambahkan kolom kodepermohonan
        'jawaban', // Jawaban pengajuan
        'current_stage',
    ];

    protected $guarded = [];

    public function statusLayananInformasi()
    {
        return $this->hasOne(StatusLayananInformasi::class, 'permohonan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // tambahkan 'user_id' sebagai foreign key
    }

    public static function boot()
    {
        parent::boot();

        // Generate kodepermohonan automatically on create
        static::creating(function ($model) {
            $model->kodepermohonan = Uuid::uuid4()->toString();
        });

        static::addGlobalScope('latest', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }

    public $timestamps = true; // Mengaktifkan timestamp

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at ? $this->created_at->format('Y-m-d H:i:s') : 'Tanggal tidak tersedia';
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return $this->updated_at ? $this->updated_at->format('Y-m-d H:i:s') : 'Tanggal tidak tersedia';
    }
}