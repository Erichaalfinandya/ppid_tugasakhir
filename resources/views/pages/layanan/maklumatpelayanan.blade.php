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

<!-- maklumat pelayanan start -->
<div class="untree_co-section pt-5 pb-0">
    <div class="container">
        <div class="row mb-2 justify-content-center">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Layanan</h5>
                <h1 class="mb-0">Maklumat Pelayanan Informasi Publik</h1>
            </div>
        </div>
        <div class="row g-5 mb-5 align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ $data->gambar }}" alt="" style="height:400px;object-fit:cover">
                        <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 align-middle">
                <div class="desktop-to-left">
                  <div class="detail-box">
                    <div class="heading_container ">
                      <h3>
                        {{ $data->judul }}
                      </h3>
                    </div>
                    <p>
                        {{ $data->deskripsi }}
                    </p>
                    <ul>
                        @foreach ($list as $datas)
                            <li>{{ $datas->deskripsi }}</li>
                        @endforeach
                    </ul>
                    <center>
                      <button type="button" onclick="location.href='{{ $data->link }}';" class="btn btn-primary px-3 mt-3">Lihat</ce>
                    </center>
                    </div>
                  </div>
                </div>
            </div>
        </div>

  <!-- maklumat pelayanan end -->

        @include('include.footer')

        @include('include.script')
    </body>

</html>
