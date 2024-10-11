<?php

namespace App\Http\Controllers\Admin\InformasiPublik;

use Illuminate\Http\Request;
use App\Models\JenisInformasi;
use App\Http\Controllers\Controller;
use App\Models\DaftarInformasiPublik;
use App\Models\Pejabat;
use App\Models\RincianJenisInformasi;
use Illuminate\Support\Facades\Log;

class DaftarInformasiPublikController extends Controller
{
    public function index()
    {
        $informasiData = DaftarInformasiPublik::where('pembagian_informasi', "Berkala")->get();
        Log::info($informasiData);
        
        $jenisInformasi = JenisInformasi::where('pembagian_informasi', "Berkala")->pluck('nama', 'id');
        $RincianJenisInformasi = RincianJenisInformasi::pluck('nama', 'id');
        $pejabat = Pejabat::all();
        return view('admin.informasi-publik.daftar-informasi-publik', [
            'datas' => $informasiData,
            'jenInfo' => $jenisInformasi,
            'rincianJenInfo' => $RincianJenisInformasi,
            'pejabat' => $pejabat
        ]);
    }

    public function file($id)
    {
        
    }

    public function RincianJenis(Request $request)
    {
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
            'pembagian_informasi' => "Berkala",
        ]);

        return redirect()->route('informasi-publik.daftar-informasi-publik.index');

    }

    public function edit($id)
    {
        $infoPublik = DaftarInformasiPublik::find($id);
        if ($infoPublik->pembagian_informasi == "Berkala") {
            $jenisInfo = JenisInformasi::where('pembagian_informasi', "Berkala")->pluck('nama', 'id');
        } elseif ($infoPublik->pembagian_informasi == "Serta Merta") {
            $jenisInfo = JenisInformasi::where('pembagian_informasi', "Serta Merta")->pluck('nama', 'id');
        } else {
            $jenisInfo = JenisInformasi::where('pembagian_informasi', "Setiap Saat")->pluck('nama', 'id');
        }

        $data = [
            'infoPublik' => $infoPublik,
            'jenInfo' => $jenisInfo,
            'rincJenInfo' => RincianJenisInformasi::where('jenis_info_id', $infoPublik->jenis_info_id)->get(),
            'pejabat' => Pejabat::all()
        ];
        return view('admin.informasi-publik.daftar-informasi-publik-edit', $data);
    }

    public function update($id, Request $request)
    {
        $data = DaftarInformasiPublik::find($id);
        $data->update([
            'jenis_info_id' => $request->jenis_info_id,
            'rincian_jenis_info_id' => $request->rincian_jenis_info_id,
            'ringkasan_informasi' => $request->ringkasan_informasi,
            'pejabat_id' => $request->pejabat_id,
            'penanggung_jawab' => $request->penanggung_jawab,
            'waktu_pembuatan' => $request->waktu_pembuatan,
            'bentuk_informasi' => $request->bentuk_informasi,
            'jangka_waktu' => $request->jangka_waktu,
            'jenis_media' => $request->jenis_media,
            'pembagian_informasi' => $request->pembagian_informasi,
        ]);

        if ($request->pembagian_informasi == 'Berkala') {
            return redirect()->route('informasi-publik.daftar-informasi-publik.index')->with('success', 'Data Berhasil Diperbarui');
        } elseif ($request->pembagian_informasi == 'Setiap Saat') {
            return redirect()->route('informasi-publik.daftar-informasi-publik-setiap-saat.index')->with('success', 'Data Berhasil Diperbarui');
        } elseif ($request->pembagian_informasi == 'Serta Merta') {
            return redirect()->route('informasi-publik.daftar-informasi-publik-serta-merta.index')->with('success', 'Data Berhasil Diperbarui');
        }
    }

    public function delete($id)
    {
        $data = DaftarInformasiPublik::find($id);
        $data->delete();

        if ($data->pembagian_informasi == 'Berkala') {
            return redirect()->route('informasi-publik.daftar-informasi-publik.index')->with('success', 'Data Berhasil Dihapus');
        } elseif ($data->pembagian_informasi == 'Setiap Saat') {
            return redirect()->route('informasi-publik.daftar-informasi-publik-setiap-saat.index')->with('success', 'Data Berhasil Dihapus');
        } elseif ($data->pembagian_informasi == 'Serta Merta') {
            return redirect()->route('informasi-publik.daftar-informasi-publik-serta-merta.index')->with('success', 'Data Berhasil Dihapus');
        }
    }
}
