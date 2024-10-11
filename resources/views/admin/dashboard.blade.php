@extends('layouts.inc.admin.master')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="me-md-3 me-xl-5">
            <h2>Halo, {{ auth()->user()->name }}</h2>
            <p class="mb-md-0">Role : {{ auth()->user()->roles }}</p>
          </div>
          <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      @if(auth()->user()->status === 'belum melengkapi data')
      <div class="alert alert-danger" role="alert">
        Silahkan melengkapi data diri anda terlebih dahulu untuk dapat menggunakan fitur-fitur yang tersedia dalam sistem PPID Kota Surakarta.
        <br>
        <a href="{{ url('/user/profile') }}" class="btn btn-md btn-danger text-white mt-2">Lengkapi Data Diri Sekarang</a>
      </div>
      @elseif(auth()->user()->status === 'belum terverifikasi')
      <div class="alert alert-warning" role="alert">
        Anda sudah melengkapi data diri. Silahkan menunggu admin memverifikasi akun anda terlebih dahulu sebelum dapat menggunakan fitur-fitur yang tersedia dalam sistem PPID Kota Surakarta.
      </div>
      @elseif(str_contains(auth()->user()->status, 'tolak terverifikasi'))
      <div class="alert alert-warning" role="alert">
        Akun anda ditolak verifikasi oleh admin dengan alasan <strong>"{{ substr(auth()->user()->status, 20) }}"</strong>. Silahkan memperbaiki data diri dan menunggu admin memverifikasi ulang akun anda terlebih dahulu sebelum dapat menggunakan fitur-fitur yang tersedia dalam sistem PPID Kota Surakarta.
        <br>
        <a href="{{ url('/user/profile') }}" class="btn btn-md btn-danger text-white mt-2">Ubah Data Diri Sekarang</a>
      </div>
      @endif
    </div>
  </div>

@endsection
