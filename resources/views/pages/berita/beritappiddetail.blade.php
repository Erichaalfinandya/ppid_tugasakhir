<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>PPID Kota Surakarta </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        @include('include.style')

        <!-- note : css tambahan -->
        @include('include.style-custom')

    </head>

    <body>

        <!-- note : mengubah navbar menjadi without search dan carousel sesuai figma -->
        @include('include.navbar-without-search')

        <!-- Profil Pimpinan Kota Surakarta Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                        <h1 class="mb-0">{{ $data->judul }}</h1>
                        <center>
                            <div class="line-custom">
                                <div class="rectangle-custom"></div>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="row g-5 mb-5">
                    <div class="col-lg-12 col-md-12">
                        <div class="team-item">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" style="height:300px;object-fit:cover" src="/{{ $data->sampul }}" alt="">
                                <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <p>
                            {{ $data->deskripsi }}
                        </p>
                        <div>
                            <h6>Penerbit :{{ $data->penerbit }}</h6>
                            <h6>Tanggal Terbit : {{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d, H:i:s') }}</h6>
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