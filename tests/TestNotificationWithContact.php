<?php

namespace ApiChef\NotifyLK;

use Illuminate\Notifications\Notification;

class TestNotificationWithContact extends Notification
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
            ->content('This is a test message.')
            ->contact(new Contact('John', 'Doe', 'john.doe@example.com', 'No 1, Colombo, Sri Lanka', 'a_group'));
    }
}
