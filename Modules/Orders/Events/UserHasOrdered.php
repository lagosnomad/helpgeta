<?php namespace Modules\Orders\Events;

class UserHasOrdered
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}
