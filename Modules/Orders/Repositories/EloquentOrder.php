<?php namespace Modules\Orders\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentOrder extends RepositoriesAbstract implements OrderInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}