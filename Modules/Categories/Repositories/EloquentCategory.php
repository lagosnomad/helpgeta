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

    public function create(array $data)
    {
        // Create the model
        $model = $this->model->fill($data);

        if ($model->save()) {
            $this->_buildLookup($model);
            return $model;
        }

        return false;
    }

    public function update(array $data)
    {
        $model = $this->model->find($data['id']);

        $model->fill($data);

        if ($model->save()) {
            $this->_buildLookup($model);
            $this->_resetChildrenUri($model);
            return $model;
        }

        return $model;
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

    public function bySearchQuery($query)
    {
        $models = $this->model
            ->select(['category','uri'])
            ->where('category','like','%'.$query.'%')
            ->get();

        return $models;
    }

    public function getForDataTable()
    {
        $query = $this->model
            ->leftJoin('categories as parent_category', 'parent_category.id', '=', 'categories.parent_id')
            ->select([
                'categories.id as category_id',
                'categories.category',
                'parent_category.category as parent_title',
                'categories.uri',
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

    public function bySlugWithArtisanCount($slug,$with=[])
    {
        $model = $this->make($with);
        $model = $model->withCount('artisans');
        $model = $model->where('slug', '=', $slug)
            ->first();

        return $model;

    }

    public function delete($model)
    {
        $this->_resetChildrenUri($model);

        if ($model->delete()) {
            return true;
        }

        return false;
    }

    private function _resetChildrenUri(Model $category)
    {
        foreach ($category->children as $childPage) {
            $childPage->uri = NULL;
            $childPage->save();
            $this->_resetChildrenUri($childPage);
        }
    }

    private function _buildLookup($model)
    {
        if (!is_null($model->parent)) {
            $parent_uri = $model->parent->uri;
            $model->uri = $parent_uri . '/' . $model->slug;
            $model->save();
        } else {
            $model->uri = $model->slug;
            $model->save();
        }
    }


}