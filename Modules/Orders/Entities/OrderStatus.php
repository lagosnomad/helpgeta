<?php namespace Modules\Orders\Entities;

use Modules\Core\Collections\NestableTrait;
use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class OrderStatus extends Base {

    protected $guarded = ['_token','exit'];

    public $table = 'order_status';


}