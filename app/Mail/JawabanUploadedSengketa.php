<?php

namespace App\Mail;

use App\Models\PermohonanSengketa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JawabanUploadedSengketa extends Mailable
{
    use Queueable, SerializesModels;

    public $permohonan_sengketa;

    public function __construct(PermohonanSengketa $permohonan_sengketa)
    {
        $this->permohonan_sengketa = $permohonan_sengketa;
    }

    public function build()
    {
        return $this->view('emails.jawaban-sengketa')
                    ->with([
                        'permohonan' => $this->permohonan_sengketa,
                        'file_url' => asset('uploads/' . $this->permohonan_sengketa->jawaban),
                    ]);
    }
}
