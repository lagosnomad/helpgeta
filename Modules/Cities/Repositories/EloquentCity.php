<?php namespace Modules\Cities\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentCity extends RepositoriesAbstract implements CityInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getForDataTable()
    {
        $query = $this->model
            ->leftJoin('states', 'states.id', '=', 'state_id')
            ->select([
                'cities.id',
                'cities.name',
                'states.name as state_name'
            ]);

        return $query;
    }


}