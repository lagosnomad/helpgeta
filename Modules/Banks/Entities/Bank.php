<?php namespace Modules\Banks\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class Bank extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Banks\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];


}