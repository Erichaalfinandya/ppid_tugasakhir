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

        @include('include.navbar-without-search')

         <!-- Daftar Informasi Publik Start -->
         <div class="untree_co-section py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-12">
                        <div class="border border-primary rounded position-relative vesitable-item mb-4">
                            <div class="vesitable-img">
                                <img src="img/featur-1.jpg.png" class="img-fluid w-100 rounded-top" alt="">
                            </div>

                            <div class="p-4 pb-5 rounded-bottom" style="background-color:#6998AB;">
                                <div class="daftarinformasipublik-card-title">
                                    <a href="{{ Route('daftarinformasipublikberkala') }}">
                                        <h5 class="text-center">Daftar Informasi Publik<br>Secara Berkala</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="border border-primary rounded position-relative vesitable-item mb-4">
                            <div class="vesitable-img">
                                <img src="img/featur-1.jpg.png" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="p-4 pb-5 rounded-bottom" style="background-color:#6998AB;">
                                <div class="daftarinformasipublik-card-title">
                                    <a href="{{ Route('daftarinformasipubliksertamerta') }}">
                                        <h5 class="text-center">Daftar Informasi Publik<br>Secara Serta Merta</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="border border-primary rounded position-relative vesitable-item mb-4">
                            <div class="vesitable-img">
                                <img src="img/featur-1.jpg.png" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="p-4 pb-5 rounded-bottom" style="background-color:#6998AB;">
                                <div class="daftarinformasipublik-card-title">
                                    <a href="{{ Route('daftarinformasipubliksetiapsaat') }}">
                                        <h5 class="text-center">Daftar Informasi Publik<br>Tersedia Setiap Saat</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Daftar Informasi Publik End -->

        @include('include.footer')

        @include('include.script')
    </body>

</html>
