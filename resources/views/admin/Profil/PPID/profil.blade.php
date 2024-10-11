<!-- note : js tambahan untuk alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layouts.inc.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Profil General - Edit data</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-account menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Profil&nbsp;/&nbsp;</p>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Profil PPID General&nbsp;/&nbsp;</p>
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
            <form action="{{ route('profilppid.update', ['id' => 1]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Latar Belakang</label>
                    <textarea class="form-control" id="" placeholder="Masukkan Latar Belakang PPID Kota Surakarta"
                        name="latar_belakang" required>{{ $general->latar_belakang }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Apa Itu PPID</label>
                    <textarea class="form-control" id="" placeholder="Masukkan Tentang Apa Itu PPID Kota Surakarta"
                        name="tugas" required>{{ $general->tugas }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Motto</label>
                    <textarea class="form-control" id="" placeholder="Masukkan Motto PPID Kota Surakarta"
                        name="motto" required>{{ $general->motto }}</textarea>
                </div>
                <div class="form-group">
                    <h5>Gambar Profil</h5>
                    <img src="{{ url($general->gambar_profil) }}" style="height:200px;object-fit:cover">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Gambar Profil</label>
                    <input type="file" class="form-control form-control-file" id="fileInput" name="file">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar, ukuran gambar maksimal 2 MB.</small>
                </div>
                <input type="hidden" name="jenis_ppid" value="general">
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
@endsection

@push('script')
<script>
    // note : script untuk mengecek file size
    $("#fileInput").on("change", function () {
            if(this.files[0].size > 2000000) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Mengupload',
                    text: 'File Yang Akan Diupload Terlalu Besar. File Tidak Boleh Melebihi 2MB',
                    showConfirmButton: false,
                    timer: 1500
                });
                $(this).val('');
            }

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
        });
</script>
@endpush
