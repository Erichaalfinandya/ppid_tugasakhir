<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>PPID Kota Surakarta </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
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
        </style>

        @include('include.style')

    </head>

    <body>

        @include('include.navbar')

        <!-- Formulir Pengajuan Start -->
        <div class="untree_co-section py-5">
            <!-- Floating Button -->
        <div class="floating-container">
            <div class="floating-btn">
                <i class="fas fa-bars"></i>
            </div>
            <div class="floating-menu">
                <a href="{{route('tanyaAdmin.index')}}" class="floating-menu-item"><i class="fas fa-comments"></i></a>
                <a href="#" class="floating-menu-item" id="scrollTopBtn"><i class="fa fa-arrow-up"></i></a>
            </div>
        </div>

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
                                    <a href="" class="btn border border-secondary rounded-pill px-3 text-primary"></i>Klik Disini</a>
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
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <a href="" class="btn border border-secondary rounded-pill px-3 text-primary btn-center"></i>Klik Disini</a>
                                </div>
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
                                <h5>Formulir Permohonan Penyelesaian Sengketa</h5>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <a href="" class="btn border border-secondary rounded-pill px-3 text-primary btn-center"></i>Klik Disini</a>
                                </div>
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
                                            <p class="category-paragraph fw-bold text-uppercase mb-1">Maklumat Pelayanan</p>
                                            <p class="category-paragraph m-0">Berisi tentang Standar Pelayanan Informasi Publik</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="primary rounded-3 p-4 my-3">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-primary">
                                            <use href="#pencil-box" class="svg-primary" />
                                        </svg>
                                        <div class="ps-4">
                                            <p class="category-paragraph fw-bold text-uppercase mb-1">Daftar Informasi Publik</p>
                                            <p class="category-paragraph m-0">Berisi Informasi Berkala, Serta Merta, Setiap Saat</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="primary rounded-3 p-4 my-3">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-primary">
                                            <use href="#pencil-box" class="svg-primary" />
                                        </svg>
                                        <div class="ps-4">
                                            <p class="category-paragraph fw-bold text-uppercase mb-1">Informasi Berkala</p>
                                            <p class="category-paragraph m-0">Berisi tentang Daftar Informasi Berkala</p>
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
                                            <p class="category-paragraph fw-bold text-uppercase mb-1">Informasi Serta Merta</p>
                                            <p class="category-paragraph m-0">Berisi tentang Daftar Informasi Serta Merta</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="primary rounded-3 p-4 my-3">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-primary">
                                            <use href="#pencil-box" class="svg-primary" />
                                        </svg>
                                        <div class="ps-4">
                                            <p class="category-paragraph fw-bold text-uppercase mb-1">Informasi Setiap Saat</p>
                                            <p class="category-paragraph m-0">Berisi tentang Daftar Informasi Setiap Saat</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="primary rounded-3 p-4 my-3">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-primary">
                                            <use href="#pencil-box" class="svg-primary" />
                                        </svg>
                                        <div class="ps-4">
                                            <p class="category-paragraph fw-bold text-uppercase mb-1">Informasi Dikecualikan</p>
                                            <p class="category-paragraph m-0">Berisi tentang Daftar Informasi Dikecualikan</p>
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
                                            <p class="category-paragraph fw-bold text-uppercase mb-1">PPID Pelaksana</p>
                                            <p class="category-paragraph m-0">Berisi tentang Link PPID Pelaksana Kota Surakarta</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="primary rounded-3 p-4 my-3">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-primary">
                                            <use href="#pencil-box" class="svg-primary" />
                                        </svg>
                                        <div class="ps-4">
                                            <p class="category-paragraph fw-bold text-uppercase mb-1">Prosedur</p>
                                            <p class="category-paragraph m-0">Berisi Tata Cara Permohonan Informasi, keberatan, Sengketa</p>
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
        <div class="container-fluid packages py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Home</h5>
                    <h1 class="mb-0">Berita PPID</h1>
                </div>
                <div class="packages-carousel owl-carousel">
                    <div class="packages-item">
                        <div class="packages-img">
                            <img src="img/packages-4.jpg" class="img-fluid w-100 rounded-top" alt="Image">
                            <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>PPID</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>15 Jan</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>10.37</small>
                            </div>
                            <div class="packages-price py-2 px-4">PPID</div>
                        </div>
                        <div class="packages-content bg-light">
                            <div class="p-4 pb-0">
                                <h5 class="mb-0 py-2">Pendampingan Pengisian Data PPID RSUD Bung Karno</h5>
                                <small class="mb-4 py-2">Dalam rangka kelancaran pelaksanaan pelayanan informasi publik, Pejabat pelaksana Informasi dan Dokumentasi (PPID) Pelaksana RSUD Bung Karno Tahun 2024 melaksanakan pembaruan data informasi di website PPID.</small>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    <a href="https://ppid.surakarta.go.id/pendampingan-pengisian-data-ppid-rsud-bung-karno/" class="btn-hover btn text-white py-2 px-4">Selengkapnya</a>
                                </div>
                                <div class="col-6 text-end px-0">
                                    <a href="https://ppid.surakarta.go.id/pendampingan-pengisian-data-ppid-rsud-bung-karno/" class="btn-hover btn text-white py-2 px-4">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="packages-item">
                        <div class="packages-img">
                            <img src="img/packages-4.jpg" class="img-fluid w-100 rounded-top" alt="Image">
                            <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>PPID</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>15 Jan</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>10.37</small>
                            </div>
                            <div class="packages-price py-2 px-4">PPID</div>
                        </div>
                        <div class="packages-content bg-light">
                            <div class="p-4 pb-0">
                                <h5 class="mb-0 py-2">Pendampingan Pengisian Data PPID RSUD Bung Karno</h5>
                                <small class="mb-4 py-2">Dalam rangka kelancaran pelaksanaan pelayanan informasi publik, Pejabat pelaksana Informasi dan Dokumentasi (PPID) Pelaksana RSUD Bung Karno Tahun 2024 melaksanakan pembaruan data informasi di website PPID.</small>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    <a href="https://ppid.surakarta.go.id/pendampingan-pengisian-data-ppid-rsud-bung-karno/" class="btn-hover btn text-white py-2 px-4">Selengkapnya</a>
                                </div>
                                <div class="col-6 text-end px-0">
                                    <a href="https://ppid.surakarta.go.id/pendampingan-pengisian-data-ppid-rsud-bung-karno/" class="btn-hover btn text-white py-2 px-4">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="packages-item">
                        <div class="packages-img">
                            <img src="img/packages-4.jpg" class="img-fluid w-100 rounded-top" alt="Image">
                            <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>PPID</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>15 Jan</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>10.37</small>
                            </div>
                            <div class="packages-price py-2 px-4">PPID</div>
                        </div>
                        <div class="packages-content bg-light">
                            <div class="p-4 pb-0">
                                <h5 class="mb-0 py-2">Pendampingan Pengisian Data PPID RSUD Bung Karno</h5>
                                <small class="mb-4 py-2">Dalam rangka kelancaran pelaksanaan pelayanan informasi publik, Pejabat pelaksana Informasi dan Dokumentasi (PPID) Pelaksana RSUD Bung Karno Tahun 2024 melaksanakan pembaruan data informasi di website PPID.</small>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    <a href="https://ppid.surakarta.go.id/pendampingan-pengisian-data-ppid-rsud-bung-karno/" class="btn-hover btn text-white py-2 px-4">Selengkapnya</a>
                                </div>
                                <div class="col-6 text-end px-0">
                                    <a href="https://ppid.surakarta.go.id/pendampingan-pengisian-data-ppid-rsud-bung-karno/" class="btn-hover btn text-white py-2 px-4">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="packages-item">
                        <div class="packages-img">
                            <img src="img/packages-4.jpg" class="img-fluid w-100 rounded-top" alt="Image">
                            <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>PPID</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>15 Jan</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>10.37</small>
                            </div>
                            <div class="packages-price py-2 px-4">PPID</div>
                        </div>
                        <div class="packages-content bg-light">
                            <div class="p-4 pb-0">
                                <h5 class="mb-0 py-2">Pendampingan Pengisian Data PPID RSUD Bung Karno</h5>
                                <small class="mb-4 py-2">Dalam rangka kelancaran pelaksanaan pelayanan informasi publik, Pejabat pelaksana Informasi dan Dokumentasi (PPID) Pelaksana RSUD Bung Karno Tahun 2024 melaksanakan pembaruan data informasi di website PPID.</small>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    <a href="https://ppid.surakarta.go.id/pendampingan-pengisian-data-ppid-rsud-bung-karno/" class="btn-hover btn text-white py-2 px-4">Selengkapnya</a>
                                </div>
                                <div class="col-6 text-end px-0">
                                    <a href="https://ppid.surakarta.go.id/pendampingan-pengisian-data-ppid-rsud-bung-karno/" class="btn-hover btn text-white py-2 px-4">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <a href="https://tamansafari.com/"><img src="img/logo5.png" alt="brand"></a>
                    <a href="https://www.instagram.com/bappedasolo/?hl=en"><img src="img/logo1.ico" alt="brand"></a>
                    <a href="https://bkpsdm.bandungkab.go.id/"><img src="img/logo2.ico" alt="brand"></a>
                    <a href="https://dispora.surakarta.go.id/"><img src="img/logo3.ico" alt="brand"></a>
                    <a href="https://www.instagram.com/radiokonata/?hl=en"><img src="img/logo4.ico" alt="brand"></a>
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
                                        <input type="text" class="form-control bg-white border-0" id="name" placeholder="Your Name" name="ulasan_nama">
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
                                    <button class="btn btn-primary text-white w-100 py-3" type="submit" onclick="submitForm()">Kirim</button>
                                </div>
                            </div>
                        </form>
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
                            <img src="img/testimonial-1.jpg" class="img-fluid rounded-circle" alt="Image">
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
                    {{-- <div class="testimonial-item text-center rounded pb-4">
                        <div class="testimonial-comment bg-light rounded p-4">
                            <p class="text-center mb-5">Website mudah dimengerti
                            </p>
                        </div>
                        <div class="testimonial-img p-1">
                            <img src="img/testimonial-3.jpg" class="img-fluid rounded-circle" alt="Image">
                        </div>
                        <div style="margin-top: -35px;">
                            <h5 class="mb-0">Dinar</h5>
                            <p class="mb-0">Penduduk Lokal</p>
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="testimonial-item text-center rounded pb-4">
                        <div class="testimonial-comment bg-light rounded p-4">
                            <p class="text-center mb-5">Sangat Bagus
                            </p>
                        </div>
                        <div class="testimonial-img p-1">
                            <img src="img/testimonial-1.jpg" class="img-fluid rounded-circle" alt="Image">
                        </div>
                        <div style="margin-top: -35px;">
                            <h5 class="mb-0">Ilham</h5>
                            <p class="mb-0">Pekerja</p>
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div> --}}
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
                        <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                            frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kontak Kami End -->

        @include('include.footer')

        @include('include.script')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
    const floatingBtn = document.querySelector('.floating-btn');
    const floatingMenu = document.querySelector('.floating-menu');
    const scrollTopBtn = document.getElementById('scrollTopBtn');

    // Toggle menu visibility
    floatingBtn.addEventListener('click', function () {
        floatingMenu.style.display = floatingMenu.style.display === 'flex' ? 'none' : 'flex';
    });

    // Scroll to top functionality
    scrollTopBtn.addEventListener('click', function (e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
        floatingMenu.style.display = 'none';
    });

    // Close menu when clicking outside
    document.addEventListener('click', function (e) {
        if (!floatingBtn.contains(e.target) && !floatingMenu.contains(e.target)) {
            floatingMenu.style.display = 'none';
        }
    });
});
        </script>
        <script>
            function submitForm() {
                // Periksa apakah pengguna telah login
                var loggedIn = "{{ auth()->check() }}";
        
                if (loggedIn) {
                    // Jika sudah login, submit formulir
                    document.getElementById("ulasanForm").submit();
                } else {
                    // Jika belum login, tampilkan popup atau arahkan ke halaman login
                    alert("Anda harus login terlebih dahulu!");
                    // Atau, Anda bisa mengarahkan pengguna ke halaman login:
                    window.location.href = "{{ route('login') }}";
                }
            }
        </script>
    </body>

</html>
