<?php

namespace ApiChef\NotifyLK\Support\Facades;

use ApiChef\NotifyLK\NotifyLKMessage;

/**
 * @method static bool send(NotifyLKMessage $message)
 *
 * @see \ApiChef\NotifyLK\Client
 */
class NotifyLK
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'text-it';
    }
}
