<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PengajuanInformasiSengketaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $email = $this->subject('Pengajuan Penyelesaian Sengketa')
                      ->view('emails.pengajuansengketa')
                      ->with('data', $this->data);

        return $email;
    }
}
