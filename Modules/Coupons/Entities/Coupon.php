<?php namespace Modules\Coupons\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class Coupon extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Coupons\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];


}