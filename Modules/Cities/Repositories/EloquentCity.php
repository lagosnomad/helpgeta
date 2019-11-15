<?php namespace Modules\Cities\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentCity extends RepositoriesAbstract implements CityInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}