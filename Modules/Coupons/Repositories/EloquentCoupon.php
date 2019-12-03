<?php namespace Modules\Coupons\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentCoupon extends RepositoriesAbstract implements CouponInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}