<?php

namespace App\Mail;

use App\Models\PermohonanKeberatan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JawabanKeberatanUploaded extends Mailable
{
    use Queueable, SerializesModels;

    public $permohonan_keberatan;

    public function __construct(PermohonanKeberatan $permohonan_keberatan)
    {
        $this->permohonan_keberatan = $permohonan_keberatan;
    }

    public function build()
    {
        return $this->view('emails.jawaban_uploaded')
                    ->with([
                        'permohonan' => $this->permohonan_keberatan,
                        'file_url' => asset('uploads/' . $this->permohonan_keberatan->jawaban),
                    ]);
    }
}
