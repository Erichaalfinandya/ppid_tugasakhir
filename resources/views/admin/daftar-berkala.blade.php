<!-- note : js tambahan untuk alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layouts.inc.admin.master')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Daftar Berkala</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-headset menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Layanan&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Daftar Berkala</p>
                        </div>
                    </div>
                    {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
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
                        <div class="d-flex justify-content-between align-items-end flex-wrap">
                            <button type="button" class="btn btn-primary text-white py-2 me-4 mt-2 mt-xl-0" data-toggle="modal" data-target="#addModal">
                                Tambah Data
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="data-tables2">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col" class="align-middle text-center">No</th>
                                        <th scope="col" class="align-middle text-center">Kategori</th>
                                        <th scope="col" class="align-middle text-center">Gambar</th>
                                        {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                                        <th scope="col" class="align-middle text-center">Aksi</th>
                                   {{-- @endif --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            </td>
                                            <td>{{ $data->nama }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset($data->gambar) }}" style="width: 75px; height: 75px; border-radius: 0%" alt="">
                                            {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('daftar-judul.judul', ['id' => $data->id]) }}"
                                                        type="submit" class="btn btn-sm btn-primary text-white py-1 mr-1">
                                                        <span class="mdi mdi-eye"></span>
                                                    </a>
                                                    <a href="{{ route('daftar-serta-merta.edit', ['id' => $data->id]) }}"
                                                        type="submit" class="btn btn-sm btn-warning text-white py-1 mr-1">
                                                        <span class="mdi mdi-pen"></span>
                                                    </a>
                                                    <!-- note membuat tombol konfirmasi hapus -->
                                                    <form id="deleteForm-{{ $data->id }}" action="{{ route('daftar-serta-merta.delete', ['id' => $data->id]) }}" method="POST" class="m-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger text-white py-1" data-toggle="modal" data-target="#confirmModal" data-status="{{ $data->nama }}" data-id="{{ $data->id }}">
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
                <form action="{{ route('daftar-serta-merta.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="exampleFormControlInput1">Kategori</label>
                                    <input type="text" class="form-control" id=""
                                        placeholder="Masukkan kategori" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="fileInput">Gambar</label>
                                    <input type="file" class="form-control form-control-file" id="fileInput" name="file"
                                        required>
                                </div>
                            </div>
                            <input type="hidden" name="pembagian_informasi" value="Berkala">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
    <script>
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const fileType = file.type;
                const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!validImageTypes.includes(fileType)) {
                    alert('Hanya file gambar yang diperbolehkan!');
                    event.target.value = ''; // Reset the input so the user can select a different file
                }
            }
        });
    </script>

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
        });
    </script>
    {{-- <script>
        $('#daftar-informasi-publik-table').DataTable({
            rowReorder: true,
            responsive: true
        })
    </script> --}}
@endpush
