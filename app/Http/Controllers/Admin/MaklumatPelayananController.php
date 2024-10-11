<?php

namespace App\Http\Controllers\admin;

use App\Models\MaklumatPelayanan;
use App\Models\MaklumatPelayananList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MaklumatPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data = MaklumatPelayanan::findOrFail(1);
        $list = MaklumatPelayananList::orderBy('urutan', 'ASC')->get();
        return view('admin.informasi-publik.maklumat-pelayanan.index', [
            'data' => $data,
            'list' => $list
        ]);
    }

    // note : untuk menyimpan list maklumat pelayanan
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'urutan' => 'required',
        ]);

        // Simpan data ke database
        MaklumatPelayananList::create([
            'urutan' => $request->urutan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('maklumat-pelayanan.index')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function edit(string $id)
    {
        $data = MaklumatPelayananList::findOrFail($id);
        return view('admin.informasi-publik.maklumat-pelayanan.edit', [
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
            'deskripsi' => 'required',
            'urutan' => 'required',
        ]);

        // Temukan data yang akan diperbarui
        $maklumatpelayananlist = MaklumatPelayananList::findOrFail($id);

        // Update data
        $maklumatpelayananlist->update([
            'deskripsi' => $request->deskripsi,
            'urutan' => $request->urutan,
        ]);

        return redirect()->route('maklumat-pelayanan.index')->with('success', 'Data Berhasil Diperbarui');
    }

    public function update_nolist(Request $request)
    {
        // Validasi input
        $request->validate([
            'deskripsi' => 'required',
            'judul' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'required'
        ]);

        // Temukan data yang akan diperbarui
        $maklumatpelayanan = MaklumatPelayanan::findOrFail(1);

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Nama file dengan timestamp untuk menghindari duplikat
            $fileName = time() . '_' . $file->getClientOriginalName();
    
            // Simpan file ke direktori public/upload
            $file->move(public_path('upload'), $fileName);
    
            // Simpan path file ke dalam database
            $filePath = 'upload/' . $fileName;
        } else {
            // Jika tidak ada file baru diunggah, gunakan file yang sudah ada
            $filePath = $maklumatpelayanan->gambar;
        }
    
        // Update data
        $maklumatpelayanan->update([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $filePath,
            'link' => $request->input('link'),
        ]);
    
        return redirect()->route('maklumat-pelayanan.index')->with('success', 'Data Berhasil Diperbarui');
    }

    public function destroy($id){
        $data = MaklumatPelayananList::find($id);
        $data->delete();

        // note : menambahkan session flash untuk menampilkan alert berhasil menghapus
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('maklumat-pelayanan.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function show_maklumat_pelayanan(){
        $data = MaklumatPelayanan::findOrFail(1);
        $list = MaklumatPelayananList::orderBy('urutan', 'ASC')->get();
        return view('pages.layanan.maklumatpelayanan', [
            'data' => $data,
            'list' => $list
        ]);
    }
}
