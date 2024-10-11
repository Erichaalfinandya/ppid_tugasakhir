<?php

if (!function_exists('getIconForStage')) {
    function getIconForStage($stageName)
    {
        $icons = [
            'Pengajuan informasi' => 'fa-comment',
            'Proses Verifikasi' => 'fa-lock',
            'Proses Tindak Lanjut' => 'fa-spinner fa-spin',
            'Selesai' => 'fa-check-circle',
        ];
        return $icons[$stageName] ?? 'fa-question';
    }
}

if (!function_exists('getStageDescription')) {
    function getStageDescription($stageName)
    {
        $descriptions = [
            'Pengajuan informasi' => 'Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap',
            'Proses Verifikasi' => 'Dalam 3 hari, laporan anda akan diverifikasi oleh admin PPID Kota Surakarta',
            'Proses Tindak Lanjut' => 'Dalam 5 hari, pihak PPID akan menindaklanjuti dan memberikan jawaban pengajuan anda',
            'Selesai' => 'Laporan anda akan dinyatakan selesai jika anda sudah mendapatkan jawaban atas pengajuan oleh pihak PPID Kota Surakarta',
        ];
        return $descriptions[$stageName] ?? 'Deskripsi tidak tersedia';
    }
}

if (!function_exists('konversiUrutanKeKata')) {
    function konversiUrutanKeKata($angka)
    {
        $ejaan = [
            1 => 'Pertama',
            2 => 'Kedua',
            3 => 'Ketiga',
            4 => 'Keempat',
            5 => 'Kelima',
            6 => 'Keenam',
            7 => 'Ketujuh',
            8 => 'Kedelapan',
            9 => 'Kesembilan',
            10 => 'Kesepuluh',
        ];

        return $ejaan[$angka] ?? 'Tidak tersedia';
    }
}
