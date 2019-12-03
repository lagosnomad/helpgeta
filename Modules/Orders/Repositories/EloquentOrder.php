<?php namespace Modules\Orders\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentOrder extends RepositoriesAbstract implements OrderInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getDataTable($artisan_user_id = NULL)
    {
        $query = $this->model
            ->leftJoin('order_status', 'order_status.id', '=', 'orders.status_id')
            ->leftJoin('users', 'users.id', '=', 'orders.user_id')
            ->leftJoin('users as artisan_users', 'artisan_users.id', '=', 'orders.artisan_id')
            ->select([
                'orders.id',
                'order_number',
                'orders.created_at',
                'orders.total',
                'order_status.name as status_name',
                'order_status.color_class as status_class',
            ])
        ->selectRaw("CONCAT(users.first_name,' ',users.last_name) as user_name")
        ->selectRaw("CONCAT(artisan_users.first_name,' ',artisan_users.last_name) as artisan_name");

        if(!is_null($artisan_user_id)){
            $query = $query->where('artisan_id',$artisan_user_id);
        }

        return $query;
    }

    public function getCountForPeriod($start_date,$end_date,$status = NULL)
    {
        $query = $this->model;
        if(!is_null($status)){
            $query = $query->whereHas('status',function($query) use($status){
                return $query->where('slug',$status);
            });
        }
        return $query->whereBetween('created_at',[$start_date,$end_date])->count();
    }

    public function getTotalForPeriod($start_date,$end_date)
    {
        $query = $this->model;
        $query = $query->whereHas('status',function($query){
            return $query->where('slug','completed');
        });
        $query = $query->whereHas('payment',function($query){
            return $query->where('status','success');
        });
        return $query->whereBetween('created_at',[$start_date,$end_date])->sum('total');
    }

}