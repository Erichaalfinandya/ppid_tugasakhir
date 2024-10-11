<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BeritaKominfo;

class BeritaKominfoSeeder extends Seeder
{
    public function run()
    {
        BeritaKominfo::create([
            'sampul' => 'path/to/sampul.jpg',
            'judul' => 'Judul Berita Kominfo',
            'deskripsi' => 'Deskripsi Berita Kominfo',
        ]);
    }
}
