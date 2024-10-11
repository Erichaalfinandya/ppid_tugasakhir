    <!-- plugins:css -->
    <link rel="stylesheet" href={{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}>
    <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    {{-- <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}"> --}}
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/dataTables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

    <style>
        .table img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>

<style>
    .badge-warning {
        background-color: #ffc107 !important; 
        color: #fff !important;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 14px;
    }
    .badge-success {
        background-color: #28a745;
        color: #fff;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 14px;
    }
    .badge-danger {
        background-color: #dc3545;
        color: #fff;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 14px;
    }
</style>

<style>
    .track-order {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 20px 0;
    }
    
    .track-order .stage {
        position: relative;
        text-align: center;
        flex: 1;
        padding-top: 50px;
    }
    
    .track-order .stage:not(:last-child)::after {
        content: '';
        position: absolute;
        top: 50%;
        right: -50%;
        width: 100%;
        height: 4px;
        background-color: #dcdcdc;
        z-index: -1;
    }
    
    .track-order .stage.completed:not(:last-child)::after {
        background-color: #1A374D; /* Warna garis untuk tahap yang sudah selesai */
    }

    .track-order .stage.current:not(:last-child)::after {
        background-color: #1A374D; /* Warna garis untuk tahap yang sedang berlangsung */
    }
        
    .track-order .stage .circle {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background-color: #dcdcdc; /* Warna lingkaran */
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .track-order .stage .circle i {
        font-size: 30px; /* Ukuran ikon di dalam lingkaran */
        color: #1A374D; /* Warna ikon */
    }
    
    .track-order .stage.completed .circle {
        background-color: #dcdcdc; /* Warna lingkaran untuk tahap yang selesai */
        color: #1A374D; /* Warna ikon untuk tahap yang selesai */
    }

    .track-order .stage.current .circle {
        background-color: #dcdcdc; /* Warna lingkaran untuk tahap yang sedang berlangsung */
        color: #1A374D; /* Warna ikon untuk tahap yang sedang berlangsung */
    }

    .track-order .stage.pending .circle {
        background-color: #dcdcdc; /* Warna lingkaran untuk tahap yang belum dimulai */
        color: #1A374D; /* Warna ikon untuk tahap yang belum dimulai */
    }
    
    .track-order .stage .text {
        max-width: 150px;
        margin-top: 20px;
        text-align: center; /* Menyelaraskan teks di tengah */
        margin-left: 10px; 
    }
    
    .track-order .stage h4 {
        font-size: 16px;
        margin: 0 0 10px 0; /* Jarak bawah antara judul dan deskripsi */
    }
    
    .track-order .stage p {
        font-size: 14px;
        color: #1A374D; /* Warna teks deskripsi */
        margin: 0; /* Menghapus margin default jika perlu */
    }
</style>

</style>

<style>
    .connector {
        position: absolute;
        top: 50%; /* Tempatkan di tengah vertikal */
        left: 50%; /* Tempatkan di tengah horizontal */
        transform: translateX(-50%) translateY(-50%); /* Geser ke posisi yang sesuai */
        width: 2px; /* Lebar garis */
        height: 100%; /* Tinggi garis */
        background-color: #1A374D; /* Warna garis */
    }

    .button-custom {
        width: 40px; /* Menetapkan lebar tombol */
        height: 40px; /* Menetapkan tinggi tombol */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        margin: 0 5px; /* Mengatur margin untuk spasi antar tombol */
    }

    .btn-action-container {
    display: flex;
    gap: 10px; /* Jarak antara tombol */
}

.btn-action-container .btn {
    flex: 1; /* Tombol akan tumbuh sama besar */
    max-width: 120px; /* Lebar maksimum tombol */
    text-align: center; /* Teks di dalam tombol tengah */
    height: 38px; /* Tinggi tombol, sesuaikan dengan kebutuhan */
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>


<style>
    .btn-custom-yellow {
        background-color: #1A374D;
        color: #fff; /* Warna teks putih untuk kontras yang baik */
        border: none; /* Hapus border default */
        border-radius: .25rem; /* Bulatkan sudut jika diinginkan */
        padding: .375rem .75rem; /* Atur padding */
        font-size: 1rem; /* Ukuran font */
        line-height: 1.5; /* Ketinggian garis */
    }

    .btn-custom-blue {
        background-color: #6E7891;
        color: #fff; /* Warna teks putih untuk kontras yang baik */
        border: none; /* Hapus border default */
        border-radius: .25rem; /* Bulatkan sudut jika diinginkan */
        padding: .375rem .75rem; /* Atur padding */
        font-size: 1rem; /* Ukuran font */
        line-height: 1.5; /* Ketinggian garis */
    }

    .btn-custom-yellow:hover {
        background-color: #1A374D; /* Warna gelap saat hover */
        color: #fff; /* Tetap warna teks putih saat hover */
    }

    .btn-custom-yellow:focus, .btn-custom-yellow:active {
        box-shadow: 0 0 0 .2rem #1A374D; /* Tambahkan shadow saat fokus atau aktif */
    }

    .btn-info {
    background-color: #1A374D; /* Warna latar belakang tombol */
    border-color: #1A374D; /* Warna border tombol */
    color: #fff; /* Warna teks tombol */
}

.btn-info:hover {
    background-color: #16324E; /* Warna latar belakang tombol saat hover */
    border-color: #16324E; /* Warna border tombol saat hover */
}

</style>

