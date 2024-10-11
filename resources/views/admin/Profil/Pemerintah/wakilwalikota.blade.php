<!-- Load SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layouts.inc.admin.master')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2>Wakil Walikota Pemerintah Surakarta</h2>
                    <div class="d-flex">
                        <i class="mdi mdi-account menu-icon"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Profil&nbsp;/&nbsp;</p>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Wakil Walikota Pemerintah Surakarta&nbsp;/&nbsp;</p>
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
        <a href="{{ Route('pendidikan_wakil.index') }}" class="btn btn-primary" style="color: white">
            Riwayat Pendidikan
        </a>
    </div>
    <div class="col-auto">
        <!-- Tombol untuk halaman pendidikan walikota -->
        <a href="{{ Route('pekerjaan_wakil.index') }}" class="btn btn-primary" style="color: white">
            Riwayat Pekerjaan
        </a>
    </div>
</div>



<!-- Formulir pengisian Data BARU -->
<div class="card">
    <div class="card-body">
        <form action="{{ route('wakil_walikota.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Input Form -->
            <div class="form-group mb-4">
                <label for="nama"><strong>Nama Wakil Walikota</strong></label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama wakil walikota kota surakarta" value="{{ $wakilwalikota->nama ?? '' }}" {{ $wakilwalikota ? 'readonly' : 'required' }}>
            </div>
            <div class="form-group mb-4">
                <label for="deskripsi"><strong>Deskripsi</strong></label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi wakil walikota kota surakarta" {{ $wakilwalikota ? 'readonly' : 'required' }}>{{ $wakilwalikota->deskripsi ?? '' }}</textarea>
            </div>
            <div class="form-group mb-4">
                <label for="alamat"><strong>Alamat</strong></label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat wakil walikota kota surakarta" value="{{ $wakilwalikota->alamat ?? '' }}" {{ $wakilwalikota ? 'readonly' : 'required' }}>
            </div>
            <div class="form-group mb-4">
                <label for="ttl"><strong>TTL (Tempat, Tanggal Lahir)</strong></label>
                <input type="text" class="form-control" id="ttl" name="ttl" placeholder="Masukkan tempat tanggal lahir wakil walikota kota surakarta" value="{{ ($wakilwalikota && $wakilwalikota->kota_lahir) ? $wakilwalikota->kota_lahir . ', ' . ($wakilwalikota->tanggal_lahir ? \Carbon\Carbon::parse($wakilwalikota->tanggal_lahir)->format('d/m/Y') : '') : '' }}" {{ $wakilwalikota ? 'readonly' : 'required' }} placeholder="Contoh: Surakarta, 01/01/2000">
            </div>
            <div class="form-group">
                <label for="sampul"><strong>Foto</strong></label>
                @if($wakilwalikota && $wakilwalikota->sampul)
                    <img src="{{ url('upload/' . $wakilwalikota->sampul) }}" style="height:200px;object-fit:cover">
                @endif
                @if(!$wakilwalikota || !$wakilwalikota->sampul)
                    <input type="file" class="form-control-file" id="sampul" name="sampul" {{ $wakilwalikota ? 'disabled' : '' }}>
                @endif
            </div>
            @if(!$wakilwalikota)
            <button type="submit" class="btn py-2 px-4 ms-lg-4" style="background-color: #13357B; color: white;">Simpan Data</button>
            @endif
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                @if($wakilwalikota)
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
                <h5 class="modal-title" id="editModalLabel">Edit Wakil Walikota Pemerintah Surakarta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('wakil_walikota.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="nama">Nama Wakil Walikota</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $wakilwalikota->nama ?? '' }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $wakilwalikota->deskripsi ?? '' }}</textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $wakilwalikota->alamat ?? '' }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="ttl"><strong>TTL (Tempat, Tanggal Lahir)</strong></label>
                        <input type="text" class="form-control" id="ttl" name="ttl" value="{{ optional($wakilwalikota)->kota_lahir . ', ' . optional($wakilwalikota)->tanggal_lahir ? \Carbon\Carbon::parse(optional($wakilwalikota)->tanggal_lahir)->format('d/m/Y') : '' }}" {{ $wakilwalikota ? 'readonly' : 'required' }} placeholder="Contoh: Surakarta, 01/01/2000">
                    </div>
                    <div class="form-group mb-4">
                        <label for="sampul">Foto</label>
                        <input type="file" class="form-control-file" id="sampul" name="sampul">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin menambahkan gambar, ukuran gambar maksimal 2 MB.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-customm btn-icon me-3 mt-2 mt-xl-0">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    // Validasi file size dan tipe file
    $("#gambar_visi, #gambar_misi").on("change", function () {
        let file = this.files[0];
        if (file.size > 2000000) { // 2MB limit
            Swal.fire({
                icon: 'error',
                title: 'Gagal Mengupload',
                text: 'File terlalu besar. Maksimal 2MB',
                timer: 1500
            });
            $(this).val(''); // Kosongkan file input
        } else if (!['image/jpeg', 'image/png', 'image/gif'].includes(file.type)) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal Mengupload',
                text: 'File harus dalam format jpeg, png, atau gif',
                timer: 1500
            });
            $(this).val('');
        }
    });
</script>

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
