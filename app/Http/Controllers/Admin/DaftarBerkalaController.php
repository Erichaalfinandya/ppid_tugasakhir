<?php

namespace App\Http\Controllers\Admin;

use App\Models\Judul;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\DaftarInformasi;
use App\Http\Controllers\Controller;

class DaftarBerkalaController extends Controller
{
    public function index(){
        $informasiData = Kategori::where('pembagian_informasi', 'Berkala')->get();
        return view('admin.daftar-berkala', [
            'kategori' => $informasiData,
        ]);
    }

    // CRUD JUDUL
    public function judul($id){
        $kategori = Kategori::find($id);
        $data = [
            'judul'    => Judul::where('kategori_id', $kategori->id)->get(),
            'kategori' => $kategori
        ];
        return view('admin.daftar-judul', $data);
    }

    public function store(Request $request)
    {
        // Simpan data ke database
        Judul::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
        ]);

        // if ($request->pembagian_informasi == 'Serta Merta') {
            return redirect()->route('daftar-judul.judul', ['id' => $request->kategori_id])->with('success', 'Data Berhasil Ditambahkan');
        // }elseif($request->pembagian_informasi == 'Berkala'){
        //     return redirect()->route('daftar-berkala.index')->with('success', 'Data Berhasil Ditambahkan');
        // }elseif($request->pembagian_informasi == 'Setiap Saat') {
        //     return redirect()->route('daftar-setiap-saat.index')->with('success', 'Data Berhasil Ditambahkan');
        // }
        }

        public function edit($id)
    {
        $data = Judul::findOrFail($id);
        return view('admin.daftar-judul-edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Temukan data yang akan diperbarui
        $judul = Judul::findOrFail($id);

        // Update data
        $judul->update([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
        ]);
        // if ($request->pembagian_informasi == 'Serta Merta') {
            return redirect()->route('daftar-judul.judul', ['id' => $judul->kategori_id])->with('success', 'Data Berhasil Diperbarui');
        // }elseif($request->pembagian_informasi == 'Berkala'){
        //     return redirect()->route('daftar-berkala.index')->with('success', 'Data Berhasil Diperbarui');
        // }elseif($request->pembagian_informasi == 'Setiap Saat') {
        //     return redirect()->route('daftar-setiap-saat.index')->with('success', 'Data Berhasil Diperbarui');
        // }
    }

    public function delete($id){
        $data = Judul::find($id);
        $data->delete();

        // if ($data->pembagian_informasi == 'Serta Merta') {
            return redirect()->route('daftar-judul.judul', ['id' => $data->kategori_id])->with('success', 'Data Berhasil Dihapus');
        // }elseif($data->pembagian_informasi == 'Berkala'){
        //     return redirect()->route('daftar-berkala.index')->with('success', 'Data Berhasil Dihapus');
        // }elseif($data->pembagian_informasi == 'Setiap Saat') {
        //     return redirect()->route('daftar-setiap-saat.index')->with('success', 'Data Berhasil Dihapus');
        // }
    }
}
