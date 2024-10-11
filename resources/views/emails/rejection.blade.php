<!DOCTYPE html>
<html>

<head>
    <title>Permohonan Ditolak</title>
</head>

<body>
    <p>Yth. {{ $details['nama'] }},</p>
    <p>Permohonan Anda dengan kode {{ $details['kodepermohonan'] }} Tidak Disetujui Oleh Pihak PPID Kota Surakarta.</p>
    <p>Dengan Alasan penolakan Sebagai Berikut: {{ $details['alasan_penolakan'] }}</p>
    <p>Jika Anda ingin mengajukan keberatan, silakan klik tautan berikut: <a href="{{ url('formulir-keberatan?kodepermohonan=' . $details['kodepermohonan']) }}">Ajukan Keberatan</a></p>
    <p>Terima kasih atas pengajuan Anda</p>
    <p>Tim PPID Kota Surakarta</p>
</body>

</html>