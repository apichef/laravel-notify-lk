<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Credentials
    |--------------------------------------------------------------------------
    |
    | Once you sign up for a NotifyLK account, you can find your credentials
    | under your settings page.
    |
    | https://app.notify.lk/settings/api-keys
    */
    'credentials' => [
        'user_id' => env('NOTIFY_LK_USER_ID'),
        'api_key' => env('NOTIFY_LK_API_KEY'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Sender ID
    |--------------------------------------------------------------------------
    |
    | Sender ID is the number masks which you can be used to send SMS and
    | which will be shown to recipient as the sender.
    |
    | You can request a sender id from:
    | https://app.notify.lk/settings/senders
    */
    'default_sender_id' => env('NOTIFY_LK_DEFAULT_SENDER_ID', 'NotifyDEMO')
];
