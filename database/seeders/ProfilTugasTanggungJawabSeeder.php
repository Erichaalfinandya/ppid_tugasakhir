<?php

namespace Database\Seeders;

use App\Models\ProfilPpidTugasTanggungJawab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilTugasTanggungJawabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfilPpidTugasTanggungJawab::create([
            'id' => 0,
            'gambar' => 'img/kebijakan.png',
            'judul' => 'Menyusun Kebijakan',
            'deskripsi' => 'Menyusun dan melaksanakan kebijakan layanan informasi publik',
        ]);
    }
}
