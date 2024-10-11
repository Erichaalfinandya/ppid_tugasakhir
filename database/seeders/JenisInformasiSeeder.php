<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisInformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_informasi')->insert([[
            'nama' => 'Informasi tentang Profil Badan Publik',
            'pembagian_informasi' => 'Berkala'
        ], [
            'nama' => 'Ringkasan Informasi tentang program dan/atau kegiatan yang sedang dijalankan dalam lingkup Badan Publik',
            'pembagian_informasi' => 'Berkala'
        ], [
            'nama' => 'Ringkasan Informasi tentang kinerja',
            'pembagian_informasi' => 'Berkala'
        ], [
            'nama' => 'Ringkasan Laporan Keuangan',
            'pembagian_informasi' => 'Berkala'
        ], [
            'nama' => 'Ringkasan Laporan Akses Informasi Publik',
            'pembagian_informasi' => 'Berkala'
        ], [
            'nama' => 'Informasi tentang Peraturan, Keputusan, dan/atau Kebijakan yang mengikat',
            'pembagian_informasi' => 'Berkala'
        ], [
            'nama' => 'Informasi tentang prosedur memperoleh Informasi Publik',
            'pembagian_informasi' => 'Berkala'
        ], [
            'nama' => 'Informasi tentang tata cara pengaduan penyalahgunaan wewenang atau pelanggaran oleh Badan Publik',
            'pembagian_informasi' => 'Berkala'
        ], [
            'nama' => 'Informasi Pengadaan Barang dan Jasa Pemerintah',
            'pembagian_informasi' => 'Berkala'
        ], [
            'nama' => 'Informasi Ketenagakerjaan',
            'pembagian_informasi' => 'Berkala'
        ], [
            'nama' => 'Informasi tentang prosedur peringatan dini dan prosedur evakuasi keadaan darurat di setiap kantor badan publik',
            'pembagian_informasi' => 'Berkala'
        ], [
            'nama' => 'Informasi yang dapat mengancam hajat hidup orang banyak dan ketertiban umum',
            'pembagian_informasi' => 'Serta Merta'
        ], [
            'nama' => 'Daftar Informasi Publik Kota Surakarta',
            'pembagian_informasi' => 'Setiap Saat'
        ], [
            'nama' => 'Informasi tentang peraturan, keputusan, dan/atau kebijakan Badan Publik',
            'pembagian_informasi' => 'Setiap Saat'
        ], [
            'nama' => 'Informasi tentang organisasi, administrasi, kepegawaian, dan keuangan',
            'pembagian_informasi' => 'Setiap Saat'
        ], [
            'nama' => 'Surat-surat perjanjian dengan pihak ketiga berikut dokumen pendukungnya',
            'pembagian_informasi' => 'Setiap Saat'
        ], [
            'nama' => 'Surat menyurat pimpinan atau pejabat Badan Publik dalam rangka pelaksanaan tugas, fungsi, dan wewenangnya',
            'pembagian_informasi' => 'Setiap Saat'
        ], [
            'nama' => 'Persyaratan perizinan, izin yang diterbitkan dan/atau dikeluarkan berikut dokumen pendukungnya, dan laporan penaatan izin yang diberikan',
            'pembagian_informasi' => 'Setiap Saat'
        ], [
            'nama' => 'Data perbendaharaan atau Inventaris',
            'pembagian_informasi' => 'Setiap Saat'
        ], [
            'nama' => 'Rencana strategis dan rencana kerja Badan Publik',
            'pembagian_informasi' => 'Setiap Saat'
        ], [
            'nama' => 'Agenda kerja satuan pimpinan satuan kerja',
            'pembagian_informasi' => 'Setiap Saat'
        ], [
            'nama' => 'Informasi mengenai kegiatan pelayanan Informasi Publik',
            'pembagian_informasi' => 'Setiap Saat'
        ], [
            'nama' => 'Jumlah dan jenis dan gambaran umum pelanggaran yang ditemukan dalam pengawasan internal serta laporan penindakannya',
            'pembagian_informasi' => 'Setiap Saat'
        ], [
            'nama' => 'Jumlah dan jenis dan gambaran umum pelanggaran yang dilaporkan oleh masyarakat serta laporan penindakannya',
            'pembagian_informasi' => 'Setiap Saat'
        ], [
            'nama' => 'Daftar serta hasil-hasil penelitian yang dilakukan',
            'pembagian_informasi' => 'Setiap Saat'
        ], [
            'nama' => 'Peraturan perundang-undangan yang telah disahkan serta kajian akademiknya',
            'pembagian_informasi' => 'Setiap Saat'
        ], [
            'nama' => 'Informasi dan kebijakan yang disampaikan pejabat publik dalam pertemuan yang terbuka',
            'pembagian_informasi' => 'Setiap Saat'
        ], [
            'nama' => 'Informasi yang wajib disediakan dan diumumkan secara berkala',
            'pembagian_informasi' => 'Setiap Saat'
        ], [
            'nama' => 'Informasi tentang standar pengumuman informasi',
            'pembagian_informasi' => 'Setiap Saat'
        ],
    ]);
    }
}
