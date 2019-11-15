<?php namespace Modules\Orders\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class Order extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Orders\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];


}