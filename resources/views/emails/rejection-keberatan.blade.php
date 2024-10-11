<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Keberatan Ditolak</title>
</head>
<body>
    <p>Yth. {{ $details['nama'] }},</p>
    <p>Permohonan Keberatan Anda dengan kode  <strong>{{ $kodepermohonan }}</strong> telah ditolak.</p>
    <p>Kami menyesal menginformasikan bahwa pengajuan keberatan Anda tidak disetujui dengan alasan penolakan sebagai berikut: <strong>{{ $details['alasan_penolakan'] }}</strong>.</p>
    <p>Jika Anda tidak setuju dengan keputusan ini, Anda dapat mengajukan sengketa melalui link berikut: <a href="{{ $details['url_sengketa'] }}">Ajukan Sengketa</a></p>
    <p>Terima kasih atas pengajuan Anda</p>
    <p>Tim PPID Kota Surakarta</p>
</body>
</html>
