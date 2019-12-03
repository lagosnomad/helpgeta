<?php namespace Modules\Artisans\Presenters;

use Modules\Core\Presenters\Presenter;

class ModulePresenter  extends Presenter
{

    /**
     * Get title
     *
     * @return string
     */
    public function title()
    {
        return '';
    }

    public function categoriesList()
    {
        $categories = $this->entity->categories;
        $html = '';
        foreach($categories as $category){
            $html .= '<a href="'.$category->present()->url.'" class="has-text-dark">';
            $html .= $category->category;
            $html .= '</a>';
        }
        return $html;
    }

    public function url()
    {
        return route('artisans.show',['id'=>$this->entity->slug]);
    }

    public function businessName()
    {
        return $this->entity->busines_name != '' ? $this->entity->busines_name : $this->entity->user->present()->fullname;
    }

    public function priceMin($category_uri)
    {
        return $this->entity->categories()->where('categories.uri','like','%'.$category_uri.'%')->get()->pluck('pivot.amount')->filter(function($item){
            return $item > 0;
        })->min();
    }

    public function location(){
        return $this->entity->user->city->name.', '.$this->entity->user->state->name;
    }

}