<?php namespace Modules\Reports\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentReport extends RepositoriesAbstract implements ReportInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}