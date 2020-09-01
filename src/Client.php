<?php

namespace ApiChef\NotifyLK;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class Client
{
    public function send(NotifyLKMessage $message): bool
    {
        $response = Http::post('https://app.notify.lk/api/v1/send', $message->toArray());

        return Arr::get($response->json(), 'status') === 'success';
    }
}
