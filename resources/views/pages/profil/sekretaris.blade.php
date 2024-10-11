<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>PPID Kota Surakarta </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        @include('include.style')

        <!-- DESKRIPSI START -->
<style>
    .ftco-about .img-about {
                width: 100%;
                z-index: 0;
                position: relative;
                background-size: cover; /* Ensure the background image covers the entire div */
                background-position: center; /* Center the background image */
            }

            .ftco-about .img-about .overlay {
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.3); /* Add a semi-transparent overlay if needed */
                position: absolute;
                top: 0;
                left: 0;
            }

            .ftco-about ul.about-info {
                display: inline-block;
                padding: 0;
                margin: 0;
                width: 100%;
            }

            .ftco-about ul.about-info li {
                list-style: none;
                margin-bottom: 10px;
            }

            .ftco-about ul.about-info li span {
                width: calc(100% - 130px);
                font-weight: 600;
                color: #b1b493;
            }

            .ftco-about ul.about-info li span:first-child {
                font-weight: 600;
                color: #000000;
                width: 130px;
            }

        </style>
<!-- DESKRIPSI END -->
    <!-- PENDIDIKAN FORMAL DAN RIWAYAT START-->
<style>
.ftco-section {
padding: 7em 0;
position: relative;
}

@media (max-width: 767.98px) {
.ftco-section {
padding: 6em 0;
}
}

.ftco-no-pt {
padding-top: 0 !important;
}

.ftco-no-pb {
padding-bottom: 0 !important;
}

.resume-wrap {
width: 100%;
margin-bottom: 30px;
border-bottom: 1px solid rgba(0, 0, 0, 0.1);
padding-bottom: 10px;
}

.resume-wrap .icon {
width: 50px;
height: 50px;
background: #13357B;
border-radius: 50%;
display: flex;
align-items: center;
justify-content: center;
margin-right: 20px; /* Untuk memberikan ruang antara ikon dan teks */
color: #fff;
font-size: 22px; /* Ukuran ikon, bisa disesuaikan */
}

.resume-wrap .icon span {
color: #fff;
font-size: 24px;
}

.resume-wrap .text {
width: calc(100% - 70px); /* 50px untuk ikon + 20px margin */
}

.resume-wrap .date {
font-weight: 700;
font-size: 16px;
color: #13357B;
}

.resume-wrap h2 {
font-size: 24px;
font-weight: 700;
}

.resume-wrap .position {
font-size: 18px;
font-weight: 700;
color: #000000;
}

#navi {
top: 180px;
position: -webkit-sticky;
position: sticky;
margin: 0;
}

#navi ul {
    margin-left: 40px; /* Menggeser ke kanan */
    padding-left: 0; /* Pastikan padding default tidak menambah jarak */
}


#navi li {
font-weight: 700;
list-style: none;
margin-bottom: 10px;
}

#navi li a {
color: #000000;
}

#navi li a.current {
color: #13357B;
margin-left: 20px;
position: relative;
}

#navi li a.current:after {
position: absolute;
top: 50%;
left: -24px;
width: 20px;
height: 2px;
content: '';
transform: translateY(-50%);
background: #13357B;
}

.page {
width: 100%;
margin-bottom: 7em;
}

.page.four {
margin-bottom: 0;
}

.page .heading {
font-weight: 800;
font-size: 30px;
margin-bottom: 30px;
color: #13357B;
}

.ftco-partner {
padding: 4em 0 !important;
}

.ftco-partner .partner {
display: block;
padding: 0 20px;
}

@media (max-width: 991.98px) {
.ftco-partner .partner {
padding: 0 70px;
margin-bottom: 40px;
}
}
</style>
<!-- PENDIDIKAN FORMAL DAN RIWAYAT END-->

    </head>

    <body>

        @include('include.navbar')

        <!-- Profil Wakil Walikota Kota Surakarta Start  -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                        <h5 class="section-title px-3">{{ __('messages.profil') }}</h5>
                        <h1 class="mb-0">Profil Sekretaris Daerah Kota Surakarta</h1>
                    </div>
                </div>
                <section class="ftco-about ftco-section ftco-no-pt ftco-no-pb" id="about-section">
                    <div class="container">
                        <div class="row d-flex no-gutters">
                            <div class="col-md-6 col-lg-5 d-flex">
                                <div class="img-about img d-flex align-items-stretch" style="background-image:url('img/sekretaris.jpeg');">
                                    <div class="overlay"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-7 pl-md-4 pl-lg-5 py-5">
                                <div class="py-md-5">
                                    <div class="row justify-content-start pb-3">
                                        <div class="col-md-12 heading-section ftco-animate">
                                            <span class="subheading">Sekretaris Kota Surakarta</span>
                                            <h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;">Ir. Ahyani, Ma</h2>
                                            <p>Ir. Ahyani, MA adalah politikus. Ia menjabat sebagai Sekretaris Kota Surakarta periode 2021 - 2024. Sebelumnya ia menjabat sebagai Plt Kepala Dinas Perumahan Kawasan Permukiman dan Pertanahan TMT 01 Mei 2018 s/d 10 Juli 2018</p>
                                            <ul class="about-info mt-4 px-md-0 px-2">
                                                <li class="d-flex"><span>Nama:</span> <span>Ir. Ahyani MA</span></li>
                                                <li class="d-flex"><span>Tanggal Lahir:</span> <span>23 November 1963</span></li>
                                                <li class="d-flex"><span>Alamat:</span> <span>Surakarta</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- Profil Wakil Walikota Kota Surakarta End  -->

        <!-- Pendidikan Formal Kota Surakarta Start -->
        <section class="ftco-section ftco-no-pb goto-here" id="resume-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <nav id="navi">
                            <ul>
                              <li><a href="#page-1">Pendidikan Formal</a></li>
                              <li><a href="#page-2">Riwayat Pekerjaan</a></li>
                            </ul>
                          </nav>
                        </div>
                        <div class="col-md-9">
                            <div id="page-1" class= "page one">
                                <h2 class="heading">Pendidikan Formal</h2>
                                @foreach ($pendidikansekretaris as $pendidikan)
                                    <div class="resume-wrap d-flex ftco-animate">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-graduation-cap"></i>
                                        </div>
                                        <div class="text pl-3">
                                            <span class="date">{{ $pendidikan->jenjang }}</span>
                                            <h2>{{ $pendidikan->pendidikan }}</h2>
                                            <p>{{ $pendidikan->deskripsi }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div id="page-2" class= "page two">
                                <h2 class="heading">Riwayat Pekerjaan</h2>
                                @foreach ($pekerjaansekretaris as $pekerjaan)
                                    <div class="resume-wrap d-flex ftco-animate">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-user-tie"></i> 
                                        </div>
                                        <div class="text pl-3">
                                            <span class="date">{{ $pekerjaan->masa }}</span>
                                            <h2>{{ $pekerjaan->jabatan }}</h2>
                                            <p>{{ $pekerjaan->deskripsi }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- Pendidikan Formal Kota Surakarta End -->

        @include('include.footer') 

        @include('include.script')
    </body>

</html>