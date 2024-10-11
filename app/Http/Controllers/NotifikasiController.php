<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotifikasiController extends Controller
{
    /**
     * Show the user's notifications.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        // Ensure the user is authenticated
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        // Get unread (new) notifications
        $newNotifications = Notification::where('user_id', $user->id)
                                         ->whereNull('read_at')
                                         ->orderBy('created_at', 'desc')
                                         ->get();

        // Get read notifications
        $readNotifications = Notification::where('user_id', $user->id)
                                          ->whereNotNull('read_at')
                                          ->orderBy('created_at', 'desc')
                                          ->get();

        // Pass data to the view
        return view('notifikasi', [
            'newNotifications' => $newNotifications,
            'readNotifications' => $readNotifications
        ]);
    }

    /**
     * Show all notifications for admins.
     *
     * @return \Illuminate\View\View
     */
    public function indexAdmin()
    {
        // Get all notifications for admin
        $datas = Notification::orderBy('created_at', 'desc')->get();

        // Pass data to the admin view
        return view('notifikasiAdmin', compact('datas'));
    }

        // Existing methods...

    /**
     * Mark a notification as read.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->read_at = now();
        $notification->save();

        return redirect()->back()->with('success', 'Notifikasi berhasil ditandai sebagai dibaca.');
    }

    public function destroy($id)
    {
        // Cari notifikasi berdasarkan ID
        $notification = Notification::findOrFail($id);

        // Hapus notifikasi dari database
        $notification->delete();

        return redirect()->back()->with('success', 'Notifikasi berhasil dihapus.');
    }
}
