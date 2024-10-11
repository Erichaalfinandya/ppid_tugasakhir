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

    <div class="untree_co-section py-5">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Formulir</h5>
                    <h1 class="mb-0">Permohonan Layanan Informasi</h1>
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
                <div class="col-md-12">
                    <form class="row g-3" action="{{ route('permohonan.simpan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategoripermohonan" class="form-label">Kategori Permohonan</label>
                                    <select name="kategoripermohonan" id="kategoripermohonan" class="form-control custom-select-arrow" onchange="updateForm()">
                                        <option>Pilih Kategori</option>
                                        <option value="Perorangan">Perorangan</option>
                                        <option value="Lembaga/organisasi">Lembaga/organisasi</option>
                                        <option value="Kelompok Orang">Kelompok Orang</option>
                                    </select>
                                    @error('kategoripermohonan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div id="nik" class="form-group">
                                    <label for="nikInput" id="nikLabel" class="form-label">NIK/No.Identitas</label>
                                    <small class="form-text text-warning">Mohon pastikan NIK yang anda masukan sesuai dengan no NIK KTP</small>
                                    <input type="text" name="nik" id="nikInput" placeholder="Masukan NIK/No. Identitas" class="form-control" maxlength="16" pattern="\d{16}" title="NIK harus berisi 16 angka" value="{{ old('nik', $profileData->nik ?? '') }}" readonly>
                                    @error('nik')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="namaInput" id="namaLabel" class="form-label">Nama</label>
                                    <input type="text" name="nama" id="namaInput" placeholder="Masukan Nama Lengkap Anda" class="form-control" value="{{ old('nama', $profileData->nama_lengkap ?? '') }}" readonly>
                                    @error('nama')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div id="ktp" class="form-group">
                                    <label for="ktpInput" id="ktpLabel" class="form-label">Upload KTP (Kosongkan jika tidak ingin mengganti)</label>
                                    <!-- Tampilkan KTP yang sudah ada jika ada -->
                                    @if(!empty($profileData->ktp))
                                        <div class="mb-3">
                                            <a href="{{ asset($profileData->ktp) }}" target="_blank">Lihat KTP Saat Ini</a>
                                        </div>
                                    @endif
                                    <!-- Input file untuk mengganti KTP -->
                                    <input type="file" name="ktp" id="ktpInput" class="form-control">
                                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti KTP. KTP yang terdaftar akan digunakan.</small>
                                    @error('ktp')
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
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Masukan Email Anda" class="form-control" value="{{ old('email', $profileData->email ?? '') }}" readonly>
                                    @error('email')
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
                                <div class="form-group">
                                    <label for="pekerjaan" class="form-label">Pekerjaan Terakhir</label>
                                    <input type="text" name="pekerjaan" id="pekerjaan" placeholder="Masukan Pekerjaan  Anda" class="form-control" required>
                                    @error('pekerjaan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <div id="uploadsuratDiv" class="form-group" style="display: none;">
                                    <label for="uploadsuratInput" id="uploadsuratLabel" class="form-label">Upload</label>
                                    <input type="file" name="uploadsurat" id="uploadsuratInput" class="form-control">
                                    @error('uploadsurat')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="rincianinformasi" class="form-label">Rincian Informasi</label>
                                    <textarea name="rincianinformasi" id="rincianinformasi" placeholder="Masukan Rincian Informasi Anda" class="form-control" rows="4" required></textarea>
                                    @error('rincianinformasi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tujuaninformasi" class="form-label">Tujuan Penggunaan Informasi</label>
                                    <textarea name="tujuaninformasi" id="tujuaninformasi" placeholder="Masukan Tujuan Informasi Anda" class="form-control" rows="4" required></textarea>
                                    @error('tujuaninformasi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Mendapatkan Salinan Informasi</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Softcopy" id="mendapatkan_softcopy" name="mendapatkansalinan" required>
                                        <label class="form-check-label" for="mendapatkan_softcopy">Softcopy</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Hardcopy" id="mendapatkan_hardcopy" name="mendapatkansalinan" required>
                                        <label class="form-check-label" for="mendapatkan_hardcopy">Hardcopy</label>
                                    </div>
                                    @error('mendapatkansalinan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Cara Pengambilan Salinan Informasi</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Mengambil Langsung" id="caramendapatkan_langsung" name="caramendapatkansalinan" required>
                                        <label class="form-check-label" for="caramendapatkan_langsung">Mengambil Langsung</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Kurir" id="caramendapatkan_kurir" name="caramendapatkansalinan" required>
                                        <label class="form-check-label" for="caramendapatkan_kurir">Kurir</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Pos" id="caramendapatkan_pos" name="caramendapatkansalinan" required>
                                        <label class="form-check-label" for="caramendapatkan_pos">Pos</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Email" id="caramendapatkan_email" name="caramendapatkansalinan" required>
                                        <label class="form-check-label" for="caramendapatkan_email">Email</label>
                                    </div>
                                    @error('caramemperolehinformasi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 text-center">
                            @if(Auth::check())
                                @if(Auth::user()->status === 'terverifikasi')
                                    <button type="submit" class="btn btn-primary px-5">Ajukan Permohonan</button>
                                @else
                                    <button type="submit" class="btn btn-primary px-5" disabled>Ajukan Permohonan</button>
                                    <br>
                                    <small>*)Anda harus terverifikasi terlebih dahulu jika ingin mengirim formulir</small>
                                @endif
                            @else
                                <button type="submit" class="btn btn-primary px-5" disabled>Ajukan Permohonan</button>
                                <br>
                                <small>*)Anda harus login terlebih dahulu jika ingin mengirim formulir</small>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('include.footer')

    <style>
        .btn-filled {
            color: #1A374D !important;
            border-color: #1A374D !important;
        }
    </style> 

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const softcopyOption = document.getElementById('mendapatkan_softcopy');
            const hardcopyOption = document.getElementById('mendapatkan_hardcopy');
            const caraOptions = document.getElementsByName('caramendapatkansalinan');
    
            function updateCaraOptions() {
                if (softcopyOption.checked) {
                    // Set default to Email when Softcopy is selected
                    document.getElementById('caramendapatkan_email').checked = true;
                    caraOptions.forEach(option => {
                        option.disabled = option.value !== 'Email';
                    });
                } else if (hardcopyOption.checked) {
                    // Enable only these options when Hardcopy is selected
                    caraOptions.forEach(option => {
                        option.disabled = ['Mengambil Langsung', 'Kurir', 'Pos'].indexOf(option.value) === -1;
                        if (!option.disabled) {
                            option.checked = false;
                        }
                    });
                    document.getElementById('caramendapatkan_langsung').checked = true;
                }
            }
    
            // Add event listeners
            softcopyOption.addEventListener('change', updateCaraOptions);
            hardcopyOption.addEventListener('change', updateCaraOptions);
        });
    </script>
    
    <script>
        function updateForm() {
            var kategoriPermohonan = document.getElementById('kategoripermohonan').value;
            var uploadSuratDiv = document.getElementById('uploadsuratDiv');
            if (kategoriPermohonan === 'Lembaga/organisasi' || kategoriPermohonan === 'Kelompok Orang') {
                uploadSuratDiv.style.display = 'block';
            } else {
                uploadSuratDiv.style.display = 'none';
            }
        }
    </script>
    <script>
       document.addEventListener('DOMContentLoaded', function () {
        const submitButton = document.querySelector('button[type="submit"]');
        const requiredInputs = document.querySelectorAll('input[required], textarea[required], select[required]');

        function checkInputs() {
            let allFilled = true;

            requiredInputs.forEach(input => {
                if (input.value.trim() === '') {
                    allFilled = false;
                }
            });

            if (allFilled) {
                submitButton.classList.add('btn-filled');
            } else {
                submitButton.classList.remove('btn-filled');
            }
        }

        requiredInputs.forEach(input => {
            input.addEventListener('input', checkInputs);
        });

        checkInputs();  // Initial check in case some fields are pre-filled
    });
    </script>

    @include('include.script')
</body>

</html>