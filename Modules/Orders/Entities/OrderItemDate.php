<?php namespace Modules\Orders\Entities;

use Modules\Core\Collections\NestableTrait;
use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class OrderItemDate extends Base {

    protected $guarded = ['_token','exit'];

    public $table = 'order_item_dates';

    protected $dates = [
        'created_at',
        'updated_at',
        'date'
    ];

    public function getDateAttribute($value)
    {
        $date = new \DateTime($value);
        return $date->format('d M, Y h:i:s a');
    }

}