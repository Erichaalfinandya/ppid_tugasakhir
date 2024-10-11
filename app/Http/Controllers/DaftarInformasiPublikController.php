<?php

namespace App\Http\Controllers;

use App\Models\DaftarInformasi;
use App\Models\DaftarInformasiPublik;
use App\Models\DetailDaftarInformasi;
use App\Models\FileInformasiPublik;
use App\Models\InformasiDikecualikan;
use App\Models\JenisInformasi;
use App\Models\Judul;
use App\Models\Kategori;
use App\Models\Pejabat;
use App\Models\RincianJenisInformasi;
use Illuminate\Http\Request;

class DaftarInformasiPublikController extends Controller
{
    public function index()
    {
        $informasiData = DaftarInformasiPublik::where('pembagian_informasi', "Berkala")->get();
        $jenisInformasi = JenisInformasi::where('pembagian_informasi', "Berkala")->pluck('nama', 'id');
        $RincianJenisInformasi = RincianJenisInformasi::pluck('nama', 'id');
        $pejabat = Pejabat::all();
        return view('pages.layanan.daftarinformasipublikberkala', [
            'datas' => $informasiData,
            'jenInfo' => $jenisInformasi,
            'rincianJenInfo' => $RincianJenisInformasi,
            'pejabat' => $pejabat
        ]);
    }

    public function index_serta_merta()
    {
        $informasiData = DaftarInformasiPublik::where('pembagian_informasi', "Serta Merta")->get();
        $jenisInformasi = JenisInformasi::where('pembagian_informasi', "Serta Merta")->pluck('nama', 'id');
        $RincianJenisInformasi = RincianJenisInformasi::pluck('nama', 'id');
        $pejabat = Pejabat::all();
        return view('pages.layanan.daftarinformasipubliksertamerta', [
            'datas' => $informasiData,
            'jenInfo' => $jenisInformasi,
            'rincianJenInfo' => $RincianJenisInformasi,
            'pejabat' => $pejabat
        ]);
    }

    public function index_setiap_saat()
    {
        $informasiData = DaftarInformasiPublik::where('pembagian_informasi', "Setiap Saat")->get();
        $jenisInformasi = JenisInformasi::where('pembagian_informasi', "Setiap Saat")->pluck('nama', 'id');
        $RincianJenisInformasi = RincianJenisInformasi::pluck('nama', 'id');
        $pejabat = Pejabat::all();
        return view('pages.layanan.daftarinformasipubliksetiapsaat', [
            'datas' => $informasiData,
            'jenInfo' => $jenisInformasi,
            'rincianJenInfo' => $RincianJenisInformasi,
            'pejabat' => $pejabat
        ]);
    }

    public function detail($id)
    {
        $infoPublik = DaftarInformasiPublik::find($id);
        $jenisInfo = JenisInformasi::where('pembagian_informasi', "Berkala")->where('id', $infoPublik->jenis_info_id)->pluck('nama', 'id')->first();
        $file = FileInformasiPublik::where('informasi_publik_id', $infoPublik->id)->get();

        $data = [
            'infoPublik' => $infoPublik,
            'jenInfo' => $jenisInfo,
            'rincJenInfo' => RincianJenisInformasi::where('jenis_info_id', $infoPublik->jenis_info_id)->get(),
            'pejabat' => Pejabat::where('id', $infoPublik->pejabat_id)->pluck('nama')->first(),
            'file' => $file
        ];
        return view('pages.layanan.daftarinformasipublikberkala2', $data);
    }

    public function detail_serta_merta($id)
    {
        $infoPublik = DaftarInformasiPublik::find($id);
        $jenisInfo = JenisInformasi::where('pembagian_informasi', "Serta Merta")->where('id', $infoPublik->jenis_info_id)->pluck('nama', 'id')->first();
        $file = FileInformasiPublik::where('informasi_publik_id', $infoPublik->id)->get();

        $data = [
            'infoPublik' => $infoPublik,
            'jenInfo' => $jenisInfo,
            'rincJenInfo' => RincianJenisInformasi::where('jenis_info_id', $infoPublik->jenis_info_id)->get(),
            'pejabat' => Pejabat::where('id', $infoPublik->pejabat_id)->pluck('nama')->first(),
            'file' => $file
        ];
        return view('pages.layanan.daftarinformasipubliksertamerta2', $data);
    }

    public function detail_setiap_saat($id)
    {
        $infoPublik = DaftarInformasiPublik::find($id);
        $jenisInfo = JenisInformasi::where('pembagian_informasi', "Setiap Saat")->where('id', $infoPublik->jenis_info_id)->pluck('nama', 'id')->first();
        $file = FileInformasiPublik::where('informasi_publik_id', $infoPublik->id)->get();

        $data = [
            'infoPublik' => $infoPublik,
            'jenInfo' => $jenisInfo,
            'rincJenInfo' => RincianJenisInformasi::where('jenis_info_id', $infoPublik->jenis_info_id)->get(),
            'pejabat' => Pejabat::where('id', $infoPublik->pejabat_id)->pluck('nama')->first(),
            'file' => $file
        ];
        return view('pages.layanan.daftarinformasipubliksetiapsaat2', $data);
    }

    public function index_layanan_berkala()
    {
        return view('pages.layanan.layananinformasiberkala');
    }

    public function detail2_layanan_berkala($id)
    {
        $kategori = Kategori::find($id);
        $data = [
            'judul'    => Judul::where('kategori_id', $kategori->id)->get(),
            'kategori' => $kategori
        ];
        return view('pages.layanan.layananinformasiberkala2', $data);
    }

    public function detail3_layanan_berkala($id)
    {
        $judul = Judul::find($id);
        $kategori = Kategori::find($judul->kategori_id);
        $detail = DetailDaftarInformasi::where('id_kategori', $judul->kategori_id)->first();
        $data = [
            'daftarInfo'    => DaftarInformasi::where('judul_id', $judul->id)->get(),
            'judul' => $judul,
            'kategori' => $kategori,
            'detail' => $detail
        ];
        return view('pages.layanan.layananinformasiberkala3', $data);
    }

    public function index_layanan_sertamerta()
    {
        return view('pages.layanan.layananinformasisertamerta');
    }

    public function detail2_layanan_sertamerta($id)
    {
        $kategori = Kategori::find($id);
        $data = [
            'judul'    => Judul::where('kategori_id', $kategori->id)->get(),
            'kategori' => $kategori
        ];
        return view('pages.layanan.layananinformasisertamerta2', $data);
    }

    public function detail3_layanan_sertamerta($id)
    {
        $judul = Judul::find($id);
        $kategori = Kategori::find($judul->kategori_id);
        $detail = DetailDaftarInformasi::where('id_kategori', $judul->kategori_id)->first();
        $data = [
            'daftarInfo'    => DaftarInformasi::where('judul_id', $judul->id)->get(),
            'judul' => $judul,
            'kategori' => $kategori,
            'detail' => $detail
        ];
        return view('pages.layanan.layananinformasisertamerta3', $data);
    }

    public function index_layanansetiapsaat()
    {
        return view('pages.layanan.layananinformasisetiapsaat');
    }

    public function detail2_layanansetiapsaat($id)
    {
        $kategori = Kategori::find($id);
        $data = [
            'judul'    => Judul::where('kategori_id', $kategori->id)->get(),
            'kategori' => $kategori
        ];
        return view('pages.layanan.layananinformasisetiapsaat2', $data);
    }

    public function detail3_layanansetiapsaat($id)
    {
        $judul = Judul::find($id);
        $kategori = Kategori::find($judul->kategori_id);
        $detail = DetailDaftarInformasi::where('id_kategori', $judul->kategori_id)->first();
        $data = [
            'daftarInfo'    => DaftarInformasi::where('judul_id', $judul->id)->get(),
            'judul' => $judul,
            'kategori' => $kategori,
            'detail' => $detail
        ];
        return view('pages.layanan.layananinformasisetiapsaat3', $data);
    }

    public function detail3_layanan_dikecualikan()
    {
        $informasiData = InformasiDikecualikan::where('pembagian_informasi', 'Informasi Dikecualikan')->get();
        return view('pages.layanan.layananinformasidikecualikan', [
            'daftarInfo' => $informasiData,
        ]);
    }
}
