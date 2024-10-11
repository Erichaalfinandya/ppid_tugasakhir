<!-- note : js tambahan untuk alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layouts.inc.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Galeri - Edit data</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-image menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Galeri&nbsp;/&nbsp;</p>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Galeri Edit&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Edit</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0" data-toggle="modal"
                        data-target="#addModal">
                        <i class="mdi mdi-plus text-muted"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('galeri.update', ['galeri' => $galeris->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" placeholder="Masukkan Judul"
                        name="judul" value="{{ old('judul', $galeris->judul) }}" required>
                    @error('judul')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="pembagian_informasi" value="{{ $galeris->pembagian_informasi }}">
                <input type="hidden" name="penerbit" value="{{ Auth::user()->name }}">
                @if(strtolower($galeris->jenis) != "foto")
                <div class="form-group">
                    <label for="videoInput">Video</label>
                    <input type="file" class="form-control form-control-file" id="videoInput" name="file" accept="video/mp4">
                    <small id="videoHelp" class="form-text text-muted">Hanya file video MP4 yang diperbolehkan, ukuran maksimal 5 MB.</small>
                </div>
                @else
                                <div class="form-group">
                                    <label for="imageInput">Gambar</label>
                                    <input type="file" class="form-control form-control-file" id="imageInput" name="file" accept="image/*" >
                                    <small id="imageHelp" class="form-text text-muted">Hanya file gambar yang diperbolehkan (JPG, JPEG, PNG), ukuran maksimal 2 MB.</small>
                                </div>
                 @endif
                 <div class="form-group">
                    <label for="penerbit">Diterbitkan Oleh</label>
                    <input type="text" class="form-control" id="penerbit" placeholder="Masukkan Nama"
                        name="penerbit" value="{{ old('penerbit', $galeris->penerbit) }}" required>
                    @error('penerbit')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Perbarui Data</button>
            </form>
        </div>
    </div>

    <!-- note : script tambahan untuk hanya diperbolehkan file gambar dan video -->
    <script>
        document.getElementById('videoInput').addEventListener('change', function(event) {
            const file2 = event.target.files[0];
            if (file2) {
                const fileType2 = file2.type;
                console.log(fileType2);
                const validImageTypes2 = ['video/mp4'];
                if (!validImageTypes2.includes(fileType2)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Mengupload',
                        text: 'File Yang Akan Diupload Tidak Sesuai. File Yang Diizinkan Hanya Yang Berektensi .mp4',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    event.target.value = ''; // Reset the input so the user can select a different file
                }

                if(file2.size>2 * 1024 * 1024){
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Mengupload',
                        text: 'File Yang Akan Diupload Tidak Boleh Melebihi Ukuran 2MB',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    event.target.value = ''; // Reset the input so the user can select a different file
                }
            }
        });
    </script>
    <script>
        // note : untuk upload hanya sesuai ekstensi
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const fileType = file.type;
                const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!validImageTypes.includes(fileType)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Mengupload',
                        text: 'File Yang Akan Diupload Tidak Sesuai. File Yang Diizinkan Hanya Yang Berektensi jpeg, png, gif',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    event.target.value = ''; // Reset the input so the user can select a different file
                }

                if(file.size> * 1024 * 1024){
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Mengupload',
                        text: 'File Yang Akan Diupload Tidak Boleh Melebihi Ukuran 2MB',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    event.target.value = ''; // Reset the input so the user can select a different file
                }
            }
        });
    </script>
@endsection
