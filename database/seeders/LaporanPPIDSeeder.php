<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LaporanPPID;

class LaporanPPIDSeeder extends Seeder
{
    public function run()
    {
        LaporanPPID::create([
            'sampul' => 'path/to/sampul.jpg',
            'judul' => 'Judul Laporan PPID',
            'file' => 'path/to/file.pdf',
            'tahun' => now()->year,
            'penerbit' => 'Admin',
        ]);
    }
}