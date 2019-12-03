<?php namespace Modules\Payments\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentPayment extends RepositoriesAbstract implements PaymentInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}