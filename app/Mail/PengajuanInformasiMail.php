<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PengajuanInformasiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $permohonan;

    public function __construct($permohonan)
    {
        $this->permohonan = $permohonan;
    }

    public function build()
    {
        return $this->view('emails.pengajuaninformasi')
                    ->with([
                        'permohonan' => $this->permohonan,
                    ]);
    }
}
