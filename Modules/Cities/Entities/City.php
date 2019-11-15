<?php namespace Modules\Cities\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class City extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Cities\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];


}