<!-- Load SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layouts.inc.admin.master')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2>Sekretaris Pemerintah Surakarta</h2>
                    <div class="d-flex">
                        <i class="mdi mdi-account menu-icon"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Profil&nbsp;/&nbsp;</p>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Sekretaris Pemerintah Surakarta&nbsp;/&nbsp;</p>
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
        <a href="{{ Route('pendidikan_sekretaris.index') }}" class="btn btn-primary" style="color: white">
            Riwayat Pendidikan
        </a>
    </div>
    <div class="col-auto">
        <!-- Tombol untuk halaman pendidikan walikota -->
        <a href="{{ Route('pekerjaan_sekretaris.index') }}" class="btn btn-primary" style="color: white">
            Riwayat Pekerjaan
        </a>
    </div>
</div>



<!-- Formulir pengisian Data BARU -->
<div class="card">
    <div class="card-body">
        <form action="{{ route('sekretaris_pemerintah.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Input Form -->
            <div class="form-group mb-4">
                <label for="nama"><strong>Nama Sekretaris Pemerintah</strong></label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama sekretaris pemerintah kota surakarta" value="{{ $sekretarispemerintah->nama ?? '' }}" {{ $sekretarispemerintah ? 'readonly' : 'required' }}>
            </div>
            <div class="form-group mb-4">
                <label for="deskripsi"><strong>Deskripsi</strong></label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi sekretaris pemerintah kota surakarta" {{ $sekretarispemerintah ? 'readonly' : 'required' }}>{{ $sekretarispemerintah->deskripsi ?? '' }}</textarea>
            </div>
            <div class="form-group mb-4">
                <label for="alamat"><strong>Alamat</strong></label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat sekretaris pemerintah kota surakarta" value="{{ $sekretarispemerintah->alamat ?? '' }}" {{ $sekretarispemerintah ? 'readonly' : 'required' }}>
            </div>
            <div class="form-group mb-4">
                <label for="ttl"><strong>TTL (Tempat, Tanggal Lahir)</strong></label>
                <input type="text" class="form-control" id="ttl" name="ttl" placeholder="Masukkan tempat tanggal lahir sekretaris pemerintah kota surakarta" value="{{ ($sekretarispemerintah && $sekretarispemerintah->kota_lahir) ? $sekretarispemerintah->kota_lahir . ', ' . ($sekretarispemerintah->tanggal_lahir ? \Carbon\Carbon::parse($sekretarispemerintah->tanggal_lahir)->format('d/m/Y') : '') : '' }}" {{ $sekretarispemerintah ? 'readonly' : 'required' }} placeholder="Contoh: Surakarta, 01/01/2000">
            </div>
            <div class="form-group">
                <label for="sampul"><strong>Foto</strong></label>
                @if($sekretarispemerintah && $sekretarispemerintah->sampul)
                    <img src="{{ url('upload/' . $sekretarispemerintah->sampul) }}" style="height:200px;object-fit:cover">
                @endif
                @if(!$sekretarispemerintah || !$sekretarispemerintah->sampul)
                    <input type="file" class="form-control-file" id="sampul" name="sampul" {{ $sekretarispemerintah ? 'disabled' : '' }}>
                @endif
            </div>
            @if(!$sekretarispemerintah)
                <button type="submit" class="btn py-2 px-4 ms-lg-4" style="background-color: #13357B; color: white;">Simpan Data</button>
            @endif
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                @if($sekretarispemerintah)
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
                <h5 class="modal-title" id="editModalLabel">Edit Data Sekretaris Pemerintah Surakarta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('sekretaris_pemerintah.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="nama">Nama Sekretaris Pemerintah</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $sekretarispemerintah->nama ?? '' }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $sekretarispemerintah->deskripsi ?? '' }}</textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $sekretarispemerintah->alamat ?? '' }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="ttl"><strong>TTL (Tempat, Tanggal Lahir)</strong></label>
                        <input type="text" class="form-control" id="ttl" name="ttl" value="{{ optional($sekretarispemerintah)->kota_lahir . ', ' . optional($sekretarispemerintah)->tanggal_lahir ? \Carbon\Carbon::parse(optional($sekretarispemerintah)->tanggal_lahir)->format('d/m/Y') : '' }}" {{ $sekretarispemerintah ? 'readonly' : 'required' }} placeholder="Contoh: Surakarta, 01/01/2000">
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
