<?php

namespace App\Http\Controllers\Admin\InformasiPublik;

use App\Models\FileInformasiPublik;
use Illuminate\Http\Request;
use App\Models\JenisInformasi;
use App\Http\Controllers\Controller;
use App\Models\DaftarInformasiPublik;
use App\Models\Pejabat;
use App\Models\RincianJenisInformasi;
use Illuminate\Support\Facades\Validator;

class FileInformasiPublikController extends Controller
{
    public function index($id)
    {
        $informasiData = DaftarInformasiPublik::where('id', $id)->first();
        $data = [
            'daftarInfo'    => FileInformasiPublik::where('informasi_publik_id', $id)->get(),
            'informasiData' => $informasiData
        ];
        return view('admin.informasi-publik.file-informasi-publik', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'deskripsi' => 'required',
            'tahun' => 'required|numeric',
            'file' => 'required|file|mimes:pdf|max:5120',
        ]);

        if ($validator->fails()) {
            return redirect()->route('informasi-publik.daftar-informasi-publik.file', ['id' => $request->informasi_publik_id])->with('error', $validator->messages()->all()[0])->withErrors($validator)->withInput();
        }

        // Handle file upload
        if ($request->file('file')) {
            $nama_file = date('Ymdhis') . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move('admin/file/', $nama_file);
        } else {
            $nama_file = '';
        }

        // Simpan data ke database
        FileInformasiPublik::create([
            'informasi_publik_id' => $request->informasi_publik_id,
            'deskripsi' => $request->deskripsi,
            'tahun' => $request->tahun,
            'file' => $nama_file,
        ]);

        return redirect()->route('informasi-publik.daftar-informasi-publik.file', ['id' => $request->informasi_publik_id])->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = FileInformasiPublik::findOrFail($id);
        return view('admin.informasi-publik.file-informasi-publik-edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Temukan data yang akan diperbarui
        $daftarInformasi = FileInformasiPublik::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'file' => 'file|mimes:pdf|max:5120',
        ]);

        if ($validator->fails()) {
            return redirect()->route('informasi-publik.daftar-informasi-publik.file', ['id' => $request->informasi_publik_id])->with('error', $validator->messages()->all()[0])->withErrors($validator)->withInput();
        }

        if ($request->file('file')) {
            $nama_file = date('Ymdhis') . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move('admin/file/', $nama_file);
            if ($request->oldFile) {
                unlink('admin/file/'. $request->oldFile);
            }
        } else {
            $nama_file = $request->oldFile;
        }

        // Update data
        $daftarInformasi->update([
            'judul_id' => $request->judul_id,
            'deskripsi' => $request->deskripsi,
            'tahun' => $request->tahun,
            'file' => $nama_file,
        ]);

        return redirect()->route('informasi-publik.daftar-informasi-publik.file', ['id' => $request->informasi_publik_id])->with('success', 'Data Berhasil Diperbarui');
    }

    public function destroy($id){
        $data = FileInformasiPublik::find($id);
        if ($data->file) {
            unlink('admin/file/'. $data->file);
        }
        $data->delete();

        return redirect()->route('informasi-publik.daftar-informasi-publik.file', ['id' => $data->informasi_publik_id])->with('success', 'Data Berhasil Dihapus');
    }
}
