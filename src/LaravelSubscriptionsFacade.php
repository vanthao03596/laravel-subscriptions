<?php

namespace Vanthao03596\LaravelSubscriptions;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Vanthao03596\LaravelSubscriptions\LaravelSubscriptions
 */
class LaravelSubscriptionsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-subscriptions';
    }
}
