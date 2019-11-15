<?php namespace Modules\Cities\Http\Controllers;

use Modules\Core\Http\Controllers\BaseApiController;
use Modules\Cities\Repositories\CityInterface as Repository;

class CitiesApiController extends BaseApiController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index($id)
    {
       $model = $this->repository->byId($id);

       return response()->json($model, 200);
    }


}
