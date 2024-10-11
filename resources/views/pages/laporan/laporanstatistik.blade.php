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

        @include('include.navbar')

        <!-- Laporan Statistik Start -->
        <div class="untree_co-section py-5">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                        <h5 class="section-title px-3">Laporan</h5>
                        <h1 class="mb-0">Laporan Statistik Informasi Publik PPID Kota Surakarta</h1>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="border rounded position-relative vesitable-item mb-4 pb-5 bg-primary">
                            <div class="vesitable-img">
                                <!-- <img src="img/permohonan.png" class="img-fluid w-100 rounded-top" alt=""> -->
                                 <br><br><br><br><br><br>
                            </div>
                            <div class="p-4 rounded-bottom text-center">
                                <h4 class="text-white">Permohonan</h4>
                            </div>
                        </div>
                        <div style="width: 100%;text-align: center;margin-top: -75px;z-index: 1001;position: relative;">
                            <span style="width: 100px;height: 100px;line-height: 100px;border-radius: 50%;background: white;display: inline-block;text-align: center;">
                                <strong>{{ $permohonan }}</strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border rounded position-relative vesitable-item mb-4 pb-5 bg-primary">
                            <div class="vesitable-img">
                                <!-- <img src="img/keberatan.png" class="img-fluid w-100 rounded-top" alt=""> -->
                                 <br><br><br><br><br><br>
                            </div>
                            <div class="p-4 rounded-bottom text-center">
                                <h4 class="text-white">Keberatan</h4>
                            </div>
                        </div>
                        <div style="width: 100%;text-align: center;margin-top: -75px;z-index: 1001;position: relative;">
                            <span style="width: 100px;height: 100px;line-height: 100px;border-radius: 50%;background: white;display: inline-block;text-align: center;">
                                <strong>{{ $keberatan }}</strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border rounded position-relative vesitable-item mb-4 pb-5 bg-primary">
                            <div class="vesitable-img">
                                <!-- <img src="img/publik.png" class="img-fluid w-100 rounded-top" alt=""> -->
                                 <br><br><br><br><br><br>
                            </div>
                            <div class="p-4 rounded-bottom text-center">
                                <h4 class="text-white">Sengketa</h4>
                            </div>
                        </div>
                        <div style="width: 100%;text-align: center;margin-top: -75px;z-index: 1001;position: relative;">
                            <span style="width: 100px;height: 100px;line-height: 100px;border-radius: 50%;background: white;display: inline-block;text-align: center;">
                                <strong>{{ $sengketa }}</strong>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Laporan Statistik End -->

        @include('include.footer')

        @include('include.script')

        <!-- note : js tambahan untuk carousel -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
    const floatingBtn = document.querySelector('.floating-btn');
    const floatingMenu = document.querySelector('.floating-menu');
    const scrollTopBtn = document.getElementById('scrollTopBtn');

    // Toggle menu visibility
    floatingBtn.addEventListener('click', function () {
        floatingMenu.style.display = floatingMenu.style.display === 'flex' ? 'none' : 'flex';
    });

    // Scroll to top functionality
    scrollTopBtn.addEventListener('click', function (e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
        floatingMenu.style.display = 'none';
    });

    // Close menu when clicking outside
    document.addEventListener('click', function (e) {
        if (!floatingBtn.contains(e.target) && !floatingMenu.contains(e.target)) {
            floatingMenu.style.display = 'none';
        }
    });
});
        </script>
        <script>
            function submitForm() {
                alert("Anda harus login terlebih dahulu!");
                window.location.href = "{{ route('login') }}";
            }
        </script>
    </body>

</html>
