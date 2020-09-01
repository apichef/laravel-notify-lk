<?php

namespace ApiChef\NotifyLK;

use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class User
{
    use Notifiable;

    public function routeNotificationForNotifyLK(Notification $notification): string
    {
        return '94771234567';
    }
}
