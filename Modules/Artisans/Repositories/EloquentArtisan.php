<?php namespace Modules\Artisans\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentArtisan extends RepositoriesAbstract implements ArtisanInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function allForCategory($category_id=null,array $with = array(), $all = false)
    {
        $query = $this->make($with);

        if (!$all) {
            $query->online();
        }

        if(!is_null($category_id)){
            $query->wherehas('categories',function($query) use($category_id){
               return $query->where('category_id',$category_id);
            });
        }

        // Query ORDER BY
        $query->order();

        // Get
        return $query->get();
    }

    public function getForDataTable()
    {
        $query = $this->model
            ->with(['user']);

        return $query;
    }

}