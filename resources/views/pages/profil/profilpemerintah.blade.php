<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>PPID Kota Surakarta </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        @include('include.style')

        <style>
            /*** Profil Pimpinan Kota Surakarta Start ***/
.teamm-item {
    display: flex;
    flex-direction: column;
    height: 100%;
    overflow: hidden;
    background-color: #2B2825; /* Mengubah warna latar belakang kotak */
    border: 2px solid #fff; /* Menambahkan border berwarna putih di setiap sisi */
    padding: 10px; /* Memberikan padding agar konten tidak menempel ke tepi */
}

.teamm-item .img-container {
    width: 100%;
    height: 300px; /* Atur tinggi gambar sesuai kebutuhan */
    position: relative;
}

.teamm-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: .5s;
    position: relative; /* Perbaiki posisi relatif */
}

.teamm-item:hover img {
    transform: scale(1.1); /* Efek zoom saat hover */
    filter: blur(5px); /* Efek blur saat hover */
}

.teamm-overlay {
    transition: .5s;
    opacity: 0;
    background: rgba(0, 0, 0, 0.5); /* Tambahkan latar belakang gelap */
}

.teamm-item:hover .team-overlay {
    opacity: 1; /* Menampilkan overlay saat hover */
}

.teamm-item .content {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background: #2B2825; /* Mengatur warna latar belakang konten menjadi cokelat tua */
    padding: 20px;
    min-height: 150px; /* Tentukan tinggi minimum sesuai kebutuhan Anda */
    border-top: 1px solid white; /* Garis putih hanya di bagian atas konten */
    border-right: 1px solid white; /* Garis putih di bagian kanan konten */
    border-bottom: 1px solid white; /* Garis putih di bagian bawah konten */
    border-left: 1px solid white; /* Garis putih di bagian kiri konten */
    text-align: center;
}

.border-inner {
    border: 2px solid white; /* Border putih untuk konten dalam */
    padding: 20px;
    text-align: center;
}

.teamm-item .content h4 {
    margin-bottom: 10px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis; /* Gunakan ... jika teks terlalu panjang */
    color: #E88F2A; /* Warna teks */
    text-transform: uppercase;
}

.teamm-item .content p {
    margin: 0;
    color: #fff; /* Warna teks putih */
}
/*** Profil Pimpinan Kota Surakarta End ***/
</style>

<style>
    /*** Karakter Kota Start ***/
    .appointmentt {
        position: relative;
        background-image: url('/img/foto10.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        padding: 50px 0; /* Adjust padding as needed */
        height: 100vh; /* Menyesuaikan tinggi sesuai kebutuhan */
    }

    .appointmentt-overlayy {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Sesuaikan opacity jika diperlukan */
    }

    .containerr-fluid {
        position: relative; /* Menetapkan posisi relatif untuk .container-fluid */
        z-index: 2; /* Menetapkan z-index lebih tinggi agar konten berada di depan overlay */
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between; /* Menjaga jarak antar kotak */
    }

    .col-lg-6, .col-md-6, .col-sm-12 {
        display: flex; /* Menggunakan flex untuk kolom */
        justify-content: center;
        margin-bottom: 20px; /* Jarak antar baris */
        padding: 10px; /* Jarak antar kotak */
    }

    .service-box {
        min-height: 300px; /* Tinggi minimum untuk semua kotak */
        height: 100%; /* Pastikan semua kotak memiliki tinggi yang sama */
        padding: 20px; /* Padding di dalam kotak */
        display: flex;
        flex-direction: row; /* Pastikan ikon dan konten berada dalam satu baris */
    }

    .icon-container {
        flex-shrink: 0; /* Menghindari ikon mengecil saat ruang terbatas */
        padding-right: 20px; /* Jarak antara ikon dan teks */
    }

    .content {
        flex-grow: 1; /* Memastikan konten mengisi ruang yang tersedia */
        padding-top: 20px; /* Jarak antara teks dan bagian atas kotak */
        padding-bottom: 20px; /* Jarak antara teks dan bagian bawah kotak */
    }

    h5 {
        margin-bottom: 15px; /* Jarak antara judul dan deskripsi */
    }

    /* Jika Anda ingin menambahkan jarak di bawah deskripsi */
    .content p {
        margin-bottom: 0; /* Menghapus margin default untuk p */
    }

    /* Untuk membuat semua kotak memiliki ukuran yang sama */
    .row {
        display: flex;
        flex-wrap: wrap; /* Memungkinkan baris untuk membungkus konten */
    }

    .col-lg-6 {
        display: flex;
        justify-content: center;
        margin-bottom: 20px; /* Spasi antara baris */
        height: 100%; /* Pastikan kolom memiliki tinggi yang sama */
    }

    .servicee-content-inner {
        background-color: white; /* Warna latar belakang */
        width: 100%; /* Menggunakan lebar penuh */
        max-width: 350px; /* Lebar maksimum */
        height: 400px; /* Tinggi konsisten untuk semua kotak */
        padding: 20px; /* Padding dalam kotak */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); /* Menambah bayangan */
        display: flex;
        align-items: center; /* Pusatkan vertikal */
        justify-content: space-between; /* Menjaga jarak antara ikon dan teks */
        margin-bottom: 30px; /* Jarak bawah untuk memberikan spasi antara kotak dan garis di atas */
        transition: transform 0.3s ease;
    }

    .servicee-content-inner:hover {
        transform: translateY(-10px); /* Efek hover */
    }

    .servicee-icon {
        margin-right: 15px; /* Jarak antara ikon dan teks */
    }

    .servicee-content h5, .servicee-content p {
        text-align: start; /* Teks dimulai di sebelah kiri */
        margin: 0; /* Menghapus margin default */
        flex-grow: 1; /* Memungkinkan teks untuk mengambil ruang yang tersisa */
    }

    /* Responsive behavior */
    @media (max-width: 768px) {
        .servicee-content-inner {
            max-width: 90%; /* Mengambil sebagian besar ruang pada layar kecil */
        }
    }

    .bg-dark {
        background-color: #343a40; /* Warna latar belakang gelap */
        padding: 20px;
    }

    .border-inner {
        border: 2px solid #fff; /* Border dalam untuk konsistensi gaya */
    }

    .text-center {
        text-align: center;
    }
</style>

<!-- Karakter Kota End -->

<!-- Misi Kota Surakarta Start -->
<style>
    .layout_padding-bottom {
      padding-bottom: 90px;
    }
    
    .heading_container {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
          -ms-flex-direction: column;
              flex-direction: column;
      -webkit-box-align: start;
          -ms-flex-align: start;
              align-items: flex-start;
    }
    
    .about_section .row {
      -webkit-box-align: center;
          -ms-flex-align: center;
              align-items: center;
    }
    
    .about_section .img-box {
      position: relative;
    }
    
    .about_section .img-box img {
      max-width: 100%;
      position: relative;
      z-index: 2;
    }
    
    .about_section .img-box::before, .about_section .img-box::after {
      content: "";
      position: absolute;
      top: 50%;
      width: 45px;
      height: 70%;
      background-color: #04233b;
      z-index: 3;
    }
    
    .about_section .img-box::before {
      left: 0;
      z-index: 1;
      -webkit-transform: translate(-50%, -50%);
              transform: translate(-50%, -50%);
    }
    
    .about_section .img-box::after {
      right: 0;
      z-index: 1;
      -webkit-transform: translate(50%, -50%);
              transform: translate(50%, -50%);
    }
    
    .about_section .detail-box p {
      color: #1f1f1f;
      margin-top: 15px;
    }
    
    .about_section .detail-box a {
      display: inline-block;
      padding: 10px 45px;
      background-color: #0a97b0;
      color: #ffffff;
      border-radius: 0px;
      -webkit-transition: all .3s;
      transition: all .3s;
      border: none;
      margin-top: 15px;
    }
    
    .about_section .detail-box a:hover {
      background-color: #065968;
    }
    
    .custom-service-content-inner {
        padding: 10px; /* Padding di dalam kotak */
    }
    
    .custom-service-content {
        margin: 0; /* Menghilangkan margin di sisi kiri dan kanan */
        padding: 0 20px; /* Padding di sisi kiri dan kanan */
    }
    </style>
    <!-- Misi Kota Surakarta End -->
            </style>

    </head>

    <body>

        @include('include.navbar')

        <!-- Profil Pimpinan Kota Surakarta Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                        <h5 class="section-title px-3">PROFIL PEMERINTAH</h5>
                        <h1 class="mb-0">Profil Pimpinan Kota Surakarta</h1>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <div class="teamm-item">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset('img/walikota.jpg') }}" alt="">

                                <div class="teamm-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                </div>
                            </div>
                            <div class="border-inner text-center p-4">
                                <a href="{{ route('walikota.index') }}" class="text-decoration-none">
                                    <h4 class="text-uppercase" style="color: #E88F2A;">Gibran Rakabuming R</h4>
                                </a>
                                <p class="text-white m-0">Walikota Kota Surakarta</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="teamm-item">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/walikota.jpg" alt="">
                                <div class="teamm-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                </div>
                            </div>
                            <div class="border-inner text-center p-4">
                                <a href="{{ route('wakil.walikota') }}" class="text-decoration-none">
                                    <h4 class="text-uppercase" style="color: #E88F2A;">Teguh Prakosa</h4>
                                </a>
                                <p class="text-white m-0">Wakil Walikota Kota Surakarta</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="teamm-item">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/walikota.jpg" alt="">
                                <div class="teamm-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                </div>
                            </div>
                            <div class="border-inner text-center p-4">
                                <a href="{{ route('sekretaris.pemerintah') }}" class="text-decoration-none">
                                    <h4 class="text-uppercase" style="color: #E88F2A;">IR. Ahyani, MA</h4>
                                </a>
                                <p class="text-white m-0">Sekretaris Daerah Kota Surakarta</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profil Pimpinan Kota Surakarta End -->

        <!-- Visi Pemerintah Kota Surakarta Start -->
        <div class="untree_co-section py-5">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                        <h5 class="section-title px-3">PROFIL PEMERINTAH</h5>
                        <h1 class="mb-0">Visi Pemerintah Kota Surakarta</h1>
                    </div>
                </div>
                <section class="about_section layout_padding">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-5 px-0">
                        <div class="img_container">
                          <div class="img-box">
                            <img src="img/foto8.jpg" alt="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="detail-box">
                          <div class="heading_container ">
                            <h3>
                              VISI
                            </h3>
                          </div>
                        <p class="text-center">
                            “MEWUJUDKAN SURAKARTA SEBAGAI KOTA BUDAYA YANG MODERN, TANGGUH, GESIT, KREATIF DAN SEJAHTERA”
                        </p>
                        <p class="text-justify">
                            Visi tersebut sebagai pemandu gerak bersama antara pemerintahan dan segenap warganya 
                            untuk membangun karakter Kota Surakarta, beralaskan semangat gotong royong 
                            sebagai modal sosial-budaya. Kota Surakarta terus tumbuh dan berkembang 
                            dalam aktivitas sosial, ekonomi, dan budaya, tanpa meninggalkan jati diri dan karakternya 
                            sebagai kota dengan warisan budaya yang kental, sebagai the Spirit of Java. 
                            Upaya mewujudkan kota modern dan masyarakat yang sejahtera bermodalkan warisan budaya gotong royong 
                            dilandasi dengan karakter kota: Tangguh, Gesit, Kreatif, dan Sejahtera.
                        </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
            </div>
          </div>
        <!-- Visi Pemerintah Kota Surakarta End -->

        <!-- Karakter Kota Pemerintah Kota Surakarta Start -->
        <div class="appointmentt">
            <div class="appointmentt-overlayy" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
                <div class="containerr-fluid py-5" style="position: relative; z-index: 2;">
                    <div class="container">
                        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                            <h5 class="section-title px-3" style="color: white;">PROFIL PEMERINTAH</h5>
                            <h1 class="mb-0" style="color: white;">Karakter Kota</h1>
                        </div>
                        <p class="text-center" style="color: white;">
                            Dari penjelasan Visi Kota Surakarta diatas untuk mewujudkan kota modern dan masyarakat yang sejahtera bermodalkan warisan budaya gotong royong dilandasi dengan karakter kota, seperti berikut :
                        </p>
                        <div class="row d-flex justify-content-center">
                            @foreach ($karakterkota as $karakter)
                            <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center mb-4">
                                <div class="service-box bg-white border border-primary rounded p-4 d-flex align-items-start w-100 h-100">
                                    <div class="icon-container" style="flex-shrink: 0; padding-right: 20px;">
                                        @if (str_contains(strtoupper($karakter->deskripsi), 'TANGGUH'))
                                            <i class="fa fa-shield-alt fa-4x text-primary"></i> <!-- Ikon untuk TANGGUH -->
                                        @elseif (str_contains(strtoupper($karakter->deskripsi), 'GESIT'))
                                            <i class="fa fa-rocket fa-4x text-primary"></i> <!-- Ikon untuk GESIT -->
                                        @elseif (str_contains(strtoupper($karakter->deskripsi), 'KREATIF'))
                                            <i class="fa fa-brain fa-4x text-primary"></i> <!-- Ikon untuk KREATIF -->
                                        @elseif (str_contains(strtoupper($karakter->deskripsi), 'SEJAHTERA'))
                                            <i class="fa fa-university fa-4x text-primary"></i> <!-- Ikon untuk SEJAHTERA -->
                                        @else
                                            <i class="fas fa-compass fa-4x text-primary"></i> <!-- Ikon default -->
                                        @endif
                                    </div>
                                    <div class="content flex-grow-1" style="display: flex; flex-direction: column; justify-content: space-between;">
                                        <h5 class="mb-2" style="margin-bottom: 15px; text-align: left;">{{ $karakter->kategori }}</h5>
                                        <p class="mb-0" style="text-align: justify;">{{ $karakter->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </ddiv>
        </div>         
        <!-- Karakter Kota Pemerintah Kota Surakarta End -->

        <!-- Misi Pemerintah Kota Surakarta Start -->
        <div class="container-fluid bg-light service py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">PROFIL PEMERINTAH</h5>
                    <h1 class="mb-0">Misi Pemerintah Kota Surakarta</h1>
                </div>
                <p  class="text-center">Misi Pemerintah Kota Surakarta berdasarkan Peraturan Daerah Kota Surakarta Nomor 6 Tahun 2021 Tentang Rencana Pembangunan Jangka Menengah Daerah Kota Surakarta Tahun 2021-2026 adalah :</p>
                <div class="row g-4">
                    @foreach ($misipemerintah as $misi )
                        <div class="col-lg-6">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="custom-service-content-inner d-flex align-items-stretch bg-white border border-primary rounded p-4 ps-0">
                                        <div class="custom-service-content text-end flex-grow-1">
                                            <h5 class="mb-2">{{ konversiUrutanKeKata($misi->urutan) }}</h5>
                                            <p class="mb-0">{{ $misi->misi }}</p>
                                        </div>
                                        <div class="service-icon p-4">
                                            @if (str_contains($misi->misi, 'pertumbuhan ekonomi'))
                                                <i class="fa fa-hand-holding-usd fa-4x text-primary"></i>
                                            @elseif (str_contains($misi->misi, 'pendidikan'))
                                                <i class="fa fa-graduation-cap fa-4x text-primary"></i>
                                            @elseif (str_contains($misi->misi, 'seni budaya'))
                                                <i class="fa fa-paint-brush fa-4x text-primary"></i>
                                            @elseif (str_contains($misi->misi, 'kesehatan'))
                                                <i class="fa fa-stethoscope fa-4x text-primary"></i>
                                            @elseif (str_contains($misi->misi, 'infrastruktur'))
                                                <i class="fa fa-city fa-4x text-primary"></i>
                                            @elseif (str_contains($misi->misi, 'tata kelola') || str_contains($misi->misi, 'pelayanan publik'))
                                                <i class="fa fa-users-cog fa-4x text-primary"></i>
                                            @elseif (str_contains($misi->misi, 'kemakmuran') || str_contains($misi->misi, 'kesejahteraan'))
                                                <i class="fa fa-hand-holding-heart fa-4x text-primary"></i>
                                            @elseif (str_contains($misi->misi, 'kondusif') || str_contains($misi->misi, 'kerukunan'))
                                                <i class="fa fa-peace fa-4x text-primary"></i> <!-- Ikon untuk kedamaian dan kerukunan -->
                                            @else
                                                <i class="fas fa-compass fa-4x text-primary"></i> <!-- Default icon -->
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Misi Pemerintah Kota Surakarta End -->

        @include('include.footer')

        @include('include.script')
    </body>

</html>
