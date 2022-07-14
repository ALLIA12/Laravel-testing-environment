<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Http\Request;

class TestNotificationController extends Controller
{
    public function sendTestNotification()
    {
        // or just get only one user using User::first()
        $users = User::all();

        $notificationData = [
            'body' => 'Notifaction KEKO',
            'notificationText' => 'You are very notified',
            'url' => url('/'),
            'thankYou' => 'You have N days left to live :)'
        ];
        foreach ($users as $user)
            $user->notify(new TestNotification($notificationData));
    }
}
