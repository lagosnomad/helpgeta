<?php namespace Modules\Categories\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;
use stdClass;

class EloquentCategory extends RepositoriesAbstract implements CategoryInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function allBase(array $with = array(), $all = false)
    {
        $query = $this->make($with);

        if (!$all) {
            $query->online();
        }

        // Parent Only
        $query->base();

        // Query ORDER BY
        $query->order();

        // Get
        return $query->get();
    }


    public function byIdWithChildrenNested($id)
    {
        $query = $this->make(['items'])->where('id', $id);

        $model = $query->firstOrFail();


        return $model;
    }

    public function getForDataTable()
    {
        $query = $this->model
            ->leftJoin('categories as parent_category', 'parent_category.id', '=', 'categories.parent_id')
            ->select([
                'categories.id as category_id',
                'categories.category',
                'parent_category.category as parent_title',
                'categories.amount',
                'categories.is_hourly_based',
                'categories.status'
            ]);

        return $query;
    }

    public function byPage($page = 1, $limit = 10, array $with = array(), $all = false)
    {
        $result = new stdClass;
        $result->page = $page;
        $result->limit = $limit;
        $result->totalItems = 0;
        $result->items = array();

        $query = $this->make($with);

        if (!$all) {
            $query->online();
        }

        $totalItems = $query->count();

        $query->order()
            ->skip($limit * ($page - 1))
            ->take($limit);

        $models = $query->base()->get();

        // Put items and totalItems in stdClass
        $result->totalItems = $totalItems;
        $result->items = $models->all();

        return $result;

    }

    public function latest($number = 10, array $with = array())
    {
        $query = $this->make($with);
        return $query->order()->base()->take($number)->get();
    }


}