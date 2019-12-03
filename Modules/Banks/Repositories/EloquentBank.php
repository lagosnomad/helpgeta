<?php namespace Modules\Banks\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentBank extends RepositoriesAbstract implements BankInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}