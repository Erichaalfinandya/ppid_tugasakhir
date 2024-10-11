<?php

namespace App\Http\Controllers\Admin\InformasiPublik;

use App\Models\Pejabat;
use Illuminate\Http\Request;
use App\Models\JenisInformasi;
use App\Http\Controllers\Controller;
use App\Models\DaftarInformasiPublik;
use App\Models\RincianJenisInformasi;
use Illuminate\Support\Facades\Redirect;

class DaftarInformasiPublikSertaMertaController extends Controller
{
    public function index(){
        $informasiData = DaftarInformasiPublik::where('pembagian_informasi', "Serta Merta")->get();
        $jenisInformasi = JenisInformasi::where('pembagian_informasi', "Serta Merta")->pluck('nama', 'id');
        $RincianJenisInformasi = RincianJenisInformasi::pluck('nama', 'id');
        $pejabat = Pejabat::all();
        return view('admin.informasi-publik.daftar-informasi-publik-serta-merta', [
            'datas' => $informasiData,
            'jenInfo' => $jenisInformasi,
            'rincianJenInfo' => $RincianJenisInformasi,
            'pejabat' => $pejabat
        ]);

    }
    public function store(Request $request)
    {

        DaftarInformasiPublik::create([
            'jenis_info_id' => $request->jenis_info_id,
            'rincian_jenis_info_id' => $request->rincian_jenis_info_id,
            'ringkasan_informasi' => $request->ringkasan_informasi,
            'pejabat_yang_menguasai_informasi' => $request->pejabat_id,
            'pejabat_id' => $request->pejabat_id,
            'penanggung_jawab' => $request->penanggung_jawab,
            'waktu_pembuatan' => $request->waktu_pembuatan,
            'bentuk_informasi' => $request->bentuk_informasi,
            'jangka_waktu' => $request->jangka_waktu,
            'jenis_media' => $request->jenis_media,
            'pembagian_informasi' => "Serta Merta",
        ]);

        return redirect()->route('informasi-publik.daftar-informasi-publik-serta-merta.index');

    }

    public function update(Request $request, $id)
{
    $informasi = DaftarInformasiPublik::findOrFail($id);
    $informasi->update([
        'jenis_info_id' => $request->jenis_info_id,
        'rincian_jenis_info_id' => $request->rincian_jenis_info_id,
        'ringkasan_informasi' => $request->ringkasan_informasi,
        'pejabat_yang_menguasai_informasi' => $request->pejabat_id,
        'pejabat_id' => $request->pejabat_id,
        'penanggung_jawab' => $request->penanggung_jawab,
        'waktu_pembuatan' => $request->waktu_pembuatan,
        'bentuk_informasi' => $request->bentuk_informasi,
        'jangka_waktu' => $request->jangka_waktu,
        'jenis_media' => $request->jenis_media,
    ]);

    return redirect()->route('informasi-publik.daftar-informasi-publik-serta-merta.index');
}

public function delete($id)
{
    $informasi = DaftarInformasiPublik::findOrFail($id);
    $informasi->delete();

    return Redirect::back()->with('success', 'Data berhasil dihapus');
}
}
