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
     * Render Notification Center Page
     * @return Response Inertia Render Response
     */
    public function renderNotificationCenter(Request $request): Response
    {
        return Inertia::render('Notifications/Overview', [
            'allNotifications' => Notification
                ::where('user_id', $request->user()->id)
                ->orderBy('read', 'asc')
                ->paginate(10)
        ]);
    }

    /**
     * Function to mark a single notification as read
     * @param Request $request
     * -> Notification: Required-Integer-Notification_Primary
     * @return RedirectResponse
     */
    public function markAsReadSingle(Request $request): RedirectResponse
    {
        $request->validate([
            'notification' => 'required|int|exists:notifications,id',
            'state' => 'nullable|boolean'
        ]);

        $notification = Notification::findOrFail($request->notification);
        $notification->read = $request->has('state') ? $request->state : true;
        $notification->save();

        return back();
    }

    /**
     * Function to mark an array of notification id's as read
     * @param Request $request
     * -> Notifications: Required-Array
     * ---> Notification: Required-Integer-Notification_Primary
     * @return RedirectResponse
     */
    public function markAsReadArray(Request $request): RedirectResponse
    {
        $request->validate([
            'notifications' => 'required|array',
            'notifications.*' => 'required|int|exists:notifications,id',
            'state' => 'nullable|boolean'
        ]);

        foreach ($request->notifications as $notification) {
            $notification = Notification::findOrFail($notification);
            $notification->read = $request->has('state') ? $request->state : true;
            $notification->save();
        }

        return back();
    }

    /**
     * Function to delete a single notification by id
     * @param Request $request
     * -> Notification: Required-Integer-Notification_Primary
     * @return RedirectResponse
     */
    public function deleteNotificationsSingle(Request $request): RedirectResponse
    {
        $request->validate([
            'notification' => 'required|int|exists:notifications,id'
        ]);

        $notification = Notification::findOrFail($request->notification);
        $notification->delete();

        return back();
    }

    /**
     * Function to delete an array of notification id's
     * @param Request $request
     * -> Notifications: Required-Array
     * ---> Notification: Required-Integer-Notification_Primary
     * @return RedirectResponse
     */
    public function deleteNotificationsArray(Request $request): RedirectResponse
    {
        $request->validate([
            'notifications' => 'required|array',
            'notifications.*' => 'required|int|exists:notifications,id'
        ]);

        foreach ($request->notifications as $notification) {
            $notification = Notification::findOrFail($notification);
            if ($notification->dismissible) $notification->delete();
        }

        return back();
    }
}
