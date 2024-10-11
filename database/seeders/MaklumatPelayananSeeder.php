<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MaklumatPelayanan;

class MaklumatPelayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MaklumatPelayanan::create([
            'id' => '1',
            'gambar' => 'img/maklumat.jpg',
            'judul' => 'Bagaimanakah Maklumat Pelayanan Informasi ?',
            'deskripsi' => 'Nomor : 12.05.03/756/2022, Berdasarkan Peraturan Komisi Informasi Nomor 1 Tahun 2021 Tentang Standar Pelayanan Informasi Publik. Pemerintah Kota Surakarta Berkomitmen Untuk :',
            'link' => 'https://drive.google.com/file/d/1EfBLtD2rjKGxUpI_ff8dqiWRbLdXnsmR/view',
        ]);
    }
}
