<!-- note : js tambahan untuk alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@extends('layouts.inc.admin.master')
<style>
  /* Menghilangkan spinner di input number pada Chrome, Safari, Edge, dan Opera */
  input[type="number"]::-webkit-outer-spin-button,
  input[type="number"]::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
  }

  /* Menghilangkan spinner di input number pada Firefox */
  input[type="number"] {
      -moz-appearance: textfield;
  }
</style>
@section('content')
<div class="main-panel">
    <div class="col-md-12">
        <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
            <div class="d-flex">
                <i class="mdi mdi-settings menu-icon"></i>
                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Edit Profil&nbsp;/&nbsp;</p>
                <p class="text-primary mb-0 hover-cursor">Pengaturan Akun</p>
            </div>
        </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="group">
                    <img src="{{asset($data['foto'])}}" style="border-radius: 100%;width: 50px;height: 50px; margin-right:20px; float: left;">
                    <h4 class="card-title" style="margin:20px;">{{$data['nama_lengkap'] ?? NULL}}</h4>
                </div>
                <p></p>
            </div>


            <form class="forms-sample" method="POST" action="{{route('profile.store')}}" enctype="multipart/form-data" >
                @csrf

              <div class="form-group">
                <label>File upload</label>
                <input type="file" name="foto" class="form-control">
              </div>
              <div class="form-group">
                <label>Unggah KTP</label>
                <br>
                <img src="{{asset($data['ktp'])}}" style="width:200px;height:100px;object-fit:cover">
                <br>
                <br>
                <input type="file" name="ktp" class="form-control">
              </div>
              <input type="hidden" name="id" value="{{$data['id']}}">
              <div class="form-group">
                <label for="exampleInputName1">Nama Lengkap</label>
                <input type="text" class="form-control"  placeholder="Nama Lengkap" name="nama_lengkap" value="{{$data['nama_lengkap'] ?? null}}">
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputName1">Nama Depan</label>
                        <input type="text" class="form-control"  placeholder="Nama Depan" name="nama_depan" value="{{$data['nama_depan'] ?? null}}">
                    </div>
                    <div class="col-6">
                        <label for="exampleInputName1">Nama Belakang</label>
                        <input type="text" class="form-control"  placeholder="Nama Belakang" name="nama_belakang" value="{{$data['nama_belakang'] ?? null}}">
                    </div>
                </div>

              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">NIK/ No.Identitas Pribadi</label>
                <input type="text" class="form-control" placeholder="NIK" name="nik" value="{{$data['nik'] ?? null}}" pattern="\d{16}" maxlength="16" required title="NIK harus 16 digit angka">
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" style="color:black">
                 <option value="{{$data['jenis_kelamin'] ?? null}}">{{$data['jenis_kelamin'] ?? 'Pilih Jenis Kelamin'}}</option>
                  <option value="Laki - laki">Laki - laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" value="{{$data['tanggal_lahir'] ?? null}}">
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                <input class="form-control" name="ttl" placeholder="Tempat Lahir" value="{{$data['ttl'] ?? null}}">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" placeholder="Alamat">{{$data['alamat'] ?? null}}</textarea>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control"  placeholder="Email" name="email" value="{{$data['email'] ?? null}}" readonly>
              </div>


              {{-- <div class="form-group"> --}}
                {{-- <label for="exampleInputCity1">Username</label> --}}
                <input type="hidden" class="form-control" id="exampleInputCity1" placeholder="Username" name="username" value="{{$data['name'] ?? null}}">
              {{-- </div> --}}
              <div class="form-group">
                <label for="exampleInputCity1">Password</label>
                <input type="password" class="form-control" id="exampleInputCity1" placeholder="Password" name="password" value="{{$data['password'] ?? null}}" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}" required
                title="Password harus minimal 8 karakter, mengandung huruf kecil, huruf besar, dan angka">

              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Telp</label>
                <input type="number" class="form-control" id="exampleInputCity1" placeholder="No telp" name="telp" value="{{$data['telp']}}">
              </div>

              <button type="submit" class="btn btn-primary me-2">Kirim</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
</div>
<!-- note : Jika terdapat session dengan data success maka tampilkan alert dari sweetalert sesuai dengan isi data successnya -->
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '{{ session("success") }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif
@endsection
