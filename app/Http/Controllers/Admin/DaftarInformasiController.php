<?php

namespace App\Http\Controllers\admin;

use App\Models\Judul;
use Illuminate\Http\Request;
use App\Models\DaftarInformasi;
use App\Http\Controllers\Controller;
use App\Models\DetailDaftarInformasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DaftarInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $judul = Judul::find($id);
        $detail = DetailDaftarInformasi::where('id_kategori', $judul->kategori_id)->first();
        $data = [
            'daftarInfo'    => DaftarInformasi::where('judul_id', $judul->id)->get(),
            'judul' => $judul,
            'detail' => $detail
        ];
        return view('admin.daftar-informasi', $data);
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
            'ringkasan_informasi' => 'required',
            'tahun' => 'required|numeric',
            'file' => 'required|file|mimes:pdf|max:5120',
        ]);

        if ($validator->fails()) {
            return redirect()->route('daftar-informasi.index', ['id' => $request->judul_id])->with('error', $validator->messages()->all()[0])->withErrors($validator)->withInput();
        }

        // Handle file upload
        if ($request->file('file')) {
            $nama_file = date('Ymdhis') . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move('admin/file/', $nama_file);
        } else {
            $nama_file = '';
        }

        // Simpan data ke database
        DaftarInformasi::create([
            'judul_id' => $request->judul_id,
            'ringkasan_informasi' => $request->ringkasan_informasi,
            'tahun' => $request->tahun,
            'file' => $nama_file,
        ]);

        return redirect()->route('daftar-informasi.index', ['id' => $request->judul_id])->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = DaftarInformasi::findOrFail($id);
        return view('admin.daftar-informasi-edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Temukan data yang akan diperbarui
        $daftarInformasi = DaftarInformasi::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'file' => 'file|mimes:pdf|max:5120',
        ]);

        if ($validator->fails()) {
            return redirect()->route('daftar-informasi.index', ['id' => $request->judul_id])->with('error', $validator->messages()->all()[0])->withErrors($validator)->withInput();
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
            'ringkasan_informasi' => $request->ringkasan_informasi,
            'tahun' => $request->tahun,
            'file' => $nama_file,
        ]);

        return redirect()->route('daftar-informasi.index', ['id' => $request->judul_id])->with('success', 'Data Berhasil Diperbarui');
    }

    public function delete($id){
        $data = DaftarInformasi::find($id);
        if ($data->file) {
            unlink('admin/file/'. $data->file);
        }
        $data->delete();

        return redirect()->route('daftar-informasi.index', ['id' => $data->judul_id])->with('success', 'Data Berhasil Dihapus');
    }

    public function update_detail(Request $request, $id)
    {
        // Temukan data yang akan diperbarui
        $detail = DetailDaftarInformasi::findOrFail($id);   
        // Update data
        $detail->update([
            'ringkasan_informasi' => $request->ringkasan_informasi,
            'waktu' => $request->waktu,
            'jenis_media' => $request->jenis_media,
            'bentuk' => $request->bentuk,
        ]);
        return redirect()->route('daftar-informasi.index', ['id' => $request->judul_id])->with('success', 'Data Berhasil Ditambahkan');
    }
}
