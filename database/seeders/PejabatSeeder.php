<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PejabatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pejabat')->insert([[
                'nama' => 'Bagian Protokol, Komunikasi dan Administrasi Pimpinan'
            ], [
                'nama' => 'Bagian Layanan Pengadaan Barang/Jasa Setda'
            ], [
                'nama' => 'Bagian Kesejahteraan Rakyat Setda'
            ], [
                'nama' => 'Bagian Tata Pemerintahan Setda'
            ], [
                'nama' => 'Bagian Umum Setda'
            ], [
                'nama' => 'Bagian Perekonomian dan Sumber Daya Alam Setda'
            ], [
                'nama' => 'Bagian Administrasi Pembangunan Setda'
            ], [
                'nama' => 'Bagian Hukum Setda'
            ], [
                'nama' => 'Bagian Organisasi Setda'
            ], [
                'nama' => 'Badan Kepegawaian dan Pengembangan Sumberdaya Manusia'
            ], [
                'nama' => 'Badan Penanggulangan Bencana Daerah'
            ], [
                'nama' => 'Badan Pendapatan Daerah'
            ], [
                'nama' => 'Badan Pengelolaan Keuangan dan Aset Daerah'
            ], [
                'nama' => 'Badan Perencanaan Pembangunan Daerah'
            ], [
                'nama' => 'Badan Penelitian dan Pengembangan Daerah'
            ], [
                'nama' => 'Badan Kesatuan Bangsa dan Politik'
            ], [
                'nama' => 'Dinas Perpustakaan dan Kearsipan'
            ], [
                'nama' => 'Dinas Kepemudaan dan Olah Raga'
            ], [
                'nama' => 'Dinas Administrasi Kependudukan dan Pencatatan Sipil'
            ], [
                'nama' => 'Dinas Kesehatan'
            ], [
                'nama' => 'Dinas Komunikasi, Informatika, Statistik dan Persandian'
            ], [
                'nama' => 'Dinas Koperasi, UKM dan Perindustrian'
            ], [
                'nama' => 'Dinas Kebudayaan dan Pariwisata'
            ], [
                'nama' => 'Dinas Pekerjaan Umum dan Penataan Ruang'
            ], [
                'nama' => 'Dinas Pemadam Kebakaran'
            ], [
                'nama' => 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak serta Pengendalian Penduduk dan Keluarga Berencana'
            ], [
                'nama' => 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu'
            ], [
                'nama' => 'Dinas Pendidikan'
            ], [
                'nama' => 'Dinas Perdagangan'
            ], [
                'nama' => 'Dinas Perhubungan'
            ], [
                'nama' => 'Dinas Lingkungan Hidup'
            ], [
                'nama' => 'Dinas Ketahanan Pangan dan Pertanian'
            ], [
                'nama' => 'Dinas Perumahan, Kawasan Permukiman dan Pertanahan'
            ], [
                'nama' => 'Dinas Sosial'
            ], [
                'nama' => 'Dinas Tenaga Kerja'
            ], [
                'nama' => 'Satuan Polisi Pamong Praja'
            ], [
                'nama' => 'Inspektorat'
            ]
        ]);
    }
}
