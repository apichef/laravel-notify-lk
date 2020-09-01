<?php

namespace ApiChef\NotifyLK;

use Illuminate\Notifications\Notification;

class NotifyLKChannel
{
    private $notifyLKClient;

    public function __construct(Client $notifyLKClient)
    {
        $this->notifyLKClient = $notifyLKClient;
    }

    public function send($notifiable, Notification $notification)
    {
        $to = $notifiable->routeNotificationForNotifyLK($notification);

        /** @var NotifyLKMessage $message */
        $message = $notification->toNotifyLK($notifiable)->to($to);

        $this->notifyLKClient->send($message);
    }
}
