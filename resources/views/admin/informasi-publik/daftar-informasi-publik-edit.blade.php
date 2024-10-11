@extends('layouts.inc.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Daftar Informasi Publik {{ $infoPublik->pembagian_informasi }} - {{ $infoPublik->jenisInfo->nama ?? '' }}</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-headset menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Layanan&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Edit Daftar Informasi Publik {{$infoPublik->pembagian_informasi}}</p>
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
            <form action="{{ route('informasi-publik.daftar-informasi-publik.update', ['id' => $infoPublik->id]) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jenis Informasi</label>
                    <select name="jenis_info_id" id="selectJenisInfoEdit" class="form-select">
                        @foreach ($jenInfo as $id => $name)
                            <option value="{{ $id }}" {{ $infoPublik->jenis_info_id == $id ? 'selected' : '' }}>
                                {{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="rincian_ji_edit">
                    <label for="exampleFormControlInput1">Rincian Jenis Informasi</label>
                    <select name="rincian_jenis_info_id" id="selectRJIEdit" class="form-select">
                        @foreach ($rincJenInfo as $rj)
                            <option value="{{ $rj->id }}"
                                {{ $infoPublik->rincian_jenis_info_id == $rj->id ? 'selected' : '' }}>{{ $rj->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Ringkasan Informasi</label>
                    <textarea name="ringkasan_informasi" class="form-control" id="" cols="30" rows="10"
                        placeholder="Ringkasan Informasi" required>{{ $infoPublik->ringkasan_informasi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Pejabat Yang Menguasai Informasi</label>
                    <select name="pejabat_id" id="pejabat_id" class="form-select" required>
                        <option value="">-- Silahkan Pilih --</option>
                        @foreach ($pejabat as $pjb)
                            <option value="{{ $pjb->id }}" {{ $infoPublik->pejabat_id == $pjb->id ? 'selected' : '' }}>{{ $pjb->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Penanggung Jawab Informasi</label>
                    <input type="text" class="form-control" id="" placeholder="Penanggung Jawab Informasi"
                        name="penanggung_jawab" value="{{ $infoPublik->penanggung_jawab }}" readonly required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Waktu Pembuatan Informasi</label>
                    <select id="waktu_pembuatan" name="waktu_pembuatan" class="form-select" required>
                        <option value="">-- Pilih Tahun --</option>
                        <?php
                        // Mendapatkan tahun sekarang
                        $tahunSekarang = date('Y');

                        // Menentukan rentang tahun yang diinginkan
                        $tahunAwal = 2018; // Tahun awal
                        $tahunAkhir = $tahunSekarang; // Tahun akhir (10 tahun dari tahun sekarang)

                        // Membuat opsi untuk setiap tahun dalam rentang yang ditentukan
                        for ($tahun = $tahunAwal; $tahun <= $tahunAkhir; $tahun++) {
                            $selected = $tahun == $infoPublik->waktu_pembuatan ? 'selected' : ''; // menambahkan atribut selected jika tahun saat ini
                            echo "<option value='$tahun' $selected>$tahun</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Bentuk Informasi Yang Tersedia</label>
                    <select name="bentuk_informasi" class="form-select" required>
                        <option value="Softfile" {{ $infoPublik->bentuk_informasi == 'Softfile' ? 'selected' : '' }}>
                            Softfile</option>
                        <option value="Hardfile" {{ $infoPublik->bentuk_informasi == 'Hardfile' ? 'selected' : '' }}>
                            Hardfile</option>
                        <option value="Softfile dan Hardfile"
                            {{ $infoPublik->bentuk_informasi == 'Softfile dan Hardfile' ? 'selected' : '' }}>Softfile dan
                            Hardfile</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Jangka Waktu Penyimpanan</label>
                    <input type="text" class="form-control" id="jangka_waktu"
                        name="jangka_waktu" value="{{ $infoPublik->jangka_waktu }}" readonly required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jenis Media Yang Memuat</label>
                    <input type="text" class="form-control" id="" placeholder="Jenis Media Yang Memuat"
                        name="jenis_media" value="{{ $infoPublik->jenis_media }}" required>
                </div>
                <input type="hidden" name="pembagian_informasi" value='{{ $infoPublik->pembagian_informasi }}'>
                <button type="submit" class="btn btn-primary">Perbarui Data</button>

            </form>
        </div>
    </div>

    @push('dependent-dropdown')
    <script>
        window.addEventListener("DOMContentLoaded", function() {
            const selectedInformasi = jenis_info_id => {
                axios.post('{{ route('informasi.select') }}', {
                        id: jenis_info_id
                    })
                    .then(function(response) {
                        const selectRJI = $('#selectRJIEdit');
                        selectRJI.empty();
                        selectRJI.append(new Option('-- Silahkan Pilih --', ''));
                        $.each(response.data, function(id, name) {
                            selectRJI.append(new Option(name, id));
                        });

                        // Set selected option based on saved value
                        const selectedValue = '{{ $infoPublik->rincian_jenis_info_id }}';
                        selectRJI.val(selectedValue); // Set the selected option
                    });
            }

            $('#selectJenisInfoEdit').on('change', function() {
                const selectedValue = $(this).val();
                if (selectedValue == 1 || selectedValue == 2) {
                    $('#rincian_ji_edit').show(); // Show the input field
                } else {
                    $('#rincian_ji_edit').hide(); // Hide the input field
                }
                selectedInformasi(selectedValue);
            });

            // Initially hide or show the input field based on the initial value of "Jenis Informasi"
            const selectedValue = $('#selectJenisInfoEdit').val();
            if (selectedValue == 1 || selectedValue == 2) {
                $('#rincian_ji_edit').show(); // Show the input field
            } else {
                $('#rincian_ji_edit').hide(); // Hide the input field
            }

            // Load initial Rincian Jenis Informasi based on the selected Jenis Informasi
            selectedInformasi(selectedValue);
        })
    </script>
    @endpush
@endsection
