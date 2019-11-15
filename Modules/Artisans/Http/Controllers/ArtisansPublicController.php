<?php namespace Modules\Artisans\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\BasePublicController;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Modules\Artisans\Repositories\ArtisanInterface as Repository;

class ArtisansPublicController extends BasePublicController
{

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function show($id)
    {
        $model = $this->repository->bySlug($id,['user','categories']);

        if($model->categories->count() == 1){
            $category_id = $model->categories->first()->id;
        }else{
            $category_id = (integer) request()->get('category',0);
            $category_id = ($model->categories->where('id',$category_id)->count()) ? $category_id : 0;
        };

        return view('artisans::public.show')->with(compact('model','category_id'));
    }
}
