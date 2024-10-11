<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\BeritaPPID;
use Illuminate\Support\Str;

class BeritaPPIDController extends Controller
{
    public function index()
    {
        $beritas = BeritaPPID::all();
       return view('admin.Berita.Berita-PPID.Beritappid', compact('beritas'));
    }

    public function create()
    {
        return view('berita_ppid.create');
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
    BeritaPPID::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'penerbit' => $request->penerbit,
        'link' => $request->link, // note : field untuk link tambahan
        'sampul' => $filePath ?? null, // Gunakan $filePath jika file diunggah, jika tidak beri nilai null
    ]);

    return redirect()->route('berita_ppid.index')->with('success', 'Data Berita berhasil disimpan.');

    // Simpan data ke database
   
    
    }

    public function edit($id)
    {
        $berita = BeritaPPID::findOrFail($id);
        return view('admin.Berita.Berita-PPID.Beritappid-edit', compact('berita'));
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
        $beritaPPID = BeritaPPID::findOrFail($id);
    
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
            $filePath = $beritaPPID->sampul;
        }
    
        // Update data
        $beritaPPID->update([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'penerbit' => $request->input('penerbit'),
            'link' => $request->input('link'), // note : mengambil data dari input name link disimpan ke field link
            'sampul' => $filePath,
        ]);
    
        return redirect()->route('berita_ppid.index')->with('success', 'Data Berita berhasil diperbarui.');
    }
    

    public function destroy($id)
    {
        $berita = BeritaPPID::findOrFail($id);
        $berita->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('berita_ppid.index');
    }

    public function show($id)
    {
        $data = BeritaPPID::findOrFail($id);
        return view('pages.berita.beritappiddetail', [
            'data' => $data
        ]);
    }
}
