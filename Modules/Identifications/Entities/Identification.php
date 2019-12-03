<?php namespace Modules\Identifications\Entities;

use Illuminate\Database\Eloquent\Builder;
use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class Identification extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Identifications\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];

    public function scopeOnline(Builder $query)
    {
        return;
    }


}