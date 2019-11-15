<?php namespace Modules\Artisans\Http\Controllers;

use Modules\Core\Http\Controllers\BaseApiController;
use Modules\Artisans\Repositories\ArtisanInterface as Repository;

class ArtisansApiController extends BaseApiController
{

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index($category_id=null)
    {
        $models = $this->repository->allForCategory($category_id,['user','categories'],true);
        $models->each(function($item){
            modify_artisan_collection($item);
        });

        return response()->json($models, 200);
    }


}
