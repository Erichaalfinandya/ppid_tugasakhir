<?php

namespace App\Http\Controllers;

use App\Models\biodata;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_user = auth()->user()->id;
        $data = User::leftJoin('biodatas', 'users.id', '=', 'biodatas.user_id')
            ->select(
                'users.id', 
                'biodatas.nama_lengkap',
                'biodatas.nama_depan',
                'biodatas.nama_belakang',
                'biodatas.nik',
                'users.email',
                'users.name',
                'users.password', 
                'users.foto',
                'users.ktp',
                'biodatas.telp',
                'biodatas.jenis_kelamin',
                'biodatas.alamat',
                'biodatas.tanggal_lahir',
                'biodatas.ttl'
                )
            ->where('users.id', $id_user)
            ->first();
        return view('profile', compact('data'));
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
        $id_user = auth()->user()->id;
        $image = $request->file('foto');
        $ktp = $request->file('ktp');
        $password = $request->password;
     
        $lastData = User::leftJoin('biodatas', 'users.id', '=', 'biodatas.user_id')
            ->select(
                'users.id', 
                'biodatas.user_id',
                'biodatas.nama_lengkap',
                'biodatas.nama_depan',
                'biodatas.nama_belakang',
                'biodatas.nik',
                'users.foto',
                'users.ktp',
                'users.email',
                'users.name',
                'users.password', 
                'biodatas.telp',
                'biodatas.jenis_kelamin',
                'biodatas.alamat',
                'biodatas.tanggal_lahir',
                'biodatas.ttl',
                'users.status'
                )
            ->where('users.id', $id_user)
            ->first();

        if($password === $lastData['password']){
            $updatedPassword = $lastData['password'];
        }else{
            $updatedPassword = bcrypt($password);
        }

        // Check if a file was uploaded
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('foto_user/', $imageName); 
            $imagePath = 'foto_user/'.$imageName;
        } else {
            $imagePath = null;
        }

        if ($ktp) {
            $folderPath = 'ktp_user/';
        
            // Cek apakah folder ada, jika tidak, buat folder
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0777, true); // 0777 adalah permission folder, 'true' untuk membuat folder secara rekursif
            }
        
            // Melanjutkan proses upload
            $ktpName = time() . '.' . $ktp->getClientOriginalExtension();
            $ktp->move($folderPath, $ktpName); 
            $ktpPath = $folderPath . $ktpName;
        } else {
            $ktpPath = null;
        }
   
        $data = [
            'user_id' => $id_user,
            'nama_lengkap' => $request->nama_lengkap ?? $lastData['nama_lengkap'],
            'nama_depan' => $request->nama_depan ?? $lastData['nama_depan'],
            'nama_belakang' => $request->nama_belakang ?? $lastData['nama_belakang'],
            'nik' => $request->nik ?? $lastData['nik'],
            'telp' => $request->telp ?? $lastData['telp'],
            'jenis_kelamin' => $request->jenis_kelamin ?? $lastData['jenis_kelamin'],
            'alamat' => $request->alamat ?? $lastData['alamat'],
            'tanggal_lahir' => $request->tanggal_lahir ?? $lastData['tanggal_lahir'],
            'ttl' => $request->ttl ?? $lastData['ttl'],
            'foto' => $imagePath ?? $lastData['foto'],
            'ktp' => $ktpPath ?? $lastData['ktp'],
            
        ];
        $dataUser = [
            'foto' => $imagePath ?? $lastData['foto'],
            'ktp' => $ktpPath ?? $lastData['ktp'],
            'name' => $request->name ?? $lastData['name'],
            'email' => $request->email ?? $lastData['email'],
            'password' => $updatedPassword,
        ];
      
        if($lastData['user_id'] == null){
            $dataUser['status'] = 'belum terverifikasi';
            User::where('id', $id_user)->update($dataUser);
            biodata::create($data);
            return redirect()->back();
        }else{
            if(str_contains($lastData->status, 'tolak terverifikasi')){
                $dataUser['status'] = 'belum terverifikasi';
            }
            biodata::where('user_id', $id_user)->update($data);
            User::where('id', $id_user)->update($dataUser);
            // note : menambahakan session flash setelah berhasil mengedit data user
            session()->flash('success', 'Data berhasil diperbarui');
            return redirect('user/detail-profile');
        }
        
    }

    public function detail()
    {
        $id_user = auth()->user()->id;
        $data = User::leftJoin('biodatas', 'users.id', '=', 'biodatas.user_id')
            ->select(
                'users.id', 
                'biodatas.nama_lengkap',
                'biodatas.nama_depan',
                'biodatas.nama_belakang',
                'biodatas.nik',
                'users.email',
                'users.name',
                'users.password', 
                'users.foto',
                'users.ktp',
                'biodatas.telp',
                'biodatas.jenis_kelamin',
                'biodatas.alamat',
                'biodatas.tanggal_lahir',
                'biodatas.ttl'
                )
            ->where('users.id', $id_user)
            ->first();
        return view('detail-profile', compact('data'));
    }

    public function detailForAdmin($id)
    {
        $id_user = $id;
        $data = User::leftJoin('biodatas', 'users.id', '=', 'biodatas.user_id')
            ->select(
                'users.id', 
                'biodatas.nama_lengkap',
                'biodatas.nama_depan',
                'biodatas.nama_belakang',
                'biodatas.nik',
                'users.email',
                'users.name',
                'users.password', 
                'users.foto',
                'users.ktp',
                'biodatas.telp',
                'biodatas.jenis_kelamin',
                'biodatas.alamat',
                'biodatas.tanggal_lahir',
                'biodatas.ttl'
                )
            ->where('users.id', $id_user)
            ->first();
        return view('detail-profile', compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
