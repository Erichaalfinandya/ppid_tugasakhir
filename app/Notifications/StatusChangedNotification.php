<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class StatusChangedNotification extends Notification
{
    use Queueable;

    protected $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Permohonan Disetujui')
            ->line('Kode Permohonan: ' . $this->details['kodepermohonan'])
            ->line('Status Terbaru: ' . $this->details['status'])
            ->action('Lihat Status', url('/status'))
            ->line('Terima kasih!');
    }
}

