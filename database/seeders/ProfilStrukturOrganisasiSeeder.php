<?php

namespace Database\Seeders;

use App\Models\ProfilPpidStrukturOrganisasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilStrukturOrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfilPpidStrukturOrganisasi::create([
            'id' => 1,
            'gambar' => 'img/kerja.png',
            'deskripsi' => 'Menyusun dan melaksanakan kebijakan layanan informasi publik',
        ]);
    }
}
