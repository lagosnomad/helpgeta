<?php namespace Modules\Categories\Http\Controllers;

use Modules\Core\Http\Controllers\BaseApiController;
use Modules\Categories\Repositories\CategoryInterface as Repository;

class CategoriesApiController extends BaseApiController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {
       $models = $this->repository->allBase();

       return response()->json($models, 200);
    }

    public function nested($category_id)
    {
        $model = $this->repository->byIdWithChildrenNested($category_id);

        return response()->json($model, 200);
    }

    public function search()
    {
        $query = request('query');
        $models = $this->repository->bySearchQuery($query);

        return response()->json($models, 200);
    }


}
