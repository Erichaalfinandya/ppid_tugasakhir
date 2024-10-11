<?php

namespace App\Http\Controllers;

use App\Models\BeritaPemerintah;
use Illuminate\Http\Request;

class BeritaPemerintahController extends Controller
{
    public function index()
    {
        $beritas = BeritaPemerintah::all();
        return view('admin.Berita.Berita-Pemerintah.Beritapemerintah', compact('beritas'));
    }

    public function create()
    {
        return view('berita_pemerintah.create');
    }

    public function store(Request $request)
    {
       // Handle file upload
     // Handle file upload
     if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('upload'), $fileName);
        $filePath = 'upload/' . $fileName;
    }
    
    // Simpan data ke database
    BeritaPemerintah::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'penerbit' => $request->penerbit,
        'link' => $request->link, // note : field untuk link tambahan
        'sampul' => $filePath ?? null, // Gunakan $filePath jika file diunggah, jika tidak beri nilai null
    ]);

    return redirect()->route('berita_pemerintah.index')->with('success', 'Data Berita berhasil disimpan.');
    
    }

    public function edit($id)
    {
        $berita = BeritaPemerintah::findOrFail($id);
        return view('admin.Berita.Berita-Pemerintah.Beritapemerintah-edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'penerbit' => 'required|string|max:255',
            'link' => 'required|string|max:255', // note : request input untuk field link
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Temukan data yang akan diperbarui
        $beritaPemerintah = BeritaPemerintah::findOrFail($id);
    
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
            $filePath = $beritaPemerintah->sampul;
        }
    
        // Update data
        $beritaPemerintah->update([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'penerbit' => $request->input('penerbit'),
            'link' => $request->input('link'), // note : mengambil data dari input name link disimpan ke field link
            'sampul' => $filePath,
        ]);
    
        return redirect()->route('berita_pemerintah.index')->with('success', 'Data Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = BeritaPemerintah::findOrFail($id);
        $berita->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('berita_pemerintah.index');
    }

    public function show($id)
    {
        $data = BeritaPemerintah::findOrFail($id);
        return view('pages.berita.beritapemerintahdetail', [
            'data' => $data
        ]);
    }
}
