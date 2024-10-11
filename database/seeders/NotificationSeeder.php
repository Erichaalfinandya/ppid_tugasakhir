<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notification;
use App\Models\User;

class NotificationSeeder extends Seeder
{
    public function run()
    {
        $user = User::first(); // Ganti dengan logika untuk menemukan user yang sesuai

        Notification::create([
            'user_id' => $user->id,
            'title' => 'Notifikasi Pertama',
            'message' => 'Ini adalah pesan notifikasi pertama.',
        ]);
    }
}
