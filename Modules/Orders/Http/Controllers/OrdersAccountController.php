<?php namespace Modules\Orders\Http\Controllers;

use Carbon\Carbon;
use Modules\Core\Http\Controllers\BaseAccountController;
use Modules\Core\Http\Controllers\BaseApiController;
use Modules\Orders\Events\UserHasOrdered;
use Modules\Orders\Repositories\OrderInterface as Repository;

class OrdersAccountController extends BaseAccountController
{

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {
        return view('orders::public.index');
    }

    public function show($order_number)
    {
        $model = $this->repository->getFirstBy('order_number',$order_number,['status','artisanUser','artisanUser.artisan.identification','user','item','item.dates']);
        $current_user = current_user();
        /*if($current_user->id != $model->artisan_id OR $current_user->id != $model->user_id){
            return redirect()->route('logout')->withError(trans());
        }*/
        $model = single_order_collection($model);
        return view('orders::public.show')->with(compact('model'));
    }


}
