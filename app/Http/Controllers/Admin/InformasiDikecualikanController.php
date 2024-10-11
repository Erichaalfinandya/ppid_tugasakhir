<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\DaftarInformasi;
use App\Http\Controllers\Controller;
use App\Models\InformasiDikecualikan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InformasiDikecualikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informasiData = InformasiDikecualikan::where('pembagian_informasi', 'Informasi Dikecualikan')->get();
        return view('admin.informasi-dikecualikan', [
            'datasertamerta' => $informasiData,
        ]);
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
            'kategori_judul' => 'required',
            'judul' => 'required',
            'tahun' => 'required|numeric',
            'file' => 'required|mimes:pdf|max:5120', // Maksimum 5MB
            'pembagian_informasi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('informasi-dikecualikan.index')->with('error', $validator->messages()->all()[0])->withErrors($validator)->withInput();
        }

        // Handle file upload
        if ($request->file('file')) {
            $nama_file = date('Ymdhis') . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('upload'), $nama_file);
            $filePath = 'upload/' . $nama_file;

        } else {
            $filePath  = '';
        }

        // Simpan data ke database
        InformasiDikecualikan::create([
            'kategori_judul' => $request->kategori_judul,
            'judul' => $request->judul,
            'tahun' => $request->tahun,
            'file' => $filePath ,
            'pembagian_informasi' => $request->pembagian_informasi,
        ]);

        return redirect()->route('informasi-dikecualikan.index')->with('success', 'Data Berhasil Ditambahkan');
    }


    public function edit(string $id)
    {
        $data = InformasiDikecualikan::findOrFail($id);
        return view('admin.informasi-dikecualikan-edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Temukan data yang akan diperbarui
    $daftarInformasi = InformasiDikecualikan::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'kategori_judul' => 'required',
        'judul' => 'required',
        'tahun' => 'required|numeric',
        'file' => 'file|mimes:pdf|max:5120',
    ]);

    if ($validator->fails()) {
        return redirect()->route('informasi-dikecualikan.index')->with('error', $validator->messages()->all()[0])->withErrors($validator)->withInput();
    }

    if ($request->file('file')) {
        $nama_file = date('Ymdhis') . '_' . $request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('upload'), $nama_file);

        // Hapus file yang lama jika ada
        if ($request->oldFile && file_exists(public_path('upload/' . $request->oldFile))) {
            unlink(public_path('upload/' . $request->oldFile));
        }
    } else {
        $nama_file = $request->oldFile;
    }

    // Update data
    $daftarInformasi->update([
        'kategori_judul' => $request->kategori_judul,
        'judul' => $request->judul,
        'tahun' => $request->tahun,
        'file' => $nama_file,
    ]);

    return redirect()->route('informasi-dikecualikan.index')->with('success', 'Data Berhasil Diperbarui');
}


    public function delete($id){
        $data = InformasiDikecualikan::find($id);
        if ($data->file && file_exists(public_path('upload/' . $data->file))) {
            unlink(public_path('upload/' . $data->file));
}
        $data->delete();

        return redirect()->route('informasi-dikecualikan.index')->with('success', 'Data Berhasil Dihapus');
    }
}
