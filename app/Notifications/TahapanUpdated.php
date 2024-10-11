<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\NotifikasiAdmin;


class TahapanUpdated extends Notification
{
    use Queueable;

    protected $notifikasi;


    public function __construct(NotifikasiAdmin $notifikasi)
    {
        $this->notifikasi = $notifikasi;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Pembaruan Tahapan Notifikasi')
                    ->line('Tahapan notifikasi Anda telah diperbarui.')
                    ->line('Tahapan baru: ' . $this->notifikasi->tahapan)
                    ->action('Lihat Notifikasi', url('/notifikasi'))
                    ->line('Terima kasih telah menggunakan layanan kami!');
    }

    public function toArray($notifiable)
    {
        return [
            'notifikasi_id' => $this->notifikasi->id,
            'tahapan' => $this->notifikasi->tahapan,
        ];
    }

}
