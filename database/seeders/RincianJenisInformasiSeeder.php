<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RincianJenisInformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rincian_jenis_informasi')->insert([[
            'nama' => 'Kedudukan/ domisili beserta alamat lengkap',
            'jenis_info_id' => '1'
        ], [
            'nama' => 'Visi dan Misi',
            'jenis_info_id' => '1'
        ], [
            'nama' => 'Tugas dan Fungsi',
            'jenis_info_id' => '1'
        ], [
            'nama' => 'Struktur Organisasi',
            'jenis_info_id' => '1'
        ], [
            'nama' => 'Profil Pimpinan Pemerintah Kota Surakarta',
            'jenis_info_id' => '1'
        ], [
            'nama' => 'LHKPN',
            'jenis_info_id' => '1'
        ], [
            'nama' => 'Nama Program/kegiatan',
            'jenis_info_id' => '2'
        ], [
            'nama' => 'Penanggungjawab atau pelaksana program dan kegiatan',
            'jenis_info_id' => '2'
        ], [
            'nama' => 'Target dan/atau capaian program dan kegiatan',
            'jenis_info_id' => '2'
        ], [
            'nama' => 'Jadwal Pelaksanaan program dan kegiatan',
            'jenis_info_id' => '2'
        ], [
            'nama' => 'Anggaran program dan kegiatan yang meliputi sumber dan jumlah',
            'jenis_info_id' => '2'
        ], [
            'nama' => 'Agenda penting terkait pelaksanaan tugas Badan Publik',
            'jenis_info_id' => '2'
        ], [
            'nama' => 'Informasi khusus lainnya berkaitan dengan hak-hak masyarakat',
            'jenis_info_id' => '2'
        ], [
            'nama' => 'Informasi tentang penerimaan calon pegawai dan/atau pejabat Badan Publik',
            'jenis_info_id' => '2'
        ], [
            'nama' => 'Informasi tentang penerimaan calon peserta didik pada Badan Publik',
            'jenis_info_id' => '2'
        ],
    ]);
    }
}
