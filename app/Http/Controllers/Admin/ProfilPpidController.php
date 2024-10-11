<?php

namespace App\Http\Controllers\admin;

use App\Models\MaklumatPelayanan;
use App\Models\MaklumatPelayananList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProfilPpidDasarHukum;
use App\Models\ProfilPpidGeneral;
use App\Models\ProfilPpidStrukturOrganisasi;
use App\Models\ProfilPpidTugasTanggungJawab;
use App\Models\ProfilPpidVisiMisi;
use Illuminate\Support\Facades\Storage;

class ProfilPpidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function profilgeneral(){
        $general = ProfilPpidGeneral::findOrFail(1);
        return view('admin.Profil.PPID.profil', [
            'general' => $general,
        ]);
    }

    public function profilvisimisi(){
        $list = ProfilPpidVisiMisi::orderBy('jenis', 'ASC')->orderBy('urutan', 'ASC')->get();
        $general = ProfilPpidGeneral::findOrFail(1);
        return view('admin.Profil.PPID.visimisi', [
            'list' => $list,
            'general' => $general
        ]);
    }

    public function profilvisimisistore(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'jenis' => 'required',
            'urutan' => 'required',
        ]);

        // Simpan data ke database
        ProfilPpidVisiMisi::create([
            'urutan' => $request->urutan,
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('profilvisimisi')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function profilvisimisiedit($id){
        $data = ProfilPpidVisiMisi::findOrFail($id);
        return view('admin.Profil.PPID.visimisiedit', [
            'data' => $data
        ]);
    }

    public function profilvisimisidestroy($id){
        $data = ProfilPpidVisiMisi::find($id);
        $data->delete();

        // note : menambahkan session flash untuk menampilkan alert berhasil menghapus
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('profilvisimisi')->with('success', 'Data Berhasil Dihapus');
    }

    public function profiltugastanggungjawab(){
        $list = ProfilPpidTugasTanggungJawab::get();
        return view('admin.Profil.PPID.tugasdantanggungjawab', [
            'list' => $list,
        ]);
    }

    public function profiltugastanggungjawabstore(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'judul' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

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
        ProfilPpidTugasTanggungJawab::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filePath ?? null,
        ]);

        return redirect()->route('profiltugastanggungjawab')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function profiltugastanggungjawabedit($id){
        $data = ProfilPpidTugasTanggungJawab::findOrFail($id);
        return view('admin.Profil.PPID.tugasdantanggungjawabedit', [
            'data' => $data
        ]);
    }

    public function profiltugastanggungjawabdestroy($id){
        $data = ProfilPpidTugasTanggungJawab::find($id);
        $data->delete();

        // note : menambahkan session flash untuk menampilkan alert berhasil menghapus
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('profiltugastanggungjawab')->with('success', 'Data Berhasil Dihapus');
    }

    public function profilstruktur(){
        $general = ProfilPpidStrukturOrganisasi::findOrFail(1);
        return view('admin.Profil.PPID.struktur', [
            'data' => $general,
        ]);
    }

    public function profildasarhukum(){
        $list = ProfilPpidDasarHukum::get();
        return view('admin.Profil.PPID.dasarhukum', [
            'list' => $list,
        ]);
    }

    public function profildasarhukumstore(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'judul' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

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
        ProfilPpidDasarHukum::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filePath ?? null,
        ]);

        return redirect()->route('profildasarhukum')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function profildasarhukumedit($id){
        $data = ProfilPpidDasarHukum::findOrFail($id);
        return view('admin.Profil.PPID.dasarhukumedit', [
            'data' => $data
        ]);
    }

    public function profildasarhukumdestroy($id){
        $data = ProfilPpidDasarHukum::find($id);
        $data->delete();

        // note : menambahkan session flash untuk menampilkan alert berhasil menghapus
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('profildasarhukum')->with('success', 'Data Berhasil Dihapus');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        if($request->jenis_ppid == 'general'){
            $request->validate([
                'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            // Temukan data yang akan diperbarui
            $general = ProfilPpidGeneral::findOrFail(1);  
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
                $filePath = $general->gambar_profil;
            } 
            // Update data
            $general->update([
                'latar_belakang' => $request->latar_belakang,
                'tugas' => $request->tugas,
                'motto' => $request->motto,
                'gambar_profil' => $filePath
            ]);
            return redirect()->route('profilgeneral')->with('success', 'Data Berhasil Diperbarui');
        }elseif($request->jenis_ppid == 'visimisi'){
            // Temukan data yang akan diperbarui
            $general = ProfilPpidVisiMisi::findOrFail($id);   
            // Update data
            $general->update([
                'deskripsi' => $request->deskripsi,
                'jenis' => $request->jenis,
                'urutan' => $request->urutan,
            ]);
            return redirect()->route('profilvisimisi')->with('success', 'Data Berhasil Diperbarui');
        }elseif($request->jenis_ppid == 'visimisigeneral'){
            $request->validate([
                'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'file2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            // Temukan data yang akan diperbarui
            $general = ProfilPpidGeneral::findOrFail(1);   
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
                $filePath = $general->gambar_visi;
            }

            // Handle file upload
            if ($request->hasFile('file2')) {
                $file = $request->file('file2');

                // Nama file dengan timestamp untuk menghindari duplikat
                $fileName = time() . '_' . $file->getClientOriginalName();
        
                // Simpan file ke direktori public/upload
                $file->move(public_path('upload'), $fileName);
        
                // Simpan path file ke dalam database
                $filePath = 'upload/' . $fileName;
            } else {
                // Jika tidak ada file baru diunggah, gunakan file yang sudah ada
                $filePath2 = $general->gambar_misi;
            }
            // Update data
            $general->update([
                'gambar_visi' => $filePath,
                'gambar_misi' => $filePath2,
            ]);
            return redirect()->route('profilvisimisi')->with('success', 'Data Berhasil Diperbarui');
        }elseif($request->jenis_ppid == 'tugastanggungjawab'){
            // Validasi input
            $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
        
            // Temukan data yang akan diperbarui
            $tugastanggungjawab = ProfilPpidTugasTanggungJawab::findOrFail($id);
        
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
                $filePath = $tugastanggungjawab->gambar;
            }
        
            // Update data
            $tugastanggungjawab->update([
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'gambar' => $filePath,
            ]);
        
            return redirect()->route('profiltugastanggungjawab')->with('success', 'Data Berita berhasil diperbarui.');
        }elseif($request->jenis_ppid == 'struktur'){
            // Validasi input
            $request->validate([
                'deskripsi' => 'required|string',
                'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            // Temukan data yang akan diperbarui
            $general = ProfilPpidStrukturOrganisasi::findOrFail(1);  
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
                $filePath = $general->gambar;
            }
            // Update data
            $general->update([
                'deskripsi' => $request->deskripsi,
                'gambar' => $filePath,
            ]);
            return redirect()->route('profilstruktur')->with('success', 'Data Berhasil Diperbarui');
        }elseif($request->jenis_ppid == 'dasarhukum'){
            // Validasi input
            $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
        
            // Temukan data yang akan diperbarui
            $dasarhukum = ProfilPpidDasarHukum::findOrFail($id);
        
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
                $filePath = $dasarhukum->gambar;
            }
        
            // Update data
            $dasarhukum->update([
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'gambar' => $filePath,
            ]);
        
            return redirect()->route('profildasarhukum')->with('success', 'Data Berita berhasil diperbarui.');
        }

    }

    public function update_nolist(Request $request)
    {
        // Validasi input
        $request->validate([
            'deskripsi' => 'required',
            'judul' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
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

    public function show_profil_ppid(){
        $general = ProfilPpidGeneral::findOrFail(1);
        $visi = ProfilPpidVisiMisi::where('jenis', 'visi')->orderBy('urutan', 'ASC')->get();
        $misi = ProfilPpidVisiMisi::where('jenis', 'misi')->orderBy('urutan', 'ASC')->get();
        $tugas = ProfilPpidTugasTanggungJawab::get();
        $struktur = ProfilPpidStrukturOrganisasi::first();
        $hukum = ProfilPpidDasarHukum::get();
        return view('pages.profil.profilppid', [
            'general' => $general,
            'visi' => $visi,
            'misi' => $misi,
            'tugas' => $tugas,
            'struktur' => $struktur,
            'hukum' => $hukum,
        ]);
    }
}
