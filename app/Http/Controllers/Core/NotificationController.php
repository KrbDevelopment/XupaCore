<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class NotificationController extends Controller
{

    /**
     * Function to mark a single notification as read
     * @param Request $request
     * -> Notification: Required-Integer-Notification_Primary
     */
    public function markAsReadSingle(Request $request): RedirectResponse
    {
        $request->validate([
            'notification' => 'required|int|exists:notifications,id'
        ]);

        $notification = Notification::findOrFail($request->notification);
        $notification->read = true;
        $notification->save();

        return back();
    }

    /**
     * Function to mark a array of notification id's as read
     * @param Request $request
     * -> Notifications: Required-Array
     * ---> Notification: Required-Integer-Notification_Primary
     */
    public function markAsReadArray(Request $request): RedirectResponse
    {
        $request->validate([
            'notifications' => 'required|array',
            'notifications.*' => 'required|int|exists:notifications,id'
        ]);

        foreach ($request->notifications as $notification) {
            $notification = Notification::findOrFail($notification);
            $notification->read = true;
            $notification->save();
        }

        return back();
    }

}
