<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $notifications = $user->unreadNotifications;
        $notifications->markAsRead();
        $user->update(['notification_count' => 0]);
        return view('notifications.index', compact('notifications'));
    }
}
