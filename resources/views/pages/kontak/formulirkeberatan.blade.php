<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PPID Kota Surakarta</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('include.style')
</head>

<body>

    @include('include.navbar')

    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Formulir</h5>
                <h1 class="mb-0">Pengajuan Keberatan Informasi</h1>
                <center>
                    <div class="line-custom">
                        <div class="rectangle-custom"></div>
                    </div>
                </center>
            </div>
        </div>
        <div class="row justify-content-center">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        
            <div class="col-md-12 mb-3">
                <div class="alert alert-info" role="alert">
                    Jika ingin mendapatkan kode permohonan, harap mengajukan permohonan layanan informasi terlebih dahulu. Tautan pengajuan keberatan akan diberikan setelah selesai pengajuan, beserta kode permohonan. Jika anda sudah mendapatkan kode permohonan melalui tautan email, silahkan melakukan pengajuan keberatan. Terimakasih
                </div>
            </div>
            <div class="col-md-12">
                <form action="{{ route('simpan.permohonan-keberatan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            @auth
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            @endauth
                            <div class="form-group">
                                <label for="kodepermohonan" class="form-label">Kode Permohonan</label>
                                <input type="text" name="kodepermohonan" id="kodepermohonan" class="form-control" value="{{ old('kodepermohonan', request('kodepermohonan')) }}" required>
                                @error('kodepermohonan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div id="nik" class="form-group">
                                <label for="nikInput" id="nikLabel" class="form-label">NIK/No. Identitas</label>
                                <small class="form-text text-warning">Mohon pastikan NIK yang anda masukan sesuai dengan no NIK KTP</small>
                                <input type="text" name="nik" id="nikInput" placeholder="Masukan NIK/No. Identitas" class="form-control" maxlength="16" pattern="\d{16}" title="NIK harus berisi 16 angka" value="{{ old('nik', $profileData->nik ?? '') }}" readonly>
                                @error('nik')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Alasan Pengajuan Keberatan</label>
                                <div class="custom-radio">
                                    <input type="radio" id="alasan1" name="alasan_pengajuan" value="Penolakan atas permintaan informasi berdasarkan alasan pengecualian sebagaimana dimaksud dalam Pasal 17 UU No. 14 Tahun 2008">
                                    <label for="alasan1">Penolakan atas permintaan informasi berdasarkan alasan pengecualian sebagaimana dimaksud dalam Pasal 17 UU No. 14 Tahun 2008</label>
                                </div>
                                <div class="custom-radio">
                                    <input type="radio" id="alasan2" name="alasan_pengajuan" value="Tidak ditanggapinya permintaan informasi">
                                    <label for="alasan2">Tidak ditanggapinya permintaan informasi</label>
                                </div>
                                <div class="custom-radio">
                                    <input type="radio" id="alasan3" name="alasan_pengajuan" value="Tidak dipenuhinya permintaan informasi">
                                    <label for="alasan3">Tidak dipenuhinya permintaan informasi</label>
                                </div>
                                <div class="custom-radio">
                                    <input type="radio" id="alasan4" name="alasan_pengajuan" value="Penyampaian informasi yang melebihi jangka waktu yang diatur dalam UU No. 14 Tahun 2008">
                                    <label for="alasan4">Penyampaian informasi yang melebihi jangka waktu yang diatur dalam UU No. 14 Tahun 2008</label>
                                </div>
                                <div class="custom-radio">
                                    <input type="radio" id="alasan5" name="alasan_pengajuan" value="Tidak disediakannya informasi berkala">
                                    <label for="alasan5">Tidak disediakannya informasi berkala</label>
                                </div>
                                <div class="custom-radio">
                                    <input type="radio" id="alasan6" name="alasan_pengajuan" value="Permintaan informasi tidak ditanggapi sebagaimana yang diminta">
                                    <label for="alasan6">Permintaan informasi tidak ditanggapi sebagaimana yang diminta</label>
                                </div>
                                <div class="custom-radio">
                                    <input type="radio" id="alasan7" name="alasan_pengajuan" value="Pengenaan biaya yang tidak wajar">
                                    <label for="alasan7">Pengenaan biaya yang tidak wajar</label>
                                </div>
                                @error('alasan_pengajuan')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Identitas Pemohon</label>
                            </div>
                            <div class="form-group">
                                <label for="namaInput" id="namaLabel" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" id="namaInput" placeholder="Masukan Nama Lengkap Anda" class="form-control" value="{{ old('nama', $profileData->nama_lengkap ?? '') }}" readonly>
                                @error('nama')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nomortelepon" class="form-label">Nomor Telepon</label>
                                <small class="form-text">Contoh: 081234567890 (tanpa spasi)</small>
                                <input type="tel" name="nomortelepon" id="nomortelepon" placeholder="Masukan Nomor Telepon Anda" class="form-control" pattern="[0-9]{9,15}" title="Nomor telepon harus berisi 9-15 digit angka" value="{{ old('nomortelepon', $profileData->telp ?? '') }}" readonly>
                                @error('nomortelepon')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" placeholder="Masukan Email Anda" class="form-control" value="{{ old('email', $profileData->email ?? '') }}" readonly>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="4" readonly>{{ old('alamat', $profileData->alamat ?? '') }}</textarea>
                                @error('alamat')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kasusposisi" class="form-label">Kasus Posisi (Ringkasan Mengenai Kasus)</label>
                                <textarea name="kasusposisi" id="kasusposisi" class="form-control" rows="4" required></textarea>
                                @error('kasusposisi')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div id="uploadsuratkeberatan" class="form-group">
                                <label for="uploadsuratkeberatan" id="ktpLabel" class="form-label">Upload Surat Keberatan (jika ada)</label>
                                <input type="file" name="uploadsuratkeberatan" id="uploadsuratkeberatan" class="form-control" required>
                                @error('uploadsuratkeberatan')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-6 text-center">
                                    @auth
                                    <button type="submit" class="btn btn-primary rounded-pill py-2 px-4">Ajukan Permohonan</button>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('include.footer')

    @include('include.script')

    <script>
        // Validasi ekstensi dan ukuran file saat dipilih
        document.addEventListener('DOMContentLoaded', function () {
            var uploadInput = document.getElementById('uploadsuratkeberatan');

            uploadInput.addEventListener('change', function () {
                var file = this.files[0];
                var allowedExtensions = /(\.doc|\.docx|\.xls|\.xlsx|\.pdf)$/i;
                var maxSize = 5 * 1024 * 1024; // 5MB

                // Validasi ekstensi file
                if (!allowedExtensions.exec(file.name)) {
                    alert('Jenis file tidak valid. Hanya file dengan ekstensi .doc, .docx, .xls, .xlsx, atau .pdf yang diperbolehkan.');
                    this.value = '';
                    return false;
                }

                // Validasi ukuran file
                if (file.size > maxSize) {
                    alert('Ukuran file melebihi batas maksimal 5MB.');
                    this.value = '';
                    return false;
                }

                // Update label jika valid
                var label = document.getElementById('ktpLabel');
                label.classList.remove('text-danger'); // Hapus kelas 'text-danger' jika sebelumnya ditandai
            });
        });
    </script>
</body>

</html>