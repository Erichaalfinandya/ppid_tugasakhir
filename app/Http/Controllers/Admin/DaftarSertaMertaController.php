<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\DaftarInformasi;
use App\Http\Controllers\Controller;
use App\Models\DetailChat;
use App\Models\DetailDaftarInformasi;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class DaftarSertaMertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        // $informasiData = DaftarInformasi::all();
        $informasiData = Kategori::where('pembagian_informasi', 'Serta Merta')->get();
        // $jenisInformasi = JenisInformasi::pluck('nama', 'id');
        return view('admin.daftar-serta-merta', [
            'kategori' => $informasiData,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Handle file upload
    if ($request->hasFile('file')) {
        $file = $request->file('file');

        // Nama file dengan timestamp untuk menghindari duplikat
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Simpan file ke direktori public/upload
        $file->move(public_path('upload'), $fileName);

        // Simpan path file ke dalam database
        $filePath = 'upload/' . $fileName;
    }

    // Simpan data ke database
    $kategori = Kategori::create([
        'nama' => $request->nama,
        'gambar' => $filePath ?? null, // Gunakan $filePath jika file diunggah, jika tidak beri nilai null
        'pembagian_informasi' => $request->pembagian_informasi,
    ]);

    $kategoriId = $kategori->id;

    DetailDaftarInformasi::create([
        'id_kategori' => $kategoriId,
        'ringkasan_informasi' => ' ',
        'pejabat' => 'PPID',
        'penanggung_jawab' => 'PPID',
        'waktu' => ' ',
        'bentuk' => ' ',
        'jangka_waktu' => 'Selama Berlaku',
        'jenis_media' => ' ',
    ]);

    if ($request->pembagian_informasi == 'Serta Merta') {
        return redirect()->route('daftar-serta-merta.index')->with('success', 'Data Berhasil Ditambahkan');
    } elseif ($request->pembagian_informasi == 'Berkala') {
        return redirect()->route('daftar-berkala.index')->with('success', 'Data Berhasil Ditambahkan');
    } elseif ($request->pembagian_informasi == 'Setiap Saat') {
        return redirect()->route('daftar-setiap-saat.index')->with('success', 'Data Berhasil Ditambahkan');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = Kategori::findOrFail($id);
        return view('admin.daftar-serta-merta-edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama' => 'required',
        'file' => 'mimes:png,jpg,jpeg|max:2048', // Maksimum 2MB, bisa disesuaikan
        'pembagian_informasi' => 'required',
    ]);

    // Temukan data yang akan diperbarui
    $daftarInformasi = Kategori::findOrFail($id);

    // Handle file upload
    if ($request->hasFile('file')) {
        $file = $request->file('file');

        // Hapus file yang lama jika ada
        if (file_exists(public_path($daftarInformasi->file))) {
            $file = $request->file('file');

        // Nama file dengan timestamp untuk menghindari duplikat
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Simpan file ke direktori public/upload
        $file->move(public_path('upload'), $fileName);

        // Simpan path file ke dalam database
        $filePath = 'upload/' . $fileName;
        }
    } else {
        // Jika tidak ada file baru diunggah, gunakan file yang sudah ada
        // note : pada coding sebelumnya salah mengambil data sehingga menjadikannya null setiap tidak upload file
        // dimana seharusnya mengambil gambar tapi malah mengambil file dimana field tersebut tidak ada di tabel Kategori
        $filePath = $daftarInformasi->gambar;
    }

    // Update data
    $daftarInformasi->update([
        'nama' => $request->nama,
        'gambar' => $filePath,
        'pembagian_informasi' => $request->pembagian_informasi, // Tambahkan ini jika ingin memperbarui pembagian informasi juga
    ]);

    // Redirect berdasarkan pembagian informasi
    if ($request->pembagian_informasi == 'Serta Merta') {
        return redirect()->route('daftar-serta-merta.index')->with('success', 'Data Berhasil Diperbarui');
    } elseif ($request->pembagian_informasi == 'Berkala') {
        return redirect()->route('daftar-berkala.index')->with('success', 'Data Berhasil Diperbarui');
    } elseif ($request->pembagian_informasi == 'Setiap Saat') {
        return redirect()->route('daftar-setiap-saat.index')->with('success', 'Data Berhasil Diperbarui');
    }
}


    public function delete($id){
        $data = Kategori::find($id);
        $data->delete();

        // note : menambahkan session flash untuk menampilkan alert berhasil menghapus
        session()->flash('success', 'Data berhasil dihapus');
        if ($data->pembagian_informasi == 'Serta Merta') {
            return redirect()->route('daftar-serta-merta.index')->with('success', 'Data Berhasil Dihapus');
        }elseif($data->pembagian_informasi == 'Berkala'){
            return redirect()->route('daftar-berkala.index')->with('success', 'Data Berhasil Dihapus');
        }elseif($data->pembagian_informasi == 'Setiap Saat') {
            return redirect()->route('daftar-setiap-saat.index')->with('success', 'Data Berhasil Dihapus');
        }
    }
}
