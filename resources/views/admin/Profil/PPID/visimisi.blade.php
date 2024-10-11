<!-- note : js tambahan untuk alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layouts.inc.admin.master')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Profil Visi Misi</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-account menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Profil&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Profil Visi Misi&nbsp;/&nbsp;</p>
                        </div>
                    </div>
                    {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                        <div class="d-flex justify-content-between align-items-end flex-wrap">
                            <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0" data-toggle="modal"
                                data-target="#addModal">
                                <i class="mdi mdi-plus text-muted"></i>
                            </button>
                            <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0" data-toggle="modal"
                                data-target="#editModal">
                                <i class="mdi mdi-eye text-muted"></i>
                            </button>
                        </div>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="data-tables2">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col" class="align-middle text-center">No</th>
                                        <th scope="col" class="align-middle text-center">Urutan</th>
                                        <th scope="col" class="align-middle text-center">Jenis</th>
                                        <th scope="col" class="align-middle text-center">Deskripsi</th>
                                        {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                                        <th scope="col" class="align-middle text-center">Aksi</th>
                                        {{-- @endif --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $datas)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            </td>
                                            <td class="text-center">{{ $datas->urutan }}</td>
                                            <td class="text-center">{{ $datas->jenis }}</td>
                                            <td>{{ $datas->deskripsi }}</td>
                                            {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                                            <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('profilvisimisi.edit', ['id' => $datas->id]) }}"
                                                            type="submit" class="btn btn-sm btn-warning text-white py-1 mr-1">
                                                            <span class="mdi mdi-pen"></span>
                                                        </a>
                                                        <form id="deleteForm-{{ $datas->id }}" action="{{ route('profilvisimisi.destroy', ['id' => $datas->id]) }}" method="POST" class="m-0">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger text-white py-1" data-toggle="modal" data-target="#confirmModal" data-status="{{ $datas->deskripsi }}" data-id="{{ $datas->id }}">
                                                                <span class="mdi mdi-trash-can-outline"></span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            {{-- @endif --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
            <!-- Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ route('profilvisimisi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Deskripsi</label>
                                    <textarea class="form-control" id=""
                                        placeholder="Masukkan Deskripsi" name="deskripsi" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Urutan</label>
                                    <input type="number" class="form-control" min="0"
                                        placeholder="Masukkan Urutan" name="urutan" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jenis (Visi / Misi)</label>
                                    <select class="form-control" name="jenis" required>
                                        <option value="misi">Misi</option>
                                        <option value="visi">Visi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ route('profilppid.update', ['id' => 1]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <h5>Gambar Visi</h5>
                                        <img src="{{ url($general->gambar_visi) }}" style="height:200px;object-fit:cover">
                                    </div>
                                    <div class="col">
                                        <h5>Gambar Misi</h5>
                                        <img src="{{ url($general->gambar_misi) }}" style="height:200px;object-fit:cover">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Gambar Visi</label>
                                    <input type="file" class="form-control form-control-file" id="fileInput" name="file">
                                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar, ukuran gambar maksimal 2 MB.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Gambar Misi</label>
                                    <input type="file" class="form-control form-control-file" id="fileInput2" name="file2">
                                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar, ukuran gambar maksimal 2 MB.</small>
                                </div>
                                <input type="hidden" name="jenis_ppid" value="visimisigeneral">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        {{-- @endif --}}
<!-- note : modal konfirmasi hapus -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Menghapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data <span id="modalData"></span>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary" id="confirmDelete">Konfirmasi</button>
                        </div>
                    </div>
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

    @push('style')
    @endpush


    @push('scripts')
    <!-- note : script untuk menjalankan modal konfirmasi hapus -->
    <script>
        $('#confirmModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Tombol yang memicu modal
            var id = button.data('id'); // Ambil nilai ID dari data-attribute
            var status = button.data('status'); // Ambil nilai status dari data-attribute

            var modal = $(this);
            modal.find('#modalData').text(status);

            // Tambahkan ID ke tombol konfirmasi
            $('#confirmDelete').data('id', id);
        });

        $('#confirmDelete').on('click', function () {
            var id = $(this).data('id');
            // Temukan form yang sesuai dengan ID dan submit
            $('#deleteForm-' + id).submit();
        });

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

        $("#fileInput2").on("change", function () {
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
    {{-- <script>
        $('#daftar-informasi-publik-table').DataTable({
            rowReorder: true,
            responsive: true
        })
    </script> --}}
@endpush
