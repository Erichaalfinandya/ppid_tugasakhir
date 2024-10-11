<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GaleriSeeder extends Seeder
{
    public function run()
    {
        DB::table('galeri')->insert([
            [
                'judul' => 'Foto Event 1',
                'jenis' => 'Foto',
                'media' => 'path/to/foto1.jpg',
                'oleh' => 'PPID',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Video Event 1',
                'jenis' => 'Video',
                'media' => 'path/to/video1.mp4',
                'oleh' => 'PPID',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Foto Event 1',
                'jenis' => 'Foto',
                'media' => 'path/to/foto2.jpg',
                'oleh' => 'Pemerintah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Video Event 1',
                'jenis' => 'Video',
                'media' => 'path/to/video2.mp4',
                'oleh' => 'Pemerintah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more entries as needed
        ]);
    }
}
