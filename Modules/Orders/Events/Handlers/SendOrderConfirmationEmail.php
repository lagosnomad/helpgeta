<?php namespace Modules\Orders\Events\Handlers;

use Illuminate\Support\Facades\Mail;
use Modules\Orders\Emails\OrderArtisanConfirmationEmail;
use Modules\Orders\Emails\OrderUserConfirmationEmail;
use Modules\Orders\Events\UserHasOrdered;

class SendOrderConfirmationEmail {

    /**
     * @param UserHasOrdered $event
     */
    public function handle(UserHasOrdered $event)
    {
        $data = $event->data;

        Mail::to($data['artisan_user_email'])->send(new OrderArtisanConfirmationEmail($data));

        Mail::to($data['user_email'])->send(new OrderUserConfirmationEmail($data));
    }
}
