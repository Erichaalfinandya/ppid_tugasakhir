<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $sessionValue = $request->query('session_value');
    
        switch ($sessionValue) {
            case 'ppidfoto':
                $galeris = Galeri::where('oleh', 'PPID')->where('jenis', 'Foto')->get();
                $oleh = "PPID";
                $jenis = "foto";
                break;
            case 'ppidvideo':
                $galeris = Galeri::where('oleh', 'PPID')->where('jenis', 'Video')->get();
                $oleh = "PPID";
                $jenis = "video";
                break;
            case 'pemerintahfoto':
                $galeris = Galeri::where('oleh', 'Pemerintah')->where('jenis', 'Foto')->get();
                $oleh = "Pemerintah";
                $jenis = "foto";
                break;
            case 'pemerintahvideo':
                $galeris = Galeri::where('oleh', 'Pemerintah')->where('jenis', 'Video')->get();
                $oleh = "Pemerintah";
                $jenis = "video";
                break;
            default:
                $galeris = collect(); // Return an empty collection if no matching case
                $oleh = null;
                $jenis = null;
                break;
        }
        session(['session_key' => $sessionValue]);
        if($oleh != "Pemerintah"){
            return view('admin.Galery.PPID.Galeri', compact('galeris', 'sessionValue', 'jenis', 'oleh'));
        }else{
            return view('admin.Galery.Pemerintah.Galeri', compact('galeris', 'sessionValue', 'jenis', 'oleh'));

        }
        
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'file' => 'required|file|max:2048', // Sesuaikan validasi berkas dengan jenis yang diizinkan
        ]);
    
        // Inisialisasi variabel $filePath
        $filePath = null;
        $jenis = $request->input('jenis');
        $oleh = $request->input('oleh');
        // Tangani unggahan berkas jika ada
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Nama file dengan timestamp untuk menghindari duplikat
            $fileName = time() . '_' . $file->getClientOriginalName();
    
            // Simpan file ke direktori public/upload
            $file->move(public_path('upload'), $fileName);
    
            // Simpan path file ke dalam database
            $filePath = 'upload/' . $fileName;
        }
            
        $formData = new  Galeri();
        $formData->judul = $request->judul;
        $formData->penerbit = $request->penerbit;
        $formData->jenis = $request->input('jenis');
        $formData->oleh = $request->input('oleh');
        $formData->media = $filePath;
        $formData->save();

       
        // Redirect pengguna ke halaman galeri setelah berhasil menyimpan data
        return redirect()->back()->withInput()->with('success', 'Data Terinput')->with('refresh', true);
    }

    public function edit($id)
    {
        $galeris = Galeri::find($id);
        if($galeris->oleh != "Pemerintah"){
            return view('admin.Galery.PPID.Galeriedit', compact('galeris'));

        }else{
            return view('admin.Galery.Pemerintah.Galeriedit', compact('galeris'));

        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'foto' => 'image|max:2048',
            'video' => 'mimes:mp4|max:2048',
        ]);
    
        $galeri = Galeri::findOrFail($id);
        $galeri->judul = $request->judul;
        $galeri->penerbit = $request->penerbit;

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Nama file dengan timestamp untuk menghindari duplikat
            $fileName = time() . '_' . $file->getClientOriginalName();
    
            // Simpan file ke direktori public/upload
            $file->move(public_path('upload'), $fileName);
    
            // Simpan path file ke dalam database
            $filePath = 'upload/' . $fileName;
            $galeri->media = $filePath;
        } else {
            // Jika tidak ada file baru diunggah, gunakan file yang sudah ada
            $filePath = $galeri->media;
            $galeri->media = $filePath;
        }
       
    
       $enter = $galeri->save();
    if($enter){
        // Redirect back with session data
        if($galeri->jenis == "video"){
            return redirect()->route('galeri.index', ['session_value' => 'ppidvideo'])
                ->withInput()
                ->with('success', 'Data Terinput')
                ->with('refresh', true);
        } else {
            return redirect()->route('galeri.index', ['session_value' => 'ppidfoto'])
                ->withInput()
                ->with('success', 'Data Terinput')
                ->with('refresh', true);
        }
    }else{
        dd("eror");
    }
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();
        return redirect()->back()->withInput()->with('success', 'Data Terhapus')->with('refresh', true);

    }
}
