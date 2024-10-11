{{-- css home --}}

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">

        <style> 
            /* untuk layanan di home */
                .primary {
                    border: 2px solid #13357B; /* Border biru sebelum disentuh */
                    transition: all 0.3s ease; /* Animasi halus ketika hover */
                    border-radius: 8px; /* Membuat sudut rounded */
                }
    
                .primary a {
                    text-decoration: none; /* Menghapus underline pada link */
                    color: black; /* Default warna teks hitam */
                }
    
                .primary p {
                    transition: color 0.3s ease; /* Menambahkan transisi warna teks */
                }
    
                .primary:hover {
                    background-color: #13357B; /* Ubah background menjadi biru saat hover */
                    border-color: #13357B; /* Border tetap biru saat hover */
                }
    
                .primary:hover a p {
                    color: white !important; /* Menggunakan !important untuk memaksa teks berubah menjadi putih */
                }
            </style>
        
<style>
.custom-radio {
    position: relative;
    padding-left: 30px;
    margin-bottom: 15px;
    cursor: pointer;
    font-size: 16px;
    line-height: 1.5;
    display: block;
}

.custom-radio input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

.custom-radio label {
    margin: 0;
    cursor: pointer;
}

.custom-radio input:checked ~ label:before {
    background-color: #13357B;
    border-color: #13357B;
}

.custom-radio label:before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    width: 18px;
    height: 18px;
    border: 2px solid #ccc;
    border-radius: 50%;
    background-color: #fff;
    transform: translateY(-50%);
    transition: all 0.3s ease;
}

.custom-radio label:after {
    content: '';
    position: absolute;
    top: 50%;
    left: 6px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #fff;
    transform: translateY(-50%);
    opacity: 0;
    transition: all 0.3s ease;
}

.custom-radio input:checked ~ label:after {
    background-color: #fff;
    opacity: 1;
}
</style>
<style> 
    /* UNTUK HALAMAN FORMULIR DI HOME*/
        /* Style umum untuk tombol */
        .btn {
            background-color: #13357B; /* Warna background biru */
            color: white; /* Warna teks putih */
            border: 2px solid #13357B; /* Border sama dengan warna background */
            transition: background-color 0.3s ease, color 0.3s ease; /* Animasi transisi */
        }
    
        .btn-permohonan {
            background-color: #13357B;
            color: white;
            border-color: #13357B;
        }
    
        .btn-keberatan {
            background-color: #13357B;
            color: white;
            border-color: #13357B;
        }
    
        .btn-sengketa {
            background-color: #13357B;
            color: white;
            border-color: #13357B;
        }
    
        /* Hover effect tetap sama */
        .btn:hover {
            background-color: white;
            color: inherit;
        }
    
        /* Tambahkan style untuk posisi tombol */
        .btn-center {
            display: inline-block;
            text-align: center;
            width: 100%; /* Tombol menempati lebar penuh */
        }
    </style>