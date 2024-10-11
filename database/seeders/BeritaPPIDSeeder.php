<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BeritaPPID;

class BeritaPPIDSeeder extends Seeder
{
    public function run()
    {
        BeritaPPID::create([
            'sampul' => 'path/to/sampul.jpg',
            'judul' => 'Judul Berita PPID',
            'deskripsi' => 'Deskripsi Berita PPID',
            'penerbit' => 'Admin',
        ]);
    }
}
