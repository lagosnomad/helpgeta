<?php

namespace Modules\Orders\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Users\Entities\UserInterface;

class OrderArtisanConfirmationEmail extends Mailable {

    use Queueable, SerializesModels;
    /**
     * @var
     */
    protected $data;
    /**
     * Create a new message instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from_address = config('myapp.mail_from_address');
        $from_name = config('myapp.mail_from_name');
        $subject = 'New Service Request for '.$this->data['category'];

        return $this->from($from_address,$from_name)
            ->view('orders::emails.artisan_confirmation')
            ->subject($subject)
            ->with($this->data);
    }
}
