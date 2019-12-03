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

    public function show($uri)
    {
        $search_category = $this->repository->getFirstBy('uri',$uri,['items']);

        $base_slug = request()->segment(2);

        $base_category = $this->repository->bySlug($base_slug,['items']);

        $filters = request()->query();
        $filters = array_only($filters,['state','city','price_min','price_max','rating_min','sort']);
        $filters_modified = [];
        foreach($filters as $filter => $value){
            switch($filter){
                case 'state':
                    $obj = \States::getFirstBy('name',$value);
                    break;
                case 'city':
                    $obj = \Cities::getFirstBy('name',$value);
                    break;
                default:
                    $obj = [];
            }
            $filters_modified[] = [
                'name'=>$filter,
                'value'=>$value,
                'obj'=>$obj
            ];
        }
        $search_filters = json_encode($filters_modified);

        return view('categories::public.show')->with(compact('base_category','search_category','search_filters'));
    }

    public function showAlt($uri)
    {
        $model = $this->repository->getFirstBy('uri',$uri);

        $categories = request()->segments();
        array_shift($categories);

        $search_categories = [];
        foreach($categories as $key => $slug){
            $category_items = ($key == 0) ? ['items'] : [];
            $search_categories[] = $this->repository->bySlug($slug,$category_items);
        }
        $search_categories = collect($search_categories);

        $base_category = $search_categories->first();

        $search_filters = json_encode(request()->query());

        return view('categories::public.show')->with(compact('base_category','search_categories','search_filters'));
    }
}
