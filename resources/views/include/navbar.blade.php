        {{-- navbar --}}

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <div class="container-fluid bg-primary px-5 d-none d-lg-block">
            <div class="row gx-0">
                <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        @if (!Auth::check())
                        <a href="{{ url('register') }}"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>Register</small></a>
                        <a href="{{ url('login') }}"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>Login</small></a>
                        @else
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i class="fa fa-home me-2"></i> My Dashboard</small></a>
                            <div class="dropdown-menu rounded">
                                <a href="#" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Inbox</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-cog me-2"></i> Account Settings</a>
                                <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-power-off me-2"></i> Log Out
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <img src="{{asset('img/logo.png')}}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{ Route('index') }}" class="nav-item nav-link">Home</a>
                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profil</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ Route('profilpemerintah.index') }}" class="dropdown-item">Profil Pemerintah Kota Surakarta</a>
                                <a href="{{ Route('profilppid') }}" class="dropdown-item">Profil PPID Kota Surakarta</a>
                            </div>
                        </div> --}}
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Prosedur</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ Route('prosedurlayanan') }}" class="dropdown-item">Prosedur Permohonan Layanan Informasi</a>
                                <a href="{{ Route('prosedurkeberatan') }}" class="dropdown-item">Prosedur Pengajuan Keberatan Informasi</a>
                                <a href="{{ Route('prosedurpenyelesaiansengketa') }}" class="dropdown-item">Prosedur Permohonan Penyelesaian Sengketa</a>
                                <a href="{{ Route('standarpengumumaninformasi') }}" class="dropdown-item">Standar Pengumuman Informasi</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Layanan</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ Route('maklumatpelayanan') }}" class="dropdown-item">Maklumat Pelayanan</a>
                                <a href="{{ Route('daftarinformasipublik') }}" class="dropdown-item">Daftar Informasi Publik</a>
                                <a href="{{ Route('layananinformasiberkala') }}" class="dropdown-item">Informasi Berkala</a>
                                <a href="{{ Route('layananinformasisertamerta') }}" class="dropdown-item">Informasi Serta Merta</a>
                                <a href="{{ Route('layananinformasisetiapsaat') }}" class="dropdown-item">Informasi Setiap Saat</a>
                                <a href="{{ Route('layananinformasidikecualikan') }}" class="dropdown-item">Informasi Dikecualikan</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Berita</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ Route('beritapemerintah') }}" class="dropdown-item">Berita Pemerintah</a>
                                <a href="{{ Route('beritappid') }}" class="dropdown-item">Berita PPID</a>
                                <a href="{{ Route('beritadiskominfo') }}" class="dropdown-item">Berita Kominfo</a>
                            </div>
                        </div>
                        <a href="{{ Route('kontak') }}" class="nav-item nav-link">Kontak</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Galeri</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ Route('galeripemerintah') }}" class="dropdown-item">Galeri Pemerintah</a>
                                <a href="{{ Route('galerippid') }}" class="dropdown-item">Galeri PPID</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Laporan</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ Route('laporanpemerintah') }}" class="dropdown-item">Laporan Pemerintah</a>
                                <a href="{{ Route('laporanppid') }}" class="dropdown-item">Laporan PPID</a>
                                <a href="{{ Route('laporanstatistik') }}" class="dropdown-item">Laporan Statistik</a>
                            </div>
                        </div>
                    </div>
                    @if (Auth::check())
                        @if(Auth::user()->roles === 'admin')
                        <a href="{{ url('admin/dashboard') }}" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Dashboard</a>
                        @else
                        <a href="{{ Route('user.index') }}" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Dashboard</a>
                        @endif
                    @else
                    <a href="{{ url('login') }}" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Login</a>
                    @endif

                </div>
            </nav>

            <!-- Carousel Start -->
            <div class="carousel-header">
                <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="{{asset('img/foto10.jpg')}}" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">SELAMAT DATANG DI PORTAL</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">PPID PEMERINTAH KOTA SURAKARTA</h1>
                                    <p class="mb-5 fs-5">Kompleks Balaikota Surakarta Jl. Jend Sudirman, Kedung Lumbu, Kec. Ps. Kliwon, Kota Surakarta, Jawa Tengah,57133
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/fc94d5b934b045a296ca9cd57cbd727c.jpeg')}}" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">SELAMAT DATANG DI PORTAL</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">PPID PEMERINTAH KOTA SURAKARTA</h1>
                                    <p class="mb-5 fs-5">Kompleks Balaikota Surakarta Jl. Jend Sudirman, Kedung Lumbu, Kec. Ps. Kliwon, Kota Surakarta, Jawa Tengah,57133
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/satu.jpg')}}" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">SELAMAT DATANG DI PORTAL</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">PPID PEMERINTAH KOTA SURAKARTA</h1>
                                    <p class="mb-5 fs-5">Kompleks Balaikota Surakarta Jl. Jend Sudirman, Kedung Lumbu, Kec. Ps. Kliwon, Kota Surakarta, Jawa Tengah,57133
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Carousel End -->
        </div>
        <div class="container-fluid search-bar position-relative" style="top: -50%; transform: translateY(-50%);">
            <div class="container">
                <div class="position-relative rounded-pill w-100 mx-auto p-5" style="background: rgba(19, 53, 123, 0.8);">
                    <form action="{{ route('search.index') }}" method="GET" class="d-flex align-items-center">
                        <input name="query" @php if(isset($query)){ echo 'value="'.$query.'"';} @endphp class="form-control border-0 py-3 ps-4 me-0" type="text" placeholder="Carilah informasi disini" style="border-top-right-radius: 0; border-bottom-right-radius: 0;border-top-left-radius: 100px;border-bottom-left-radius: 100px;">
                        <select name="jenis" class="form-control bg-white border-top-0 border-bottom-0 py-3 px-4 me-0" style="border-radius: 0; width: 30%;">
                            <option @php if(isset($jenis) && $jenis === 'semua') { echo 'selected';} @endphp value="semua">Semua Jenis</option>
                            <option @php if(isset($jenis) && $jenis === 'berita') { echo 'selected';} @endphp value="berita">Berita PPID</option>
                            <option @php if(isset($jenis) && $jenis === 'laporan') { echo 'selected';} @endphp value="laporan">Laporan PPID</option>
                            <option @php if(isset($jenis) && $jenis === 'daftar informasi publik') { echo 'selected';} @endphp value="daftar informasi publik">Daftar Informasi Publik</option>
                            <option @php if(isset($jenis) && $jenis === 'informasi berkala') { echo 'selected';} @endphp value="informasi berkala">Informasi Berkala</option>
                            <option @php if(isset($jenis) && $jenis === 'serta merta') { echo 'selected';} @endphp value="serta merta">Informasi Serta Merta</option>
                            <option @php if(isset($jenis) && $jenis === 'setiap saat') { echo 'selected';} @endphp value="setiap saat">Informasi Setiap Saat</option>
                            <option @php if(isset($jenis) && $jenis === 'dikecualikan') { echo 'selected';} @endphp value="dikecualikan">Informasi Dikecualikan</option>
                            <!-- Tambahkan opsi lain sesuai kebutuhan -->
                        </select>
                        <select name="tahun" class="form-control bg-white border-top-0 border-bottom-0 py-3 px-4 me-0" style="border-radius: 0; width: 20%;">
                            <option value="semua">Pilih Tahun</option>
                            @php
                            $start_year = 2018;
                            $end_year = date('Y');
                            @endphp
                            @for ($i = $start_year; $i <= $end_year; $i++)
                                <option @php if($i === isset($tahun)){ echo 'selected';} @endphp value="{{ $i }}">{{ $i }}</option>
                            @endfor
                            <!-- Tambahkan opsi lain sesuai kebutuhan -->
                        </select>
                        <button type="submit" class="btn btn-primary py-3 px-4 me-0" style="border-top-left-radius: 0; border-bottom-left-radius: 0;border-top-right-radius: 100px;border-bottom-right-radius: 100px;width:20%;">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
