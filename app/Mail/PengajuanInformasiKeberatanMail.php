<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PengajuanInformasiKeberatanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $email = $this->subject('Pengajuan Keberatan Informasi')
                      ->view('emails.pengajuankeberatan')
                      ->with('data', $this->data);
                      
        // Lampirkan file jika ada
        if (!empty($this->data['uploadsuratkeberatan'])) {
            $email->attach(public_path('uploads/' . $this->data['uploadsuratkeberatan']), [
                'as' => 'Surat_Keberatan.pdf',
                'mime' => 'application/pdf',
            ]);
        }


        return $email;
    }
}
