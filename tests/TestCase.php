<?php

namespace ApiChef\NotifyLK;

use ApiChef\NotifyLK\Support\Facades\NotifyLK;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            NotifyLKServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'NotifyLK' => NotifyLK::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('notify-lk.credentials.user_id', 'test_user_id');
        $app['config']->set('notify-lk.credentials.api_key', 'test_api_key');
    }
}
