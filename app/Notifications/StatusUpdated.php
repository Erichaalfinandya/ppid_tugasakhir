<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
class StatusUpdated extends Notification
{
    use Queueable;

    protected $permohonan;

    public function __construct($permohonan)
    {
        $this->permohonan = $permohonan;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Status Permohonan Anda Diperbarui')
            ->line('Status permohonan Anda dengan kode ' . $this->permohonan->kodepermohonan . ' telah diperbarui.')
            ->line('Status saat ini: ' . $this->permohonan->status)
            ->action('Lihat Permohonan', url('/permohonan/' . $this->permohonan->id))
            ->line('Terima kasih!');
    }
}
