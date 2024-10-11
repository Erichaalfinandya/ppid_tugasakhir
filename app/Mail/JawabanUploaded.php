<?php

namespace App\Mail;

use App\Models\Permohonan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JawabanUploaded extends Mailable
{
    use Queueable, SerializesModels;

    public $permohonan;

    public function __construct(Permohonan $permohonan)
    {
        $this->permohonan = $permohonan;
    }

    public function build()
    {
        return $this->view('emails.jawaban_uploaded')
                    ->with([
                        'permohonan' => $this->permohonan,
                        'file_url' => asset('uploads/' . $this->permohonan->jawaban),
                    ]);
    }
}
