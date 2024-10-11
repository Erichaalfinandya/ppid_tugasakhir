<!-- note : js tambahan untuk alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layouts.inc.admin.master')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Daftar Data User</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-account-box-outline menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;User&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Daftar Data User</p>
                        </div>
                    </div>
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
                                        <th scope="col" class="align-middle text-center">no</th>
                                        <th scope="col" class="align-middle text-center">foto</th>
                                        <th scope="col" class="align-middle text-center">nama_lengkap</th>
                                        <th scope="col" class="align-middle text-center">nama_depan</th>
                                        <th scope="col" class="align-middle text-center">nama_belakang</th>
                                        <th scope="col" class="align-middle text-center">nik</th>
                                        <th scope="col" class="align-middle text-center">email</th>
                                        <th scope="col" class="align-middle text-center">telp</th>
                                        <th scope="col" class="align-middle text-center">jenis_kelamin</th>
                                        <th scope="col" class="align-middle text-center">alamat</th>
                                        <th scope="col" class="align-middle text-center">tanggal_lahir</th>
                                        <th scope="col" class="align-middle text-center">ttl</th>
                                        <th scope="col" class="align-middle text-center">status</th>
                                        @if (auth()->check() && auth()->user()->name === 'admin')
                                        <th scope="col" class="align-middle text-center">Aksi</th>
                                         @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $data as $pengguna )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset($pengguna->foto) }}" style="width:50px;height:50px;object-fit:cover"></td>
                                        <td>{{ $pengguna->nama_lengkap }}</td>
                                        <td>{{ $pengguna->nama_depan }}</td>
                                        <td>{{ $pengguna->nama_belakang }}</td>
                                        <td>{{ $pengguna->nik }}</td>
                                        <td>{{ $pengguna->email }}</td>
                                        <td>{{ $pengguna->telp }}</td>
                                        <td>{{ $pengguna->jenis_kelamin }}</td>
                                        <td>{{ $pengguna->alamat }}</td>
                                        <td>{{ $pengguna->tanggal_lahir }}</td>
                                        <td>{{ $pengguna->ttl }}</td>
                                        <td>
                                            @if($pengguna->status === 'belum melengkapi data')
                                                <span class="badge badge-sm badge-info">Belum Melengkapi Data</span>
                                            @elseif($pengguna->status === 'belum terverifikasi')
                                                <span class="badge badge-sm badge-warning">Belum Diverfikasi</span>
                                            @elseif(str_contains($pengguna->status, 'tolak terverifikasi'))
                                                <span class="badge badge-sm badge-danger">Verfikasi Ditolak</span>
                                            @elseif($pengguna->status === 'terverifikasi')
                                                <span class="badge badge-sm badge-success">Berhasil Diverfikasi</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($pengguna->status === 'belum melengkapi data')
                                                <i>User belum melengkapi data</i>
                                            @elseif($pengguna->status === 'belum terverifikasi')
                                                <form id="accForm-{{ $pengguna->id }}" action="{{ route('daftar-user.acc', ['id' => $pengguna->user_id]) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="button" class="btn btn-md btn-success text-white py-3 w-100" data-toggle="modal" data-target="#confirmModal" data-status="{{ $pengguna->nama_lengkap }}" data-id="{{ $pengguna->id }}">
                                                        Acc Verifikasi
                                                    </button>
                                                </form>
                                                <form id="tolakForm-{{ $pengguna->id }}" action="{{ route('daftar-user.deny', ['id' => $pengguna->user_id]) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" id="alasan-form" name="alasan">
                                                    <button type="button" class="btn btn-md btn-danger text-white py-3 w-100" data-toggle="modal" data-target="#confirmModal-Tolak" data-status="{{ $pengguna->nama_lengkap }}" data-id="{{ $pengguna->id }}">
                                                        Tolak Verifikasi
                                                    </button>
                                                </form>
                                            @elseif(str_contains($pengguna->status, 'tolak terverifikasi'))
                                                <form id="accForm-{{ $pengguna->id }}" action="{{ route('daftar-user.acc', ['id' => $pengguna->user_id]) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="button" class="btn btn-md btn-success text-white py-3 w-100" data-toggle="modal" data-target="#confirmModal" data-status="{{ $pengguna->nama_lengkap }}" data-id="{{ $pengguna->id }}">
                                                        Acc Verifikasi
                                                    </button>
                                                </form>
                                            @elseif($pengguna->status === 'terverifikasi')
                                                <i>User sudah diverifikasi</i>
                                            @endif
                                            <a href="{{url('detail-profile/'.$pengguna->id)}}" target="_blank" class="btn btn-md btn-primary text-white py-3 w-100">
                                                Lihat Profi
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- note : modal konfirmasi acc verifikasi -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Verifikasi Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin memverifikasi data <span id="modalData"></span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirmDelete">Konfirmasi</button>
            </div>
        </div>
    </div>
</div>

<!-- note : modal konfirmasi penolakan verifikasi -->
<div class="modal fade" id="confirmModal-Tolak" tabindex="-1" aria-labelledby="confirmModal-TolakLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModal-TolakLabel">Konfirmasi Verifikasi Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menolak verifikasi data <span id="modalData-Tolak"></span>? Berikan alasan penolakan anda
                <textarea id="alasan" class="form-control" placeholder="Isikan alasan penolakan" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirmDelete-Tolak">Konfirmasi</button>
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
            var fileInput = document.getElementById('imageInput');
            var file = fileInput.files[0];

            if (file.size > 2 * 1024 * 1024) { // 2MB
                alert('Ukuran file maksimal adalah 2MB');
                event.preventDefault();
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
            $('#accForm-' + id).submit();
        });

        $('#confirmModal-Tolak').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Tombol yang memicu modal
            var id = button.data('id'); // Ambil nilai ID dari data-attribute
            var status = button.data('status'); // Ambil nilai status dari data-attribute

            var modal = $(this);
            modal.find('#modalData-Tolak').text(status);

            // Tambahkan ID ke tombol konfirmasi
            $('#confirmDelete-Tolak').data('id', id);
        });

        $('#confirmDelete-Tolak').on('click', function () {
            var id = $(this).data('id');
            $("#alasan-form").val($("#alasan").val());
            // Temukan form yang sesuai dengan ID dan submit
            $('#tolakForm-' + id).submit();
        });
    </script>
    {{-- <script>
        $('#daftar-informasi-publik-table').DataTable({
            rowReorder: true,
            responsive: true
        })
    </script> --}}
@endpush
