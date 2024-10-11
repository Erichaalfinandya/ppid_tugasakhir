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
  .profile-photo {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
  }
  .ktp-img {
        width: 100%;
        max-width: 300px;
        height: auto;
  }
</style>
@section('content')
<div class="main-panel">
    <div class="col-md-12">
        <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
            <div class="d-flex">
                <i class="mdi mdi-account menu-icon"></i>
                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Profil&nbsp;/&nbsp;</p>
                <p class="text-primary mb-0 hover-cursor">Detail Profil</p>
            </div>
        </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{asset($data['foto'])}}" alt="Foto" class="profile-photo img-fluid">
                    <h3 class="mt-3">{{$data['nama_lengkap'] ?? NULL}}</h3>
                    <div class="col-md-12">
                    @if(auth()->user()->status === 'belum melengkapi data')
                    <div class="alert alert-danger" role="alert">
                        Silahkan melengkapi data diri anda terlebih dahulu untuk dapat menggunakan fitur-fitur yang tersedia dalam sistem PPID Kota Surakarta.
                        <br>
                        <a href="{{ url('/user/profile') }}" class="btn btn-md btn-danger text-white mt-2">Lengkapi Data Diri Sekarang</a>
                    </div>
                    @elseif(auth()->user()->status === 'belum terverifikasi')
                    <div class="alert alert-warning" role="alert">
                        Anda sudah melengkapi data diri. Silahkan menunggu admin memverifikasi akun anda terlebih dahulu sebelum dapat menggunakan fitur-fitur yang tersedia dalam sistem PPID Kota Surakarta.
                    </div>
                    @elseif(str_contains(auth()->user()->status, 'tolak terverifikasi'))
                    <div class="alert alert-warning" role="alert">
                        Akun anda ditolak verifikasi oleh admin dengan alasan <strong>"{{ substr(auth()->user()->status, 20) }}"</strong>. Silahkan memperbaiki data diri dan menunggu admin memverifikasi ulang akun anda terlebih dahulu sebelum dapat menggunakan fitur-fitur yang tersedia dalam sistem PPID Kota Surakarta.
                        <br>
                        <a href="{{ url('/user/profile') }}" class="btn btn-md btn-danger text-white mt-2">Ubah Data Diri Sekarang</a>
                    </div>
                    @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{$data['id']}}</td>
                            </tr>
                            <tr>
                                <th>Nama Depan</th>
                                <td>{{$data['nama_depan'] ?? null}}</td>
                            </tr>
                            <tr>
                                <th>Nama Belakang</th>
                                <td>{{$data['nama_belakang'] ?? null}}</td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <td>{{$data['nik'] ?? null}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$data['email'] ?? null}}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>{{$data['name'] ?? null}}</td>
                            </tr>
                            <tr>
                                <th>Telp</th>
                                <td>{{$data['telp']}}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{$data['jenis_kelamin'] ?? null}}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{$data['alamat'] ?? null}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{date_format(date_create($data['tanggal_lahir']), 'd M Y') ?? null}}</td>
                            </tr>
                            <tr>
                                <th>Tempat Tanggal Lahir</th>
                                <td>{{$data['ttl'] ?? null}}, {{date_format(date_create($data['tanggal_lahir']), 'd M Y') ?? null}}</td>
                            </tr>
                            <tr>
                                <th>File KTP</th>
                                <td><button class="btn btn-md btn-success text-white" onclick="lihat_ktp()">Lihat KTP</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
</div>
<script>
    function lihat_ktp(){
        Swal.fire({
            html: `<div class="row mt-4"><div class="col-md-12 text-center"><h5>File KTP</h5><img src="{{asset($data['ktp'])}}" alt="KTP" class="ktp-img img-fluid"></div></div>`,
            showConfirmButton: false,
        });
    }
</script>
@endsection
