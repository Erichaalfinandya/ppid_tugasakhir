<!-- note : js tambahan untuk alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@extends('layouts.inc.admin.master')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Review </h2>
                        <div class="d-flex">
                            <i class="mdi mdi-forum menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Review&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Daftar Review User</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="data-tables2">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col" class="align-middle text-center">ID</th>
                                        <th scope="col" class="align-middle text-center">Nama User</th>
                                        <th scope="col" class="align-middle text-center">Status</th>
                                        <th scope="col" class="align-middle text-center">Review</th>
                                        <th scope="col" class="align-middle text-center">Rating</th>
                                        <th scope="col" class="align-middle text-center">Foto</th>
                                        <th scope="col" class="align-middle text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($data as $datas )

                                        <tr>
                                            <td class="text-center">{{$no++;}}</td>
                                            </td>
                                            <td class="text-center">
                                                {{$datas['ulasan_nama']}}
                                            </td>
                                            <td>{{$datas['ulasan_type']}}</td>
                                            <td>{{$datas['ulasan_isi']}}</td>
                                            <td>
                                                @for ($i = 0; $i < $datas['ulasan_rating']; $i++)
                                                    <i class="mdi mdi-star text-warning"></i>
                                                @endfor
                                            </td>
                                            <td>
                                                <div class="item-thumbnail">
                                                    <img src="{{asset($datas['foto'])}}" alt="image" class="profile-pic">
                                                </div>
                                            </td>
                                            <td>
                                                @php
                                                    // Menentukan kelas tombol berdasarkan status ulasan
                                                    $btnClass = 'btn ';
                                                    switch($datas['ulasan_status']) {
                                                        case 'approve':
                                                            $btnClass .= 'btn-success'; // Warna hijau untuk approve
                                                            break;
                                                        case 'decline':
                                                            $btnClass .= 'btn-warning'; // Warna kuning untuk decline
                                                            break;
                                                        case 'pending':
                                                            $btnClass .= 'btn-secondary'; // Warna abu-abu untuk pending
                                                            break;
                                                        default:
                                                            $btnClass .= 'btn-primary'; // Default warna biru jika status tidak sesuai
                                                    }
                                                @endphp

                                                <div class="dropdown">
                                                    <button class="{{ $btnClass }} dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{ $datas['ulasan_status'] }}
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @if ($datas['ulasan_status'] != 'approve')
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirmModal" data-status="approve" data-id="{{$datas['id']}}">Approve</a>
                                                        @endif
                                                        @if ($datas['ulasan_status'] != 'decline')
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirmModal" data-status="decline" data-id="{{$datas['id']}}">Decline</a>
                                                        @endif
                                                        @if ($datas['ulasan_status'] != 'pending')
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirmModal" data-status="pending" data-id="{{$datas['id']}}">Pending</a>
                                                        @endif
                                                    </div>
                                                </div>

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
        <!-- Modal -->
        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Perubahan Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin mengubah status menjadi <span id="modalStatus"></span>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a id="confirmLink" class="btn btn-primary">Konfirmasi</a>
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
    <script>
        $('#confirmModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Tombol yang memicu modal
            var status = button.data('status'); // Ambil nilai status dari data-attribute
            var id = button.data('id');

            // Perbarui teks modal
            var modal = $(this);
            modal.find('#modalStatus').text(status);

            // Setel URL untuk konfirmasi
            var url = "{{ route('reviewAdmin.show', ['id' => 'REPLACE_ID', 'status' => '']) }}";
            url = url.replace('REPLACE_ID', id) + status;
            modal.find('#confirmLink').attr('href', url);
        });
    </script>

    {{-- <script>
        $('#daftar-informasi-publik-table').DataTable({
            rowReorder: true,
            responsive: true
        })
    </script> --}}
@endpush
