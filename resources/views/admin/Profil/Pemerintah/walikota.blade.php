<!-- Load SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layouts.inc.admin.master')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2>Walikota Pemerintah Surakarta</h2>
                    <div class="d-flex">
                        <i class="mdi mdi-account menu-icon"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Profil&nbsp;/&nbsp;</p>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Walikota Pemerintah Surakarta&nbsp;/&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tombol Posisi Walikota dan Pendidikan Walikota dengan ukuran dinamis -->
<div class="row mt-2 py-3 justify-content">
    <div class="col-auto">
        <!-- Tombol untuk halaman posisi walikota -->
        <a href="{{ Route('posisi_walikota.index') }}" class="btn btn-primary" style="color: white">
            Posisi Walikota
        </a>
    </div>
    <div class="col-auto">
        <!-- Tombol untuk halaman pendidikan walikota -->
        <a href="{{ Route('pendidikan_walikota.index') }}" class="btn btn-primary" style="color: white">
            Pendidikan Walikota
        </a>
    </div>
</div>

<!-- Formulir pengisian Data BARU -->
<div class="card">
    <div class="card-body">
        <form action="{{ route('walikota_pemerintah.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Input Form -->
            <div class="form-group mb-4">
                <label for="nama"><strong>Nama Walikota</strong></label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $walikota->nama ?? '' }}" {{ $walikota ? 'readonly' : 'required' }}>
            </div>
            <div class="form-group">
                <label for="sampulutama"><strong>Sampul Utama</strong></label>
                @if($walikota && $walikota->sampulutama)
                    <div class="mb-2">
                        <img src="{{ url('upload/' . $walikota->sampulutama) }}" style="height:200px;object-fit:cover" alt="Sampul Utama">
                    </div>
                @endif
                @if(!$walikota || !$walikota->sampulutama)
                    <input type="file" class="form-control-file" id="sampulutama" name="sampulutama" {{ $walikota ? 'disabled' : '' }}>
                @endif
            </div>
            <div class="form-group">
                <label for="sampul"><strong>Sampul</strong></label>
                @if($walikota && $walikota->sampul)
                    <div class="mb-2">
                        <img src="{{ url('upload/' . $walikota->sampul) }}" style="height:200px;object-fit:cover" alt="Sampul">
                    </div>
                @endif
                @if(!$walikota || !$walikota->sampul)
                    <input type="file" class="form-control-file" id="sampul" name="sampul" {{ $walikota ? 'disabled' : '' }}>
                @endif
            </div>
            @if(!$walikota)
            <button type="submit" class="btn py-2 px-4 ms-lg-4" style="background-color: #13357B; color: white;">Simpan Data</button>
            @endif
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                @if($walikota)
                    <button type="button" class="btn py-2 px-4 ms-lg-4" style="background-color: #13357B; color: white;" data-toggle="modal" data-target="#editModal">
                        <i class="mdi mdi-pencil"></i>
                        Update Data
                    </button>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Walikota Pemerintah Surakarta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('walikota_pemerintah.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="nama">Nama Walikota</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $walikota->nama ?? '' }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="sampulutama">Sampul Utama</label>
                        <input type="file" class="form-control-file" id="sampulutama" name="sampulutama">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin menambahkan gambar, ukuran gambar maksimal 2 MB.</small>
                    </div>
                    <div class="form-group mb-4">
                        <label for="sampul">Sampul</label>
                        <input type="file" class="form-control-file" id="sampul" name="sampul">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin menambahkan gambar, ukuran gambar maksimal 2 MB.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" style="color: white">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    document.getElementById('btnEdit').addEventListener('click', function() {
        // Mengubah semua input menjadi editable
        document.querySelectorAll('input, textarea').forEach(function(input) {
            input.removeAttribute('readonly');
            input.removeAttribute('disabled');
        });

        // Mengubah tombol "Simpan Perubahan" menjadi aktif
        let submitButton = document.createElement('button');
        submitButton.type = 'submit';
        submitButton.className = 'btn btn-primary';
        submitButton.innerText = 'Simpan Perubahan';
        document.querySelector('form').appendChild(submitButton);

        // Sembunyikan tombol "Perbarui Data"
        document.getElementById('btnEdit').style.display = 'none';
    });
</script>
@endpush
