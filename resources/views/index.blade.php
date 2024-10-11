<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>PPID Kota Surakarta </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
        <style>
            /* Floating Button Container */
        .floating-container {
            position: fixed;
            bottom: 40px;
            right: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 1000;
        }

        /* Floating Button */
        .floating-btn {
            width: 60px;
            height: 60px;
            background-color: #007bff;
            color: #fff;
            border-radius: 50%;
            text-align: center;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .floating-btn i {
            font-size: 24px;
            line-height: 60px;
        }

        /* Hover effect */
        .floating-btn:hover {
            background-color: #0056b3;
        }

        /* Floating Menu */
        .floating-menu {
            display: none;
            flex-direction: column;
            margin-top: 10px;
        }

        .floating-menu-item {
            width: 60px;
            height: 60px;
            background-color: #fff;
            color: #007bff;
            border-radius: 50%;
            text-align: center;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            margin-bottom: 10px;
            text-decoration: none;
            line-height: 60px;
        }

        .floating-menu-item:hover {
            background-color: #f0f0f0;
        }

        /* note : tambahan css styling untuk owlcarousel icon link */
        #owl-carousel-index.owl-carousel .owl-stage {
            display: flex;
            align-items: center;
        }
        #owl-carousel-index.owl-carousel .owl-stage {
            display: flex;
            align-items: center;
        }
        </style>
        <style>
            .blog-img-inner {
                width: 100%;
                height: 200px; /* Menetapkan tinggi tetap untuk gambar */
                overflow: hidden; /* Memastikan gambar yang melebihi area terpotong */
            }

            .blog-img-inner img {
                width: 100%;
                height: 100%;
                object-fit: cover; /* Menjaga proporsi gambar dan memotong sesuai area */
            }
        </style>

        <!-- Berita Pemerintah Start -->
<style>
    .blog-img-inner {
        width: 100%;
        height: 200px; /* Menetapkan tinggi tetap untuk gambar */
        overflow: hidden; /* Memastikan gambar yang melebihi area terpotong */
    }

    .blog-img-inner img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Menjaga proporsi gambar dan memotong sesuai area */
    }

    .blog-item {
    display: flex;
    flex-direction: column;
    height: 100%; /* Memastikan tinggi blog-item memanjang */
}

.blog-img {
    flex-shrink: 0; /* Agar gambar tidak berubah ukuran */
}

.blog-content {
    flex: 1; /* Memastikan konten mengambil sisa ruang */
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Mengatur jarak antar elemen di dalam blog-content */
}

.blog-content p {
    flex: 1;
    overflow: hidden;
    text-overflow: ellipsis;
}

.blog-content .btn {
    margin-top: auto; /* Memastikan tombol berada di bawah konten */
    padding: 0.5rem 1rem; /* Menyesuaikan padding tombol */
    font-size: 0.875rem; /* Menyesuaikan ukuran font tombol */
    max-width: 150px; /* Menentukan lebar maksimum tombol */
    text-align: center; /* Menjaga teks tombol tetap terpusat */
}

.blog-content .btn-container {
    display: flex;
    justify-content: center; /* Menjaga tombol berada di tengah */
}

.blog-info small {
    color: #000000; /* Warna hitam untuk teks */
    /* Atau untuk warna biru, gunakan kode berikut:
    color: #0056b3; */
}

.blog-info i {
    color: #0056b3; /* Warna biru untuk ikon */
}

.blog-info .text-primary {
    color: #0056b3; /* Warna biru untuk ikon dan teks jika menggunakan class text-primary */
}
</style>

        @include('include.style')

    </head>

    <body>

        @include('include.navbar')

        <!-- Formulir Pengajuan Start -->
        <div class="untree_co-section py-5">
            <div class="container">
                <!-- Floating Button Start -->
                <div class="floating-container">
                    <div class="floating-btn">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="floating-menu">
                        <a href="{{route('tanyaAdmin.index')}}" class="floating-menu-item"><i class="fas fa-comments"></i></a>
                        <a href="#" class="floating-menu-item" id="scrollTopBtn"><i class="fa fa-arrow-up"></i></a>
                    </div>
                </div>
                <!-- Floating Button End -->
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

        <!-- Layanan Start -->
        <div class="container-fluid packages py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Home</h5>
                    <h1 class="mb-0">Layanan PPID </h1>
                </div>
                <section id="category">
                    <div class="container ">
                        <div class="d-md-flex justify-content-between align-items-center">
                        </div>
                        <div class="row g-md-3 mt-2">
                            <div class="col-md-4">
                                <div class="primary rounded-3 p-4 my-3">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-primary">
                                            <use href="#pencil-box" class="svg-primary" />
                                        </svg>
                                        <div class="ps-4">
                                            <a href="{{ Route('maklumatpelayanan') }}">
                                                <p class="category-paragraph fw-bold text-uppercase mb-1">Maklumat Pelayanan</p>
                                                <p class="category-paragraph m-0">Berisi tentang Standar Pelayanan Informasi Publik</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="primary rounded-3 p-4 my-3">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-primary">
                                            <use href="#pencil-box" class="svg-primary" />
                                        </svg>
                                        <div class="ps-4">
                                            <a href="{{ Route('daftarinformasipublik') }}">
                                                <p class="category-paragraph fw-bold text-uppercase mb-1">Daftar Informasi Publik</p>
                                                <p class="category-paragraph m-0">Berisi Informasi Berkala, Serta Merta, Setiap Saat</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="primary rounded-3 p-4 my-3">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-primary">
                                            <use href="#pencil-box" class="svg-primary" />
                                        </svg>
                                        <div class="ps-4">
                                            <a href="{{ Route('layananinformasiberkala') }}">
                                                <p class="category-paragraph fw-bold text-uppercase mb-1">Informasi Berkala</p>
                                                <p class="category-paragraph m-0">Berisi tentang Daftar Informasi Berkala</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="primary rounded-3 p-4 my-3">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-primary">
                                            <use href="#pencil-box" class="svg-primary" />
                                        </svg>
                                        <div class="ps-4">
                                            <a href="{{ Route('layananinformasisertamerta') }}">
                                                <p class="category-paragraph fw-bold text-uppercase mb-1">Informasi Serta Merta</p>
                                                <p class="category-paragraph m-0">Berisi tentang Daftar Informasi Serta Merta</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="primary rounded-3 p-4 my-3">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-primary">
                                            <use href="#pencil-box" class="svg-primary" />
                                        </svg>
                                        <div class="ps-4">
                                            <a href="{{ Route('layananinformasisetiapsaat') }}">
                                                <p class="category-paragraph fw-bold text-uppercase mb-1">Informasi Setiap Saat</p>
                                                <p class="category-paragraph m-0">Berisi tentang Daftar Informasi Setiap Saat</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="primary rounded-3 p-4 my-3">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-primary">
                                            <use href="#pencil-box" class="svg-primary" />
                                        </svg>
                                        <div class="ps-4">
                                            <a href="{{ Route('layananinformasidikecualikan') }}">
                                                <p class="category-paragraph fw-bold text-uppercase mb-1">Informasi Dikecualikan</p>
                                                <p class="category-paragraph m-0">Berisi tentang Daftar Informasi Dikecualikan</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="primary rounded-3 p-4 my-3">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-primary">
                                            <use href="#pencil-box" class="svg-primary" />
                                        </svg>
                                        <div class="ps-4">
                                            <a href="https://sippn.menpan.go.id/pelayanan-publik/8139805/pemerintah-kota-surakarta/pelayanan-unit-layanan-aduan-surakarta-ulas">
                                                <p class="category-paragraph fw-bold text-uppercase mb-1">ULAS</p>
                                                <p class="category-paragraph m-0">Berisi Tentang Pelayanan Unit Layanan Aduan Surakarta</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- Layanan End -->

        <!-- Berita Start -->
        <div class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Home</h5>
                    <h1 class="mb-0">Berita PPID</h1>
                </div>
                <div class="row g-4 justify-content-center blogs-carousel owl-carousel">
                    @foreach($berita as $item) <!-- Tambahkan $index -->
                    <div class="col-lg-12 col-md-12">
                        <div class="blog-item">
                            <div class="blog-img">
                                <div class="blog-img-inner">
                                    <img class="img-fluid w-100 rounded-top" src="{{ $item->sampul }}" alt="Image">
                                    <div class="blog-icon">
                                        <a href="{{ $item->sampul }}" data-fancybox="gallery" data-caption="{{ $item->judul }}" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                                    </div>
                                </div>
                                <div class="blog-info d-flex align-items-center border border-start-0 border-end-0">
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa fa-map-marker-alt text-primary me-2"></i>PPID
                                    </small>
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa fa-calendar-alt text-primary me-2"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('d M') }}
                                    </small>
                                    <small class="flex-fill text-center py-2">
                                        <i class="fa fa-clock text-primary me-2"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }}
                                    </small>
                                </div>
                            </div>
                            <div class="blog-content border border-top-0 rounded-bottom p-4">
                                <p class="mb-3">Posted By: {{ $item->penerbit }}</p>
                                <a href="#" class="h4 blog-title">{{ $item->judul }}</a>
                                <p class="my-3 blog-description">{{ strlen($item->deskripsi) > 100 ? substr($item->deskripsi, 0, 100) . '...' : $item->deskripsi }}</p>
                                <a href="{{ url('/pages.berita.beritappid/'.$item->id) }}" class="btn btn-primary rounded-pill py-2 px-4">Lihat</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Berita End -->

        <!-- Link Instansi Start -->
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Home</h5>
                <h1 class="mb-0">Link Setiap Instansi atau lembaga </h1>
            </div>
            <section id="brand-collection" class="padding-small border-top border-bottom overflow-hidden margin-large mb-0">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                    <div class="owl-carousel" id="owl-carousel-index">
                        <a href="https://tamansafari.com/"><img src="img/logo5.png" alt="brand"></a>
                        <a href="https://www.instagram.com/bappedasolo/?hl=en"><img src="img/logo1.ico" alt="brand"></a>
                        <a href="https://bkpsdm.bandungkab.go.id/"><img src="img/logo2.ico" alt="brand"></a>
                        <a href="https://dispora.surakarta.go.id/"><img src="img/logo3.ico" alt="brand"></a>
                        <a href="https://www.instagram.com/radiokonata/?hl=en"><img src="img/logo4.ico" alt="brand"></a>
                    </div>
                </div>
                </div>
            </section>
        </div>
        <!-- Link Instansi End -->

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
                        {{-- <a href="#" class="btn btn-light text-primary rounded-pill py-3 px-5 mt-2">Read More</a> --}}
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
        <!-- Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Anda harus login terlebih dahulu untuk mengirim ulasan.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Review End -->

        <!-- Review Website Start -->
        <div class="container-fluid testimonial py-5">

            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">HOME</h5>
                    <h1 class="mb-0">Ulasan Pengguna</h1>
                </div>
                <div class="testimonial-carousel owl-carousel">
                    @foreach ($data as $datas)
                    <div class="testimonial-item text-center rounded pb-4">
                        <div class="testimonial-comment bg-light rounded p-4">
                            <p class="text-center mb-5">{{$datas['ulasan_isi']}}
                            </p>
                        </div>
                        <div class="testimonial-img p-1">
                            <img src="{{$datas['foto']}}" class="img-fluid rounded-circle" alt="Image">
                        </div>
                        <div style="margin-top: -35px;">
                            <h5 class="mb-0">{{$datas['ulasan_nama']}}</h5>
                            <p class="mb-0">{{$datas['ulasan_type']}}</p>
                            <div class="d-flex justify-content-center">
                                @for ($i = 0; $i < $datas['ulasan_rating']; $i++)
                                <i class="fas fa-star text-primary"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Review Website End -->

        <!-- Kontak Kami Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">HOME</h5>
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

        <!-- note : js tambahan untuk carousel -->
        <script>
            $("#owl-carousel-index").owlCarousel({
                center: true,
                items:5,
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:1000,
                autoplayHoverPause:true,
            });
        </script>

        <script>
            function submitForm() {
                alert("Anda harus login terlebih dahulu!");
                window.location.href = "{{ route('login') }}";
            }
        </script>
        <!-- note : fancy box plugin untuk lightbox seperti di galeri -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $("[data-fancybox]").fancybox({
                video: {
                    autoStart: true,
                    preload: true
                },
                buttons: [
                    "zoom",
                    "share",
                    "slideShow",
                    "fullScreen",
                    "download",
                    "thumbs",
                    "close"
                ],
                youtube: {
                    controls: 0,
                    showinfo: 0
                },
                vimeo: {
                    color: 'f00'
                }
            });
        });
    </script>
    </body>

</html>
