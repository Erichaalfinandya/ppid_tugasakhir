<?php

namespace Database\Seeders;

use App\Models\MaklumatPelayananList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaklumatPelayananListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maklumatPelayanans = [
            [
                'id' => '1',
                'urutan' => '3',
                'deskripsi' => 'Memberikan Pelayanan Informasi dan Dokumentasi Publik yang cepat, tepat waktu, akurat serta benar sesuai peraturan yang berlaku;',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'urutan' => '3',
                'deskripsi' => 'Memberikan pelayanan secara ramah, santun, dan transparan serta tanpa biaya;',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '3',
                'urutan' => '3',
                'deskripsi' => 'Menyediakan Daftar Informasi Publik yang wajib disediakan dan diumumkan dengan memanfaatkan Teknologi Informasi;',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '4',
                'urutan' => '3',
                'deskripsi' => 'Merespon dengan cepat Permintaan Informasi dan Keberatan Informasi Publik yang disampaikan baik langsung atau secara elektronik;',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '5',
                'urutan' => '3',
                'deskripsi' => 'Menyediakan aksesbilitas informasi bagi penyandang disabilitas;',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '6',
                'urutan' => '3',
                'deskripsi' => 'Melakukan pengawasan internal dan evaluasi kinerja pelaksanaan informasi publik.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya di sini
        ];

        foreach ($maklumatPelayanans as $maklumatPelayanan) {
            MaklumatPelayananList::create($maklumatPelayanan);
        }
    }
}
