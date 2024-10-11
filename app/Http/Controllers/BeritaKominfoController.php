<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\BeritaKominfo;
use Illuminate\Support\Str;

class BeritaKominfoController extends Controller
{
    public function index()
    {
        $beritas = BeritaKominfo::all();
        return view('admin.Berita.Berita-kominfo.Beritakominfo', compact('beritas'));
    }

    public function create()
    {
        return view('berita_kominfo.create');
    }

    public function store(Request $request)
    {
         // Handle file upload
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
    BeritaKominfo::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'link' => $request->link, // note : field untuk link tambahan
        'sampul' => $filePath ?? null, // Gunakan $filePath jika file diunggah, jika tidak beri nilai null
    ]);

    return redirect()->route('berita_kominfo.index')->with('success', 'Data Berita berhasil disimpan.');

    // Simpan data ke database
   
    }

    public function edit($id)
    {
        $berita = BeritaKominfo::findOrFail($id);
        return view('admin.Berita.Berita-kominfo.Beritakominfo-edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
       // Validasi input
       $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'link' => 'required|string|max:255', // note : request input untuk field link
        'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Temukan data yang akan diperbarui
    $beritakominfo = Beritakominfo::findOrFail($id);

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
        $filePath = $beritakominfo->sampul;
    }

    // Update data
    $beritakominfo->update([
        'judul' => $request->input('judul'),
        'deskripsi' => $request->input('deskripsi'),
        'link' => $request->input('link'), // note : mengambil data dari input name link disimpan ke field link
        'sampul' => $filePath,
    ]);

    return redirect()->route('berita_kominfo.index')->with('success', 'Data Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = BeritaKominfo::findOrFail($id);
        $berita->delete();

        return redirect()->route('berita_kominfo.index');
    }
}
