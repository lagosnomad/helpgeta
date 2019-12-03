<?php namespace Modules\Orders\Entities;

use Modules\Core\Entities\Base;

class OrderItem extends Base {

    protected $guarded = ['_token','exit'];

    public function dates()
    {
        return $this->hasMany('Modules\Orders\Entities\OrderItemDate', 'order_item_id');
    }

}