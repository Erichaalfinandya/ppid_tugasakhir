<!-- Load SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layouts.inc.admin.master')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2>Profil Pemerintah Surakarta</h2>
                    <div class="d-flex">
                        <i class="mdi mdi-account menu-icon"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Profil&nbsp;/&nbsp;</p>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Profil Pemerintah Surakarta&nbsp;/&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Formulir pengisian Data BARU -->
<div class="card">
    <div class="card-body">
        <form action="{{ route('profil_pemerintah.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Input Form -->
            <div class="form-group mb-4">
                <label for="judul"><strong>Judul Visi Surakarta</strong></label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $pemerintah->judul ?? '' }}" {{ $pemerintah ? 'readonly' : 'required' }}>
            </div>
            <div class="form-group mb-4">
                <label for="deskripsi_visi"><strong>Deskripsi Visi</strong></label>
                <textarea class="form-control" id="deskripsi_visi" name="deskripsi_visi" {{ $pemerintah ? 'readonly' : 'required' }}>{{ $pemerintah->deskripsi_visi ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="gambar_visi"><strong>Gambar Visi</strong></label>
                @if($pemerintah && $pemerintah->gambar_visi)
                    <img src="{{ url('upload/' . $pemerintah->gambar_visi) }}" style="height:200px;object-fit:cover">
                @endif
                @if(!$pemerintah || !$pemerintah->gambar_visi)
                    <input type="file" class="form-control-file" id="gambar_visi" name="gambar_visi" {{ $pemerintah ? 'disabled' : '' }}>
                @endif
            </div>
            <div class="form-group mb-4">
                <label for="deskripsi_misi"><strong>Deskripsi Misi</strong></label>
                <textarea class="form-control" id="deskripsi_misi" name="deskripsi_misi" {{ $pemerintah ? 'readonly' : 'required' }}>{{ $pemerintah->deskripsi_misi ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="gambar_misi"><strong>Gambar Misi</strong></label>
                @if($pemerintah && $pemerintah->gambar_misi)
                    <img src="{{ url('upload/' . $pemerintah->gambar_misi) }}" style="height:200px;object-fit:cover">
                @endif
                @if(!$pemerintah || !$pemerintah->gambar_misi)
                    <input type="file" class="form-control-file" id="gambar_misi" name="gambar_misi" {{ $pemerintah ? 'disabled' : '' }}>
                @endif
            </div>
            @if(!$pemerintah)
                <button type="submit" class="btn py-2 px-4 ms-lg-4" style="background-color: #13357B; color: white;">Simpan Data</button>
            @endif
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                @if($pemerintah)
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
                <h5 class="modal-title" id="editModalLabel">Edit Profil Pemerintah Surakarta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('profil_pemerintah.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="judul">Judul Visi</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ $pemerintah->judul ?? '' }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="deskripsi_visi">Deskripsi Visi</label>
                        <textarea class="form-control" id="deskripsi_visi" name="deskripsi_visi">{{ $pemerintah->deskripsi_visi ?? '' }}</textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label for="gambar_visi">Gambar Visi</label>
                        <input type="file" class="form-control-file" id="gambar_visi" name="gambar_visi">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin menambahkan gambar, ukuran gambar maksimal 2 MB.</small>
                    </div>
                    <div class="form-group mb-4">
                        <label for="deskripsi_misi">Deskripsi Misi</label>
                        <textarea class="form-control" id="deskripsi_misi" name="deskripsi_misi">{{ $pemerintah->deskripsi_misi ?? '' }}</textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label for="gambar_misi">Gambar Misi</label>
                        <input type="file" class="form-control-file" id="gambar_misi" name="gambar_misi">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin menambahkan gambar, ukuran gambar maksimal 2 MB.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" style="color: white">Simpan </button>
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
