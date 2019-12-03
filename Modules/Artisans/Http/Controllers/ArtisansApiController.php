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
        $category_uri= request()->get('category_uri');
        $models = $this->repository->allForCategory($category_id,['user','user.state','user.city','categories']);
        $models->each(function($item) use($category_uri) {
            modify_artisan_collection($item);
            $item->min_price = $item->present()->priceMin($category_uri);
        });

        return response()->json($models, 200);
    }


}
