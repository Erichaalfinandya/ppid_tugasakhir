<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Majestic Admin Pro</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <!-- endinject -->
    <style>
    .form-check-input {
      display: inline-block; /* atau display: block; */
      /* Tambahkan properti lain jika diperlukan */
  }
  </style>
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
  </head>
  

<body  id="google_translate_container" class="g-sidenav-show  bg-gray-200">
    
    @yield('content')

    {{-- Vite JS --}}
    {{-- {{ module_vite('build-loginsignup', 'resources/assets/js/app.js') }} --}}
</body>