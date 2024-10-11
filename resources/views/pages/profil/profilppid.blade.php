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

        <!-- Profil Pimpinan Kota Surakarta Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                        <h5 class="section-title px-3">Profil</h5>
                        <h1 class="mb-0">Profil PPID Kota Surakarta</h1>
                        <center>
                            <div class="line-custom">
                                <div class="rectangle-custom"></div>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="row g-5 mb-5">
                    <div class="col-lg-6 col-md-12">
                        <div class="team-item">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ url($general->gambar_profil) }}" alt="">
                                <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="team-item">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <h5 class="fw-bolder">Latar Belakang</h5>
                                    </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body lh-lg">{{ $general->latar_belakang }}</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        <h5 class="fw-bolder">PPID Pemerintah Kota Surakarta</h5>
                                    </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body lh-lg">{{ $general->tugas }}</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        <h5 class="fw-bolder">Motto PPID</h5>
                                    </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body lh-lg">{{ $general->motto }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5 mb-5 mt-5">
                    <div class="col-lg-6 col-md-12">
                        <h1 class="mb-0 text-center">Visi & Misi PPID</h1>
                        <center>
                            <div class="line-custom-2">
                                <div class="rectangle-custom-2"></div>
                            </div>
                        </center>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <a class="btn btn-outline-primary me-md-2 px-5 nav-link active" data-bs-toggle="pill" href="#visi">Visi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-primary px-5 nav-link" data-bs-toggle="pill" href="#misi">Misi</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane container active" id="visi">
                        <div class="row g-5 mb-5 mt-5">
                            <div class="col-lg-6 col-md-12">
                                <div class="team-item">
                                    <div class="position-relative overflow-hidden">
                                        <img class="img-fluid w-100" src="{{ $general->gambar_visi }}" alt="">
                                        <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="border pt-4">
                                    <h5 class="text-center mb-5">Visi PPID</h5>
                                    <ol>
                                        @foreach ($visi as $visis)
                                            <li>{{ $visis->deskripsi }}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container" id="misi">
                        <div class="row g-5 mb-5 mt-5">
                            <div class="col-lg-6 col-md-12">
                                <div class="team-item">
                                    <div class="position-relative overflow-hidden">
                                        <img class="img-fluid w-100" src="{{ url($general->gambar_misi) }}" alt="">
                                        <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="border pt-4">
                                    <h5 class="text-center mb-5">Misi PPID</h5>
                                    <ol>
                                        @foreach ($misi as $misis)
                                            <li>{{ $misis->deskripsi }}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5 mt-5 justify-content-center">
                    <div class="mx-auto text-center mb-5 mt-5" style="max-width: 900px;">
                        <h1 class="mb-0">Tugas dan Tanggung Jawab PPID</h1>
                        <center>
                            <div class="line-custom">
                                <div class="rectangle-custom"></div>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="row g-5 mb-5 mt-5">
                    <div class="row">
                        @foreach ($tugas as $index => $dataTugas)
                            @if ($index % 2 != 0)
                                <!-- Ini adalah urutan genap -->
                                <div class="col-sm-6">
                                    <div class="card mb-3" style="border-left:3px solid #6998AB">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{ $dataTugas->gambar }}" class="img-fluid rounded-start" style="height:200px">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="fw-bolder card-title">{{ $dataTugas->judul }}</h5>
                                                    <br>
                                                    <p class="card-text">{{ $dataTugas->deskripsi }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <!-- Ini adalah urutan ganjil -->
                                <div class="col-sm-6">
                                    <div class="card mb-3" style="border-right:3px solid #6998AB">
                                        <div class="row g-0">
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="fw-bolder card-title text-end">{{ $dataTugas->judul }}</h5>
                                                    <br>
                                                    <p class="card-text text-end">{{ $dataTugas->deskripsi }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <img src="{{ $dataTugas->gambar }}" class="img-fluid rounded-start" style="height:200px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="row mb-5 mt-5 justify-content-center">
                    <div class="mx-auto text-center mb-5 mt-5" style="max-width: 900px;">
                        <h1 class="mb-0">Struktur Organisasi PPID</h1>
                        <center>
                            <div class="line-custom">
                                <div class="rectangle-custom"></div>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="row g-5 mb-5 mt-5 align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="team-item">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ url($struktur->gambar) }}" alt="" style="height:400px;object-fit:cover">
                                <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 align-middle">
                        <div class="desktop-to-left">
                            <h4>Bagaimana Struktur Organisasi PPID ?</h4>
                            <div class="line-border-radius-small"></div>
                            <p>
                                {{ $struktur->deskripsi }}
                            </p>
                            <p>Untuk melihat lebih lanjut klik dibawah ini.</p>
                            <a href="{{ url($struktur->gambar) }}" class="btn btn-primary px-5">Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="row mb-5 mt-5 justify-content-center">
                    <div class="mx-auto text-center mb-5 mt-5" style="max-width: 900px;">
                        <h1 class="mb-0">Dasar Hukum PPID</h1>
                        <center>
                            <div class="line-custom">
                                <div class="rectangle-custom"></div>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="row mb-5 mt-5">
                    <div class="col-lg-12 col-md-12">
                        <div class="owl-carousel">
                            @foreach ($hukum as $hukums)
                                <div class="text-center">
                                    <center>
                                        <img src="{{ $hukums->gambar }}" style="width:150px">
                                    </center>
                                    <h5>{{ $hukums->judul }}</h5>
                                    <p>{{ $hukums->deskripsi }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profil Pimpinan Kota Surakarta End -->

        @include('include.footer')

        @include('include.script')

        <!-- note : js tambahan -->
        @include('include.script-custom')
    </body>

</html>
