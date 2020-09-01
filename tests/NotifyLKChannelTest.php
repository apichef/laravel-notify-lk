<?php

namespace ApiChef\NotifyLK;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

class NotifyLKChannelTest extends TestCase
{
    public function test_it_makes_a_post_request_with_required_parameters_when_notification_is_called()
    {
        Http::fake([
            'app.notify.lk/api/v1/send' => Http::response([
                'status' => 'success',
                'data' => 'Sent',
            ], 200),
        ]);

        (new User())->notify(new TestNotification());

        Http::assertSent(function (Request $request) {
            return $request->url() === 'https://app.notify.lk/api/v1/send' &&
                $request->method() === 'POST' &&
                $request['user_id'] === 'test_user_id' &&
                $request['api_key'] === 'test_api_key' &&
                $request['sender_id'] === 'NotifyDEMO' &&
                $request['message'] === 'This is a test message.' &&
                $request['to'] === '94771234567';
        });
    }

    public function test_makes_send_a_message_with_contact()
    {
        Http::fake([
            'app.notify.lk/api/v1/send' => Http::response([
                'status' => 'success',
                'data' => 'Sent',
            ], 200),
        ]);

        (new User())->notify(new TestNotificationWithContact());

        Http::assertSent(function (Request $request) {
            return $request->url() === 'https://app.notify.lk/api/v1/send' &&
                $request->method() === 'POST' &&
                $request['user_id'] === 'test_user_id' &&
                $request['api_key'] === 'test_api_key' &&
                $request['sender_id'] === 'NotifyDEMO' &&
                $request['message'] === 'This is a test message.' &&
                $request['to'] === '94771234567' &&
                $request['contact_fname'] === 'John' &&
                $request['contact_lname'] === 'Doe' &&
                $request['contact_email'] === 'john.doe@example.com' &&
                $request['contact_address'] === 'No 1, Colombo, Sri Lanka' &&
                $request['contact_group'] === 'a_group';
        });
    }
}
