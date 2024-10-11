<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovalEmailKeberatan extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        return $this->subject('Permohonan Keberatan Disetujui')
            ->view('emails.approval-keberatan')
            ->with([
                'nama' => $this->details['nama'],
                'kodepermohonan' => $this->details['kodepermohonan'],
            ]);
    }
}
