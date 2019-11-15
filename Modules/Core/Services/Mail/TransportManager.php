<?php
namespace Modules\Core\Services\Mail;

class TransportManager extends \Illuminate\Mail\TransportManager {

    /**
     * Create a new manager instance.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    public function __construct($app)
    {
        parent::__construct($app);

        $this->app['config']['mail'] = [
            'driver'     => config('myapp.mail_driver'),
            'host'       => config('myapp.mail_host'),
            'port'       => config('myapp.mail_port'),
            'from'       => [
                'address' => config('myapp.mail_from_address'),
                'name'    => config('myapp.mail_from_name')
            ],
            'encryption' => config('myapp.mail_encryption'),
            'username'   => config('myapp.mail_username'),
            'password'   => config('myapp.mail_password'),
            'sendmail'   => config('myapp.mail_sendmail'),
        ];

        $this->app['config']['services'] = [
            'mailgun' => [
                'domain' => config('mailgun_domain'),
                'secret' => config('mailgun_secret'),
            ],
        ];
    }

}