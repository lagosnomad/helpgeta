<?php namespace Modules\Payments\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class Payment extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Payments\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];


}