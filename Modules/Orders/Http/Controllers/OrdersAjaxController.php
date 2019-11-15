<?php namespace Modules\Orders\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAjaxController;
use Modules\Orders\Http\Requests\FormRequest;
use Modules\Orders\Repositories\OrderInterface as Repository;

class OrdersAjaxController extends BaseAjaxController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

}
