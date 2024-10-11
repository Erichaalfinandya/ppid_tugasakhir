<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>PPID Kota Surakarta </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        @include('include.style')

    </head>

    <body>

        @include('include.navbar')

        <!-- Formulir Pengajuan Start -->
        <div class="untree_co-section py-5">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                        <h5 class="section-title px-3">Home</h5>
                        <h1 class="mb-0">Formulir Pengajuan</h1>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="border border-primary rounded position-relative vesitable-item mb-4">
                            <div class="vesitable-img">
                                <img src="img/permohonan.png" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="p-4 rounded-bottom">
                                <h4>Permohonan</h4>
                                <h5>Formulir Permohonan Layanan Informasi</h5>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    @if(Auth::check())
                                        <a href="{{ Route('formulir.permohonan') }}" class="btn btn-permohonan rounded-pill px-3 btn-center">Klik Disini</a>
                                    @else
                                        <div class="alert alert-warning text-center" role="alert">
                                            <p>
                                                Anda harus <a href="{{ route('login') }}" class="alert-link">Login</a> terlebih dahulu untuk mengajukan Permohonan Layanan Informasi. 
                                                Karena Pengajuan Permohonan Informasi ini memerlukan data identitas diri. Terimakasih.
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border border-primary rounded position-relative vesitable-item mb-4">
                            <div class="vesitable-img">
                                <img src="img/keberatan.png" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="p-4 rounded-bottom">
                                <h4>Keberatan</h4>
                                <h5>Formulir Pengajuan Keberatan Informasi</h5>
                                @if(Auth::check())
                                    <a href="{{ route('formulir.permohonan-keberatan') }}" class="btn btn-keberatan rounded-pill px-3 btn-center">
                                        Klik Disini
                                    </a>
                                @else
                                    <div class="alert alert-warning text-center" role="alert">
                                        <p>
                                            Anda harus <a href="{{ route('login') }}" class="alert-link">Login</a> terlebih dahulu untuk mengajukan keberatan, 
                                            karena memerlukan data identitas diri pengajuan ini bisa diajukan setelah pengajuan permohonan selesai.
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border border-primary rounded position-relative vesitable-item mb-4">
                            <div class="vesitable-img">
                                <img src="img/publik.png" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="p-4 rounded-bottom">
                                <h4>Sengketa</h4>
                                <h5>Formulir Penyelesaian Sengketa</h5>
                                @if(Auth::check())
                                    <a href="{{ Route('permohonansengketa.formulir') }}" class="btn btn-sengketa rounded-pill px-3 btn-center">
                                        Klik Disini
                                    </a>
                                @else
                                    <div class="alert alert-warning text-center" role="alert">
                                        <p>
                                            Anda harus <a href="{{ route('login') }}" class="alert-link">Login</a> terlebih dahulu untuk melakukan pengajuan ini. 
                                            Pengajuan sengketa memerlukan data identitas diri, dan bisa dilakukan setelah pengajuan permohonan, dan keberatan selesai.
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Formulir Pengajuan End -->

        <!-- Form Review Start -->
        <div class="container-fluid booking py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h5 class="section-booking-title pe-3">Review</h5>
                        <h1 class="text-white mb-4">Ulasan</h1>
                        <p class="text-white mb-4">Berdasarkan Informasi yang ada pada Website PPID Kota Surakarta ini, apabila ada kekurangan terkait informasi silahkan isi ulasan berikut ini !!
                        </p>
                        <p class="text-white mb-4">Silahkan berikan Ulasan Terbaik Anda, sesuai dengan ketentuan dan kejelasan dalam website PPID Kota Surakarta.
                        </p>
                        <a href="#" class="btn btn-light text-primary rounded-pill py-3 px-5 mt-2">Read More</a>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="text-white mb-3">Formulir Ulasan</h1>
                        <p class="text-white mb-3">Isilah ulasan dengan baik <span class="text-warning">Terimakasih</span></p>
                        <form method="POST" action="{{route('ulasan.store')}}">
                            @csrf
                            <div class="mb-1 rating">
                                <input type="radio" id="star5" name="ulasan_rating" value="5"><label for="star5"></label>
                                <input type="radio" id="star4" name="ulasan_rating" value="4"><label for="star4"></label>
                                <input type="radio" id="star3" name="ulasan_rating" value="3"><label for="star3"></label>
                                <input type="radio" id="star2" name="ulasan_rating" value="2"><label for="star2"></label>
                                <input type="radio" id="star1" name="ulasan_rating" value="1"><label for="star1"></label>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                    @if(Auth::check())
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        @php
                                        $dataUser = App\Models\biodata::where('user_id', Auth::user()->id)->first();
                                        @endphp
                                        <input type="text" class="form-control bg-white border-0" id="name" placeholder="Your Name" name="ulasan_nama" value="{{$dataUser['nama_lengkap'] ?? null}}" readonly>
                                        @else
                                        <input type="text" class="form-control bg-white border-0" id="name" placeholder="Your Name" name="ulasan_nama">
                                    @endif
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select bg-white border-0" id="select1" name="ulasan_type">
                                            <option value="mahasiswa">Mahasiswa</option>
                                            <option value="pekerja">Pekerja</option>
                                            <option value="penduduk lokal">Penduduk Lokal</option>
                                        </select>
                                        <label for="select1">Status</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-white border-0" placeholder="Special Request" id="message" style="height: 100px" name="ulasan_isi"></textarea>
                                        <label for="message">Ulasan</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    @if(Auth::check())
                                        @if(Auth::user()->status === 'terverifikasi')
                                            @php
                                            $review = App\Models\Ulasan::leftJoin('users', 'ulasans.user_id', '=', 'users.id')->where('user_id', Auth::user()->id)->count();
                                            @endphp
                                            @if ($review == 0)
                                                <button class="btn btn-primary text-white w-100 py-3" type="submit">Kirim</button>
                                            @else
                                                <button class="btn btn-primary text-white w-100 py-3" type="submit" onclick="alert('Mohon maaf anda sudah pernah mengirimkan ulasan dahulu');return false">Kirim</button>
                                            @endif
                                        @else
                                        <button class="btn btn-primary text-white w-100 py-3" type="submit" onclick="alert('Mohon maaf anda harus terverifikasi terlebih dahulu');return false">Kirim</button>
                                        @endif
                                    @else
                                    <button class="btn btn-primary text-white w-100 py-3" onclick="alert('Mohon maaf anda harus login terlebih dahulu');return false" type="button">Kirim</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Review End -->

        <!-- Kontak Kami Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Kontak</h5>
                    <h1 class="mb-0">Kontak Kami</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp mx-auto" data-wow-delay="0.1s">
                        <h5>Kontak Kami</h5>
                        <p class="mb-4">Pejabat Pengelola Informasi dan Dokumentasi Kota Surakarta Alamat CRJH+2VW, Jl. Jend. Sudirman, Kedung Lumbu, Kec. Ps. Kliwon, Kota Surakarta, Jawa Tengah 57133</a>.</p>
                        <div class="d-flex align-items-center mb-3">
                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                                <i class="fa fa-phone text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="text-primary">Telepon</h5>
                                <p class="mb-0">(0271) 2931669</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                                <i class="fa fa-envelope-open text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="text-primary">Email</h5>
                                <p class="mb-0">ppid@surakarta.go.id</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                                <i class="fa fa-clock text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="text-primary">Jam Operasional</h5>
                                <p class="mb-0">Senin - Kamis : 07:15 - 16:00 </p>
                                <p class="mb-0">Jumat : 07:00 - 11:30</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="position-relative rounded w-100 h-100">
                            <iframe class="position-relative rounded w-100 h-100"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.825256172363!2d110.8315359147843!3d-7.556290394547203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1677d5f2df8d%3A0x30d8aaf89f5f8a93!2sKantor%20PPID%20Surakarta!5e0!3m2!1sen!2sid!4v1658745868656!5m2!1sen!2sid"
                                frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                            </iframe>
                            <a href="https://maps.app.goo.gl/3hcR8J5j55z48VwJA" target="_blank" class="btn btn-primary position-absolute" style="top: 10px; right: 10px;">
                                Lokasi PPID Kota Surakarta
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kontak Kami End -->

        @include('include.footer') 

        @include('include.script')
        
    </body>

</html>