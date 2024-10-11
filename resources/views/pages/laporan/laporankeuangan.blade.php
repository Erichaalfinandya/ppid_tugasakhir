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
    .container {
        max-width: 1140px;
        padding: 0 20px; /* Padding kiri dan kanan pada kontainer */
    }

    /* Mengatur jarak antar kolom (kotak) */
        .custom-spacing {
            padding: 0 10px; /* Sesuaikan padding kiri dan kanan antar kolom */
        }

/* Atur lebar kotak dan padding */
.featuredlaporan-post {
    display: flex;
    border: 1px solid #ddd;
    border-radius: 10px; 
    overflow: hidden;
    align-items: flex-start;
    padding: 15px; /* Padding di dalam kotak */
    margin: 15px 15px; /* Jarak antara kotak dan garis kanan serta kiri */
    box-sizing: border-box; /* Memastikan padding dan border masuk dalam lebar kotak */
    width: calc(100% - 40px); /* Menyesuaikan lebar kotak dengan margin */
}

/* Atur ukuran gambar sampul dan jarak */
.featuredlaporan-post-img {
    width: 180px; /* Sesuaikan ukuran gambar sampul */
    height: 280px;
    object-fit: cover;
    border-radius: 10px; 
    margin-right: 15px; /* Jarak antara gambar dan teks */
}

.featuredlaporan-post-content {
    padding-left: 15px;
    padding-top: 20px;
    padding-bottom: 20px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.featuredlaporan-post-title {
    margin-bottom: 10px; 
}

.featuredlaporan-post-title a {
    color: #000;
    text-decoration: none;
}

.featuredlaporan-post-title a:hover {
    text-decoration: underline;
}

.featuredlaporan-post-footer {
    margin-top: 15px;
    color: #666;
}

.featuredlaporan-post-footer .inline-flex {
    align-items: center;
}

.featuredlaporan-post-footer svg {
    margin-right: 5px;
    vertical-align: middle;
}

.featuredlaporan-post-button {
    display: inline-block;
    padding: 4px 10px; /* Sesuaikan dengan keinginan Anda */
    width: fit-content; /* Atur lebar sesuai dengan konten */
    font-size: 12px; /* Sesuaikan ukuran font sesuai dengan keinginan */
    font-weight: 500;
    line-height: 1.5;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid #FE6019; /* Warna border lebih orange */
    border-radius: 50px; /* rounded-pill */
    color: #FE6019;
    background-color: #FAEBE1; /* Warna background lebih cerah */
    text-decoration: none;
    margin-bottom: 20px;
    margin-top: 60px;
}
    </style>

    </head>

    <body>

        @include('include.navbar')

        <!-- Laporan Pemerintah Keuangan Start -->
        <div class="row mb-5 justify-content-center">
            <div class="row mb-5 justify-content-center">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Laporan Pemerintah</h5>
                    <h1 class="mb-0">Laporan Keuangan Pemerintah Kota Surakarta</h1>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($keuangans as $data)
                        <div class="col-md-6 custom-spacing">
                            <div class="featuredlaporan-post">
                                <img class="featuredlaporan-post-img" src="{{ asset($data->sampul) }}">
                                <div class="featuredlaporan-post-content">
                                    <button class="featuredlaporan-post-button rounded-pill py-2 px-4 mb-3">{{ $data->tahun }}</button>
                                    <h3 class="h4 featuredlaporan-post-title">
                                        <a href="{{ asset('upload/' . $data->file) }}" target="_blank">{{ $data->judul }}</a>
                                    </h3>
                                    <p>{{ $data->deskripsi }}</p>
                                    <div class="featuredlaporan-post-footer mt-2">
                                        <span class="inline-flex items-center text-xs text-[#666]">
                                            <span style="text-transform: uppercase;">Dokumen, {{ pathinfo($data->file, PATHINFO_EXTENSION) }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Laporan Pemerintah Keuangan End -->

        @include('include.footer') 

        @include('include.script')

        <script>
            $(document).ready(function(){
              $(".owl-carousel-laporan").owlCarousel({
                items: 2, // Menampilkan 2 item sekaligus (bisa disesuaikan)
                loop: true,
                margin: 20, // Jarak antar item slider
                nav: true,
                dots: true,
                navText: ['<span>&lt;</span>', '<span>&gt;</span>'], // Panah navigasi
                autoplay: true,
                autoplayTimeout: 5000, // Durasi autoplay 5 detik
                autoplayHoverPause: true
              });
            });
            </script>
            
    </body>

</html>