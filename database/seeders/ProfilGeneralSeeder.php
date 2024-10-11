<?php

namespace Database\Seeders;

use App\Models\ProfilPpidGeneral;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilGeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfilPpidGeneral::create([
            'id' => '1',
            'latar_belakang' => 'Latar Belakang Placeholder content for this accordion, which is intended to demonstrate the .accordion-flush class. This is the first items accordion body.',
            'tugas' => 'Pejabat Pengelola Informasi dan Dokumentasi (PPID) Pemerintah Kota Surakarta merupakan ujung tombak pelayanan informasi di Kota Surakarta. Tugasnya adalah mengelola dan memberikan pelayanan informasi kepada masyarakat.',
            'motto' => 'Motto Placeholder content for this accordion, which is intended to demonstrate the .accordion-flush class. This is the third items accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.',
            'gambar_visi' => 'img/366da2579a0af99b7e75e062a369b268.jpeg',
            'gambar_misi' => 'img/366da2579a0af99b7e75e062a369b268.jpeg',
            'gambar_profil' => 'img/e11e421a22f4df0c02d5039346608dac.jpeg'
        ]);
    }
}
