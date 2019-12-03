<?php namespace Modules\Orders\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Orders\Events\Handlers\SendOrderConfirmationEmail;
use Modules\Orders\Events\UserHasOrdered;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
       UserHasOrdered::class => [
            SendOrderConfirmationEmail::class,
        ],
    ];
}
