
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Route::is('admin.index') ? 'active' : '' }}">
            @if(auth()->user()->roles == 'admin')
            <a class="nav-link" href="{{ url('/') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
            @else
            <a class="nav-link" href="{{ route('auth-check') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
            @endif
        </li>
        <!-- note : jika login sebagai admin maka tampilkan menu dibawah jika bukan admin maka tidak akan muncul -->
        @if(auth()->user()->roles == 'admin')
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth1">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Profil</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link"> Pemerintah </a>
                        <li>
                            <a class="dropdown-item" href="{{ Route('profil_pemerintah.index') }}">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profil Surakarta</div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('misi_pemerintah.index') }}">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Misi Surakarta</div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('karakter_kota.index') }}">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Karakter Kota</div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('walikota_pemerintah.index') }}">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Walikota</div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('wakil_walikota.index') }}">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Wakil Walikota</div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('sekretaris_pemerintah.index') }}">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sekretaris</div>
                            </a>
                        </li>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href=""> PPID </a></li>
                    <li><a class="dropdown-item" href="{{ Route('profilgeneral') }}">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profil</div>
                        </a></li>
                    <li><a class="dropdown-item" href="{{ Route('profilvisimisi') }}">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Visi Misi</div>
                        </a></li>
                    <li><a class="dropdown-item" href="{{ Route('profiltugastanggungjawab') }}">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Tugas dan Tanggung Jawab
                            </div>
                        </a></li>
                    <li><a class="dropdown-item" href="{{ Route('profilstruktur') }}">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Struktur Organisasi</div>
                        </a></li>
                    <li><a class="dropdown-item" href="{{ Route('profildasarhukum') }}">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dasar Hukum</div>
                        </a></li>
                </ul>
            </div>
        </li>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-headphones menu-icon"></i>
                <span class="menu-title">Layanan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <!-- note : menambahkan menu untuk setting maklumat pelayanan -->
                    <li class="nav-item"> <a class="nav-link" href="{{ route('maklumat-pelayanan.index') }}">Maklumat Pelayanan</a></li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#datfarInfoPublik" aria-expanded="false"
                            aria-controls="datfarInfoPublik">Daftar Informasi Publik <i class="menu-arrow"></i></a>
                        <ul class="collapse" id="datfarInfoPublik">
                            <li> <a class="dropdown-item"
                                    href="{{ route('informasi-publik.daftar-informasi-publik.index') }}">Berkala</a>
                            <li> <a class="dropdown-item" href="{{ route('daftar-informasi-serta-merta.index') }}">Serta Merta</a>
                            <li> <a class="dropdown-item" href="{{ route('daftar-informasi-setiap-saat.index') }}">Setiap Saat</a>
                        </ul>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('daftar-berkala.index') }}">Daftar Berkala</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('daftar-serta-merta.index') }}">Daftar Serta Merta</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('daftar-setiap-saat.index') }}">Daftar Setiap Saat</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('informasi-dikecualikan.index') }}">Informasi Dikecualikan</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth2" aria-expanded="false" aria-controls="auth2">
                <i class="mdi mdi-newspaper menu-icon"></i>
                <span class="menu-title">Berita</span>
                <i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="auth2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('berita_ppid.index') }}"> PPID </a>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('berita_kominfo.index') }}"> Kominfo </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('berita_pemerintah.index') }}"> Pemerintah
                        </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth4" aria-expanded="false"
                aria-controls="auth4">
                <i class="mdi mdi-image menu-icon"></i>
                <span class="menu-title">Galeri</span>
                <i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="auth4">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">PPID</a>
                    </li>
                    <li>
                        <a id="foto-link" class="dropdown-item " href="{{ url('admin/galeri') }}?session_value=ppidfoto">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Foto</div>
                        </a>
                    </li>
                    <li>
                        <a id="video-link" class="dropdown-item" href="{{ url('admin/galeri') }}?session_value=ppidvideo">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Video</div>
                        </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="admin/pages/samples/login-2.html"> Pemerintah
                        </a></li>
                        <li>
                            <a id="foto-link" class="dropdown-item " href="{{ url('admin/galeri') }}?session_value=pemerintahfoto">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Foto</div>
                            </a>
                        </li>
                        <li>
                            <a id="video-link" class="dropdown-item" href="{{ url('admin/galeri') }}?session_value=pemerintahvideo">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Video</div>
                            </a>
                        </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth5" aria-expanded="false"
                aria-controls="auth5">
                <i class="mdi mdi-file menu-icon"></i>
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth5">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">
                        PPID
                    </a></li>
                    <li><a class="dropdown-item" href="{{ route('laporan_ppid.index') }}">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>PPID</div>
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="admin/pages/samples/login-2.html"> Pemerintah
                        </a>
                        <li>
                            <a class="dropdown-item" href="{{ route('laporan_keuangan.index') }}">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Laporan Keuangan</div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('laporan_kinerja.index') }}">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Laporan Kinerja Instansi
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('laporan_penyelenggaraan.index') }}">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Laporan Penyelenggaraan
                                </div>
                            </a>
                        </li>
                    </li>
                </ul>
            </div>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="mdi mdi-mail menu-icon"></i>
                <span class="menu-title">Kontak</span>
            </a>
        </li> --}}
        @endif
        <!-- note : jika login sebagai user maka tampilkan menu status dan notifikasi -->
        @if (auth()->user()->roles == 'admin')
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#adminStatus" aria-expanded="false" aria-controls="adminStatus">
                    <i class="mdi mdi-chart-pie menu-icon"></i>
                    <span class="menu-title">Status Pengajuan</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="adminStatus">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.status-layanan-informasi.index') }}">
                                Status Pengajuan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('status-keberatan.index') }}">
                                Status Keberatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('status.penyelesaian.sengketa') }}">
                                Status Penyelesaian Sengketa
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        @else
            @if(auth()->user()->status === 'terverifikasi')
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#userStatus" aria-expanded="false" aria-controls="userStatus">
                        <i class="mdi mdi-chart-pie menu-icon"></i>
                        <span class="menu-title">Status Pengajuan</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="userStatus">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.status-layanan-informasi') }}">
                                    Status Pengajuan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('status-keberatan') }}">
                                    Status Keberatan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('status-sengketa') }}">
                                    Status Penyelesaian Sengketa
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
        @endif

        @if (auth()->user()->roles == 'admin')
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#userNotifikasi" aria-expanded="false" aria-controls="userNotifikasi">
                    <i class="mdi mdi-chart-pie menu-icon"></i>
                    <span class="menu-title">Notifikasi</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="userNotifikasi">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.notifikasi.index') }}">
                                Notifikasi Pengajuan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('notifikasi-keberatan') }}">
                                Notifikasi Keberatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('notifikasi-sengketa') }}">
                                Notifikasi Penyelesaian Sengketa
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        @else
            @if(auth()->user()->status === 'terverifikasi')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('notifikasi.index') }}">
                    <i class="mdi mdi-bell menu-icon"></i>
                    <span class="menu-title">Notifikasi</span>
                </a>
            </li>
            @endif
        @endif

        @if (auth()->user()->roles == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{route('reviewAdmin.index')}}">
                    <i class="mdi mdi-forum menu-icon"></i>
                    <span class="menu-title">Review</span>
                </a>
            </li>
        @else
            @if(auth()->user()->status === 'terverifikasi')
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('index') }}">
                    <i class="mdi mdi-forum menu-icon"></i>
                    <span class="menu-title">Review</span>
                </a>
            </li>
            @endif
        @endif

        @if (auth()->user()->roles == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{route('jawabAdmin.index')}}">
                    <i class="mdi mdi-chat menu-icon"></i>
                    <span class="menu-title">Chat</span>
                </a>
            </li>
        @else
            @if(auth()->user()->status === 'terverifikasi')
            <li class="nav-item">
                <a class="nav-link" href="{{route('tanyaAdmin.index')}}">
                    <i class="mdi mdi-headphones menu-icon"></i>
                    <span class="menu-title">Tanya Admin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Landing Page</span>
                </a>
            </li>
            @endif
        @endif
        <!-- note : jika login sebagai user maka tampilkan menu daftar user -->
        @if(auth()->user()->roles == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/daftar-user') }}">
                <i class="mdi mdi-account-box-outline menu-icon"></i>
                <span class="menu-title">Daftar User</span>
            </a>
        </li>
        @endif
    </ul>
  </nav>




  <script>
      document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.dropdown-item.active').forEach(function(element) {
    element.classList.remove('active');
});
      });
  </script>
