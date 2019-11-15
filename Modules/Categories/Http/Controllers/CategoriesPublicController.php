<?php namespace Modules\Categories\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\BasePublicController;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Modules\Categories\Repositories\CategoryInterface as Repository;

class CategoriesPublicController extends BasePublicController
{

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {

        $models = $this->repository->allBase(['items']);


        return view('categories::public.index')
            ->with(compact('models'));

    }

    public function show($slug)
    {
        $model = $this->repository->bySlug($slug,['artisans.user']);

        $artisans  = $model->artisans;

        return view('categories::public.show')->with(compact('model','artisans'));
    }
}
