<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RejectionEmailKeberatan extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details; // Pastikan ini adalah array yang benar
    }

    public function build()
    {
        return $this->subject('Permohonan Keberatan Ditolak')
            ->view('emails.rejection-keberatan')
            ->with([
                'nama' => $this->details['nama'] ?? 'Nama tidak tersedia',
                'kodepermohonan' => $this->details['kodepermohonan'] ?? 'Kode tidak tersedia',
                'alasan_penolakan' => $this->details['alasan_penolakan'] ?? 'Alasan tidak tersedia',
                'url_sengketa' => $this->details['url_sengketa'],
            ]);
    }
}
