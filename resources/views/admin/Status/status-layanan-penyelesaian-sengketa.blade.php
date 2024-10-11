@extends("layouts.inc.admin.master")

@section("content")
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Status Layanan Sengketa</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-headset menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Status&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Status Layanan Sengketa</p>
                        </div>
                    </div>
                    @if (auth()->check() && auth()->user()->name === 'admin')
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                         <!-- Data yang Perlu Di-Approve -->
                         <h2>Data yang Perlu Di-Approve</h2>
                         <div class="table-responsive">
                             <table class="table table-striped table-striped-custom" id="status_penyelesaian_sengketa" width="100%">
                                 <thead class="text-center">
                                     <tr>
                                         <th scope="col" class="align-middle">Id</th>
                                         <th scope="col" class="align-middle">Waktu Pengajuan</th>
                                         {{-- <th scope="col" class="align-middle">Kode Permohonan</th> --}}
                                         <th scope="col" class="align-middle">Nama Lengkap</th>
                                         <th scope="col" class="align-middle">Tanggal Lahir</th>
                                         <th scope="col" class="align-middle">NIK/No. Identitas</th>
                                         <th scope="col" class="align-middle">Upload KTP</th>
                                         <th scope="col" class="align-middle">Alamat</th>
                                         <th scope="col" class="align-middle">Email</th>
                                         <th scope="col" class="align-middle">Nomor Telepon</th>
                                         <th scope="col" class="align-middle">Pekerjaan Terakhir</th>
                                         <th scope="col" class="align-middle">Alasan Permohonan Penyelesaian Sengket Informasi</th>
                                         <th scope="col" class="align-middle">Tuntutan Pemohon</th>
                                         <th scope="col" class="align-middle">Status</th>
                                         <th scope="col" class="align-middle">Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($pendingData as $data)
                                        <tr>
                                            <td class="text-center">{{ $data->id }}</td>
                                            <td class="text-center">{{ $data->created_at->format('d-m-Y H:i') }}</td>
                                            {{-- <td class="text-center">{{ $data->kodepermohonan }}</td> --}}
                                            <td class="text-center">{{ $data->nama }}</td>
                                            <td class="text-center">{{ $data->ttl }}</td>
                                            <td class="text-center">{{ $data->nik }}</td>
                                            <td class="text-center">
                                                @if ($data->ktp)
                                                    <a href="{{ asset('images/' . $data->ktp ) }}" target="_blank">Lihat File</a>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $data->alamat }}</td>
                                            <td class="text-center">{{ $data->email }}</td>
                                            <td class="text-center">{{ $data->nomortelepon }}</td>
                                            <td class="text-center">{{ $data->pekerjaan }}</td>
                                            <td class="text-center">{{ $data->alasan_sengketa }}</td>
                                            <td class="text-center">{{ $data->tuntutanpemohon }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('admin.status-layanan-sengketa.update', $data->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <select name="status" id="status{{ $data->id }}" class="form-control" onchange="toggleReasonField({{ $data->id }})">
                                                            <option value="Proses" {{ $data->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                                                            <option value="Disetujui" {{ $data->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                                                            <option value="Ditolak" {{ $data->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-custom-yellow">Submit</button>
                                                </form>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <button type="button" class="btn btn-info text-white button-custom mx-1" data-toggle="modal" data-target="#viewModal{{ $data->id }}">
                                                        <i class="mdi mdi-eye mdi-24 text-white"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                         <!-- Modal untuk Alasan Penolakan -->
                                         <div class="modal fade" id="reasonModal{{ $data->id }}" tabindex="-1" aria-labelledby="reasonModalLabel{{ $data->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="reasonModalLabel{{ $data->id }}">Alasan Penolakan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="reasonForm{{ $data->id }}" method="POST" action="{{ route('admin.status-layanan-sengketa.update', $data->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="Ditolak">
                                                            <div class="mb-3">
                                                                <label for="alasan_penolakan" class="form-label">Alasan Penolakan</label>
                                                                <textarea name="alasan_penolakan" class="form-control" id="alasan_penolakan{{ $data->id }}" rows="5" required></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-custom-yellow">Kirim</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                         <!-- View Modal -->
                                         <div class="modal fade" id="viewModal{{ $data->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $data->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewModalLabel{{ $data->id }}">Detail Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="nama{{ $data->id }}">Nama Lengkap</label>
                                                            <input type="text" class="form-control" id="nama{{ $data->id }}" value="{{ $data->nama }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ttl{{ $data->id }}">Tanggal Lahir</label>
                                                            <input type="date" class="form-control" id="ttl{{ $data->id }}" value="{{ $data->ttl }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nik{{ $data->id }}">NIK/No. Identitas Pribadi</label>
                                                            <input type="text" class="form-control" id="nik{{ $data->id }}" value="{{ $data->nik }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ktp{{ $data->id }}">KTP</label>
                                                            @if ($data->ktp)
                                                                <a href="{{ asset('images/' . $data->ktp) }}" target="_blank">Lihat KTP</a>
                                                            @else
                                                                <p>Tidak ada KTP yang diupload</p>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="alamat{{ $data->id }}">Alamat</label>
                                                            <input type="text" class="form-control" id="alamat{{ $data->id }}" value="{{ $data->alamat }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email{{ $data->id }}">Email</label>
                                                            <input type="email" class="form-control" id="email{{ $data->id }}" value="{{ $data->email }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nomortelepon{{ $data->id }}">Nomor Telepon</label>
                                                            <input type="text" class="form-control" id="nomortelepon{{ $data->id }}" value="{{ $data->nomortelepon }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pekerjaan{{ $data->id }}">Pekerjaan Terakhir</label>
                                                            <input type="text" class="form-control" id="pekerjaan{{ $data->id }}" value="{{ $data->pekerjaan }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="alasan_sengketa{{ $data->id }}">Alasan Permohonan Penyelesaian Sengket Informasi</label>
                                                            <input type="text" class="form-control" id="alasan_sengketa{{ $data->id }}" value="{{ $data->alasan_sengketa }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tuntutanpemohon{{ $data->id }}">Tuntutan Pemohon</label>
                                                            <textarea class="form-control" id="tuntutanpemohon{{ $data->id }}" rows="3" readonly>{{ $data->tuntutanpemohon }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- View Modal end-->
                                     @endforeach
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                         <!-- Data yang Perlu Di-Approve -->
                        <h2>Data yang Sudah Di-Approve</h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-striped-custom" id="status_penyelesaian_sengketa2" width="100%">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col" class="align-middle">Id</th>
                                         <th scope="col" class="align-middle">Waktu Pengajuan</th>
                                         <th scope="col" class="align-middle">Kode Permohonan</th>
                                         <th scope="col" class="align-middle">Nama Lengkap</th>
                                         <th scope="col" class="align-middle">Tanggal Lahir</th>
                                         <th scope="col" class="align-middle">NIK/No. Identitas</th>
                                         <th scope="col" class="align-middle">Upload KTP</th>
                                         <th scope="col" class="align-middle">Alamat</th>
                                         <th scope="col" class="align-middle">Email</th>
                                         <th scope="col" class="align-middle">Nomor Telepon</th>
                                         <th scope="col" class="align-middle">Pekerjaan Terakhir</th>
                                         <th scope="col" class="align-middle">Alasan Permohonan Penyelesaian Sengket Informasi</th>
                                         <th scope="col" class="align-middle">Tuntutan Pemohon</th>
                                         <th scope="col" class="align-middle">Status</th>
                                         <th scope="col" class="align-middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approvedData as $data)
                                        <tr>
                                            <td class="text-center">{{ $data->id }}</td>
                                            <td class="text-center">{{ $data->created_at->format('d-m-Y H:i') }}</td>
                                            <td class="text-center">{{ $data->kodepermohonan }}</td>
                                            <td class="text-center">{{ $data->nama }}</td>
                                            <td class="text-center">{{ $data->ttl }}</td>
                                            <td class="text-center">{{ $data->nik }}</td>
                                            <td class="text-center">
                                                @if ($data->ktp)
                                                    <a href="{{ asset('images/' . $data->ktp ) }}" target="_blank">Lihat File</a>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $data->alamat }}</td>
                                            <td class="text-center">{{ $data->email }}</td>
                                            <td class="text-center">{{ $data->nomortelepon }}</td>
                                            <td class="text-center">{{ $data->pekerjaan }}</td>
                                            <td class="text-center">{{ $data->alasan_sengketa }}</td>
                                            <td class="text-center">{{ $data->tuntutanpemohon }}</td>
                                            <td class="text-center">
                                                @if ($data->status == 'Disetujui')
                                                    <span class="badge text-dark" style="background-color: #28a745; color: #fff;">{{ $data->status }}</span>
                                                @elseif ($data->status == 'Ditolak')
                                                    <span class="badge text-dark" style="background-color: #dc3545; color: #fff;">{{ $data->status }}</span>
                                                @else
                                                    <span class="badge text-dark" style="background-color: #ffc107; color: #000;">{{ $data->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <button type="button" class="btn btn-info text-white button-custom mx-1" data-toggle="modal" data-target="#viewModal{{ $data->id }}">
                                                        <i class="mdi mdi-eye mdi-24 text-white"></i>
                                                    </button>
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
    </div>
@endsection
@push('style')


<style>
    .table-row-gray {
        background-color: #B6BBC4; /* Light gray background */
    }

    .table-striped-custom tbody tr {
        background-color: #B6BBC4; /* Warna latar belakang untuk semua baris */
    }

    .table-striped-custom tbody tr:nth-of-type(odd) {
        background-color: #B6BBC4; /* Warna latar belakang untuk baris ganjil */
    }

    .table-striped-custom tbody tr:nth-of-type(even) {
        background-color: #B6BBC4; /* Warna latar belakang untuk baris genap */
    }

    /* Jika Anda ingin mengatur border atau warna lainnya */
    .table-striped-custom td, .table-striped-custom th {
        border-color: #B6BBC4; /* Ganti warna border sesuai kebutuhan */
    }
</style>

@endpush
@push('scripts')
<!-- JavaScript untuk menampilkan atau menyembunyikan kolom alasan -->
<script>
    function toggleReasonField(id) {
    var status = document.getElementById('status' + id).value;
    var reasonModal = new bootstrap.Modal(document.getElementById('reasonModal' + id));

    if (status === 'Ditolak') {
        reasonModal.show();
    } else {
        var modalElement = document.getElementById('reasonModal' + id);
        var modalInstance = bootstrap.Modal.getInstance(modalElement);
        if (modalInstance) {
            modalInstance.hide();
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
    // Set default modal state based on current status
    document.querySelectorAll('select[name="status"]').forEach(select => {
        toggleReasonField(select.id.replace('status', ''));
    });
});

}

$("#status_penyelesaian_sengketa").DataTable();
$("#status_penyelesaian_sengketa2").DataTable();
</script>
@endpush

