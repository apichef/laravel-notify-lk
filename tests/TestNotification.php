<?php

namespace ApiChef\NotifyLK;

use Illuminate\Notifications\Notification;

class TestNotification extends Notification
{
    public function via($notifiable)
    {
        return [
            NotifyLKChannel::class,
        ];
    }

    public function toNotifyLK($notifiable): NotifyLKMessage
    {
        return (new NotifyLKMessage())
            ->content('This is a test message.');
    }
}
