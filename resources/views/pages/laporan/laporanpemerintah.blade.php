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
            .vesitable-item {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                height: 100%;
            }
            
            .vesitable-img {
                flex-shrink: 0;
            }
        
            .p-4.pb-5 {
                flex-grow: 1;
                display: flex;
                flex-direction: column;
                justify-content: center; /* Menyelaraskan konten secara vertikal */
                align-items: center; /* Menyelaraskan konten secara horizontal */
                text-align: center; /* Pastikan teks berada di tengah */
            }
        
            .laporanpemerintah-card-title a {
                text-align: center; /* Pastikan teks link juga berada di tengah */
            }

            .custom-width {
                width: 350px; /* Atur sesuai keinginan */
            }
        </style> 

        <!-- note : css tambahan -->
        @include('include.style-custom')
    </head>

    <body>

        @include('include.navbar-without-search')

        <!-- Laporan Pemerintah Start -->
        <div class="untree_co-section py-5">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="row mb-5 justify-content-center">
                        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                            <h5 class="section-title px-3">Laporan</h5>
                            <h1 class="mb-0">Laporan Pemerintah Kota Surakarta</h1>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-12 custom-width"> <!-- Ubah dari col-lg-3 menjadi col-lg-4 -->
                            <div class="border border-primary rounded position-relative vesitable-item mb-4">
                                <div class="vesitable-img">
                                    <img src="img/laporan.jpg" class="img-fluid w-100 rounded-top" alt="">
                                </div>
                                <div class="p-4 pb-5 rounded-bottom" style="background-color:#1A374D; max-width: 100%;">
                                    <div class="laporanpemerintah-card-title">
                                        <a href="{{ route('laporan_keuangan.public') }}">
                                            <h5 class="text-center" style="color: #1A374D">Laporan Keuangan<br>Pemerintah Kota Surakarta</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                        <div class="col-lg-3 col-md-12 custom-width"> <!-- Ubah dari col-lg-3 menjadi col-lg-4 -->
                            <div class="border border-primary rounded position-relative vesitable-item mb-4">
                                <div class="vesitable-img">
                                    <img src="img/laporan.jpg" class="img-fluid w-100 rounded-top" alt="">
                                </div>
                                <div class="p-4 pb-5 rounded-bottom" style="background-color:#1A374D;">
                                    <div class="laporanpemerintah-card-title">
                                        <a href="{{ route('laporan_kinerja.public') }}">
                                            <h5 class="text-center" style="color: #1A374D">Laporan Kinerja Instansi<br>Pemerintah Kota Surakarta</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 custom-width"> <!-- Ubah dari col-lg-3 menjadi col-lg-4 -->
                                <div class="border border-primary rounded position-relative vesitable-item mb-4">
                                    <div class="vesitable-img">
                                        <img src="img/laporan.jpg" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="p-4 pb-5 rounded-bottom" style="background-color:#1A374D;">
                                        <div class="laporanpemerintah-card-title">
                                            <a href="{{ route('laporan_penyelenggaraan.public') }}">
                                                <h5 class="text-center" style="color: #1A374D">Laporan Penyelenggaraan<br>Pemerintah Kota Surakarta</h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Formulir Pengajuan End -->

        @include('include.footer')

        @include('include.script')
    </body>

</html>
