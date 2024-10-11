<?php

namespace Database\Seeders;

use App\Models\ProfilPpidVisiMisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilVisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visimisis = [
            [
                'id' => '0',
                'urutan' => '3',
                'jenis' => 'visi',
                'deskripsi' => 'Quasi sequi natus ni Quasi sequi natus niQuasi sequi natus niQuasi sequi natus ni',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'urutan' => '1',
                'jenis' => 'misi',
                'deskripsi' => 'Meningkatkan pengelolaan dan pelayanan informasi yang berkualitas, benar dan bertanggung jawab.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '3',
                'urutan' => '2',
                'jenis' => 'misi',
                'deskripsi' => 'Membangun dan mengembangkan sistem penyediaan dan layanan informasi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '4',
                'urutan' => '3',
                'jenis' => 'misi',
                'deskripsi' => 'Meningkatkan serta mengembangkan kompetensi dan kualitas SDM dalam bidang pelayanan informasi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '5',
                'urutan' => '4',
                'jenis' => 'misi',
                'deskripsi' => 'Mewujudkan keterbukaan informasi Pemerintah Kota Surakarta dengan proses yang cepat, tepat, mudah dan sederhana.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '7',
                'urutan' => '1',
                'jenis' => 'visi',
                'deskripsi' => 'Vel explicabo Volup',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya di sini
        ];

        foreach ($visimisis as $visiMisi) {
            ProfilPpidVisiMisi::create($visiMisi);
        }
    }
}
