-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2024 pada 02.21
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surakarta08`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_kominfo`
--

CREATE TABLE `berita_kominfo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sampul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_pemerintah`
--

CREATE TABLE `berita_pemerintah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sampul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berita_pemerintah`
--

INSERT INTO `berita_pemerintah` (`id`, `sampul`, `judul`, `deskripsi`, `penerbit`, `created_at`, `updated_at`) VALUES
(1, 'upload/1727482305_foto1.jpeg', 'OIKN Targetkan Investasi di IKN Capai Rp100 Triliun', 'Jakarta, Kominfo Newsroom – Kepala Otoritas Ibu Kota Nusantara (OIKN) Bambang Susantono  mengungkapkan target investasi di Nusantara pada 2024 capai Rp100 triliun.', 'Ericha', '2024-09-28 00:11:45', '2024-09-28 00:11:45'),
(2, 'upload/1727482343_foto8.jpg', 'KY Buka Pendaftaran 10 Calon Hakim dan 3 Calon Hakim ad hoc HAM', 'Jakarta (Komisi Yudisial) - Komisi Yudisial (KY) membuka pendaftaran untuk calon hakim agung dan calon hakim ad hoc Hak Asasi Manusia (HAM) di Mahkamah Agung (MA) tahun 2024.', 'Ericha', '2024-09-28 00:12:23', '2024-09-28 00:12:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_ppid`
--

CREATE TABLE `berita_ppid` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sampul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodatas`
--

CREATE TABLE `biodatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_lengkap` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_depan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_belakang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `biodatas`
--

INSERT INTO `biodatas` (`id`, `foto`, `ktp`, `user_id`, `nama_lengkap`, `nama_depan`, `nama_belakang`, `nik`, `email`, `telp`, `jenis_kelamin`, `alamat`, `tanggal_lahir`, `ttl`, `created_at`, `updated_at`) VALUES
(1, 'foto_user/1727453533.png', 'ktp_user/1727453533.png', 1, 'PPID Kota Surakarta', 'PPID', 'Kota Surakarta', '3312176110010002', NULL, '02712931669', 'Perempuan', 'CRJH+2VW, Jl. Jend. Sudirman, Kedung Lumbu, Kec. Ps. Kliwon, Kota Surakarta, Jawa Tengah 57133.', '2001-10-21', 'Surakarta', '2024-09-27 16:12:13', '2024-09-27 16:12:13'),
(2, 'foto_user/1727453742.png', 'ktp_user/1727453742.png', 2, 'Erichalfn', 'Ericha', 'lfn', '3312176110010002', NULL, '086425689754', 'Perempuan', 'Wonogiri', '2001-10-21', 'Wonogiri', '2024-09-27 16:15:42', '2024-09-27 16:15:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_informasi`
--

CREATE TABLE `daftar_informasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ringkasan_informasi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_informasi_publiks`
--

CREATE TABLE `daftar_informasi_publiks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_info_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rincian_jenis_info_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ringkasan_informasi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pejabat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_pembuatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bentuk_informasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jangka_waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_media` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembagian_informasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_chats`
--

CREATE TABLE `detail_chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_daftar_informasis`
--

CREATE TABLE `detail_daftar_informasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ringkasan_informasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pejabat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bentuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jangka_waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_media` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_informasi_publiks`
--

CREATE TABLE `file_informasi_publiks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `informasi_publik_id` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_sengketas`
--

CREATE TABLE `form_sengketas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` date NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap_kuasa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_kuasa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_telepon_kuasa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_badan_publik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_badan_publik` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `informasi_yang_dimohon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban_atas_permohonan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_keberatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggapan_atas_keberatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_pengajuan_keberatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tuntutan_permohonan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_pengajuan_keberatan_dokumen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanda_bukti_pengajuan_permohonan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanda_bukti_pengajuan_keberatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oleh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi_dikecualikan`
--

CREATE TABLE `informasi_dikecualikan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pembagian_informasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_informasi`
--

CREATE TABLE `jenis_informasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembagian_informasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `judul`
--

CREATE TABLE `judul` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karakter_kota`
--

CREATE TABLE `karakter_kota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karakter_kota`
--

INSERT INTO `karakter_kota` (`id`, `kategori`, `deskripsi`, `penerbit`, `created_at`, `updated_at`) VALUES
(1, 'TANGGUH', 'menegaskan karakter kota dan warga yang memiliki daya tahan tinggi, dan segera bangkit dari dampak negatif pandemi COVID-19, baik dalam dimensi sosial maupun dampak ekonominya. Semangat kebangkitan ini, digerakkan dari alas semangat kesetiakawanan, gotong royong warga yang dipandu Pemerintah Kota Surakarta, dan selanjutnya menjadi pembelajaran bersama untuk menentukan respon yang tangguh untuk menghadapi tantangan dan ancaman di masa mendatang.', 'Ericha', '2024-09-27 21:57:41', '2024-09-27 21:57:41'),
(2, 'GESIT', 'adalah karakter pelayanan pemerintahan yang sigap membaca perubahan dan kreativitas warga, dengan menyesuaikan pola kerja dan pola pelayanan serta reformasi birokrasi. Pemerintahan yang gesit akan memungkinkan dampak dari lompatan-lompatan yang terjadi dapat dinikmati seluruh warga Kota Surakarta.', 'Ericha', '2024-09-27 21:58:35', '2024-09-27 21:58:35'),
(3, 'KREATIF', 'adalah karakter kota dan warga dalam menciptakan solusi atas permasalahan bersama, dan membangun peluang-peluang usaha dari sumber daya bersama di Surakarta. Pengembangan kreativitas warga memanfaatkan energi para pemuda dan pemudi Surakarta yang kini telah berkontribusi dalam membangun landasan lompatan maju kota.', 'Ericha', '2024-09-27 21:58:58', '2024-09-27 21:58:58'),
(4, 'SEJAHTERA', 'adalah upaya untuk memperluas dan memperdalam landasan “Waras-Wasis-Wareg-Mapan-Papan” (3WMP) yang telah dicapai dari tahap pembangunan Kota Surakarta periode 2016–2021. Dengan menjaga dan meningkatkan kesejahteraan umum, Surakarta terus berupaya memastikan kelanggengannya sebagai kota modern berbasis warisan budaya di abad 21.', 'Ericha', '2024-09-27 21:59:15', '2024-09-27 21:59:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pembagian_informasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_keuangan`
--

CREATE TABLE `laporan_keuangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporan_keuangan`
--

INSERT INTO `laporan_keuangan` (`id`, `judul`, `deskripsi`, `tahun`, `penerbit`, `sampul`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Laporan Keuangan Pemerintah Kota Surakarta', 'Dokumen Laporan keuangan Pemerintah Kota Surakarta', 2019, 'Ericha', 'upload/1727480923_Pelaporan-keuangan.jpg', 'upload/1727480923_contoh.pdf', '2024-09-27 23:48:43', '2024-09-27 23:48:43'),
(2, 'Laporan Keuangan Pemerintah Kota Surakartaaaa', 'Dokumen Laporan keuangan Pemerintah Kota Surakarta', 2020, 'Ericha', 'upload/1727480962_KUALITAS-LAPORAN-KEUANGAN_Winna-Roswinna-rev-1.0-depan.jpg', 'upload/1727480962_contoh.pdf', '2024-09-27 23:49:22', '2024-09-27 23:49:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_kinerja`
--

CREATE TABLE `laporan_kinerja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporan_kinerja`
--

INSERT INTO `laporan_kinerja` (`id`, `keterangan`, `tahun`, `penerbit`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Laporan Kinerja Instansi Pemerintah', 2019, 'Ericha', 'upload/1727480988_contoh.pdf', '2024-09-27 23:49:48', '2024-09-27 23:49:48'),
(2, 'Laporan Kinerja Instansi Pemerintah', 2020, 'Ericha', 'upload/1727481106_contoh.pdf', '2024-09-27 23:51:46', '2024-09-27 23:51:46'),
(3, 'Laporan Kinerja Instansi Pemerintah', 2021, 'Ericha', 'upload/1727481120_contoh.pdf', '2024-09-27 23:52:00', '2024-09-27 23:52:00'),
(4, 'Laporan Penyelenggaraan Pemerintah', 2022, 'Ericha', 'upload/1727481140_contoh.pdf', '2024-09-27 23:52:20', '2024-09-27 23:52:20'),
(5, 'Laporan Kinerja Instansi Pemerintah', 2023, 'Ericha', 'upload/1727481164_contoh.pdf', '2024-09-27 23:52:44', '2024-09-27 23:52:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_penyelenggaraan`
--

CREATE TABLE `laporan_penyelenggaraan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporan_penyelenggaraan`
--

INSERT INTO `laporan_penyelenggaraan` (`id`, `keterangan`, `tahun`, `penerbit`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Laporan Penyelenggaraan Pemerintah', 2019, 'Ericha', 'upload/1727481010_contoh.pdf', '2024-09-27 23:50:10', '2024-09-27 23:50:10'),
(2, 'Laporan Penyelenggaraan Pemerintah', 2020, 'Ericha', 'upload/1727481023_contoh.pdf', '2024-09-27 23:50:23', '2024-09-27 23:50:23'),
(3, 'Laporan Penyelenggaraan Pemerintah', 2021, 'Ericha', 'upload/1727481042_contoh.pdf', '2024-09-27 23:50:42', '2024-09-27 23:50:42'),
(4, 'Laporan Penyelenggaraan Pemerintah', 2022, 'Ericha', 'upload/1727481058_contoh.pdf', '2024-09-27 23:50:58', '2024-09-27 23:50:58'),
(5, 'Laporan Penyelenggaraan Pemerintah', 2023, 'Ericha', 'upload/1727481076_contoh.pdf', '2024-09-27 23:51:16', '2024-09-27 23:51:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_ppid`
--

CREATE TABLE `laporan_ppid` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sampul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `maklumat_pelayanans`
--

CREATE TABLE `maklumat_pelayanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `maklumat_pelayanan_lists`
--

CREATE TABLE `maklumat_pelayanan_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urutan` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_04_15_004733_create_jenis_informasi_table', 1),
(7, '2024_04_15_004746_create_rincian_jenis_informasi_table', 1),
(8, '2024_04_15_004747_create_pejabat_table', 1),
(9, '2024_04_15_004748_create_daftar_informasi_publiks_table', 1),
(10, '2024_04_15_174152_create_kategori_table', 1),
(11, '2024_04_15_174200_create_judul_table', 1),
(12, '2024_04_15_174210_create_daftar_informasi_table', 1),
(13, '2024_04_15_174235_create_informasi_dikecualikan_table', 1),
(14, '2024_05_24_132817_create_berita_kominfo_table', 1),
(15, '2024_05_24_132817_create_berita_ppid_table', 1),
(16, '2024_05_24_132818_create_galeri_table', 1),
(17, '2024_05_24_132818_create_laporan_ppid_table', 1),
(18, '2024_06_09_134137_create_ulasans_table', 1),
(19, '2024_06_10_114532_create_chats_table', 1),
(20, '2024_06_10_114540_create_detail_chats_table', 1),
(21, '2024_06_14_114106_create_biodatas_table', 1),
(22, '2024_07_08_054747_create_maklumat_pelayanans_table', 1),
(23, '2024_07_08_054936_create_maklumat_pelayanan_lists_table', 1),
(24, '2024_07_08_055715_create_profil_ppid_dasar_hukums_table', 1),
(25, '2024_07_08_055723_create_profil_ppid_generals_table', 1),
(26, '2024_07_08_055733_create_profil_ppid_struktur_organisasis_table', 1),
(27, '2024_07_08_055752_create_profil_ppid_tugas_tanggungjawabs_table', 1),
(28, '2024_07_08_055759_create_profil_ppid_visi_misis_table', 1),
(29, '2024_07_09_001223_create_file_informasi_publiks_table', 1),
(30, '2024_07_09_043918_create_detail_daftar_informasis_table', 1),
(31, '2024_07_19_154907_create_form_sengketas_table', 1),
(32, '2024_08_13_200341_create_permohonan_table', 1),
(33, '2024_08_15_092302_create_status_layanan_informasi_table', 1),
(34, '2024_08_15_214640_create_permohonan_keberatan_table', 1),
(35, '2024_08_15_221914_create_status_keberatan_table', 1),
(36, '2024_08_16_103626_create_permohonan_sengketa_table', 1),
(37, '2024_08_16_105526_create_status_penyelesaian_sengketa_table', 1),
(38, '2024_09_27_230545_create_notification_table', 1),
(39, '2024_09_28_033645_create_profil_pemerintah_table', 2),
(40, '2024_09_28_033721_create_karakter_kota_table', 2),
(41, '2024_09_28_033736_create_misi_pemerintah_table', 2),
(42, '2024_09_28_033757_create_walikota_pemerintah_table', 2),
(43, '2024_09_28_033839_create_posisi_walikota_table', 2),
(44, '2024_09_28_033923_create_pendidikan_walikota_table', 2),
(45, '2024_09_28_033935_create_wakil_walikota_table', 2),
(46, '2024_09_28_033953_create_pendidikan_wakil_table', 2),
(47, '2024_09_28_034004_create_pekerjaan_wakil_table', 2),
(48, '2024_09_28_034017_create_sekretaris_pemerintah_table', 2),
(49, '2024_09_28_034029_create_pekerjaan_sekretaris_table', 2),
(50, '2024_09_28_034041_create_pendidikan_sekretaris_table', 2),
(51, '2024_09_28_063948_create_laporan_keuangan_table', 3),
(52, '2024_09_28_063956_create_laporan_kinerja_table', 3),
(53, '2024_09_28_064007_create_laporan_penyelenggaraan_table', 3),
(54, '2024_09_28_070027_create_berita_pemerintah_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `misi_pemerintah`
--

CREATE TABLE `misi_pemerintah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urutan` int(11) NOT NULL,
  `misi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `misi_pemerintah`
--

INSERT INTO `misi_pemerintah` (`id`, `urutan`, `misi`, `penerbit`, `created_at`, `updated_at`) VALUES
(1, 1, 'Meningkatkan kualitas kesehatan masyarakat yang berkelanjutan.', 'Ericha', '2024-09-27 21:20:05', '2024-09-27 22:06:12'),
(2, 2, 'Memperkuat pertumbuhan ekonomi yang adaptif dan berkelanjutan', 'Ericha', '2024-09-27 22:06:31', '2024-09-27 22:06:31'),
(3, 3, 'Mewujudkan tata ruang dan infrastruktur kota yang mendukung pemajuan kebudayaan dan pariwisata berkelanjutan.', 'Ericha', '2024-09-27 22:06:46', '2024-09-27 22:06:46'),
(4, 4, 'Meningkatkan kualitas dan daya saing pemuda dan masyarakat umum, di bidang pendidikan, ekonomi, seni budaya, dan olahraga.', 'Ericha', '2024-09-27 22:07:02', '2024-09-27 22:07:02'),
(5, 5, 'Mengembangkan tata kelola pemerintahan dan pelayanan publik yang gesit dan kolaboratif berlandaskan semangat gotong royong dan kebinekaan.', 'Ericha', '2024-09-27 22:07:17', '2024-09-27 22:07:17'),
(6, 6, 'Mewujudkan kemakmuran dan kesejahteraan bersama warga kota yang berkeadilan dan inklusif.', 'Ericha', '2024-09-27 22:07:33', '2024-09-27 22:07:33'),
(7, 7, 'Mewujudkan daerah yang kondusif dan kerukunan antar umat beragama dalam tata kehidupan bermasyarakat yang saling menghormati.', 'Ericha', '2024-09-27 22:07:52', '2024-09-27 22:07:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `title`, `message`, `read_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Status Pengajuan Berhasil', 'Pengajuan dengan ID 1 telah berhasil terkirim, dan sedang dalam proses.', '2024-09-27 16:27:23', '2024-09-27 16:25:07', '2024-09-27 16:27:47', '2024-09-27 16:27:47'),
(2, 2, 'Proses Verifikasi', 'Pengajuan dengan ID 1 dalam proses verifikasi oleh admin. Tunggu Dalam waktu 3 hari, laporan Anda akan diverifikasi.', '2024-09-27 16:27:35', '2024-09-27 16:25:09', '2024-09-27 16:27:35', NULL),
(3, 2, 'Status Pengajuan Berhasil', 'Pengajuan dengan ID 2 telah berhasil terkirim, dan sedang dalam proses.', '2024-09-27 19:14:47', '2024-09-27 16:25:58', '2024-09-27 19:14:47', NULL),
(4, 2, 'Proses Verifikasi', 'Pengajuan dengan ID 2 dalam proses verifikasi oleh admin. Tunggu Dalam waktu 3 hari, laporan Anda akan diverifikasi.', '2024-09-27 19:14:52', '2024-09-27 16:25:59', '2024-09-27 19:14:52', NULL),
(5, 2, 'Status Pengajuan', 'Pengajuan dengan kode 1921b339-cf19-4a0d-b368-bf63167c439c telah disetujui.', '2024-09-27 19:14:56', '2024-09-27 16:29:12', '2024-09-27 19:14:56', NULL),
(6, 2, 'Status Pengajuan Berhasil', 'Pengajuan dengan ID 3 telah berhasil terkirim, dan sedang dalam proses.', '2024-09-27 19:14:59', '2024-09-27 17:22:07', '2024-09-27 19:14:59', NULL),
(7, 2, 'Proses Verifikasi', 'Pengajuan dengan ID 3 dalam proses verifikasi oleh admin. Tunggu Dalam waktu 3 hari, laporan Anda akan diverifikasi.', '2024-09-27 19:15:02', '2024-09-27 17:22:09', '2024-09-27 19:15:02', NULL),
(8, 2, 'Status Pengajuan', 'Pengajuan dengan kode 3b83390f-40b7-40ba-8fa0-4b740ac49ad8 telah ditolak, untuk selengkapnya silahkan cek email anda.', NULL, '2024-09-27 17:24:02', '2024-09-27 17:24:02', NULL),
(9, 2, 'Status Pengajuan', 'Pengajuan dengan kode 6051f1e2-669d-4086-87a8-27d64efa8111 telah ditolak, untuk selengkapnya silahkan cek email anda.', NULL, '2024-09-27 18:35:54', '2024-09-27 18:35:54', NULL),
(10, 2, 'Status Pengajuan Keberatan Berhasil', 'Pengajuan Keberatan dengan ID 1 telah berhasil terkirim, dan sedang dalam proses.', NULL, '2024-09-27 18:46:56', '2024-09-27 18:46:56', NULL),
(11, 2, 'Proses Verifikasi', 'Pengajuan Keberatan dengan ID 1 dalam proses verifikasi oleh admin. Tunggu Dalam waktu 3 hari, laporan Anda akan diverifikasi.', NULL, '2024-09-27 18:46:58', '2024-09-27 18:46:58', NULL),
(12, 2, 'Status Pengajuan Berhasil', 'Pengajuan dengan ID 4 telah berhasil terkirim, dan sedang dalam proses.', NULL, '2024-09-27 18:59:30', '2024-09-27 18:59:30', NULL),
(13, 2, 'Proses Verifikasi', 'Pengajuan dengan ID 4 dalam proses verifikasi oleh admin. Tunggu Dalam waktu 3 hari, laporan Anda akan diverifikasi.', NULL, '2024-09-27 18:59:32', '2024-09-27 18:59:32', NULL),
(14, 2, 'Status Pengajuan Keberatan', 'Pengajuan Keberatan Anda dengan kode 6051f1e2-669d-4086-87a8-27d64efa8111 telah ditolak. Silakan cek email Anda untuk informasi lebih lanjut.', NULL, '2024-09-27 19:16:06', '2024-09-27 19:16:06', NULL),
(15, 2, 'Pengajuan Penyelesaian Sengketa', 'Pengajuan Penyelesaian Sengketa dengan ID 2 telah berhasil terkirim, dan sedang dalam proses.', NULL, '2024-09-27 19:19:48', '2024-09-27 19:19:48', NULL),
(16, 2, 'Proses Verifikasi', 'Pengajuan Penyelesaian Sengketa dengan ID 2 dalam proses verifikasi oleh admin. Tunggu Dalam waktu 3 hari, laporan Anda akan diverifikasi.', NULL, '2024-09-27 19:19:50', '2024-09-27 19:19:50', NULL),
(17, 2, 'Status Pengajuan', 'Pengajuan dengan kode 6bc19fb0-fab9-4ae9-bed5-10a95ea8d328 telah disetujui.', NULL, '2024-09-27 19:36:33', '2024-09-27 19:36:33', NULL),
(18, 2, 'Status Pengajuan Penyelesaian Sengketa', 'Pengajuan Penyelesaian Sengketa Anda dengan kode  telah disetujui.', NULL, '2024-09-27 19:37:52', '2024-09-27 19:37:52', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pejabat`
--

CREATE TABLE `pejabat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan_sekretaris`
--

CREATE TABLE `pekerjaan_sekretaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `masa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pekerjaan_sekretaris`
--

INSERT INTO `pekerjaan_sekretaris` (`id`, `masa`, `jabatan`, `deskripsi`, `penerbit`, `created_at`, `updated_at`) VALUES
(1, '1990 - 1993', 'Staff', 'Menjabat sebagai Staf Sie Tata Ruang & Tata Guna Tanah Bappeda Kodya Surakarta pada tahun 1990 sampai 1993', 'Ericha', '2024-09-27 23:02:00', '2024-09-27 23:02:00'),
(2, '1993 - 1997', 'Kasie', 'Menjabat sebagai Kasie Perhubungan dan Pariwisata Bappeda Kodya Surakarta pada tahun 1993 sampai 1997', 'Ericha', '2024-09-27 23:02:41', '2024-09-27 23:02:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan_wakil`
--

CREATE TABLE `pekerjaan_wakil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `masa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pekerjaan_wakil`
--

INSERT INTO `pekerjaan_wakil` (`id`, `masa`, `jabatan`, `deskripsi`, `penerbit`, `created_at`, `updated_at`) VALUES
(1, '1986 - 2009', 'SMK Bhineka Karya', 'Menjadi Guru Olahraga di SMK Bhineka Karya pada tahun 1986 - 2009.', 'Ericha', '2024-09-27 22:36:17', '2024-09-27 22:36:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan_sekretaris`
--

CREATE TABLE `pendidikan_sekretaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenjang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendidikan_sekretaris`
--

INSERT INTO `pendidikan_sekretaris` (`id`, `jenjang`, `pendidikan`, `deskripsi`, `penerbit`, `created_at`, `updated_at`) VALUES
(1, 'SD', 'SD Muhammadiyah III Nusukan', 'Lulus pada tahun 1975', 'Ericha', '2024-09-27 22:58:32', '2024-09-27 22:58:32'),
(2, 'SMP', 'SMP AL ISLAM 1 Surakarta', 'Lulus pada tahun 1979', 'Ericha', '2024-09-27 22:59:02', '2024-09-27 22:59:02'),
(3, 'SMA', 'SMAN II Surakarta', 'Lulus pada tahun 1982', 'Ericha', '2024-09-27 22:59:24', '2024-09-27 22:59:24'),
(4, 'S1', 'Universitas Sebelas Maret', 'S1 Teknik Arsitektur Universitas Sebelas Maret (UNS) lulus pada tahun 1988', 'Ericha', '2024-09-27 22:59:57', '2024-09-27 22:59:57'),
(5, 'S2', 'Erasmus Universiteit Rotterdam Belanda', 'S2 Manajemen Perkotaan IHS Lulus pada tahun 2000', 'Ericha', '2024-09-27 23:00:20', '2024-09-27 23:00:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan_wakil`
--

CREATE TABLE `pendidikan_wakil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenjang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendidikan_wakil`
--

INSERT INTO `pendidikan_wakil` (`id`, `jenjang`, `pendidikan`, `deskripsi`, `penerbit`, `created_at`, `updated_at`) VALUES
(1, 'SD', 'SD Kasatriyan Surakartaa', NULL, 'Ericha', '2024-09-27 22:32:45', '2024-09-27 22:32:45'),
(2, 'SMP', 'SMP Kasatriyan Surakarta', NULL, 'Ericha', '2024-09-27 22:32:57', '2024-09-27 22:32:57'),
(3, 'SMA', 'SMA Negeri 4 Surakarta', NULL, 'Ericha', '2024-09-27 22:33:18', '2024-09-27 22:33:18'),
(4, 'S1', 'Universitas Sebelas Maret', 'Fakultas Pendidikan Olahraga dan Kesehatan UNS', 'Ericha', '2024-09-27 22:33:42', '2024-09-27 22:33:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan_walikota`
--

CREATE TABLE `pendidikan_walikota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan`
--

CREATE TABLE `permohonan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kodepermohonan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kategoripermohonan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomortelepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploadsurat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rincianinformasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuaninformasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mendapatkansalinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caramendapatkansalinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses',
  `tahapan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_stage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permohonan`
--

INSERT INTO `permohonan` (`id`, `kodepermohonan`, `user_id`, `kategoripermohonan`, `nik`, `nama`, `ktp`, `alamat`, `email`, `nomortelepon`, `pekerjaan`, `uploadsurat`, `rincianinformasi`, `tujuaninformasi`, `mendapatkansalinan`, `caramendapatkansalinan`, `status`, `tahapan`, `current_stage`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, '6051f1e2-669d-4086-87a8-27d64efa8111', 2, 'Perorangan', '3312176110010002', 'Erichalfn', 'default/path/to/ktp', 'Wonogiri', 'fndyaerial@gmail.com', '086425689754', 'Mahasiswa', NULL, 'Deskripsi', 'Tujuan', 'Softcopy', 'Email', 'Ditolak', NULL, 'Ditolak', NULL, '2024-09-27 16:25:03', '2024-09-27 18:35:54'),
(2, '1921b339-cf19-4a0d-b368-bf63167c439c', 2, 'Lembaga/organisasi', '3312176110010002', 'Erichalfn', 'default/path/to/ktp', 'Wonogiri', 'fndyaerial@gmail.com', '086425689754', 'Mahasiswa', '1727454353_contoh.pdf', 'Example', 'Example', 'Softcopy', 'Email', 'Disetujui', NULL, 'Proses Verifikasi', NULL, '2024-09-27 16:25:53', '2024-09-27 16:29:12'),
(3, '3b83390f-40b7-40ba-8fa0-4b740ac49ad8', 2, 'Perorangan', '3312176110010002', 'Erichalfn', 'default/path/to/ktp', 'Wonogiri', 'fndyaerial@gmail.com', '086425689754', 'Mahasiswa', NULL, 'Deskripsi', 'Tujuan', 'Softcopy', 'Email', 'Ditolak', NULL, 'Ditolak', NULL, '2024-09-27 17:22:03', '2024-09-27 17:24:02'),
(4, '6bc19fb0-fab9-4ae9-bed5-10a95ea8d328', 2, 'Perorangan', '3312176110010002', 'Erichalfn', 'default/path/to/ktp', 'Wonogiri', 'fndyaerial@gmail.com', '086425689754', 'Swasta', NULL, 'jj', 'ss', 'Softcopy', 'Email', 'Disetujui', NULL, 'Proses Verifikasi', NULL, '2024-09-27 18:59:27', '2024-09-27 19:36:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_keberatan`
--

CREATE TABLE `permohonan_keberatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kodepermohonan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_pengajuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomortelepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kasusposisi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploadsuratkeberatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses',
  `tahapan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_stage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permohonan_keberatan`
--

INSERT INTO `permohonan_keberatan` (`id`, `user_id`, `kodepermohonan`, `nik`, `alasan_pengajuan`, `nama`, `nomortelepon`, `email`, `alamat`, `kasusposisi`, `uploadsuratkeberatan`, `status`, `tahapan`, `current_stage`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, 2, '6051f1e2-669d-4086-87a8-27d64efa8111', '3312176110010002', 'Tidak ditanggapinya permintaan informasi', 'Erichalfn', '086425689754', 'fndyaerial@gmail.com', 'Wonogiri', 'nnn', '1727462812_contoh.pdf', 'Ditolak', NULL, 'Ditolak', NULL, '2024-09-27 18:46:52', '2024-09-27 19:16:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_sengketa`
--

CREATE TABLE `permohonan_sengketa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomortelepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_sengketa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuntutanpemohon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses',
  `tahapan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_stage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permohonan_sengketa`
--

INSERT INTO `permohonan_sengketa` (`id`, `user_id`, `nama`, `ttl`, `nik`, `ktp`, `alamat`, `email`, `nomortelepon`, `pekerjaan`, `alasan_sengketa`, `tuntutanpemohon`, `status`, `tahapan`, `current_stage`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, 2, 'Erichalfn', '2001-10-21', '3312176110010002', 'default/path/to/ktp', 'Wonogiri', 'fndyaerial@gmail.com', '086425689754', 'Mahasiswa', 'Penolakan atas permintaan informasi berdasarkan alasan pengecualian sebagaimana dimaksud dalam Pasal 17 UU No. 14 Tahun 2008', 'jbb', 'Disetujui', NULL, 'Proses Verifikasi', NULL, '2024-09-27 19:18:56', '2024-09-27 19:37:52'),
(2, 2, 'Erichalfn', '2001-10-21', '3312176110010002', 'default/path/to/ktp', 'Wonogiri', 'fndyaerial@gmail.com', '086425689754', 'Mahasiswa', 'Penolakan atas permintaan informasi berdasarkan alasan pengecualian sebagaimana dimaksud dalam Pasal 17 UU No. 14 Tahun 2008', 'jbb', 'Proses', NULL, NULL, NULL, '2024-09-27 19:19:43', '2024-09-27 19:19:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi_walikota`
--

CREATE TABLE `posisi_walikota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_pemerintah`
--

CREATE TABLE `profil_pemerintah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_visi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_misi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_ppid_dasar_hukums`
--

CREATE TABLE `profil_ppid_dasar_hukums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_ppid_generals`
--

CREATE TABLE `profil_ppid_generals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `latar_belakang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tugas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `motto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_profil` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_ppid_struktur_organisasis`
--

CREATE TABLE `profil_ppid_struktur_organisasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_ppid_tugas_tanggungjawabs`
--

CREATE TABLE `profil_ppid_tugas_tanggungjawabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_ppid_visi_misis`
--

CREATE TABLE `profil_ppid_visi_misis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urutan` int(11) NOT NULL,
  `jenis` enum('visi','misi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_jenis_informasi`
--

CREATE TABLE `rincian_jenis_informasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_info_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekretaris_pemerintah`
--

CREATE TABLE `sekretaris_pemerintah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `sampul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_keberatan`
--

CREATE TABLE `status_keberatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permohonan_keberatan_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses',
  `alasan_penolakan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_keberatan`
--

INSERT INTO `status_keberatan` (`id`, `permohonan_keberatan_id`, `status`, `alasan_penolakan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Proses', NULL, '2024-09-27 18:46:58', '2024-09-27 18:46:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_layanan_informasi`
--

CREATE TABLE `status_layanan_informasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permohonan_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses',
  `alasan_penolakan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_layanan_informasi`
--

INSERT INTO `status_layanan_informasi` (`id`, `permohonan_id`, `status`, `alasan_penolakan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Proses', NULL, '2024-09-27 16:25:09', '2024-09-27 16:25:09'),
(2, 2, 'Proses', NULL, '2024-09-27 16:25:59', '2024-09-27 16:25:59'),
(3, 3, 'Proses', NULL, '2024-09-27 17:22:09', '2024-09-27 17:22:09'),
(4, 4, 'Proses', NULL, '2024-09-27 18:59:32', '2024-09-27 18:59:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_penyelesaian_sengketa`
--

CREATE TABLE `status_penyelesaian_sengketa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permohonan_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses',
  `alasan_penolakan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_penyelesaian_sengketa`
--

INSERT INTO `status_penyelesaian_sengketa` (`id`, `permohonan_id`, `status`, `alasan_penolakan`, `created_at`, `updated_at`) VALUES
(1, 2, 'Proses', NULL, '2024-09-27 19:19:50', '2024-09-27 19:19:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasans`
--

CREATE TABLE `ulasans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ulasan_nama` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ulasan_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ulasan_isi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ulasan_rating` int(11) DEFAULT NULL,
  `ulasan_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'terverifikasi',
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `roles`, `status`, `foto`, `ktp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'PPID Kota Surakarta', 'ppidexample1@gmail.com', NULL, '$2y$10$m4v7NMuhYeMe3vX/Y5j3JO.xA3qvp6AacPNaqc0STHkBdQ.az7Qcy', 'admin', 'terverifikasi', 'foto_user/1727453533.png', 'ktp_user/1727453533.png', NULL, '2024-09-27 16:09:15', '2024-09-27 16:19:35'),
(2, 'Erichalfn', 'fndyaerial@gmail.com', NULL, '$2y$10$c6silxSuq/dGcLKjKSWX8.RYOQZSxRfXo4TBUMTWYrOOApClpiJNG', 'user', 'terverifikasi', 'foto_user/1727453742.png', 'ktp_user/1727453742.png', NULL, '2024-09-27 16:13:47', '2024-09-27 16:20:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wakil_walikota`
--

CREATE TABLE `wakil_walikota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `sampul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `walikota_pemerintah`
--

CREATE TABLE `walikota_pemerintah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampulutama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sampul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita_kominfo`
--
ALTER TABLE `berita_kominfo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita_pemerintah`
--
ALTER TABLE `berita_pemerintah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita_ppid`
--
ALTER TABLE `berita_ppid`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `biodatas`
--
ALTER TABLE `biodatas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_informasi`
--
ALTER TABLE `daftar_informasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daftar_informasi_judul_id_foreign` (`judul_id`);

--
-- Indeks untuk tabel `daftar_informasi_publiks`
--
ALTER TABLE `daftar_informasi_publiks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daftar_informasi_publiks_jenis_info_id_foreign` (`jenis_info_id`),
  ADD KEY `daftar_informasi_publiks_rincian_jenis_info_id_foreign` (`rincian_jenis_info_id`),
  ADD KEY `daftar_informasi_publiks_pejabat_id_foreign` (`pejabat_id`);

--
-- Indeks untuk tabel `detail_chats`
--
ALTER TABLE `detail_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_daftar_informasis`
--
ALTER TABLE `detail_daftar_informasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `file_informasi_publiks`
--
ALTER TABLE `file_informasi_publiks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_sengketas`
--
ALTER TABLE `form_sengketas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `informasi_dikecualikan`
--
ALTER TABLE `informasi_dikecualikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_informasi`
--
ALTER TABLE `jenis_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `judul`
--
ALTER TABLE `judul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judul_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `karakter_kota`
--
ALTER TABLE `karakter_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_kinerja`
--
ALTER TABLE `laporan_kinerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_penyelenggaraan`
--
ALTER TABLE `laporan_penyelenggaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_ppid`
--
ALTER TABLE `laporan_ppid`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `maklumat_pelayanans`
--
ALTER TABLE `maklumat_pelayanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `maklumat_pelayanan_lists`
--
ALTER TABLE `maklumat_pelayanan_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `misi_pemerintah`
--
ALTER TABLE `misi_pemerintah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pejabat`
--
ALTER TABLE `pejabat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pekerjaan_sekretaris`
--
ALTER TABLE `pekerjaan_sekretaris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pekerjaan_wakil`
--
ALTER TABLE `pekerjaan_wakil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendidikan_sekretaris`
--
ALTER TABLE `pendidikan_sekretaris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendidikan_wakil`
--
ALTER TABLE `pendidikan_wakil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendidikan_walikota`
--
ALTER TABLE `pendidikan_walikota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permohonan_kodepermohonan_unique` (`kodepermohonan`),
  ADD KEY `permohonan_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `permohonan_keberatan`
--
ALTER TABLE `permohonan_keberatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permohonan_keberatan_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `permohonan_sengketa`
--
ALTER TABLE `permohonan_sengketa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permohonan_sengketa_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `posisi_walikota`
--
ALTER TABLE `posisi_walikota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil_pemerintah`
--
ALTER TABLE `profil_pemerintah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil_ppid_dasar_hukums`
--
ALTER TABLE `profil_ppid_dasar_hukums`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil_ppid_generals`
--
ALTER TABLE `profil_ppid_generals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil_ppid_struktur_organisasis`
--
ALTER TABLE `profil_ppid_struktur_organisasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil_ppid_tugas_tanggungjawabs`
--
ALTER TABLE `profil_ppid_tugas_tanggungjawabs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil_ppid_visi_misis`
--
ALTER TABLE `profil_ppid_visi_misis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rincian_jenis_informasi`
--
ALTER TABLE `rincian_jenis_informasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rincian_jenis_informasi_jenis_info_id_foreign` (`jenis_info_id`);

--
-- Indeks untuk tabel `sekretaris_pemerintah`
--
ALTER TABLE `sekretaris_pemerintah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_keberatan`
--
ALTER TABLE `status_keberatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_keberatan_permohonan_keberatan_id_foreign` (`permohonan_keberatan_id`);

--
-- Indeks untuk tabel `status_layanan_informasi`
--
ALTER TABLE `status_layanan_informasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_layanan_informasi_permohonan_id_foreign` (`permohonan_id`);

--
-- Indeks untuk tabel `status_penyelesaian_sengketa`
--
ALTER TABLE `status_penyelesaian_sengketa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_penyelesaian_sengketa_permohonan_id_foreign` (`permohonan_id`);

--
-- Indeks untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wakil_walikota`
--
ALTER TABLE `wakil_walikota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `walikota_pemerintah`
--
ALTER TABLE `walikota_pemerintah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita_kominfo`
--
ALTER TABLE `berita_kominfo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `berita_pemerintah`
--
ALTER TABLE `berita_pemerintah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `berita_ppid`
--
ALTER TABLE `berita_ppid`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `biodatas`
--
ALTER TABLE `biodatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `daftar_informasi`
--
ALTER TABLE `daftar_informasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `daftar_informasi_publiks`
--
ALTER TABLE `daftar_informasi_publiks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_chats`
--
ALTER TABLE `detail_chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_daftar_informasis`
--
ALTER TABLE `detail_daftar_informasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `file_informasi_publiks`
--
ALTER TABLE `file_informasi_publiks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_sengketas`
--
ALTER TABLE `form_sengketas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `informasi_dikecualikan`
--
ALTER TABLE `informasi_dikecualikan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_informasi`
--
ALTER TABLE `jenis_informasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `judul`
--
ALTER TABLE `judul`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karakter_kota`
--
ALTER TABLE `karakter_kota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `laporan_kinerja`
--
ALTER TABLE `laporan_kinerja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `laporan_penyelenggaraan`
--
ALTER TABLE `laporan_penyelenggaraan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `laporan_ppid`
--
ALTER TABLE `laporan_ppid`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `maklumat_pelayanans`
--
ALTER TABLE `maklumat_pelayanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `maklumat_pelayanan_lists`
--
ALTER TABLE `maklumat_pelayanan_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `misi_pemerintah`
--
ALTER TABLE `misi_pemerintah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan_sekretaris`
--
ALTER TABLE `pekerjaan_sekretaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan_wakil`
--
ALTER TABLE `pekerjaan_wakil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pendidikan_sekretaris`
--
ALTER TABLE `pendidikan_sekretaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pendidikan_wakil`
--
ALTER TABLE `pendidikan_wakil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pendidikan_walikota`
--
ALTER TABLE `pendidikan_walikota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `permohonan_keberatan`
--
ALTER TABLE `permohonan_keberatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `permohonan_sengketa`
--
ALTER TABLE `permohonan_sengketa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posisi_walikota`
--
ALTER TABLE `posisi_walikota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profil_pemerintah`
--
ALTER TABLE `profil_pemerintah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profil_ppid_dasar_hukums`
--
ALTER TABLE `profil_ppid_dasar_hukums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profil_ppid_generals`
--
ALTER TABLE `profil_ppid_generals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profil_ppid_struktur_organisasis`
--
ALTER TABLE `profil_ppid_struktur_organisasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profil_ppid_tugas_tanggungjawabs`
--
ALTER TABLE `profil_ppid_tugas_tanggungjawabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profil_ppid_visi_misis`
--
ALTER TABLE `profil_ppid_visi_misis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rincian_jenis_informasi`
--
ALTER TABLE `rincian_jenis_informasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sekretaris_pemerintah`
--
ALTER TABLE `sekretaris_pemerintah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `status_keberatan`
--
ALTER TABLE `status_keberatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `status_layanan_informasi`
--
ALTER TABLE `status_layanan_informasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `status_penyelesaian_sengketa`
--
ALTER TABLE `status_penyelesaian_sengketa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `wakil_walikota`
--
ALTER TABLE `wakil_walikota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `walikota_pemerintah`
--
ALTER TABLE `walikota_pemerintah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_informasi`
--
ALTER TABLE `daftar_informasi`
  ADD CONSTRAINT `daftar_informasi_judul_id_foreign` FOREIGN KEY (`judul_id`) REFERENCES `judul` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `daftar_informasi_publiks`
--
ALTER TABLE `daftar_informasi_publiks`
  ADD CONSTRAINT `daftar_informasi_publiks_jenis_info_id_foreign` FOREIGN KEY (`jenis_info_id`) REFERENCES `jenis_informasi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `daftar_informasi_publiks_pejabat_id_foreign` FOREIGN KEY (`pejabat_id`) REFERENCES `pejabat` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `daftar_informasi_publiks_rincian_jenis_info_id_foreign` FOREIGN KEY (`rincian_jenis_info_id`) REFERENCES `rincian_jenis_informasi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `judul`
--
ALTER TABLE `judul`
  ADD CONSTRAINT `judul_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  ADD CONSTRAINT `permohonan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permohonan_keberatan`
--
ALTER TABLE `permohonan_keberatan`
  ADD CONSTRAINT `permohonan_keberatan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permohonan_sengketa`
--
ALTER TABLE `permohonan_sengketa`
  ADD CONSTRAINT `permohonan_sengketa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rincian_jenis_informasi`
--
ALTER TABLE `rincian_jenis_informasi`
  ADD CONSTRAINT `rincian_jenis_informasi_jenis_info_id_foreign` FOREIGN KEY (`jenis_info_id`) REFERENCES `jenis_informasi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `status_keberatan`
--
ALTER TABLE `status_keberatan`
  ADD CONSTRAINT `status_keberatan_permohonan_keberatan_id_foreign` FOREIGN KEY (`permohonan_keberatan_id`) REFERENCES `permohonan_keberatan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `status_layanan_informasi`
--
ALTER TABLE `status_layanan_informasi`
  ADD CONSTRAINT `status_layanan_informasi_permohonan_id_foreign` FOREIGN KEY (`permohonan_id`) REFERENCES `permohonan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `status_penyelesaian_sengketa`
--
ALTER TABLE `status_penyelesaian_sengketa`
  ADD CONSTRAINT `status_penyelesaian_sengketa_permohonan_id_foreign` FOREIGN KEY (`permohonan_id`) REFERENCES `permohonan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
