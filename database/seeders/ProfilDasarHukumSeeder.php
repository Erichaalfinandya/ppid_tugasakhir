<?php

namespace Database\Seeders;

use App\Models\ProfilPpidDasarHukum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilDasarHukumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfilPpidDasarHukum::create([
            'id' => 0,
            'gambar' => 'img/uu.png',
            'judul' => 'UU No. 15 Tahun 2008',
            'deskripsi' => 'Undang-undang (UU) Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik',
        ]);
    }
}
