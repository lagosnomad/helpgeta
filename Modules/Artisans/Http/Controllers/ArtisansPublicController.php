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
        $model = $this->repository->bySlug($id,['user','categories','identification']);

        if(!$model->categories->count()){
            return redirect()->route('categories');
        }

        return view('artisans::public.show')->with(compact('model'));
    }
}
