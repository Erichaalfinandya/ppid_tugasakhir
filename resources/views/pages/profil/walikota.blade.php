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
            /* Mengisi tinggi carousel item agar sesuai dengan tinggi gambar dan kotak teks */
            .carousel-items {
                height: 100%; /* Tinggi maksimal */
                display: flex;
                align-items: flex-end; /* Mengatur posisi teks ke bawah */
                position: relative; /* Menetapkan posisi relatif untuk elemen internal */
            }
        
            /* Mengatur gambar agar mengisi tinggi carousel item */
            .carousel-items .team-image {
                height: 100%; /* Mengisi tinggi gambar */
                width: auto; /* Memastikan lebar disesuaikan */
                object-fit: cover; /* Memastikan gambar mengisi ruang dengan baik */
            }
        
            /* Kotak teks di bawah gambar */
            .carousel-items .team-thumb {
                background-color: rgba(255, 193, 7, 0.8); /* Warna latar belakang */
                padding: 10px; /* Ruang dalam di dalam kotak teks */
                position: absolute; /* Menetapkan posisi absolut */
                bottom: 10px; /* Jarak dari bawah */
                right: 10px; /* Jarak dari kanan */
                left: unset; /* Mengatur posisi kiri menjadi tidak ditetapkan */
                width: 50%; /* Lebar kotak teks */
            }
        
            /* Styling untuk teks di dalam kotak teks */
            .carousel-items .team-thumb h3,
            .carousel-items .team-thumb p {
                margin: 0; /* Menghapus margin bawaan */
                color: white; /* Warna teks */
            }
        </style>
        <style>
            /*** CSS WALIKOTA START  ***/
.portfolio-wrap {
    display: block;
    width: 100%;
    margin-bottom: 7em; }
    .portfolio-wrap .text {
      position: relative; }
      .portfolio-wrap .text .subheading {
        display: block;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 3px;
        color: #000000;
        font-weight: 700; }
      .portfolio-wrap .text h2 {
        font-size: 80px;
        display: inline-block; }
        @media (max-width: 767.98px) {
          .portfolio-wrap .text h2 {
            font-size: 16vw; } }
        .portfolio-wrap .text h2 a {
          color: #000000;
          padding-bottom: 10px;
          border-bottom: 3px solid #000000; }
      .portfolio-wrap .text .top-relative h2 {
        font-size: 50px; }
      .portfolio-wrap .text .desc {
        position: relative;
        width: 100%; }
        @media (min-width: 1200px) {
          .portfolio-wrap .text .desc .top {
            -webkit-transform: translateY(50%);
            -ms-transform: translateY(50%);
            transform: translateY(50%);
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            -webkit-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            transition: all 0.3s ease; }
            .portfolio-wrap .text .desc .top.top-relative {
              -webkit-transform: translateY(0);
              -ms-transform: translateY(0);
              transform: translateY(0); }
          .portfolio-wrap .text .desc .absolute {
            opacity: 0;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            -webkit-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            transition: all 0.3s ease;
            -webkit-transform: translateY(-20%);
            -ms-transform: translateY(-20%);
            transform: translateY(-20%); }
            .portfolio-wrap .text .desc .absolute.relative {
              opacity: 1;
              -webkit-transform: translateY(0);
              -ms-transform: translateY(0);
              transform: translateY(0); } }
        .portfolio-wrap .text .desc .custom-btn {
          text-transform: uppercase;
          font-size: 12px;
          letter-spacing: 3px;
          color: #b3b3b3;
          font-weight: 700; }
      .portfolio-wrap .text:hover {
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -webkit-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        transition: all 0.3s ease; }
        .portfolio-wrap .text:hover .absolute {
          position: relative;
          opacity: 1;
          -webkit-transform: translateY(0);
          -ms-transform: translateY(0);
          transform: translateY(0); }
        .portfolio-wrap .text:hover .top {
          position: relative;
          -webkit-transform: translateY(0);
          -ms-transform: translateY(0);
          transform: translateY(0); }
  
  .portfolio-entry {
    position: relative;
    margin-bottom: 7em; }
    .portfolio-entry .text-wrapper {
      width: 100%; }
      @media (max-width: 767.98px) {
        .portfolio-entry .text-wrapper {
          height: inherit; } }
    .portfolio-entry .one-half {
      width: 60%; }
      @media (max-width: 991.98px) {
        .portfolio-entry .one-half {
          width: 100%; } }
      @media (min-width: 992px) {
        .portfolio-entry .one-half.half-text {
          position: absolute;
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
          width: 100%;
          margin: 0 auto; }
          .portfolio-entry .one-half.half-text .text {
            position: absolute;
            top: 50%;
            left: 0;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            max-width: 60%; }
          .portfolio-entry .one-half.half-text .text-2 {
            position: absolute;
            top: 50%;
            right: 0;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            max-width: 58%; } }
      @media (min-width: 1200px) {
        .portfolio-entry .one-half.half-text {
          position: absolute;
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
          width: 1140px;
          margin: 0 auto; }
          .portfolio-entry .one-half.half-text .text {
            position: absolute;
            top: 50%;
            left: 0;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            max-width: 58%; }
          .portfolio-entry .one-half.half-text .text-2 {
            position: absolute;
            top: 50%;
            right: 0;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            max-width: 58%; } }
      .portfolio-entry .one-half.half-text .subheading {
        display: block;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 3px;
        color: #000000;
        font-weight: 700; }
      .portfolio-entry .one-half.half-text h2 {
        font-size: 80px;
        display: inline-block; }
        @media (max-width: 767.98px) {
          .portfolio-entry .one-half.half-text h2 {
            font-size: 16vw; } }
        .portfolio-entry .one-half.half-text h2 a {
          color: #000000;
          padding-bottom: 10px;
          border-bottom: 3px solid #000000; }
      .portfolio-entry .one-half.half-text .text .desc, .portfolio-entry .one-half.half-text .text-2 .desc {
        position: relative;
        width: 100%; }
        @media (min-width: 1200px) {
          .portfolio-entry .one-half.half-text .text .desc .top, .portfolio-entry .one-half.half-text .text-2 .desc .top {
            -webkit-transform: translateY(50%);
            -ms-transform: translateY(50%);
            transform: translateY(50%);
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            -webkit-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            transition: all 0.3s ease; }
          .portfolio-entry .one-half.half-text .text .desc .absolute, .portfolio-entry .one-half.half-text .text-2 .desc .absolute {
            opacity: 0;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            -webkit-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            transition: all 0.3s ease;
            -webkit-transform: translateY(-20%);
            -ms-transform: translateY(-20%);
            transform: translateY(-20%); } }
        .portfolio-entry .one-half.half-text .text .desc .custom-btn, .portfolio-entry .one-half.half-text .text-2 .desc .custom-btn {
          text-transform: uppercase;
          font-size: 12px;
          letter-spacing: 3px;
          color: #b3b3b3;
          font-weight: 700; }
      .portfolio-entry .one-half.half-text .text:hover, .portfolio-entry .one-half.half-text .text-2:hover {
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -webkit-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        transition: all 0.3s ease; }
        .portfolio-entry .one-half.half-text .text:hover .absolute, .portfolio-entry .one-half.half-text .text-2:hover .absolute {
          position: relative;
          opacity: 1;
          -webkit-transform: translateY(0);
          -ms-transform: translateY(0);
          transform: translateY(0); }
        .portfolio-entry .one-half.half-text .text:hover .top, .portfolio-entry .one-half.half-text .text-2:hover .top {
          position: relative;
          -webkit-transform: translateY(0);
          -ms-transform: translateY(0);
          transform: translateY(0); }

.carousel-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Membuat semua elemen dalam baris sama tingginya */

/* Memastikan gambar dan konten lainnya menggunakan 100% dari tinggi container mereka */
img.img-fluid, .team-image {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Menyesuaikan gambar dengan container */
}

/* Pastikan carousel menyesuaikan tinggi kolom */
.carousel-inner, .carousel-item {
    height: 100%;
}

/* Menyebabkan konten di dalam kolom untuk memenuhi tinggi kolom */
.bg-dark {
    height: 100%;
}

/* Jika diperlukan, tambahkan CSS ini untuk memastikan konten di dalam kolom menggunakan 100% tinggi */
.bg-dark, .equal-height {
    display: flex;
    flex-direction: column;
    height: 100%;
}

/* Pastikan tinggi div diatur agar sama besar */
.col-lg-3, .col-lg-6 {
    height: 100%; /* Kolom memiliki tinggi yang sama */
}

.img-fluid {
    height: 100%;
    object-fit: cover; /* Gambar menyesuaikan dengan kotak tanpa mengubah proporsi */
}

.bg-dark {
    height: 100%;
}

.team-thumb {
    width: auto;
    height: auto;
    bottom: 0;
    right: 0;
}

.custom-links {
    margin-top: auto;
}
/*** CSS WALIKOTA END ***/
            </style>
        
    </head>

    <body>

        @include('include.navbar')

        <!-- Profil Walikota Pimpinan Start  -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                        <h5 class="section-title px-3">{{ __('messages.profil') }}</h5>
                        <h1 class="mb-0">Profil Walikota Kota Surakarta</h1>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-12 p-0">      
                            <img src="img/walikota.jpg" class="img-fluid about-image" alt="">
                        </div>
                        <div class="col-lg-3 col-12 bg-dark d-flex align-items-center">  
                            <div class="d-flex flex-column flex-wrap justify-content-center py-5 px-4 pt-lg-4 pb-lg-0">
                                <h3 class="text-white mb-3" data-aos="fade-up">Walikota Kota Surakarta</h3>
                                <p class="text-secondary-white-color" data-aos="fade-up">Profil Pimpinan Kota Surakarta</p>     
                                <div class="mt-3 custom-links">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 p-0">  
                            <section id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="img/walikota2.jpg" class="img-fluid team-image" alt="" style="height: 100%;">
                                        <div class="team-thumb bg-warning position-absolute end-0 bottom-0 p-3">
                                            <h3 class="text-white mb-0">Gibran Rakabuming Raka</h3>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profil Walikota Pimpinan End  -->

        <!-- Educational Pimpinan Start  -->
        <div class="untree_co-section py-2">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                        <h5 class="section-title px-3">{{ __('messages.profil') }}</h5>
                        <h1 class="mb-0">Educational Background</h1>
                    </div>
                </div>
            </div>
                <div class="container-fluid px-0 portfolio-entry">
                    <div class="row no-gutters d-xl-flex justify-content-end text-wrapper">
                        <div class="one-half img js-fullheight">
                            <img src="img/MDIS.png" class="img-fluid" alt="Walikota Image">
                        </div>
                        <div class="one-half half-text d-flex justify-content-end align-items-center ftco-animate">
                            <div class="text align-items-center d-flex">
                                <div class="desc pt-5 pl-4 pr-4 pt-lg-0 pl-lg-5 pl-xl-0 pr-xl-0">
                                    <div class="top">
                                        <span class="subheading">Tahun 2007</span>
                                        <h2 class="mb-4"><a href="work.html">MDIS</a></h2>
                                    </div>
                                    <div class="absolute">
                                        <p>Management Development Institute Of Singapore pada Tahun 2007</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid px-0 portfolio-entry">
                    <div class="row no-gutters d-md-flex justify-content-start text-wrapper">
                        <div class="one-half img js-fullheight">
                            <img src="img/UTS.jpg" class="img-fluid" alt="MDIS Image">
                        </div>
                        <div class="one-half half-text d-flex justify-content-end align-items-center ftco-animate">
                            <div class="text-2 align-items-start d-flex">
                                <div class="desc pt-5 pr-4 pl-4 pt-lg-0 pr-lg-5 pr-xl-0 pl-xl-0">
                                    <div class="top">
                                        <span class="subheading">Tahun 2010</span>
                                        <h2 class="mb-4"><a href="work.html">UTS Insearch</a></h2>
                                    </div>
                                    <div class="absolute">
                                        <p>Universitas of Technology Sidney pada Tahun 2010</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- Educational Pimpinan End -->

        <!-- Positions Held Start -->
        <div class="container-fluid py-2">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">{{ __('messages.profil') }}</h5>
                <h1 class="mb-0">Positions Held</h1>
            </div>
        </div>
        <div class="site-section" id="what-we-do-section">
            <div class="container">
                <div class="row mb-5"></div>
                <div class="row no-gutters align-items-stretch">
                    <div class="col-lg-6 mb-5 person d-flex flex-column">
                        <img src="img/walikota3.webp" alt="MDIS Image" class="img-fluid mb-5 align-self-stretch">
                        <div class="row flex-grow-1 d-flex align-items-start">
                            <div class="col-lg-10 ml-auto">
                                <div class="pr-lg-5">
                                    <h3>Chairman</h3>
                                    <span class="mb-4 d-block">Association of Indonesian catering companies</span>
                                    <p class="text-justify">To those who have never met Gibran, he may seem to be rather reserved, but to the residents of Solo city, he is an approachable and considerate young entrepreneur and incoming mayor. As the youngest incoming mayor in the history of Solo city at the age of 33, and the son of previous Solo city mayor and current Indonesian President Joko Widodo, Gibran has shown compassion and attentiveness to his many constituents. Gibran often listens to the concerns of Solo city's residents, from societal worries such as the development programs for the city to relatively minor worries such as clogged drains and leaky roofs.</p>
                                    <p class="text-justify">Gibran's management style is more direct and hands-on, something he learned from his father who was Solo city's mayor from 2005 until 2012. Gibran helped clean a dirty canal during one of his impromptu visits to a neighborhood, proving that no job is too small for him.</p>
                                    <p class="text-justify">His many visits to better understand the plight of the residents in different parts of the city truly show that he lives by the Indonesian principle of “gotong royong”, of working together within a community without regard for one's position to work towards a common goal - the betterment of the community. Gibran's active involvement within the various communities in Solo city has won him the hearts of its residents, resulting in his landslide victory in the December 9th regional elections.</p>
                                    <p class="text-justify">Gibran studied in Orchid Park Secondary School and Management Development Institute of Singapore before pursuing his graduate degree in the University of Technology Sydney Insearch.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 person d-flex flex-column">
                        <img src="img/walikota3.webp" alt="MDIS Image" class="img-fluid mb-5 align-self-stretch">
                        <div class="row flex-grow-1 d-flex align-items-start">
                            <div class="col-lg-10 ml-auto">
                                <div class="pr-lg-5">
                                    <h3>Mayor</h3>
                                    <span class="mb-4 d-block">Solo City, 2021 - 2026</span>
                                    <p class="text-justify">After graduating at the age of 23, Gibran decided to start his entrepreneurial career in Indonesia instead of continuing his father's furniture business. He is most well known for his culinary ventures such as Chilli Pari - a catering business that emphasized the training of its staff in various skills including English language fluency - and Markobar - a food stall chain that aims to modernize traditional Indonesian treats by incorporating Western Ingredients as well as modern presentations. Currently, Gibran has developed at least eight businesses. Nevertheless, he still lives modestly, often flying on economy class when traveling to both domestic and overseas destinations.</p>
                                    <p class="text-justify">Considering Gibran's strong entrepreneurial track record and focus in the business world, many people did not foresee Gibran's decision to enter the field of politics.</p>
                                    <p class="text-justify">It is no secret that some of Solo city's own residents initially doubted Gibran's capabilities as a political leader as they only considered him as a safe candidate chosen by the political elite. However, Gibran's dedication to the causes that he champions, as well as his eagerness to deepen his understanding of various fields, especially politics, has earned him the respect of the residents and improved his standing in their hearts. Furthermore, with Teguh Prakoso - a local veteran politician - as his deputy mayor, along with the backing of five major political parties, Gibran has continued to quell the perception that he and his team are inexperienced in the political sphere.</p>
                                    <p class="text-justify">As the incoming mayor, Gibran's various development programs and his commitment to understanding the needs of Solo city's residents will surely pave the way to a brighter future for Solo city.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        
        <!-- Positions Held End -->


        @include('include.footer') 

        @include('include.script')
    </body>

</html>