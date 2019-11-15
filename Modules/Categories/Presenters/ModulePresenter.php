<?php namespace Modules\Categories\Presenters;

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

    public function url()
    {
        return route('categories.show',['slug'=>$this->entity->slug]);
    }

    public function imgNotFound($file = 'uploads/category.png')
    {
        return $file;
    }
}