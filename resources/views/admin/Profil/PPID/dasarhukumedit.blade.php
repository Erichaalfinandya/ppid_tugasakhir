<!-- note : js tambahan untuk alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layouts.inc.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Profil Dasar Hukum - Edit data</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-account menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Profil&nbsp;/&nbsp;</p>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Profil Dasar Hukum&nbsp;/&nbsp;</p>
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
            <form action="{{ route('profilppid.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Judul</label>
                    <input type="text" value="{{ $data->judul }}" class="form-control" id="" placeholder="Masukkan Judul"
                        name="judul" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Deskripsi</label>
                    <textarea class="form-control" id="" placeholder="Masukkan Deskripsi"
                        name="deskripsi" required>{{ $data->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Gambar</label>
                    <input type="file" class="form-control form-control-file" id="imageInput" name="file" accept="image/*" >
                    <small id="imageHelp" class="form-text text-muted">Hanya file gambar yang diperbolehkan (JPG, JPEG, PNG), ukuran maksimal 2 MB.</small>
                </div>
                <input type="hidden" name="jenis_ppid" value="dasarhukum">
                <button type="submit" class="btn btn-primary">Perbarui Data</button>
            </form>
        </div>
    </div>

    <!-- note : Jika terdapat session dengan data success maka tampilkan alert dari sweetalert sesuai dengan isi data successnya -->
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '{{ session("success") }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

<!-- note : js untuk restrict validasi upload -->
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
