<?php namespace Modules\Reports\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class Report extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Reports\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];


}