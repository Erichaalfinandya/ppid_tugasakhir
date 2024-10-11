<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\biodata;
use App\Models\User;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function datatable()
    {
        $data = biodata::leftJoin('users', 'users.id', '=', 'biodatas.user_id')->orderBy('nama_lengkap', 'asc')->get();
        return view('admin.daftar-user.datatable', compact('data'));
    }

    public function acc($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status' => 'terverifikasi',
        ]);
    
        return redirect()->route('daftar-user.datatable')->with('success', 'Data Berita berhasil diverifikasi.');
    }

    public function deny(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status' => 'tolak terverifikasi '.$request->input('alasan'),
        ]);
    
        return redirect()->route('daftar-user.datatable')->with('success', 'Data Berita berhasil ditolak verifikasi.');
    }
}
