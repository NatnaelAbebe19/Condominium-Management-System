<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {

        // dd($request);
        $user = auth()->user();
        $notifications = $user->notifications;

        return response()->json(['notifications' => $notifications]);
    }

    public function unreadCount(Request $request)
    {
        $user = auth()->user();
        $unreadCount = $user->unreadNotifications->count();

        return response()->json(['unread_count' => $unreadCount]);
    }

    public function markAsRead(Request $request)
    {
        $user = auth()->user();
        $user->unreadNotifications->markAsRead();

        return response()->json(['message' => 'Notifications marked as read']);
    }

    public function markNotificationAsRead($id)
    {
        $user = auth()->user();
        $notification = $user->notifications()->find($id);

        if ($notification) {
            $notification->markAsRead();
            return response()->json(['message' => 'Notification marked as read']);
        }

        return response()->json(['message' => 'Notification not found'], 404);
    }

    public function updateNotification(Request $request, $id)
    {
        $user = auth()->user();
        $notification = $user->notifications()->find($id);

        if ($notification) {
            $data = $notification->data;
            $data['status'] = $request->input('status');
            $notification->data = $data;
            $notification->save();

            return response()->json(['message' => 'Notification updated successfully']);
        }

        return response()->json(['message' => 'Notification not found'], 404);
    }

}
