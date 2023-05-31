<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAllRead(Request $request)
    {
        Auth::user()->unreadNotifications->markAsRead();
        return back();
    }
}
