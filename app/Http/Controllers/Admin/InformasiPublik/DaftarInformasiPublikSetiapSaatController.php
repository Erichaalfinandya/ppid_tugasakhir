<?php

namespace App\Http\Controllers\Admin\InformasiPublik;

use App\Models\Pejabat;
use Illuminate\Http\Request;
use App\Models\JenisInformasi;
use App\Http\Controllers\Controller;
use App\Models\DaftarInformasiPublik;
use App\Models\RincianJenisInformasi;

class DaftarInformasiPublikSetiapSaatController extends Controller
{
    public function index(){
        $informasiData = DaftarInformasiPublik::where('pembagian_informasi', "Setiap Saat")->get();
        $jenisInformasi = JenisInformasi::where('pembagian_informasi', "Setiap Saat")->pluck('nama', 'id');
        $RincianJenisInformasi = RincianJenisInformasi::pluck('nama', 'id');
        $pejabat = Pejabat::all();
        return view('admin.informasi-publik.daftar-informasi-publik-setiap-saat', [
            'datas' => $informasiData,
            'jenInfo' => $jenisInformasi,
            'rincianJenInfo' => $RincianJenisInformasi,
            'pejabat' => $pejabat
        ]);
    }

    public function RincianInformasi(Request $request){
        $rji = RincianJenisInformasi::where('jenis_info_id', $request->get('id'))
        ->pluck('nama', 'id');

        return response()->json($rji);
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
            'pembagian_informasi' => "Setiap Saat",
        ]);

        return redirect()->route('informasi-publik.daftar-informasi-publik-setiap-saat.index');

    }

    public function update($id, Request $request){
        $data = DaftarInformasiPublik::find($id);
        $data->update([
            'jenis_informasi' => $request->jenis_informasi,
            'ringkasan_informasi' => $request->ringkasan_informasi,
            'pejabat_yang_menguasai_informasi' => $request->pejabat_yang_menguasai_informasi,
            'penanggung_jawab' => $request->penanggung_jawab,
            'bentuk_informasi' => $request->bentuk_informasi,
            'jangka_waktu' => $request->jangka_waktu,
            'jenis_media' => $request->jenis_media,
        ]);

        return redirect()->route('informasi-publik.daftar-informasi-publik.index')->with('success', 'Data Berhasil Diperbarui');

    }

    public function delete($id){
        $data = DaftarInformasiPublik::find($id);
        $data->delete();
        return redirect()->route('informasi-publik.daftar-informasi-publik.index')->with('success', 'Data Berhasil Dihapus');
    }
}
