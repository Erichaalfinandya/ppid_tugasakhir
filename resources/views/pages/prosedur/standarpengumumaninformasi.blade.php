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

            <!-- Syarat Wajib Pengumuman Informasi Start -->
            <div class="container-xxl py-5">
                <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div
                        class="position-relative overflow-hidden ps-5 pt-5 h-100"
                        style="min-height: 400px"
                    >
                        <img
                        class="position-absolute w-100 h-100"
                        src="img/syaratwajib.jpg"
                        alt=""
                        style="object-fit: cover"
                        />
                        <div
                        class="position-absolute top-0 start-0 bg-white pe-3 pb-3"
                        style="width: 200px; height: 200px"
                        >
                        <div
                            class="d-flex flex-column justify-content-center text-center bg-primary h-100 p-3"
                        >
                            <h1 class="text-white">Pasal</h1>
                            <h2 class="text-white">24</h2>
                            <h5 class="text-white mb-0">Ayat (2)</h5>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <div class="border-start border-5 border-primary ps-4 mb-5">
                        <h6 class="text-body text-uppercase mb-2">Standar Informasi</h6>
                        <h1 class="display-6 mb-0">
                            Syarat Wajib Pengumuman Informasi
                        </h1>
                        </div>
                        <p>
                            Sesuai dengan Peraturan Komisi Informasi Nomor 1 Tahun 2021
                            tentang Standar Layanan Informasi Publik Pasal 24 Ayat (2)
                            Pengumuman Informasi wajib :
                        </p>
                        <div class="border-top mt-4 pt-4">
                        <div class="row g-4">
                            <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.1s">
                            <i
                                class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                            ></i>
                            <h6 class="mb-0">Menggunakan bahasa Indonesia yang baik dan benar</h6>
                            </div>
                            <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.3s">
                            <i
                                class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                            ></i>
                            <h6 class="mb-0"> <p>Mudah dipahami</h6>
                            </div>
                            <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.5s">
                            <i
                                class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                            ></i>
                            <h6 class="mb-0">Menyesuaikan bahasa yang digunakan penduduk setempat</h6>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Syarat Wajib Pengumuman Informasi End -->

        <!-- Lokasi Pengumuman Informasi Start -->
		<div class="why-choose-section py-5">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
                        <h2 class="section">Lokasi Pengumuman Informasi</h2>
						<p>Berikut ini merupakan tempat untuk mendapatkan pengumuman informasi</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="img/truck.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Papan Pengumuman Informasi</h3>
									<p>Informasi dapat dilihat pada papan pengumuman yang terletak di Pemerintah Kota Surakarta.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="img/bag.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Halaman Resmi (Website PPID)</h3>
									<p>Website resmi PPID Kota Surakarta : <strong>ppid.surakarta.go.id</strong></p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="img/support.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Media Sosial Pemerintah Surakarta</h3>
									<p>Media Sosial Pemerintah Kota Surakarta meliputi :</p>
                                    <li>Twitter   : <strong>@PEMKOT_SOLO</strong></li>
                                    <li>Instagram : <strong>pemkot_solo</strong></li>
                                    <li>Facebook  : <strong>pemkotsolo</strong></li>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="img/return.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Email Resmi (Email PPID)</h3>
									<p>Email resmi PPID Kota Surakarta : <strong>ppid@surakarta.go.id</strong></p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="img/pengumuman.jpg" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- Lokasi Pengumuman Informasi End -->

        @include('include.footer')

        @include('include.script')
    </body>

</html>
