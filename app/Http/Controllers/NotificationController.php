<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class NotificationController extends Controller
{
    public function getUserNotifications()
    {
        // Ambil ID pengguna dari otentikasi saat ini
        $userId = auth()->id();

        // Validasi ID pengguna
        if (!User::find($userId)) {
            abort(404, 'User not found');
        }

        // Mengambil notifikasi yang belum dibaca untuk user tertentu
        $notifications = DB::table('notifications')
            ->where('notifiable_type', User::class) // Tipe model yang menerima notifikasi
            ->where('notifiable_id', $userId) // ID dari model yang menerima notifikasi
            ->whereNull('read_at')
            ->orderBy('created_at', 'desc')
            ->get();

        // Kirim data ke view atau respons lainnya
        return view('user.notifications.index', compact('notifications'));
    }
}
