<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BeritaPPID;
use App\Models\DaftarInformasi;
use App\Models\FileInformasiPublik;
use App\Models\LaporanPPID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $pencarian = request()->input('query');
        $jenis = request()->input('jenis');
        $tahun = request()->input('tahun');

        $beritaQuery = BeritaPPID::query();
        $laporanQuery = LaporanPPID::query();
        $daftarInformasiPublikQuery = FileInformasiPublik::query();
        $informasiBerkalaQuery = DaftarInformasi::join('judul', 'daftar_informasi.judul_id', '=', 'judul.id')->join('kategori', 'judul.kategori_id', '=', 'kategori.id');
        $informasiSertaMertaQuery = DaftarInformasi::join('judul', 'daftar_informasi.judul_id', '=', 'judul.id')->join('kategori', 'judul.kategori_id', '=', 'kategori.id');
        $informasiSetiapSaatQuery = DaftarInformasi::join('judul', 'daftar_informasi.judul_id', '=', 'judul.id')->join('kategori', 'judul.kategori_id', '=', 'kategori.id');
        $informasiDikecualikanQuery = DaftarInformasi::join('judul', 'daftar_informasi.judul_id', '=', 'judul.id')->join('kategori', 'judul.kategori_id', '=', 'kategori.id');

        if ($tahun !== 'semua') {
            $beritaQuery->whereYear('created_at', '=', $tahun);
            $laporanQuery->whereYear('created_at', '=', $tahun);
            $daftarInformasiPublikQuery->where(DB::raw('CAST(tahun AS CHAR)'), 'like', "$tahun%");
            $informasiBerkalaQuery->where(DB::raw('CAST(daftar_informasi.tahun AS CHAR)'), 'like', "$tahun%");
            $informasiSertaMertaQuery->where(DB::raw('CAST(daftar_informasi.tahun AS CHAR)'), 'like', "$tahun%");
            $informasiSetiapSaatQuery->where(DB::raw('CAST(daftar_informasi.tahun AS CHAR)'), 'like', "$tahun%");
            $informasiDikecualikanQuery->where(DB::raw('CAST(daftar_informasi.tahun AS CHAR)'), 'like', "$tahun%");
        }

        $beritaQuery->where(function ($query) use ($pencarian) {
            $query->where('judul', 'like', "%$pencarian%")
                ->orWhere('deskripsi', 'like', "%$pencarian%");
        });

        $laporanQuery->where('judul', 'like', "%$pencarian%");

        $daftarInformasiPublikQuery->where(function ($query) use ($pencarian) {
            $query->where('file', 'like', "%$pencarian%")
                ->orWhere('deskripsi', 'like', "%$pencarian%");
        });

        $informasiBerkalaQuery->where(function ($query) use ($pencarian) {
            $query->where('pembagian_informasi', '=', "Berkala")
            ->where('ringkasan_informasi', 'like', "%$pencarian%");
        });

        $informasiSertaMertaQuery->where(function ($query) use ($pencarian) {
            $query->where('pembagian_informasi', '=', "Serta Merta")
            ->where('ringkasan_informasi', 'like', "%$pencarian%");
        });

        $informasiSetiapSaatQuery->where(function ($query) use ($pencarian) {
            $query->where('pembagian_informasi', '=', "Setiap Saat")
            ->where('ringkasan_informasi', 'like', "%$pencarian%");
        });

        $informasiDikecualikanQuery->where(function ($query) use ($pencarian) {
            $query->where('pembagian_informasi', '=', "Dikecualikan")
            ->where('ringkasan_informasi', 'like', "%$pencarian%");
        });

        // $kategori = Kategori::find($judul->kategori_id);
        // $detail = DetailDaftarInformasi::where('id_kategori', $judul->kategori_id)->first();

        $beritaResults = $beritaQuery->get();
        $laporanResults = $laporanQuery->get();
        $daftarInformasiPublikResults = $daftarInformasiPublikQuery->get();
        $informasiBerkalaResults = $informasiBerkalaQuery->get();
        $informasiSertaMertaResults = $informasiSertaMertaQuery->get();
        $informasiSetiapSaatResults = $informasiSetiapSaatQuery->get();
        $informasiDikecualikanResults = $informasiDikecualikanQuery->get();

        return view('Search', [
            'query' => $pencarian,
            'jenis' => $jenis,
            'tahun' => $tahun,
            'beritaResults' => $beritaResults,
            'laporanResults' => $laporanResults,
            'daftarInformasiPublikResults' => $daftarInformasiPublikResults,
            'informasiBerkalaResults' => $informasiBerkalaResults,
            'informasiSertaMertaResults' => $informasiSertaMertaResults,
            'informasiSetiapSaatResults' => $informasiSetiapSaatResults,
            'informasiDikecualikanResults' => $informasiDikecualikanResults,
        ]);
    }
}
