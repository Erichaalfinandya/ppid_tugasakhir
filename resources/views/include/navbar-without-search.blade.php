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
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profil</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ Route('profilpemerintah') }}" class="dropdown-item">Profil Pemerintah Kota Surakarta</a>
                                <a href="{{ Route('profilppid') }}" class="dropdown-item">Profil PPID Kota Surakarta</a>
                            </div>
                        </div>
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
                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ Route('user.index') }}" class="dropdown-item">Dashboard</a>
                                <a href="{{ Route('logout') }}" class="dropdown-item">Logout</a>
                            </div>
                        </div> --}}
                    @else
                    <a href="{{ url('login') }}" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Login</a>
                    @endif

                </div>
            </nav>

            <!-- Carousel Start -->
            <div class="carousel-header">
                <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <!-- note : Mengatur agar hero tidak full height -->
                        <div class="carousel-item active" style="min-height:40vh">
                            <img src="{{asset('img/fc94d5b934b045a296ca9cd57cbd727c.jpeg')}}" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h1 class="display-2 text-capitalize text-white mb-4">
                                        @if(Request::is('pages.layanan.daftarinformasipublik') OR Request::is('pages.layanan.daftarinformasipublikberkala*') OR Request::is('pages.layanan.daftarinformasipubliksertamerta*') OR Request::is('pages.layanan.daftarinformasipubliksetiapsaat*'))
                                            Daftar Informasi Publik
                                        @elseif(Request::is('pages.kontak.formulir*'))
                                            Formulir Layanan Informasi
                                        @elseif(Request::is('pages.berita.beritappid*'))
                                            Detail Berita
                                        @elseif(Request::is('pages.layanan.layananinformasiberkala*'))
                                            Layanan Informasi Berkala
                                        @elseif(Request::is('pages.layanan.layananinformasisertamerta*'))
                                            Layanan Informasi Serta Merta
                                        @elseif(Request::is('pages.layanan.layananinformasisetiapsaat*'))
                                            Layanan Informasi Setiap Saat
                                        @elseif(Request::is('pages.laporan.laporanpemerintah*'))
                                            Laporan Pemerintah
                                        @endif
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel End -->
        </div>
        <!-- Navbar & Hero End -->
