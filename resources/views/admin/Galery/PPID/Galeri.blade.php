<!-- note : js tambahan untuk alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@extends('layouts.inc.admin.master')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        @if(strtolower($jenis) != "foto")
                            <h2>Galeri Video</h2>
                        @else
                            <h2>Galeri Foto</h2>
                        @endif
                        <div class="d-flex">
                            <i class="mdi mdi-image menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Galeri&nbsp;/&nbsp;</p>
                            @if(strtolower($jenis) != "foto")
                                <p class="text-primary mb-0 hover-cursor">Galeri Video</p>
                            @else
                                <p class="text-primary mb-0 hover-cursor">Galeri Foto</p>
                            @endif
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
                                        @if(strtolower($jenis) != "foto")
                                            <th scope="col" class="align-middle text-center">Video</th>
                                        @else
                                            <th scope="col" class="align-middle text-center">Foto</th>
                                        @endif
                                        <th scope="col" class="align-middle text-center">Judul</th>
                                        <th scope="col" class="align-middle text-center">Diterbitkan Oleh</th>
                                        {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                                        <th scope="col" class="align-middle text-center">Aksi</th>
                                        {{-- @endif --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(strtolower($jenis) != "foto")
                                        @foreach ($galeris as $data)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                </td>
                                                <td class="text-center"><video src="{{ asset($data->media) }}" style="width: 75px; height: 75px; border-radius: 0%" alt=""></td>
                                                <td>{{ $data->judul }}</td>
                                                <td>{{ $data->penerbit }}</td>
                                                {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                                                <td>
                                                    <div class="d-flex justify-content-center">

                                                        <a href="{{ route('galeri.edit', ['galeri' => $data->id]) }}" class="btn btn-sm btn-warning text-white mr-1">
                                                            <span class="mdi mdi-pen"></span>
                                                        </a>
                                                        <form id="deleteForm-{{ $data->id }}" action="{{ route('galeri.destroy', ['galeri' => $data->id]) }}" method="POST" class="m-0">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger text-white py-1" data-toggle="modal" data-target="#confirmModal" data-status="{{ $data->judul }}" data-id="{{ $data->id }}">
                                                                <span class="mdi mdi-trash-can-outline"></span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                {{-- @endif --}}
                                            </tr>
                                        @endforeach
                                    @else
                                        @foreach ($galeris as $data)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td></td>
                                                <td class="text-center">
                                                    <img src="{{ asset($data->media) }}" style="width: 75px; height: 75px; border-radius: 0%" alt="">
                                                </td>
                                                <td>{{ $data->judul }}</td>
                                                <td>{{ $data->penerbit }}</td>
                                                {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                                                <td>
                                                    <div class="d-flex justify-content-center">

                                                        <a href="{{ route('galeri.edit', ['galeri' => $data->id]) }}" class="btn btn-sm btn-warning text-white py-1 mr-1">
                                                            <span class="mdi mdi-pen"></span>
                                                        </a>

                                                        <form id="deleteForm-{{ $data->id }}" action="{{ route('galeri.destroy', ['galeri' => $data->id]) }}" method="POST" class="m-0">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger text-white py-1" data-toggle="modal" data-target="#confirmModal" data-status="{{ $data->judul }}" data-id="{{ $data->id }}">
                                                                <span class="mdi mdi-trash-can-outline"></span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                {{-- @endif --}}
                                            </tr>
                                        @endforeach
                                    @endif
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
                <form id="form" action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="jenis" value="{{ $jenis }}">
                                <input type="hidden" name="oleh" value="{{ $oleh }}">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Judul</label>
                                    <input type="text" class="form-control" id="judul" placeholder="Masukkan kategori" name="judul" required>
                                </div>
                                @if(strtolower($jenis) != "foto")
                                <div class="form-group">
                                    <label for="videoInput">Video</label>
                                    <input type="file" class="form-control form-control-file" id="videoInput" name="file" accept="video/mp4" required>
                                    <small id="videoHelp" class="form-text text-muted">Hanya file video yang diperbolehkan, ukuran video maksimal 5 MB.</small>
                                </div>
                                @else
                                <div class="form-group">
                                    <label for="imageInput">Gambar</label>
                                    <input type="file" class="form-control form-control-file" id="imageInput" name="file" accept="image/*" required>
                                    <small id="imageHelp" class="form-text text-muted">Hanya file gambar yang diperbolehkan, ukuran gambar maksimal 2 MB.</small>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Diterbitkan Oleh</label>
                                    <input type="text" class="form-control" id="penerbit" placeholder="Masukkan Nama" name="penerbit" required>
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
        {{-- @endif --}}
    </div>

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
        document.getElementById('form').addEventListener('submit', function(event) {
            var fileInput = document.getElementById('videoInput');
            var file = fileInput.files[0];

            if (file.size > 5 * 1024 * 1024) { // 5MB
                alert('Ukuran file maksimal adalah 5MB');
                event.preventDefault();
            }
        });
    </script>
    <script>
        document.getElementById('form').addEventListener('submit', function(event) {
            var fileInput = document.getElementById('imageInput');
            var file = fileInput.files[0];

            if (file.size > 2 * 1024 * 1024) { // 2MB
                alert('Ukuran file maksimal adalah 2MB');
                event.preventDefault();
            }
        });
    </script>

    <!-- note : script tambahan untuk hanya diperbolehkan file gambar dan video -->
    @if(strtolower($jenis) != "foto")
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
            }
        });
    </script>
    @else
    <script>
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
            }
        });
    </script>
    @endif
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
    </script>
    {{-- <script>
        $('#daftar-informasi-publik-table').DataTable({
            rowReorder: true,
            responsive: true
        })
    </script> --}}
@endpush
